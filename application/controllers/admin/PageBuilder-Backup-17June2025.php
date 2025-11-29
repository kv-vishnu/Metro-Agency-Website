<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageBuilder extends CI_Controller {
    //Edit page
    //Load full page contents after event
    //Add section
    //Add Row
    //Add Row Container
    //Add coloumn
    //Add element
    //Update element
    //Delete element
    //Delete section
    //Delete Coloumn
    //Update coloumn width
    //Update section class
    //Update coloumn class
    //Upload image
    //Render header element
    //Update container class
    //Save Meta Info
    //Render Meta Section
    //ASSOCIATES OR BRANDS
    //SLIDERS
    //EXPERTS
    //TESTIMONIALS
    //CERTIFICATIONS AND TRAINING LIST
    //INTRODUCTION ON HOME PAGE
     //CERTIFICATION TRAINING ON HOME PAGE WIDGET
     //FEATURED COURSES
     //GALLERY
     //UPCOMING BATCHES
    //VIDEO
    //Subject Based Courses Or Course Categories
    //Render SEO CONTENT
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/PageBuilder_model');
    }

    public function index()
    {
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getCertifications();
        $this->load->view('admin/template/header');
        $this->load->view('admin/pages/list', $data);
        $this->load->view('admin/template/footer');
    }

    public function test()
    {
        $page = 2;
    }

       //Edit page
    public function edit($page_id)
    {
    $sections = $this->PageBuilder_model->getSections($page_id);

    $html_output = '';

    $html_output = $this->renderMetasection($page_id);
    // $html_output .= '<button class="btn btn-warning addSection" id="addSection" data-page="' . htmlspecialchars($page_id) . '">Add Section</button>';


    foreach ($sections as $section) 
    {
        $html_output .= '<div id="section_'.$section['id'].'" class="section mb-3 border p-3">';



        // $html_output .= '<button class="btn btn-warning addContainer" data-section="' . $section['id'] . '" data-page="' . $page_id . '">Add Container</button>';
        // $html_output .= '<h6>' . htmlspecialchars($section['title']) . '</h6>';
        // $html_output .= '<button class="btn btn-warning addSectionClass" data-class="' . htmlspecialchars($section['class']) . '" data-section="' . $section['id'] . '">Section Class</button>';
        // $html_output .= '<button class="btn btn-warning deleteSection" data-section="' . $section['id'] . '">Delete Section</button>';




        // Render unstructured elements
        $html_output .= $this->renderUnstructuredElementsOutsideRow($section['id'], $page_id, 0);

        // ✅ Fixed: use correct dynamic page_id
        $containers = $this->db->get_where('page_containers', [
            'page_id' => $page_id,
            'section_id' => $section['id']
        ])->result_array();

        foreach ($containers as $container) 
        {
            $html_output .= '<div class="container mb-3 border p-3 d-none">';
            $html_output .= '<div class="d-flex flex-wrap gap-2 mb-2">';



            // $html_output .= '<button class="btn btn-success addContainerClass" data-class="' . $container['class'] . '" data-container="' . $container['id'] . '">Add Container Class</button>';
            // $html_output .= '<button class="btn btn-success addRowContainer" data-section="' . $section['id'] . '" data-page="' . $page_id . '" data-container="' . $container['id'] . '">Add Row</button>';
            // $html_output .= '<button class="btn btn-warning addElement" data-container="' . $container['id'] . '" data-section="' . $section['id'] . '" data-column="0">Add Container Element</button>';
            

            $html_output .= '</div>';

            $rows = $this->db->get_where('page_rows', [
                'page_id' => $page_id,
                'container_id' => $container['id']
            ])->result_array();

            foreach ($rows as $row) {
                $html_output .= '<div class="row mb-3 p-2 border bg-light">';
                $html_output .= '<div class="d-flex flex-wrap gap-2 mb-2"><strong>Row ID: ' . $row['id'] . '</strong>';
                $html_output .= '<button class="btn btn-success addColumn" data-page="' . $page_id . '" data-container="' . $container['id'] . '" data-row="' . $row['id'] . '">Add Column</button>';
                $html_output .= '</div>';

                $columns = $this->db->get_where('page_columns', [
                    'row_id' => $row['id']
                ])->result_array();

                foreach ($columns as $column) {
                    $html_output .= '<div id="coloumn_'.$column['id'].'" class="col-md-' . htmlspecialchars($column['width']) . ' border p-3">';
                    $html_output .= '<button class="btn btn-warning addElement" data-container="' . $container['id'] . '" data-section="' . $section['id'] . '" data-column="' . $column['id'] . '">Add Element</button>';
                    $html_output .= '<button class="btn btn-info btn-sm change-width" data-column-id="' . $column['id'] . '">Change Width</button>';
                    $html_output .= '<button class="btn btn-info btn-sm deleteColoumn" data-column-id="' . $column['id'] . '">Delete Column</button>';
                    $html_output .= '<button class="btn btn-info btn-sm ColoumnClass" data-class="' . $column['class'] . '" data-column-id="' . $column['id'] . '">Column Class</button>';
                    $html_output .= '<h6>Column ID: ' . $column['id'] . '</h6>';

                    $elements = $this->db->get_where('elements', [
                        'section_id' => $section['id'],
                        'page_id' => $page_id,
                        'column_id' => $column['id']
                    ])->result_array();

                    foreach ($elements as $element) {
                        $html_output .= '<div class="element border p-2 mt-2">';
                        $html_output .= $this->renderElement($element);
                        $html_output .= '<button class="btn btn-danger btn-sm remove-element" data-id="' . $element['id'] . '"><i class="fas fa-trash"></i></button>';
                        $html_output .= '</div>';
                    }

                    $html_output .= '</div>'; // end column
                }

                $html_output .= '</div>'; // end row
            }

            $html_output .= '</div>'; // end container
        }

        $html_output .= '</div>'; // end section
    }

    $data['section_html'] = $html_output;
    $data['widgets'] = $this->PageBuilder_model->getWidgets();
    $data['page_id'] = $page_id;
    $data['page_details'] = $this->PageBuilder_model->getPage($page_id);
    $data['slug'] = $data['page_details']['slug'];

    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/pages/edit', $data);
    $this->load->view('admin/template/footer');
}




    //Load full page contents after event
    public function load_dynamic_contents()
    {
        $page_id = $this->input->post('page_id');
        $sections = $this->PageBuilder_model->getSections($page_id);
        $html_output = ''; // Initialize the variable
        $html_output .= '<button class="btn btn-warning addSection" id="addSection" data-page="' . htmlspecialchars($page_id) . '">Add Sectionsss</button>';
        foreach ($sections as $section) 
        {
            $html_output .= '<div id="section_'.$section['id'].'" class="section mb-3 border p-3">'; //Section start
            $html_output .= '<button class="btn btn-warning addContainer" data-section="' . htmlspecialchars($section['id']) . '" data-page="' . htmlspecialchars($page_id) . '">Add Container</button>';
            $html_output .= '<h6>' . htmlspecialchars($section['title']) . '</h6>';
            $html_output .= '<button class="btn btn-warning addSectionClass" data-class="'.htmlspecialchars($section['class']).'" data-section="' . htmlspecialchars($section['id']) . '">Section class</button>';
            $html_output .= '<button class="btn btn-warning deleteSection" data-section="' . htmlspecialchars($section['id']) . '">Delete Section</button>';

            $containers = $this->db->get_where('page_containers', ['section_id' => $section['id']])->result_array();
            foreach ($containers as $container) 
            {

                $html_output .= '<div class="row mb-3 border p-3">'; //Row start
                $html_output .= '<div class="d-flex flex-wrap gap-2 mb-2">';
                $html_output .= '<button class="btn btn-success addContainerClass" data-class="'.$container['class'].'" data-container="'.$container['id'].'">Add Container Class</button>';
                $html_output .= '<button class="btn btn-success addRowContainer" data-section="'.$section['id'].'" data-page="'.$page_id.'" data-container="'.$container['id'].'">Add Row Container</button>';
                $html_output .= '<button class="btn btn-warning addElement" data-container="' . htmlspecialchars($container['id']) . '" data-section="' . htmlspecialchars($section['id']) . '" data-column="0">Add Container Element</button>';
                $html_output .= '</div>'; // Close flex container

                //render unstructured elements outside row
                $html_output .= $this->renderUnstructuredElementsOutsideRow($section['id'],$page_id,0);

                // Get rows for this container
                $rows = $this->db->get_where('page_rows', ['page_id' => $page_id, 'container_id' => $container['id']])->result_array();
                foreach ($rows as $row) {
                $html_output .= '<div class="row mb-3 p-2 border bg-light">'; // Row start
                $html_output .= '<div class="d-flex flex-wrap gap-2 mb-2"><strong>Row ID: ' . $row['id'] . '</strong>';
                $html_output .= '<button class="btn btn-success addColumn" data-page="'.$page_id.'" data-container="'.$container['id'].'" data-row="'.$row['id'].'">Add Column Inside Container</button>';
                $html_output .= '</div>';
                    // Get columns for this row
                    $columns = $this->db->get_where('page_columns', ['row_id' => $row['id']])->result_array();

                    foreach ($columns as $column) 
                    {
                        $html_output .= '<div id="coloumn_'.$column['id'].'" class="col-md-' . htmlspecialchars($column['width']) . ' border p-3">'; // Coloumn start
                        $html_output .= '<button class="btn btn-warning addElement" data-container="' . htmlspecialchars($container['id']) . '" data-section="' . htmlspecialchars($section['id']) . '" data-column="' . htmlspecialchars($column['id']) . '">Add Element</button>';
                        $html_output .= '<button class="btn btn-info btn-sm change-width" data-column-id="' . htmlspecialchars($column['id']) . '">Change Width</button>';
                        $html_output .= '<button class="btn btn-info btn-sm deleteColoumn" data-column-id="' . htmlspecialchars($column['id']) . '">Delete Coloumn</button>';
                        $html_output .= '<button class="btn btn-info btn-sm ColoumnClass" data-class="'.htmlspecialchars($column['class']).'" data-column-id="' . htmlspecialchars($column['id']) . '">Coloumn Class</button>';
                        $html_output .= '<h6>Column ID: ' . htmlspecialchars($column['id']) . '</h6>';
                        // $html_output .= '<strong>Content:</strong> ' . htmlspecialchars($column['content']); // Adjust field names as per your DB
                        // Get elements for this column
                        $elements = $this->db->get_where('elements', ['section_id' => $section['id'],'page_id' => $page_id,'column_id' => $column['id']])->result_array();

                            foreach ($elements as $element) 
                            {
                                $html_output .='<div class="element border p-2 mt-2">';
                                switch ($element['type']) 
                                {
                                    case 'text':
                                        $html_output .= '<p>' . nl2br(htmlspecialchars($element['content'])) . '</p>';
                                        break;

                                    case 'image':
                                        $html_output .= '<img src="' . htmlspecialchars($element['content']) . '" alt="Image" class="img-fluid">';
                                        break;

                                    case 'link':
                                        $html_output .= '<a href="' . htmlspecialchars($element['content']) . '" target="_blank">' . htmlspecialchars($element['label'] ?? 'Visit Link') . '</a>';
                                        break;

                                    case 'textarea':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'header':
                                        $html_output .= $this->renderHeaderElement();
                                        break;
                                        
                                    case 'associates':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'certifications':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'featured_courses':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'course_categories':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'seo-content':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'testimonials':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;
    
                                    case 'tutor':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'introduction-home':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'certifications-training':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;
                                    
                                    case 'upcoming_batches':
                                    $section_html .= $this->renderUpcomingBatches();
                                    break;

                                    case 'corporate-training':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'gallery':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'video':
                                        $html_output .= $this->renderVideo();
                                        break;

                                    case 'gallery-widget-caption':
                                        $html_output .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'home_page_slider':
                                        $sliders = $this->PageBuilder_model->getSliders();
                                        foreach ($sliders as $slider) 
                                        {
                                            $html_output .= '<div class="slider-item mb-3 p-3 border">';
                                            $html_output .= '<h5>' . htmlspecialchars($slider['title']) . '</h5>';
                                            $html_output .= '<p>' . nl2br(htmlspecialchars($slider['description'])) . '</p>';
                                            $html_output .= '</div>';
                                        }
                                        break;

                                    case 'loop':
                                        $loop_items = $this->db->get_where('loop_items', ['element_id' => $element['id']])->result_array();
                                        foreach ($loop_items as $item) 
                                        {
                                            $html_output .= '<div class="loop-item mb-3 p-3 border">';
                                            $html_output .= '<h5>' . htmlspecialchars($item['text']) . '</h5>';
                                            $html_output .= '<p>' . nl2br(htmlspecialchars($item['textarea'])) . '</p>';
                                            if (!empty($item['image'])) {
                                                $html_output .= '<img src="' . htmlspecialchars($item['image']) . '" class="img-fluid mb-2" alt="' . htmlspecialchars($item['text']) . '">';
                                            }
                                            $html_output .= '</div>';
                                        }
                                        break;

                                    case 'loop_with_image':
                                        $loop_items = $this->db->get_where('loop_items', ['element_id' => $element['id']])->result_array();
                                        foreach ($loop_items as $item) 
                                        {
                                            $html_output .= '<div class="loop-item mb-3 p-3 border">';
                                            $html_output .= '<h5>' . htmlspecialchars($item['text']) . '</h5>';
                                            $html_output .= '<p>' . nl2br(htmlspecialchars($item['textarea'])) . '</p>';
                                            if (!empty($item['image'])) {
                                                $html_output .= '<img src="' . base_url(htmlspecialchars($item['image'])) . '" class="img-fluid mb-2" alt="' . htmlspecialchars($item['text']) . '">';
                                            }
                                            $html_output .= '</div>';
                                        }
                                        break;

                                    // Add more types as needed
                                    default:
                                        $html_output .= '<div>Unsupported element type: ' . htmlspecialchars($element['type']) . '</div>';
                                        break;
                                }
                                $html_output .='</div>';
                                $html_output .= '<button class="btn btn-danger btn-sm remove-element" data-id="'.$element['id'].'"><i class="fas fa-trash"></i></button>';
                            }
                        $html_output .= '</div>';
                        }
                $html_output .= '</div>'; //Row end
                    }
                $html_output .= '</div>'; //Container end
            }

            $html_output .= '</div>'; //Section end
        }
        echo $html_output;
    }


    //Render Unstructured elements outside row
    public function renderUnstructuredElementsOutsideRow($section_id, $page_id, $coloumn_id = 0)
{
    $elements = $this->db->get_where('elements', [
        'section_id' => $section_id,
        'page_id' => $page_id,
        'column_id' => $coloumn_id
    ])->result_array();

    $section_html = '';
    foreach ($elements as $element) {
        $section_html .= '<div class="element sds border p-2 mb-2">';
        $section_html .= $this->renderElement($element , $page_id);
        //$section_html .= '<button class="btn btn-danger btn-sm remove-element" data-id="' . $element['id'] . '"><i class="fas fa-trash"></i></button>';
        $section_html .= '</div>';
    }
    
    return $section_html;
}

private function renderElement($element , $page_id)
{
    switch ($element['type']) {
        case 'text':
            return '<p>' . nl2br(htmlspecialchars($element['content'])) . '</p>';
        case 'image':
            return '<img src="' . base_url(htmlspecialchars($element['content'])) . '" class="img-fluid">';
        case 'link':
            return '<a href="' . htmlspecialchars($element['content']) . '" target="_blank">' . htmlspecialchars($element['label'] ?? 'Visit Link') . '</a>';
        case 'textarea':
            return '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
        case 'home_page_slider':
            return $this->renderSliders();
        case 'associates':
            return $this->renderAssociates();
        case 'certifications-training':
            return $this->renderCertificationsAndTrainingWidget();
        case 'introduction-home':
            return $this->renderIntroduction();
        case 'testimonials':
            return $this->renderTestimonials();
        case 'tutor':
            return $this->renderTutors();
        case 'certifications':
            return $this->renderCertificationsAndTraining($page_id);
        case 'course_categories': // Subject Based Courses
            return $this->renderCourseCategoriesOrSubjectBasedCourses();
            break;

        case 'seo-content':
            return $this->renderSeoContent();
            break;

        case 'featured_courses':
            return $this->renderFeaturedCourses();
        case 'gallery':
            return $this->renderGallery();
        case 'video':
            return $this->renderVideo();
        case 'upcoming_batches':
            return $this->renderUpcomingBatches();
        case 'loop':
        case 'loop_with_image':
            return $this->renderLoopItems($element['id'], $element['type']);
        default:
            return '<div class="text-danger">Unsupported element type: ' . htmlspecialchars($element['type']) . '</div>';
    }
}


   


//Add section
public function addSection() {
    $page_id = $this->input->post('page_id');
    $section_id = $this->PageBuilder_model->insertSection($page_id);
    echo json_encode(['section_id' => $section_id , 'page_id' => $page_id]);
}


    //Add Row
    public function addContainer() {
        $page_id = $this->input->post('page_id');
        $section_id = $this->input->post('section_id');
        $row_id = $this->PageBuilder_model->insertContainer($page_id,$section_id);
        echo json_encode(['row_id' => $row_id , 'page_id' => $page_id]);
    }

    //Add Row Container
    public function addRowContainer() {
        $page_id = $this->input->post('page_id');
        $section_id = $this->input->post('section_id');
        $container_id = $this->input->post('container_id');
        $row_id = $this->PageBuilder_model->insertRowContainer($page_id,$section_id,$container_id);
        echo json_encode(['row_id' => $row_id , 'page_id' => $page_id]);
    }

    //Add coloumn
    public function addColumn() {
        $container_id = $this->input->post('container_id');
        $page_id = $this->input->post('page_id');
        $row_id = $this->input->post('row_id');
        $column_id = $this->PageBuilder_model->insertColumn($container_id,$page_id,$row_id);
        echo json_encode(['column_id' => $column_id]);
    }
    //Add element
    public function addElement()
    {
        $section_id = $this->input->post('section_id'); 
        $page_id = $this->input->post('page_id'); 
        $column_id = $this->input->post('column_id');
        $type = $this->input->post('type');
        $content = '';
        $button_text = null;
        $button_link = null;

        // --- Handle loop without image ---
        if ($type == 'loop') {
            $loopContentJson = $this->input->post('loop_content');
            $loopContentArray = json_decode($loopContentJson, true);

            $elementData = [
                'section_id' => $section_id,
                'page_id' => $page_id,
                'column_id' => $column_id,
                'type' => $type,
                'content' => '',
                'button_text' => '',
                'button_link' => ''
            ];
            $this->db->insert('elements', $elementData);
            $element_id = $this->db->insert_id();

            foreach ($loopContentArray as $item) {
                $loopItemData = [
                    'element_id' => $element_id,
                    'text' => $item['text'],
                    'textarea' => $item['textarea']
                ];
                $this->db->insert('loop_items', $loopItemData);
            }

            echo json_encode([
                'id' => $element_id,
                'column_id' => $column_id,
                'type' => $type,
                'loop_items' => $loopContentArray
            ]);
            return;
        }

        // --- Handle loop with image ---
        if ($type == 'loop_with_image') {
            $texts = $this->input->post('loop_image_text');
            $textareas = $this->input->post('loop_image_textarea');
            $files = $_FILES['loop_image_file'];

            $elementData = [
                'section_id' => $section_id,
                'page_id' => $page_id,
                'column_id' => $column_id,
                'type' => $type,
                'content' => '',
                'button_text' => '',
                'button_link' => ''
            ];
            $this->db->insert('elements', $elementData);
            $element_id = $this->db->insert_id();

            $loopItems = [];

            for ($i = 0; $i < count($texts); $i++) {
                $imagePath = '';

                if (!empty($files['name'][$i])) {
                    $_FILES['temp_loop_image']['name']     = $files['name'][$i];
                    $_FILES['temp_loop_image']['type']     = $files['type'][$i];
                    $_FILES['temp_loop_image']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['temp_loop_image']['error']    = $files['error'][$i];
                    $_FILES['temp_loop_image']['size']     = $files['size'][$i];

                    $imagePath = $this->_uploadImage('temp_loop_image');
                }

                $loopItemData = [
                    'element_id' => $element_id,
                    'text' => $texts[$i],
                    'textarea' => $textareas[$i],
                    'image' => $imagePath
                ];
                $this->db->insert('loop_items', $loopItemData);
                $loopItems[] = $loopItemData;
            }

            echo json_encode([
                'id' => $element_id,
                'column_id' => $column_id,
                'type' => $type,
                'loop_items_count' => count($texts),
                'loop_items' => $loopItems
            ]);
            return;
        }

        // --- Handle text, textarea, image, link ---
        if ($type === 'text' || $type === 'textarea') {
            $content = $this->input->post('content');
        } elseif ($type === 'image') {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $content = 'uploads/' . $uploadData['file_name'];
            } else {
                echo json_encode(['error' => $this->upload->display_errors()]);
                return;
            }
        } elseif ($type === 'link') {
            $button_text = $this->input->post('button_text');
            $button_link = $this->input->post('button_link');
        } elseif ($type === 'slider') {
            if($this->input->post('content') === 'home_page_slider'){
                $type = 'home_page_slider';
                $content = 'Home Page Slider';
            }elseif($this->input->post('content') === 'associates'){
                $type = 'associates';
                $content = 'Associates Slider';
            }elseif($this->input->post('content') === 'featured_courses'){
                $type = 'featured_courses';
                $content = 'Featured Courses';
            }elseif($this->input->post('content') === 'testimonials'){
                $type = 'testimonials';
                $content = 'Testimonials';
            }elseif($this->input->post('content') === 'tutor'){
                $type = 'tutor';
                $content = 'Expert Trainers';
            }elseif($this->input->post('content') === 'blog'){
                $type = 'blog';
                $content = 'Blogs';
            }elseif($this->input->post('content') === 'course_categories'){
                $type = 'course_categories';
                $content = 'Expert Trainers';
            }elseif($this->input->post('content') === 'upcoming_batches'){
                $type = 'upcoming_batches';
                $content = 'Upcoming Batches';
            }else{
                
            }
            
        }elseif ($type === 'widgets') {
            if($this->input->post('content') === 'introduction-home'){
                $type = 'introduction-home';
                $content = 'Introduction';
            }elseif($this->input->post('content') === 'certifications-training'){
                $type = 'certifications-training';
                $content = 'Certifications Training';
            }elseif($this->input->post('content') === 'video'){
                $type = 'video';
                $content = 'Video';            
            }elseif($this->input->post('content') === 'seo-content'){
                $type = 'seo-content';
                $content = 'SEO Content';                    
            }else{
                
            }
            
        } elseif ($type === 'header') {
            $content = 'Header';
        } elseif ($type === 'footer') {
            $content = 'Footer';
        }elseif ($type === 'certifications') {
            $content = 'Certifications';
        }elseif ($type === 'gallery') {
            $content = 'Gallery';
        }

        // --- Insert non-loop element ---
        $data = [
            'section_id' => $section_id,
            'page_id' => $page_id,
            'column_id' => $column_id,
            'type' => $type,
            'content' => $content,
            'button_text' => $button_text,
            'button_link' => $button_link
        ];
        $this->db->insert('elements', $data);
        $element_id = $this->db->insert_id();

        echo json_encode([
            'id' => $element_id,
            'column_id' => $column_id,
            'type' => $type,
            'content' => $content,
            'button_text' => $button_text,
            'button_link' => $button_link
        ]);
    }

    
    //Update element
    public function updateElement()
    {
        $element_id = $this->input->post('element_id');
        $field_type = $this->input->post('field_type'); //Control type (text,textarea,link,image)
        $content = $this->input->post('content');
        if ($field_type === 'text' || $field_type === 'textarea') {
            $update_data = ['content' => $content];
            $this->db->where('id', $element_id);
            $this->db->where('type', $field_type);
            $updated = $this->db->update('elements', $update_data);
        }

        if ($field_type === 'button_text') {
            $update_data = ['button_text' => $content];
            $this->db->where('id', $element_id);
            $updated = $this->db->update('elements', $update_data);
        }

        if ($field_type === 'button_link') {
            $update_data = ['button_link' => $content];
            $this->db->where('id', $element_id);
            $updated = $this->db->update('elements', $update_data);
        }
        

        if ($updated) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }
    //Delete element
    public function deleteElement()
    {
        $id = $this->input->post('id');

        if ($this->PageBuilder_model->deleteElementById($id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
    //Delete section
    public function deleteSection()
    {
        $section_id = $this->input->post('section_id');

        if ($this->PageBuilder_model->deleteSectionById($section_id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
    //Delete Coloumn
    public function deleteColoumn()
    {
        $column_id = $this->input->post('column_id');

        if ($this->PageBuilder_model->deleteColoumnById($column_id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    public function save_editor() {
        $content = $this->input->post('content', true); // 'true' enables XSS filtering
        $content1 = $this->input->post('content1', true);
        $this->PageBuilder_model->save_content($content,$content1);
        echo "Content saved!";
    }
    

    //Update coloumn width
    public function updateColumnWidth() {
        $columnId = $this->input->post('column_id');
        $width = $this->input->post('width');
    
        $this->db->where('id', $columnId)->update('page_columns', ['width' => $width]);
    
        echo json_encode(['status' => 'success']);
    }
    //Update section class
    public function updateSectionClass() {
        $section_id = $this->input->post('section_id');
        $class = $this->input->post('class');
    
        $this->db->where('id', $section_id)->update('sections', ['class' => $class]);
    
        echo json_encode(['status' => 'success']);
    }
    //Update coloumn class
    public function updateColoumnClass() {
        $coloumn_id = $this->input->post('coloumn_id');
        $class = $this->input->post('class');
    
        $this->db->where('id', $coloumn_id)->update('page_columns', ['class' => $class]);
    
        echo json_encode(['status' => 'success']);
    }
    //Update container class
    public function updateContainerClass() {
        $container_id = $this->input->post('container_id');
        $class = $this->input->post('class');
    
        $this->db->where('id', $container_id)->update('page_containers', ['class' => $class]);
    
        echo json_encode(['status' => 'success']);
    }
    //Upload image
    private function _uploadImage($field)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['encrypt_name'] = true;
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field)) {
            $data = $this->upload->data();
            return 'uploads/' . $data['file_name'];
        }

        return '';
    }
    //Render header element
    public function renderHeaderElement(){
        $html  = '<section class="header-section py-5 bg-light">';
        $html .= '<div class="container">';
        $html .= '<div class="row justify-content-center">';
        $html .= '<div class="col-lg-8">';
        $html .= "<p class='test'>Header part here</p>";
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';

        return $html;
    }

    //ASSOCIATES OR BRANDS
    public function renderAssociates()
    {
        $associates = $this->PageBuilder_model->getAssociates();
            $html = '';
            $html .= '<div class="container">';
            $html .= '<h4 class="text-center my-4">Brands Or Associates</h4>';
            $html .= '<div class="row gx-2 justify-content-center">';

            foreach ($associates as $associate) 
            {
                $image = $associate['image'];
                $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">';
                $html .= '  <div class="brands-carousel-item card">';
                $html .= '    <img src="' . base_url('uploads/brand-associates/' . $associate['image']) . '" alt="partner-logo" class="img-fluid mb-2">';
                $html .= '    <div class="mt-2">';
                $html .= '      <button class="btn btn-sm btn-primary me-1 update_associate" data-id="' . $associate['id'] . '" 
                    data-image="' . $image . '" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editModal"><i class="fas fa-edit"></i></button>';
                $html .= '      <button class="btn btn-sm btn-danger delete-associate" data-bs-toggle="modal" data-id="' . $associate['id'] . '" data-bs-target="#deleteAssociateModal"><i class="fas fa-trash"></i></button>';
                $html .= '    </div>';
                $html .= '  </div>';
                $html .= '</div>';
            }

            // Edit Modal
            $html .= '<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editModalLabel">Update Brand</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Image</label>';
            $html .= '            <input type="file" name="associateImage_update" id="associateImage_update" class="form-control" accept="image/*">';
            $html .= '            <img src="" alt="current-image" id="edit-image-preview" class="img-fluid mt-2" style="max-height: 100px;">';
            $html .= '            <input type="hidden" id="old_image" class="form-control" value="">';
            $html .= '            <div class="error" id="error_image_update" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="associateUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_associate_btn" class="btn btn-success">Update Brand</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Delete Modal
            $html .= '<div class="modal fade" id="deleteAssociateModal" tabindex="-1" aria-labelledby="deleteAssociateModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog modal-dialog-centered">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '            <input type="hidden" id="delete_associate_id" class="form-control" value="">';
            $html .= '        <h5 class="modal-title" id="deleteAssociateModalLabel">Delete Confirmation</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">Are you sure you want to delete <strong></strong>?</div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="associateDeleteMsg" style="color: red;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="submit" class="btn btn-danger delete-associate-btn">Delete Brand</button>';
            $html .= '      </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Add New Associate Button
            $html .= '<div class="col-12 text-center mt-4">';
            $html .= '  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAssociateModal">';
            $html .= '    Add New Brand';
            $html .= '  </button>';
            $html .= '</div>';

            $html .= '</div>'; // Close row
            $html .= '</div>'; // Close container

            // Modal HTML
            $html .= '<div class="modal fade" id="addAssociateModal" tabindex="-1" aria-labelledby="addAssociateModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">'; 
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="addAssociateModalLabel">Add New Brand</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="associateImage" class="form-label">Image</label>';
            $html .= '          <input type="file" class="form-control" id="associateImage" name="associateImage" accept="image/*" required>';
            $html .= '          <div class="error" id="error_image" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '      </div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="associateSuccessMsg" style="color: green;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="button" class="btn btn-success" id="add-associate">Add Brand</button>';
            $html .= '      </div>';
            $html .= '    </div>'; // end modal-content
            $html .= '  </div>';   // end modal-dialog
            $html .= '</div>';     // end modal

            return $html;
    }

    //SLIDERS
    public function renderSliders()
    {
            $sliders = $this->PageBuilder_model->getSliders();
            $html = '';
            $html .= '<div class="container">';
            $html .= '<h4 class="text-center my-4">Sliders</h4>';
            $html .= '<div class="row gx-2 gy-2">';

            foreach ($sliders as $slider) 
            {
                $image = $slider['image'];
                $html .= '<div class="col-12 col-sm-4 col-md-3 col-lg-3 text-center mb-4">';
                $html .= '  <div class="hero-slider-item card">';
                $html .= '    <img src="' . base_url('uploads/slider/' . $slider['image']) . '" alt="partner-logo" class="img-fluid mb-2">';
                $html .= '      <h6>' . htmlspecialchars($slider['title']) . '</h6>';
$html .= '      <p>' . nl2br(htmlspecialchars($slider['description'])) . '</p>';
                $html .= '    <div class="mt-2">';
                $html .= '      <button class="btn btn-sm btn-primary me-1 update_slider" data-id="' . $slider['id'] . '" 
                    data-name="' . $slider['title'] . '"
                    data-description="' . $slider['description'] . '"
                    data-image="' . $image . '" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editSliderModal"><i class="fas fa-edit"></i></button>';
                $html .= '      <button class="btn btn-sm btn-danger delete-slider" data-bs-toggle="modal" data-id="' . $slider['id'] . '" data-name="'.$slider['title'].'" data-bs-target="#deleteSliderModal"><i class="fas fa-trash"></i></button>';
                $html .= '    </div>';
                $html .= '  </div>';
                $html .= '</div>';
            }

             // Edit Modal
            $html .= '<div class="modal fade" id="editSliderModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editModalLabel">Update Slider</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_slider" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Name</label>';
            $html .= '            <input type="text" name="name" id="name_slider" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_name_update_slider" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Description</label>';
            $html .= '            <input type="text" name="name" id="description_slider" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_description_update_slider" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Image</label>';
            $html .= '            <input type="file" name="sliderImage_update" id="sliderImage_update" class="form-control" accept="image/*">';
            $html .= '            <img src="" alt="current-image" id="edit-image-preview-slider" class="img-fluid mt-2" style="max-height: 100px;">';
            $html .= '            <input type="hidden" id="old_image_slider" class="form-control" value="">';
            $html .= '            <div class="error" id="error_image_update_slider" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="sliderUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_slider_btn" class="btn btn-success">Update Slider</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Delete Modal
            $html .= '<div class="modal fade" id="deleteSliderModal" tabindex="-1" aria-labelledby="deleteSliderModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog modal-dialog-centered">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '            <input type="hidden" id="delete_slider_id" class="form-control" value="">';
            $html .= '        <h5 class="modal-title" id="deletesliderModalLabel">Delete Confirmation</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">Are you sure you want to delete <strong></strong>?</div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="sliderDeleteMsg" style="color: red;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="submit" class="btn btn-danger delete-slider-btn">Delete Slider</button>';
            $html .= '      </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Add New slider Button
            $html .= '<div class="col-12 text-center mt-4">';
            $html .= '  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sliderModal">';
            $html .= '    Add New Slider';
            $html .= '  </button>';
            $html .= '</div>';

            $html .= '</div>'; // Close row
            $html .= '</div>'; // Close container

            // Modal HTML
            $html .= '<div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="sliderModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">'; 
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="sliderModalLabel">Add New Slider</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="title" class="form-label">Title</label>';
            $html .= '          <input type="text" class="form-control" id="title" name="title" required>';
            $html .= '          <div class="error" id="error_slidername" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="description" class="form-label">Description</label>';
            $html .= '          <input type="text" class="form-control" id="description" name="description" required>';
            $html .= '          <div class="error" id="error_description" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="sliderImage" class="form-label">Image</label>';
            $html .= '          <input type="file" class="form-control" id="sliderImage" name="image" accept="image/*" required>';
            $html .= '          <div class="error" id="error_slider_image" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '      </div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="sliderSuccessMsg" style="color: green;"></div>';
            $html .= '        <button type="button" class="btn btn-success" id="add-slider">Add Slider</button>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '      </div>';
            $html .= '    </div>'; // end modal-content
            $html .= '  </div>';   // end modal-dialog
            $html .= '</div>';     // end modal
            return $html;
    }

    //EXPERTS
    public function renderTutors()
    {
            $tutors = $this->PageBuilder_model->getTutors();
            $html = '';
            $html .= '<div class="container">';
            $html .= '<h4 class="text-center my-4">Experts</h4>';
            $html .= '<div class="row gx-2 justify-content-center">';

            foreach ($tutors as $tutor) 
            {
                $image = $tutor['image'];
                $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">';
                $html .= '  <div class="experts-item card">';
                $html .= '    <img src="' . base_url('uploads/experts/' . $tutor['image']) . '" alt="partner-logo" class="img-fluid mb-2">';
                $html .= '    <div class="associate-title">' . htmlspecialchars($tutor['name']) . '</div>';
                $html .= '    <div class="mt-2">';
                $html .= '      <button class="btn btn-sm btn-primary me-1 update_expert" data-id="' . $tutor['id'] . '" 
                    data-name="' . $tutor['name'] . '"
                    data-role="' . $tutor['role'] . '" 
                    data-remark="' . $tutor['remark'] . '"
                    data-image="' . $image . '" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editExpertModal"><i class="fas fa-edit"></i></button>';
                $html .= '      <button class="btn btn-sm btn-danger delete-expert" data-bs-toggle="modal" data-id="' . $tutor['id'] . '" data-name="'.$tutor['name'].'" data-bs-target="#deleteExpertModal"><i class="fas fa-trash"></i></button>';
                $html .= '    </div>';
                $html .= '  </div>';
                $html .= '</div>';
            }

            // Edit Modal
            $html .= '<div class="modal fade" id="editExpertModal" tabindex="-1" aria-labelledby="editExpertModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editExpertModalLabel">Update Experts</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_expert" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Name</label>';
            $html .= '            <input type="text" name="name" id="name_expert" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_name_update_expert" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Role</label>';
            $html .= '            <input type="text" name="role" id="role_expert" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_role_update_expert" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Remark</label>';
            $html .= '            <input type="text" name="remark" id="remark_expert" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_remark_update_expert" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Image</label>';
            $html .= '            <input type="file" name="expertImage_update" id="expertImage_update" class="form-control" accept="image/*">';
            $html .= '            <img src="" alt="current-image" id="edit-image-preview-expert" class="img-fluid mt-2" style="max-height: 100px;">';
            $html .= '            <input type="hidden" id="old_image_expert" class="form-control" value="">';
            $html .= '            <div class="error" id="error_image_update_expert" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="expertUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_expert_btn" class="btn btn-success">Update Expert</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Delete Modal
            $html .= '<div class="modal fade" id="deleteExpertModal" tabindex="-1" aria-labelledby="deleteExpertModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog modal-dialog-centered">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '            <input type="hidden" id="delete_expert_id" class="form-control" value="">';
            $html .= '        <h5 class="modal-title" id="deleteExpertModalLabel">Delete Confirmation</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">Are you sure you want to delete <strong></strong>?</div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="expertDeleteMsg" style="color: red;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="submit" class="btn btn-danger delete-expert-btn">Delete Expert</button>';
            $html .= '      </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Add New Expert Button
            $html .= '<div class="col-12 text-center mt-4">';
            $html .= '  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExpertsModal">';
            $html .= '    Add New Experts';
            $html .= '  </button>';
            $html .= '</div>';

            $html .= '</div>'; // Close row
            $html .= '</div>'; // Close container

            // Modal HTML
            $html .= '<div class="modal fade" id="addExpertsModal" tabindex="-1" aria-labelledby="addExpertsModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">'; 
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="addExpertsModalLabel">Add New Expert</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="expert-name" class="form-label">Name</label>';
            $html .= '          <input type="text" class="form-control" id="expert-name" name="name" required>';
            $html .= '          <div class="error" id="error_name_expert" style="color:red;"></div>';
            $html .= '        </div>';
             $html .= '        <div class="mb-3">';
            $html .= '          <label for="expert-role" class="form-label">Role</label>';
            $html .= '          <input type="text" class="form-control" id="expert-role" name="role" required>';
            $html .= '          <div class="error" id="error_role_expert" style="color:red;"></div>';
            $html .= '        </div>';
             $html .= '        <div class="mb-3">';
            $html .= '          <label for="expert-remark" class="form-label">Remark</label>';
            $html .= '          <input type="text" class="form-control" id="expert-remark" name="remark" required>';
            $html .= '          <div class="error" id="error_remark_expert" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="expertImage" class="form-label">Image</label>';
            $html .= '          <input type="file" class="form-control" id="expertImage" name="expertImage" accept="image/*" required>';
            $html .= '          <div class="error" id="error_image_expert" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '      </div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="expertSuccessMsg" style="color: green;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="button" class="btn btn-success" id="add-expert">Add Expert</button>';
            $html .= '      </div>';
            $html .= '    </div>'; // end modal-content
            $html .= '  </div>';   // end modal-dialog
            $html .= '</div>';     // end modal

            return $html;
    }
    //TESTIMONIALS
    public function renderTestimonials()
    {
            $testimonials = $this->PageBuilder_model->getTestimonials();
            $html = '';
            $html .= '<div class="container">';
            $html .= '<h4 class="text-center my-4">Testimonials</h4>';
            $html .= '<div class="row gx-2 justify-content-center">';

            foreach ($testimonials as $testimonial) 
            {
                $image = $testimonial['image'];
                $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-2">';
                $html .= '  <div class="testimonials-item card">';
                $html .= '    <img src="' . base_url('uploads/testimonials/' . $testimonial['image']) . '" alt="partner-logo" class="img-fluid mb-2">';
                $html .= '    <h6>' . htmlspecialchars($testimonial['name']) . '</h6>';
                $html .= '    <div class="associate-position">' . htmlspecialchars($testimonial['position']) . '</div>';
                $html .= '    <div class="associate-company">' . htmlspecialchars($testimonial['company']) . '</div>';
                $html .= '    <p>' . htmlspecialchars($testimonial['description']) . '</p>';
                $html .= '    <div class="mt-2">';
                $html .= '      <button class="btn btn-sm btn-primary me-1 update_testimonial" data-id="' . $testimonial['id'] . '" 
                    data-name="' . $testimonial['name'] . '"
                    data-position="' . $testimonial['position'] . '"
                    data-company="' . $testimonial['company'] . '" 
                    data-description="' . $testimonial['description'] . '"
                    data-image="' . $image . '" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editTestimonialModal"><i class="fas fa-edit"></i></button>';
                $html .= '      <button class="btn btn-sm btn-danger delete-testimonial" data-bs-toggle="modal" data-id="' . $testimonial['id'] . '" data-name="'.$testimonial['name'].'" data-bs-target="#deleteTestimonialModal"><i class="fas fa-trash"></i></button>';
                $html .= '    </div>';
                $html .= '  </div>';
                $html .= '</div>';
            }

            // Edit Modal
            $html .= '<div class="modal fade" id="editTestimonialModal" tabindex="-1" aria-labelledby="editTestimonialModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editTestimonialModalLabel">Update Testimonial</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_testimonial" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Name</label>';
            $html .= '            <input type="text" name="name" id="name_testimonial" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_name_update_testimonial" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Position</label>';
            $html .= '            <input type="text" name="role" id="role_testimonial" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_role_update_testimonial" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Company</label>';
            $html .= '            <input type="text" name="company" id="company_testimonial" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_company_update_testimonial" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Description</label>';
            $html .= '            <input type="text" name="remark" id="remark_testimonial" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_remark_update_testimonial" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Image</label>';
            $html .= '            <input type="file" name="testimonialImage_update" id="testimonialImage_update" class="form-control" accept="image/*">';
            $html .= '            <img src="" alt="current-image" id="edit-image-preview-testimonial" class="img-fluid mt-2" style="max-height: 100px;">';
            $html .= '            <input type="hidden" id="old_image_testimonial" class="form-control" value="">';
            $html .= '            <div class="error" id="error_image_update_testimonial" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="testimonialUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_testimonial_btn" class="btn btn-success">Update Testimonial</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Delete Modal
            $html .= '<div class="modal fade" id="deleteTestimonialModal" tabindex="-1" aria-labelledby="deleteTestimonialModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog modal-dialog-centered">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '            <input type="hidden" id="delete_testimonial_id" class="form-control" value="">';
            $html .= '        <h5 class="modal-title" id="deleteTestimonialModalLabel">Delete Confirmation</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">Are you sure you want to delete <strong></strong>?</div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="testimonialDeleteMsg" style="color: red;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="submit" class="btn btn-danger delete-testimonial-btn">Delete Testimonial</button>';
            $html .= '      </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Add New Expert Button
            $html .= '<div class="col-12 text-center mt-4">';
            $html .= '  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">';
            $html .= '    Add New Testimonial';
            $html .= '  </button>';
            $html .= '</div>';

            $html .= '</div>'; // Close row
            $html .= '</div>'; // Close container

            // Modal HTML
            $html .= '<div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="addTestimonialModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">'; 
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="addTestimonialModalLabel">Add New Testimonial</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="testimonial-name" class="form-label">Name</label>';
            $html .= '          <input type="text" class="form-control" id="testimonial-name" name="name" required>';
            $html .= '          <div class="error" id="error_name_testimonial" style="color:red;"></div>';
            $html .= '        </div>';
             $html .= '        <div class="mb-3">';
            $html .= '          <label for="testimonial-position" class="form-label">Position</label>';
            $html .= '          <input type="text" class="form-control" id="testimonial-position" name="position" required>';
            $html .= '          <div class="error" id="error_position_testimonial" style="color:red;"></div>';
            $html .= '        </div>';
             $html .= '        <div class="mb-3">';
            $html .= '          <label for="testimonial-company" class="form-label">company</label>';
            $html .= '          <input type="text" class="form-control" id="testimonial-company" name="company" required>';
            $html .= '          <div class="error" id="error_company_testimonial" style="color:red;"></div>';
            $html .= '        </div>';
             $html .= '        <div class="mb-3">';
            $html .= '          <label for="testimonial-remark" class="form-label">Remark</label>';
            $html .= '          <input type="text" class="form-control" id="testimonial-remark" name="remark" required>';
            $html .= '          <div class="error" id="error_remark_testimonial" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="testimonialImage" class="form-label">Image</label>';
            $html .= '          <input type="file" class="form-control" id="testimonialImage" name="testimonialImage" accept="image/*" required>';
            $html .= '          <div class="error" id="error_image_testimonial" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '      </div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="testimonialSuccessMsg" style="color: green;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="button" class="btn btn-success" id="add-testimonial">Add Testimonial</button>';
            $html .= '      </div>';
            $html .= '    </div>'; // end modal-content
            $html .= '  </div>';   // end modal-dialog
            $html .= '</div>';     // end modal

            return $html;
    }
    //CERTIFICATIONS AND TRAINING LIST
    public function renderCertificationsAndTraining($page_id)
    {
            $certifications = $this->PageBuilder_model->getCertifications();
            $html = '';
            $html .= '<div class="container">';
            $html .= '<h4 class="text-center my-4">Certification Trainings</h4>';
            $html .= '<div class="row gx-2 gy-2 justify-content-center">';

            foreach ($certifications as $certification) 
            {
                $image = $certification['image'];
                $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">';
                $html .= '  <div class="certification-training-item card">';
                $html .= '    <img src="' . base_url('uploads/certifications/logo/' . $certification['image']) . '" alt="partner-logo" class="img-fluid mb-2">';
                $html .= '    <h6>' . htmlspecialchars($certification['name']) . '</h6>';
                $html .= '    <p>' . htmlspecialchars($certification['home_description']) . '</p>';
                $html .= '<a href="'.base_url('admin/categories/edit/'.$certification['id']).'" class="btn">Edit</a>';
                $html .= '    <div class="mt-2">';
                $html .= '    </div>';
                $html .= '  </div>';
                $html .= '</div>';
            }

            $html .= '</div>';
             $html .= '</div>';

            return $html;
    }
     //INTRODUCTION ON HOME PAGE
    public function renderIntroduction()
    {
            $introduction = $this->db->get_where('widgets', ['id' => 1])->result_array();   
            $html = '';
            $html .= '<div class="container introduction-section">';
            $html .= '<div class="row">';
            $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-6 text-center col1 mb-4">';
            $html .= '<h5>Introduction</h5>';
            $html .= '</div>';
            $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-6 text-center mb-4">';
            $html .= '<h6>' . htmlspecialchars($introduction[0]['title']) . '</h6>';
            $html .= '<p>' . nl2br(htmlspecialchars($introduction[0]['description'])) . '</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="col-12 text-center mt-4">';
            $html .= '      <button class="btn btn-sm btn-primary me-1 update_introduction" data-id="' . $introduction[0]['id'] . '" 
                    data-name="' . $introduction[0]['name'] . '"
                    data-title="' . $introduction[0]['title'] . '"
                    data-description="' . $introduction[0]['description'] . '"
                    data-link="' . $introduction[0]['link'] . '"
                    data-bs-toggle="modal" 
                    data-bs-target="#editIntroductionModal">Edit Introduction</button>';
            $html .= '</div>';

             // Edit Modal
            $html .= '<div class="modal fade" id="editIntroductionModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editModalLabel">Update Introduction</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_introduction" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Name</label>';
            $html .= '            <input type="text" name="name" id="name_introduction" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_name_update_introduction" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Description</label>';
            $html .= '            <input type="text" name="name" id="description_introduction" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_description_update_introduction" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Link</label>';
            $html .= '            <input type="text" name="link" id="link_introduction" class="form-control" value="">';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="introductionUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_introduction_btn" class="btn btn-success">Update Introduction</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            return $html;
    }
    //CERTIFICATION TRAINING ON HOME PAGE WIDGET
    public function renderCertificationsAndTrainingWidget()
    {
            $certification = $this->db->get_where('widgets', ['id' => 2])->result_array(); //Get data from widgets table id 2(certification)
            $corporate = $this->db->get_where('widgets', ['id' => 3])->result_array(); //Get data from widgets table id 3(corporate) 
            $certification_image = $certification[0]['image'];
            $corporate_image = $corporate[0]['image'];    
            $html = '';
            $html .= '<div class="container">';
            $html .= '<div class="row">';
            $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-6 text-center mb-4">';
            $html .= '    <img src="' . base_url('uploads/widgets/' . $certification[0]['image']) . '" alt="partner-logo" class="img-fluid mb-2">';
            $html .= '<h6>' . htmlspecialchars($certification[0]['title']) . '</h6>';
            $html .= '<p>' . nl2br(htmlspecialchars($certification[0]['description'])) . '</p>';
            $html .= '      <button class="btn btn-sm btn-primary me-1 update_certification" data-id="' . $certification[0]['id'] . '" 
                    data-name="' . $certification[0]['name'] . '"
                    data-title="' . $certification[0]['title'] . '"
                    data-description="' . $certification[0]['description'] . '"
                    data-image = "'.$certification_image.'"
                    data-link="' . $certification[0]['link'] . '"
                    data-bs-toggle="modal" 
                    data-bs-target="#editcertificationModal">Edit certification Training</button>';
            
            $html .= '</div>';
            $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-6 text-center mb-4">';
            $html .= '    <img src="' . base_url('uploads/widgets/' . $corporate[0]['image']) . '" alt="partner-logo" class="img-fluid mb-2">';
            $html .= '<h6>' . htmlspecialchars($corporate[0]['title']) . '</h6>';
            $html .= '<p>' . nl2br(htmlspecialchars($corporate[0]['description'])) . '</p>';
            $html .= '      <button class="btn btn-sm btn-primary me-1 update_corporate" data-id="' . $corporate[0]['id'] . '" 
                    data-name="' . $corporate[0]['name'] . '"
                    data-title="' . $corporate[0]['title'] . '"
                    data-description="' . $corporate[0]['description'] . '"
                    data-image = "'.$corporate_image.'"
                    data-link="' . $corporate[0]['link'] . '"
                    data-bs-toggle="modal" 
                    data-bs-target="#editCorporateModal">Edit Corporate Training</button>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';

        

            // Edit Certification Modal
            $html .= '<div class="modal fade" id="editcertificationModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editModalLabel">Update certification</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_certification" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Name</label>';
            $html .= '            <input type="text" name="name" id="name_certification" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_name_update_certification" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Description</label>';
            $html .= '            <input type="text" name="name" id="description_certification" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_description_update_certification" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Image</label>';
            $html .= '            <input type="file" name="certificationImage_update" id="certificationImage_update" class="form-control" accept="image/*">';
            $html .= '            <img src="" alt="current-image" id="edit-image-preview-certification" class="img-fluid mt-2" style="max-height: 100px;">';
            $html .= '            <input type="hidden" id="old_image_certification" class="form-control" value="">';
            $html .= '            <div class="error" id="error_image_update_certification" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Link</label>';
            $html .= '            <input type="text" name="link" id="link_certification" class="form-control" value="">';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="certificationUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_certification_btn" class="btn btn-success">Update certification</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Edit Corporate Modal
            $html .= '<div class="modal fade" id="editCorporateModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editModalLabel">Update Corporate Training</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_corporate" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Name</label>';
            $html .= '            <input type="text" name="name" id="name_corporate" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_name_update_corporate" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Description</label>';
            $html .= '            <input type="text" name="name" id="description_corporate" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_description_update_corporate" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Image</label>';
            $html .= '            <input type="file" name="corporateImage_update" id="corporateImage_update" class="form-control" accept="image/*">';
            $html .= '            <img src="" alt="current-image" id="edit-image-preview-corporate" class="img-fluid mt-2" style="max-height: 100px;">';
            $html .= '            <input type="hidden" id="old_image_corporate" class="form-control" value="">';
            $html .= '            <div class="error" id="error_image_update_corporate" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Link</label>';
            $html .= '            <input type="text" name="link" id="link_corporate" class="form-control" value="">';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="corporateUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_corporate_btn" class="btn btn-success">Update Corporate Training</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            return $html;
    }
    //FEATURED COURSES
    public function renderFeaturedCourses()
    {
        $featured_courses = $this->PageBuilder_model->getCourses();
        $html ='';
         $html .= '<div class="container">';
         $html .= '<h4 class="text-center my-4">Featured Courses</h4>';
            $html .= '<div class="row">';
            foreach ($featured_courses as $course) 
            {
                $image = $course['logo'];
                $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">';
                $html .= '  <div class="">';
                $html .= '    <img src="' . base_url('uploads/course/' . $course['logo']) . '" alt="partner-logo" class="img-fluid mb-2">';
                $html .= '    <div class="associate-title">' . htmlspecialchars($course['name']) . '</div>';
                $html .= '    <div class="mt-2">';
                $html .= '    </div>';
                $html .= '  </div>';
                $html .= '</div>';
            }
            $html .= '  </div>';
            $html .= '</div>';
            return $html;
    }
    //GALLERY
    public function renderGallery()
    {
        $gallery = $this->PageBuilder_model->getGallery();
        $html ='';
        $html .= '<div class="container">';
        $html .= '<h4 class="text-center my-4">Gallery</h4>';
        $html = '<div class="row">';
        foreach ($gallery as $item) {
            $html .= '
                <div class="col-md-2 mb-3">
                    <div class="card position-relative">
                        <img src="' . base_url('uploads/gallery/' . $item['image']) . '" class="card-img-top" alt="Gallery Image">
                        <div class="position-absolute top-0 end-0 m-1 d-flex">
                            <button class="btn btn-sm btn-primary me-1 update_gallery" 
                                data-id="' . $item['id'] . '" 
                                data-image="' . $item['image'] . '" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editGalleryModal">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger delete-gallery" 
                                data-id="' . $item['id'] . '" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteGalleryModal">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>';
        }

        // Edit Modal
            $html .= '<div class="modal fade" id="editGalleryModal" tabindex="-1" aria-labelledby="editGalleryModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editGalleryModalLabel">Update Gallery Image</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_gallery" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Image</label>';
            $html .= '            <input type="file" name="galleryImage_update" id="galleryImage_update" class="form-control" accept="image/*">';
            $html .= '            <img src="" alt="current-image" id="edit-image-preview-gallery" class="img-fluid mt-2" style="max-height: 100px;">';
            $html .= '            <input type="hidden" id="old_image_gallery" class="form-control" value="">';
            $html .= '            <div class="error" id="error_image_update_gallery" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="galleryUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_gallery_btn" class="btn btn-success">Update gallery</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Delete Modal
            $html .= '<div class="modal fade" id="deleteGalleryModal" tabindex="-1" aria-labelledby="deletegalleryModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog modal-dialog-centered">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '            <input type="hidden" id="delete_gallery_id" class="form-control" value="">';
            $html .= '        <h5 class="modal-title" id="deletegalleryModalLabel">Delete Confirmation</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">Are you sure you want to delete <strong></strong>?</div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="galleryDeleteMsg" style="color: red;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="submit" class="btn btn-danger delete-gallery-btn">Delete gallery</button>';
            $html .= '      </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

        $html .= '<div class="col-12 text-center mt-4">';
        $html .= '  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGalleryModal">';
        $html .= '    Add New Gallery';
        $html .= '  </button></div>';

        // Modal HTML
        $html .= '<div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">';
        $html .= '  <div class="modal-dialog">';
        $html .= '    <div class="modal-content">'; 
        $html .= '      <div class="modal-header">';
        $html .= '        <h5 class="modal-title" id="addGalleryModalLabel">Add New Galley</h5>';
        $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        $html .= '      </div>';
        $html .= '      <div class="modal-body">';
        $html .= '        <div class="mb-3">';
        $html .= '          <label for="galleryImage" class="form-label">Image</label>';
        $html .= '          <input type="file" class="form-control" id="galleryImage" name="galleryImage" accept="image/*" required>';
        $html .= '          <div class="error" id="error_image_gallery" style="color:red;"></div>';
        $html .= '        </div>';
        $html .= '      </div>';
        $html .= '      <div class="modal-footer">';
        $html .= '        <div class="me-auto" id="gallerySuccessMsg" style="color: green;"></div>';
        $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
        $html .= '        <button type="button" class="btn btn-success" id="add-gallery">Add Gallery</button>';
        $html .= '      </div>';
        $html .= '    </div>'; // end modal-content
        $html .= '  </div>';   // end modal-dialog
        $html .= '</div>';     // end modal

        $html .= '</div>';

        return $html;
    }

    //UPCOMING BATCHES
    public function renderUpcomingBatches()
    {
        $batches = $this->PageBuilder_model->getUpcomingBatches();
        $html = '';
        $html .= '<div class="container">';
        $html .= '<h4 class="text-center my-4">Upcoming Batches</h4>';
        $html .= '<div class="row gx-2">';

        foreach ($batches as $item) {
            $html .= '
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body p-2 upcoming-batch-item">
                            <h6 class="card-title mb-1">' . htmlspecialchars($item['name']) . '</h6>
                            <p class="card-text small text-muted">' . date('d M Y', strtotime($item['date'])) . '</p>
                             <div class="mt-2">
                        <button class="btn btn-sm btn-primary me-1 update_batch" 
                            data-id="' . $item['id'] . '" 
                            data-name="' . htmlspecialchars($item['name']) . '"
                            data-date="' . htmlspecialchars($item['date']) . '"
                            data-bs-toggle="modal" 
                            data-bs-target="#editBatchModal"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-batch" 
                            data-bs-toggle="modal" 
                            data-id="' . $item['id'] . '" 
                            data-name="' . htmlspecialchars($item['name']) . '" 
                            data-bs-target="#deleteBatchModal"><i class="fas fa-trash"></i></button>
                    </div>
                        </div>
                    </div>
                </div>
            ';
        }

        $html .= '</div>'; // Close .row

        $html .= '
            <div class="col-12 text-center mt-4"><button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addBatchModal">
                Add New Batch
            </button></div>';

        // Modal HTML
        $html .= '<div class="modal fade" id="addBatchModal" tabindex="-1" aria-labelledby="addBatchModalLabel" aria-hidden="true">';
        $html .= '  <div class="modal-dialog">';
        $html .= '    <div class="modal-content">'; 
        $html .= '      <div class="modal-header">';
        $html .= '        <h5 class="modal-title" id="addBatchModalLabel">Add New Batch</h5>';
        $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        $html .= '      </div>';
        $html .= '      <div class="modal-body">';
        $html .= '        <div class="mb-3">';
        $html .= '          <label for="batchTitle" class="form-label">Batch Name</label>';
        $html .= '          <input type="text" class="form-control" id="batchTitle" name="batchTitle" required>';
        $html .= '          <div class="error" id="error_batch_title" style="color:red;"></div>';
        $html .= '        </div>';
        $html .= '        <div class="mb-3">';
        $html .= '          <label for="batchDate" class="form-label">Date</label>';
        $html .= '          <input type="date" class="form-control" id="batchDate" name="batchDate" required>';
        $html .= '          <div class="error" id="error_date_batch" style="color:red;"></div>';
        $html .= '        </div>';
        $html .= '      </div>';
        $html .= '      <div class="modal-footer">';
        $html .= '        <div class="me-auto" id="batchSuccessMsg" style="color: green;"></div>';
        $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
        $html .= '        <button type="button" class="btn btn-success" id="add-batch">Add Batch</button>';
        $html .= '      </div>';
        $html .= '    </div>'; // end modal-content
        $html .= '  </div>';   // end modal-dialog
        $html .= '</div>';     // end modal

        // Edit Modal
            $html .= '<div class="modal fade" id="editBatchModal" tabindex="-1" aria-labelledby="editBatchModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editBatchModalLabel">Update Batch</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_batch" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Name</label>';
            $html .= '            <input type="text" name="name" id="name_batch" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_name_update_batch" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Date</label>';
            $html .= '          <input type="date" class="form-control" id="edit_batchDate" name="batchDate" required>';
            $html .= '              <div class="error" id="error_date_update_batch" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="batchUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_batch_btn" class="btn btn-success">Update Batch</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Delete Modal
            $html .= '<div class="modal fade" id="deleteBatchModal" tabindex="-1" aria-labelledby="deleteBatchModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog modal-dialog-centered">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '            <input type="text" id="delete_batch_id" class="form-control" value="">';
            $html .= '        <h5 class="modal-title" id="deletebatchModalLabel">Delete Confirmation</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">Are you sure you want to delete <strong></strong>?</div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="batchDeleteMsg" style="color: red;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="submit" class="btn btn-danger delete-batch-btn">Delete Batch</button>';
            $html .= '      </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

        $html .= '</div>';

        return $html;
    }
    //VIDEO
    public function renderVideo()
    {
        $video = $this->PageBuilder_model->getVideo(1);
        $html = '';
        $html .= '<div class="video-container">
            <video preload="none" class="video-player" poster="' . base_url('uploads/video/'.$video['image']) . '" controls>
                <source src="' . base_url('uploads/video/'.$video['path']) . '" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>';

       // Add Edit Video Section Button
        $html .= '<div class="text-center mt-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadVideoModal">Edit Video Section</button>
        </div>';


        $html .= '<div class="modal fade" id="uploadVideoModal" tabindex="-1" aria-labelledby="uploadVideoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="videoForm" enctype="multipart/form-data" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload Video</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="videoFile" class="form-label">Choose Video File</label>
            <input class="form-control" type="file" name="video" id="videoFile" accept="video/*" required>
            <div class="error" id="error_video" style="color:red;"></div>
          </div>
          <div class="mb-3">
            <label for="posterFile" class="form-label">Choose Poster Image (Optional)</label>
            <input class="form-control" type="file" name="poster" id="posterFile" accept="image/*">
            <div class="error" id="error_video_image" style="color:red;"></div>
          </div>
        </div>
        <div class="modal-footer">
        <div class="me-auto" id="videoSuccessMsg" style="color: green;"></div>
          <button type="submit" class="btn btn-success update-video">Upload</button>
        </div>
      </div>
    </form>
  </div>
</div>';

        return $html;
    }

    //#region Subject Based Courses Or Course Categories
    public function renderCourseCategoriesOrSubjectBasedCourses()
    {
        $course_categories = $this->PageBuilder_model->getCourseCategories();
        $html ='';
         $html .= '<div class="container">';
         $html .= '<h4 class="text-center my-4">Subject Based Courses</h4>';
            $html .= '<div class="row">';
            foreach ($course_categories as $course) 
            {
                $image = $course['image'];
                $html .= '<div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">';
                $html .= '  <div class="subject-based-course-item card">';
                $html .= '    <img src="' . base_url('uploads/subject_courses/' . $course['image']) . '" alt="partner-image" class="img-fluid mb-2">';
                $html .= '    <h6>' . htmlspecialchars($course['name']) . '</h6>';
                $html .= '    <p>' . htmlspecialchars($course['description']) . '</p>';
                $html .= '    <div class="mt-2">';
                $html .= '    </div>';
                $html .= '  </div>';
                $html .= '    <div class="mt-2">';
                $html .= '      <button class="btn btn-sm btn-primary me-1 update_subjectcourse" data-id="' . $course['id'] . '" 
                    data-name="' . $course['name'] . '"
                    data-description="' . $course['description'] . '"
                    data-image="' . $image . '" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editSubjectcourseModal"><i class="fas fa-edit"></i></button>';
                $html .= '      <button class="btn btn-sm btn-danger delete-subjectcourse" data-bs-toggle="modal" data-id="' . $course['id'] . '" data-name="'.$course['name'].'" data-bs-target="#deleteSubjectcourseModal"><i class="fas fa-trash"></i></button>';
                $html .= '    </div>';
                $html .= '</div>';

            }
            $html .= '  </div>';
            $html .= '</div>';

            // Edit Modal
            $html .= '<div class="modal fade" id="editSubjectcourseModal" tabindex="-1" aria-labelledby="editSubjectcourseModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="editSubjectcourseModalLabel">Update Course Subject</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '        <div class="modal-body">';
            $html .=            '<input type="hidden" id="id_coursesubject" class="form-control" value="">';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Name</label>';
            $html .= '            <input type="text" name="name" id="name_coursesubject" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_name_update_coursesubject" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Description</label>';
            $html .= '            <input type="text" name="remark" id="description_coursesubject" class="form-control" value="" required>';
            $html .= '              <div class="error" id="error_description_update_coursesubject" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '          <div class="mb-3">';
            $html .= '            <label class="form-label">Image</label>';
            $html .= '            <input type="file" name="coursesubjectImage_update" id="coursesubjectImage_update" class="form-control" accept="image/*">';
            $html .= '            <img src="" alt="current-image" id="edit-image-preview-coursesubject" class="img-fluid mt-2" style="max-height: 100px;">';
            $html .= '            <input type="hidden" id="old_image_coursesubject" class="form-control" value="">';
            $html .= '            <div class="error" id="error_image_update_coursesubject" style="color:red;"></div>';
            $html .= '          </div>';
            $html .= '        </div>';
            $html .= '        <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="coursesubjectUpdateMsg" style="color: green;"></div>';
            $html .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '          <button type="submit" id="update_subjectcourse_btn" class="btn btn-success">Update Subject Course</button>';
            $html .= '        </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Delete Modal
            $html .= '<div class="modal fade" id="deleteSubjectcourseModal" tabindex="-1" aria-labelledby="deleteSubjectcourseModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog modal-dialog-centered">';
            $html .= '    <div class="modal-content">';
            $html .= '      <div class="modal-header">';
            $html .= '            <input type="hidden" id="delete_coursesubject_id" class="form-control" value="">';
            $html .= '        <h5 class="modal-title" id="deleteSubjectcourseModalLabel">Delete Confirmation</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">Are you sure you want to delete <strong></strong>?</div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="coursesubjectDeleteMsg" style="color: red;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="submit" class="btn btn-danger delete-coursesubject-btn">Delete Subject Course</button>';
            $html .= '      </div>';
            $html .= '    </div>';
            $html .= '  </div>';
            $html .= '</div>';

            // Add New Expert Button
            $html .= '<div class="col-12 text-center mt-4">';
            $html .= '  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsubjectcourseModal">';
            $html .= '    Add New Subject Course';
            $html .= '  </button>';
            $html .= '</div>';

            // Modal HTML
            $html .= '<div class="modal fade" id="addsubjectcourseModal" tabindex="-1" aria-labelledby="addsubjectcourseModalLabel" aria-hidden="true">';
            $html .= '  <div class="modal-dialog">';
            $html .= '    <div class="modal-content">'; 
            $html .= '      <div class="modal-header">';
            $html .= '        <h5 class="modal-title" id="addsubjectcourseModalLabel">Add New Subject Course</h5>';
            $html .= '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $html .= '      </div>';
            $html .= '      <div class="modal-body">';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="subjectcourse-name" class="form-label">Name</label>';
            $html .= '          <input type="text" class="form-control" id="subjectcourse-name" name="name" required>';
            $html .= '          <div class="error" id="error_name_subjectcourse" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="subjectcourse-description" class="form-label">Description</label>';
            $html .= '          <input type="text" class="form-control" id="subjectcourse-description" name="description" required>';
            $html .= '          <div class="error" id="error_description_subjectcourse" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '        <div class="mb-3">';
            $html .= '          <label for="subjectcourseImage" class="form-label">Image</label>';
            $html .= '          <input type="file" class="form-control" id="subjectcourseImage" name="subjectcourseImage" accept="image/*" required>';
            $html .= '          <div class="error" id="error_image_subjectcourse" style="color:red;"></div>';
            $html .= '        </div>';
            $html .= '      </div>';
            $html .= '      <div class="modal-footer">';
            $html .= '        <div class="me-auto" id="subjectcourseSuccessMsg" style="color: green;"></div>';
            $html .= '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
            $html .= '        <button type="button" class="btn btn-success" id="add-subjectcourse">Add Subject Course</button>';
            $html .= '      </div>';
            $html .= '    </div>'; // end modal-content
            $html .= '  </div>';   // end modal-dialog
            $html .= '</div>';     // end modal

            
            return $html;
    }
    //Render SEO CONTENT
    public function renderSeoContent()
    {
        $seo_content = $this->PageBuilder_model->getSeoContent();
        $html = '';
        $html .='<textarea class="textarea-seo-content"
         name="content"
         data-id="' . $seo_content[0]['id'] . '" 
         id="editor">'.$seo_content[0]['content'].'</textarea>';
         $html .= '<div class="me-auto" id="SeoSuccessMsg" style="color: green;"></div>';
        return $html;
    }
    //Render Meta Section
    public function renderMetasection($page_id)
    {
            $meta = $this->db->get_where('pages', ['page_id' => $page_id])->result_array();   

            $html = '';
            $html .= '<div class="container">';
             $html .= '<h4 class="text-center my-4">Page Title & Meta Information</h4>';
            $html .= '<div class="row">';
            $html .= '<div class="col-12 mb-4">';
            $html .= '<label class="form-label">Title</label>';
            $html .= '<input type="text" class="form-control mb-3" id="metaTitle" value="' . $meta[0]['title'] . '">';
            $html .= '<label class="form-label">Slug</label>';
            $html .= '<input type="text" class="form-control mb-3" id="metaSlug" value="' . $meta[0]['slug'] . '">';
            $html .= '<label class="form-label">Meta Keywords</label>';
            $html .= '<input type="text" class="form-control mb-3" id="metaKeywords" value="' . $meta[0]['metakeywords'] . '">';
            $html .= '<label class="form-label">Meta Description</label>';
            $html .= '<textarea class="form-control" id="metaDescription" rows="4">' . $meta[0]['metadescription'] . '</textarea>';
            $html .= '<div class="col-12 text-center mt-4">';
            $html .= '<button class="btn btn-primary" id="saveMeta" data-page-id="' . $page_id . '">Save</button>';
             $html .= '<div class="me-auto" id="metaSuccessMsg" style="color: green;"></div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';

            return $html;
    }
    //Save Meta Info
    public function save_meta_info()
    {
        $page_id = $this->input->post('page_id');
        $data = [
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'metakeywords' => $this->input->post('metakeywords'),
            'metadescription' => $this->input->post('metadescription')
        ];

        $this->db->where('page_id', $page_id);
        $this->db->update('pages', $data);

        echo json_encode(['status' => 'success']);
    }




   
}