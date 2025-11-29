<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    //View page
    //Render header element
    //Render footer element
    //Render sliders
    //Render Associates
    //Render Gallery Caption
    //Render Corporate Training
    //Render Certifications And Training
    //Render Introduction
    //Render Unstructured elements outside row
    //Render gallery
    //Render Course Categories OR Course Subjects
    //Render blogs
    //Render Upcoming Batches
    //Certifications menu subpage listing
    //Levels page Displaying
    //Video
    //SEO Content
    //Render Page Banner
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/PageBuilder_model');
    }

    public function test(){
            //echo "hello";exit;
            $data['current_page_slug'] = 'corporate-training'; //Depends on slug load css in header
            $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
            $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
            $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
            $data['pages'] = $this->PageBuilder_model->getAllPages();
            $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

            // SEO CONTENTS
            $data['page_title'] = "Corporate training";
            $data['metakeywords'] = "Corporate training keywords";
            $data['metadescription'] = "Corporate training descriptions";

            $this->load->view('admin/includes/header',$data);
            $this->load->view('test',$data);
            $this->load->view('admin/includes/footer',$data);
    }

    public function index(){
        $this->viewPage('home');  //This is the home page slug.Default controller redirecting to index function
    }
    //View page
    public function viewPage($slug)
    {

        //echo $slug;exit;

        // If slug is admin then redirect to admin login
        if($slug == 'login' || $slug == 'admin'){
            redirect('admin/Login');
        }

        // If slug is corporate-training then redirect to corporate-training
        if($slug == 'corporate-training')
        {
            //echo "hello";exit;
            $data['current_page_slug'] = 'corporate-training'; //Depends on slug load css in header
            $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
            $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
            $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
            $data['pages'] = $this->PageBuilder_model->getAllPages();
            $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

            // SEO CONTENTS
            $data['page_title'] = "Corporate training";
            $data['metakeywords'] = "Corporate training keywords";
            $data['metadescription'] = "Corporate training descriptions";

            $this->load->view('admin/includes/header',$data);
            $this->load->view('template/corporate-training',$data);
            $this->load->view('admin/includes/footer',$data);
            return;
        }

        // If slug is support then redirect to support
        if($slug == 'support' || $slug == 'Support')
        {
            //echo "hello";exit;
            $data['current_page_slug'] = 'corporate-training'; //Depends on slug load css in header
            $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
            $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
            $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
            $data['pages'] = $this->PageBuilder_model->getAllPages();
            $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
            // SEO CONTENTS
            $data['page_title'] = "Support";
            $data['metakeywords'] = "Support keywords";
            $data['metadescription'] = "Support descriptions";
            $this->load->view('admin/includes/header',$data);
            $this->load->view('template/support',$data);
            $this->load->view('admin/includes/footer',$data);
            return;
        }

        // If slug is contact-us then redirect to contact-us 
        if($slug == 'contact-us')
        {
            //echo "hello";exit;
            $data['current_page_slug'] = 'corporate-training'; //Depends on slug load css in header
            $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
            $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
            $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
            $data['pages'] = $this->PageBuilder_model->getAllPages();
            $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
            // SEO CONTENTS
            $data['page_title'] = "Contact us";
            $data['metakeywords'] = "Contact us keywords";
            $data['metadescription'] = "Contact us descriptions";
            $this->load->view('admin/includes/header',$data);
            $this->load->view('template/contact',$data);
            $this->load->view('admin/includes/footer',$data);
            return;
        }
        // If slug is contact-us then redirect to contact-us 
        if($slug == 'it-solutions')
        {
            //echo "hello";exit;
            $data['current_page_slug'] = 'corporate-training'; //Depends on slug load css in header
            $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
            $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
            $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
            $data['pages'] = $this->PageBuilder_model->getAllPages();
            $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
            // SEO CONTENTS
            $data['page_title'] = "It solutions";
            $data['metakeywords'] = "It solutions keywords";
            $data['metadescription'] = "It solutions descriptions";
            $this->load->view('admin/includes/header',$data);
            $this->load->view('template/it-solutions',$data);
            $this->load->view('admin/includes/footer',$data);
            return;
        }
        // If slug is contact-us then redirect to contact-us 
        if($slug == 'about-us')
        {
            //echo "hello";exit;
            $data['current_page_slug'] = 'corporate-training'; //Depends on slug load css in header
            $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
            $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
            $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
            $data['pages'] = $this->PageBuilder_model->getAllPages();
            $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
            // SEO CONTENTS
            $data['page_title'] = "About us";
            $data['metakeywords'] = "About us keywords";
            $data['metadescription'] = "About us descriptions";
            $this->load->view('admin/includes/header',$data);
            $this->load->view('template/about-us',$data);
            $this->load->view('admin/includes/footer',$data);
            return;
        }
        if($slug == 'enquiry')
        {
            $this->load->view('enquiry');
            return;
        }


        $page_id = $this->PageBuilder_model->getPageIdBySlug($slug);

        $sections = $this->PageBuilder_model->getSections($page_id);

        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);

        $section_html = ''; // Initialize the variable


        $section_html .= '<div class="site-content">'; //Site-content start


        //Render page banner except homep page using page id
        if($page_id != 1)
        {
            $section_html .= $this->renderPageBanner($page_id);
        }



        foreach ($sections as $section) 
        {

            $section_html .= '<div class="content-section ' . htmlspecialchars($section['class']) . '">'; //Section start

            $containers = $this->db->get_where('page_containers', ['section_id' => $section['id']])->result_array();
            foreach ($containers as $container) 
            {

                //render unstructured elements outside row
                $section_html .= $this->renderUnstructuredElementsOutsideRow($section['id'],$page_id,0); //Coloumn id is 0 when element outside row

                $section_html .= '<div class="container ' . htmlspecialchars($container['class']) . '">'; //Container start
                //$section_html .= 'Row ID: ' . htmlspecialchars($container['id']);

                // Get rows for this container
                $rows = $this->db->get_where('page_rows', ['page_id' => $page_id, 'container_id' => $container['id']])->result_array();
                foreach ($rows as $row) {
                $section_html .= '<div class="row">'; // Row start
                //$section_html .= '<div class="mb-2"><strong>Row ID: ' . $row['id'] . '</strong></div>';
                    // Get columns for this row

                    // Get columns for this row
                    //$columns = $this->db->get_where('page_columns', ['page_id' => $page_id,'row_id' => $container['id']])->result_array();
                    $columns = $this->db->get_where('page_columns', ['page_id' => $page_id, 'row_id' => $row['id']])->result_array();

                    foreach ($columns as $column) 
                    {
                        $section_html .= '<div class="">'; // Coloumn start
                        //$section_html .= '<strong>Column ID:</strong> ' . htmlspecialchars($column['id']) . '<br>';
                        // $section_html .= '<strong>Content:</strong> ' . htmlspecialchars($column['content']); // Adjust field names as per your DB
                        // Get elements for this column
                        $elements = $this->db->get_where('elements', ['section_id' => $section['id'],'page_id' => $page_id,'column_id' => $column['id']])->result_array();

                            foreach ($elements as $element) 
                            {
                                switch ($element['type']) 
                                {
                                    case 'text':
                                        $section_html .= '<p>' . nl2br(htmlspecialchars($element['content'])) . '</p>';
                                        break;

                                    case 'image':
                                        $section_html .= '<img src="' . htmlspecialchars($element['content']) . '" alt="Image" class="img-fluid">';
                                        break;

                                    case 'link':
                                        $section_html .= '<a href="' . htmlspecialchars($element['content']) . '" target="_blank">' . htmlspecialchars($element['label'] ?? 'Visit Link') . '</a>';
                                        break;

                                    case 'textarea':
                                        $section_html .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                                        break;

                                    case 'home_page_slider':
                                        $section_html .= $this->renderSliders();
                                        break;

                                    case 'associates':
                                        $section_html .= $this->renderAssociates();
                                        break;

                                    case 'video':
                                        $section_html .= $this->renderVideo();
                                        break;

                                    case 'certifications':
                                        $section_html .= $this->renderCertifications($page_id);
                                        break;
                                    
                                    case 'featured_courses':
                                        $section_html .= $this->renderFeaturedCourses();
                                        break;

                                    case 'testimonials':
                                        $section_html .= $this->renderTestimonials();
                                        break;

                                    case 'tutor':
                                        $section_html .= $this->renderTutors();
                                        break;
                                    
                                    case 'gallery':
                                        $section_html .= $this->renderGallery();
                                        break;

                                    case 'course_categories':
                                        $section_html .= $this->renderCourseCategories();
                                        break;

                                    case 'blog':
                                        $section_html .= $this->renderBlogs();
                                        break;

                                    case 'seo-content':
                                        $section_html .= $this->renderSEOContent();
                                        break;

                                    case 'corporate-training':
                                        $section_html .= $this->renderCorporateTraining();
                                        break;

                                    case 'upcoming_batches':
                                        $section_html .= $this->renderUpcomingBatches();
                                        break;

                                    case 'loop':
                                        $loop_items = $this->db->get_where('loop_items', ['element_id' => $element['id']])->result_array();
                                        foreach ($loop_items as $item) 
                                        {
                                            $section_html .= '<div class="loop-item mb-3 p-3 border">';
                                            $section_html .= '<h5>' . htmlspecialchars($item['text']) . '</h5>';
                                            $section_html .= '<p>' . nl2br(htmlspecialchars($item['textarea'])) . '</p>';
                                            $section_html .= '</div>';
                                        }
                                        break;

                                    case 'loop_with_image':
                                        $loop_items = $this->db->get_where('loop_items', ['element_id' => $element['id']])->result_array();
                                        foreach ($loop_items as $item) 
                                        {
                                            $section_html .= '<div class="loop-item mb-3 p-3 border">';
                                            $section_html .= '<h5>' . htmlspecialchars($item['text']) . '</h5>';
                                            $section_html .= '<p>' . nl2br(htmlspecialchars($item['textarea'])) . '</p>';
                                            if (!empty($item['image'])) {
                                                $section_html .= '<img src="' . htmlspecialchars($item['image']) . '" class="img-fluid mb-2" alt="' . htmlspecialchars($item['text']) . '">';
                                            }
                                            $section_html .= '</div>';
                                        }
                                        break;

                                    // Add more types as needed
                                    default:
                                        $section_html .= '<div>Unsupported element type: ' . htmlspecialchars($element['type']) . '</div>';
                                        break;
                                }
                            }
                        $section_html .= '</div>'; //End coloumn
                        }
                $section_html .= '</div>'; //Row end
                    }
                $section_html .= '</div>'; //Container end
            }

            $section_html .= '</div>'; //Section end
        }

        $section_html .= '</div>'; //Site-content end

    
        $data['section_html'] = $section_html;
        $data['current_page_details'] = $this->PageBuilder_model->getPage($page_id);
        // SEO CONTENTS
        $data['page_title'] = $data['current_page_details']['title'];
        $data['metakeywords'] = $data['current_page_details']['metakeywords'];
        $data['metadescription'] = $data['current_page_details']['metadescription'];

        $data['current_page_slug'] = $data['current_page_details']['slug'];
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
       
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/pages/view', $data);
        $this->load->view('admin/includes/footer', $data);
        
    }

    //Render Unstructured elements outside row
    public function renderUnstructuredElementsOutsideRow($section_id,$page_id,$coloumn_id)
    {
        $elements = $this->db->get_where('elements', ['section_id' => $section_id,'page_id' => $page_id,'column_id' => $coloumn_id])->result_array();
        $section_html = '';
        foreach ($elements as $element) 
        {
            switch ($element['type']) 
            {
                case 'text':
                $section_html .= '<p>' . nl2br(htmlspecialchars($element['content'])) . '</p>';
                break;

                case 'textarea':
                    $section_html .= '<div class="textarea-content">' . nl2br(htmlspecialchars($element['content'])) . '</div>';
                    break;

                case 'image':
                    $section_html .= '<img src="' . htmlspecialchars($element['content']) . '" alt="Image" class="img-fluid">';
                    break;

                case 'link':
                    $section_html .= '<a href="' . htmlspecialchars($element['content']) . '" target="_blank">' . htmlspecialchars($element['label'] ?? 'Visit Link') . '</a>';
                    break;

                case 'home_page_slider':
                    $section_html .= $this->renderSliders();
                    break;

                case 'associates':
                    $section_html .= $this->renderAssociates();
                    break;

                case 'testimonials':
                    $section_html .='<div class="container">';
                    $section_html .= $this->renderTestimonials();
                    $section_html .='</div>';
                    break;

                case 'tutor':
                    $section_html .='<div class="container">';
                    $section_html .= $this->renderTutors();
                    $section_html .='</div>';
                    break;

                case 'certifications-training':
                    $section_html .= $this->renderCertificationsTraining();
                    break;

                case 'introduction-home':
                    $section_html .= $this->renderIntroduction();
                    break;

                case 'seo-content':
                    $section_html .='<div class="container">';
                    $section_html .= $this->renderSEOContent();
                    $section_html .='</div>';
                    break;

                case 'featured_courses':
                    $section_html .='<div class="container">';
                    $section_html .= $this->renderFeaturedCourses();
                    $section_html .='</div>';
                    break;
                
                case 'certifications':
                    $section_html .='<div class="container">';
                    $section_html .= $this->renderCertifications($page_id);
                    $section_html .='</div>';
                    break;
                
                case 'gallery':
                    $section_html .= $this->renderGallery();
                    break;

                case 'course_categories':
                    $section_html .='<div class="container">';
                    $section_html .= $this->renderCourseCategories();
                    $section_html .='</div>';
                    break;

                case 'upcoming_batches':
                    $section_html .= $this->renderUpcomingBatches();
                    break;

                case 'video':
                    $section_html .='<div class="container">';
                    $section_html .= $this->renderVideo();
                    $section_html .='</div>';
                    break;
            }
        }
        return $section_html;
    }

    //Render Gallery
    public function renderGallery()
    {
        $gallery = $this->PageBuilder_model->getGallery();
        $html = '';
        $html .='<div class="content-section photo-gallery">
        <div class="container photo-gallery__container"><div class="photo-gallery__col1">
                <h2 class="photo-gallery__heading">We empower
                    candidates
                    with hands on labs</h2>
                <p class="photo-gallery__description">Our training sessions are meticulously crafted by our expert
                    trainers. Every detail is designed to
                    maximize efficiency, ensuring that you get the most value out of your time.</p>
                <p class="btn-wrapper">
                    <a href="" class="btn1">View Gallery</a>
                </p>
            </div>
            <div class="photo-gallery__col2">
                <div class="photo-gallery__body">';
                foreach ($gallery as $item) {
                    $html .='<div class="photo-gallery__item">
                        <a href="' . base_url('uploads/gallery/' . $item['image']) . '" class="glightbox">
                            <img src="' . base_url('uploads/gallery/' . $item['image']) . '" alt="photo-gallery1-thumb"
                                class="photo-gallery__thumb" loading="lazy">
                        </a>
                    </div>';
                }  
                $html .='   
                </div>
            </div></div></div>';
            return $html;
    }

    //Render Course Categories OR Course Subjects
    public function renderCourseCategories()
    {
        $course_categories = $this->PageBuilder_model->getCourseCategories();
        $html = '';
        $html .='<h2 class="subject-based-courses__heading">Subject based Courses</h2>

        <div class="subject-based-courses__wrapper">';
        foreach ($course_categories as $course) 
        {
            $html.='<a href="" class="subject-based-courses__item">
                <div class="subject-based-courses__content">
                    <h3 class="subject-based-courses__item-heading">'.$course['name'].'</h3>
                    <p class="subject-based-courses__item-description">'.$course['description'].'</p>
                </div>
                <img class="subject-based-courses__item-image" src="'.base_url('uploads/subject_courses/' . $course['image']) .'"
                    alt="networking-subject-based-courses" width="400" height="200">
            </a>';
        }
        $html .='</div>';
        return $html;
    }

    //Render Blogs
    public function renderBlogs()
    {
        $html = '';
        $html .= '
            <h2 class="blogs-list__heading">Blogs</h2>

            <div class="blogs-list-carousel splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <a href="" class="blogs-list__item">
                                <img class="blogs-list__item-image" src="website/images/blogs-list-image1.webp"
                                    alt="blogs-list-image1" width="400" height="200">
                                <div class="blogs-list__content">
                                    <h3 class="blogs-list__item-heading">How CompTIA Made the Impossible, Possible for
                                        an IT Student</h3>
                                    <p class="blogs-list__item-description">Earning CompTIA certifications was
                                        life-changing for Vasquez. It helped him land his first IT job quickly,
                                        motivated him for the future and proved</p>
                                </div>

                            </a>
                        </li>
                        <li class="splide__slide">
                            <a href="" class="blogs-list__item">
                                <img class="blogs-list__item-image" src="website/images/blogs-list-image2.webp"
                                    alt="blogs-list-image2" width="400" height="200">
                                <div class="blogs-list__content">
                                    <h3 class="blogs-list__item-heading">Importance of Corporate Training in 2025</h3>
                                    <p class="blogs-list__item-description">In an age where knowledge is power, staying
                                        abreast of the latest trends, strategies, and insights in corporate training is
                                        non-negotiable for leaders and teams committed to excellence. </p>
                                </div>

                            </a>
                        </li>
                        <li class="splide__slide">
                            <a href="" class="blogs-list__item">
                                <img class="blogs-list__item-image" src="website/images/blogs-list-image3.webp"
                                    alt="blogs-list-image3" width="400" height="200">
                                <div class="blogs-list__content">
                                    <h3 class="blogs-list__item-heading">Cybersecurity roles are among the most
                                        in-demand now</h3>
                                    <p class="blogs-list__item-description">With cyber threats increasing globally,
                                        cybersecurity roles are among the most in-demand and well-compensated positions
                                        in the tech industry. </p>
                                </div>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        ';
    return $html;
    }

    //Render Upcoming Batches
    public function renderUpcomingBatches()
    {
        $batches = $this->PageBuilder_model->getUpcomingBatches();
        $html = '';
        $html .= '<div class="content-section new-batches">
        <div class="container new-batches__container">
            <div class="new-batches__col1">
                <img src="website/images/new-batch-image.webp" alt="new-batch-mage" class="new-batches__image">
            </div>
            <div class="new-batches__col2">
                <h3 class="new-batches__heading">New Batches Commence On</h3>
                <div class="new-batches-carousel splide">
                    <div class="splide__track">
                        <ul class="splide__list">';
                        foreach ($batches as $batch) 
                        {
                            $date1 = $batch['date'];
                            $date = new DateTime($date1);
                            $html .= '<li class="splide__slide new-batches-carousel__item">
                            <div class="new-batches-carousel__item-content">
                                <div class="new-batches-carousel__course">'.$batch['name'].'</div>
                                <div class="new-batches-carousel__date-month-year">
                                    <div class="new-batches-carousel__date">'.$date->format('j').'</div>
                                    <div class="new-batches-carousel__month-and-year">
                                        <span class="new-batches-carousel__month">'.$date->format('F').'</span>
                                        <span class="new-batches-carousel__year">'.$date->format('Y').'</span>
                                    </div>
                                </div>
                            </div>
                        </li>';
                        }
                         $html .= '</ul>
                    </div>

                </div>
            </div>
        </div>
    </div>';
    return $html;
    }

    //Render Introduction
    public function renderIntroduction()
    {
        $introduction = $this->db->get_where('widgets', ['id' => 1])->result_array(); //Get data from widgets table id 1(Introduction)
        $html = '';
        $html .= '<div class="container introduction__container">
            <div class="introduction__col1" >
                <div class="introduction__monogram">
                    <div class="monogram-icon">
                        <img src="website/images/monogram-icon1.svg" alt="monogram-icon1" class="monogram-icon__a1">
                        <img src="website/images/monogram-icon2.svg" alt="monogram-icon2" class="monogram-icon__a2">
                        <img src="website/images/monogram-icon3.svg" alt="monogram-icon3" class="monogram-icon__a3">
                        <img src="website/images/monogram-icon4.svg" alt="monogram-icon4" class="monogram-icon__a4">
                    </div>
                </div>
            </div>
            <div class="introduction__col2 data-animation="fadeInLeft" style="animation-delay: 0.3s; animation-duration: 1s;" >
                <h2 class="introduction__heading">'.$introduction[0]['title'].'</h2>
                <p class="introduction__paragraph">'.$introduction[0]['description'].'</p>
                <a href="'.$introduction[0]['link'].'" class="btn1">Learn More</a>
            </div>
        </div>';
        return $html;
    }

    //Render Certifications And Training
    public function renderCertificationsTraining()
    {
        $certification = $this->db->get_where('widgets', ['id' => 2])->result_array(); //Get data from widgets table id 2(certification)
        $corporate = $this->db->get_where('widgets', ['id' => 3])->result_array(); //Get data from widgets table id 3(corporate)
        $html = '';
        $html .= '<div class="container trainings__container">
            <div class="trainings__section">
                <div class="trainings__col1">
                    <h2 class="trainings__heading">'.$certification[0]['title'].'</h2>
                    <p class="trainings__paragraph">'.$certification[0]['description'].'</p>
                    <a href="'.$certification[0]['link'].'" class="btn1">Learn More</a>
                </div>
                <div class="trainings__col2">
                    <img src="uploads/widgets/'.$certification[0]['image'].'" alt="certification-training-image" width="570" height="290" class="trainings__image">
                </div>
            </div>
            <div class="trainings__section">
                <div class="trainings__col1">
                    <h2 class="trainings__heading">'.$corporate[0]['title'].'</h2>
                    <p class="trainings__paragraph">'.$corporate[0]['description'].'</p>
                    <a href="'.$corporate[0]['link'].'" class="btn1">Learn More</a>
                </div>
                <div class="trainings__col2">
                    <img src="uploads/widgets/'.$corporate[0]['image'].'" alt="certification-training-image" width="570" height="290" class="trainings__image">
                </div>
            </div>
        </div>';
                return $html;

    }


    //Render sliders
    public function renderSliders()
    {
        $sliders = $this->PageBuilder_model->getSliders();
        $html = '';
        $html .= '<div class="hero-slider__container container">';
        $html .= '<div class="hero-slider__carousel splide">';
        $html .= '<div class="splide__track">';
        $html .= '<ul class="splide__list">';
        foreach ($sliders as $slider) 
        {
            $html .= '<li class="splide__slide">';
            $html .= '<div class="hero-slider__content">';
            $html .= '<div class="hero-slider__image-wrapper">';
            $html .= '<picture class="hero-slider-content__picture">
                                        <source media="(min-width:1170px)" srcset="' . base_url('uploads/slider/' . $slider['image']) . '"
                                            width="1170" height="470">
                                        <source media="(min-width:768px)" srcset="' . base_url('uploads/slider/' . $slider['image']) . '"
                                            width="728" height="400">
                                        <img src="' . base_url('uploads/slider/' . $slider['image']) . '" class="hero-slider__image"
                                            alt="hero-slide2-xs" width="300" height="400">
                                    </picture>';
            //$html .= '<img class="hero-slider__image" alt="slider" src="' . base_url('uploads/slider/' . $slider['image']) . '">';
            $html .= '</div>';
            $html .= '<div class="hero-slider__description">';
            $html .= '<h2 class="hero-slider__description-heading">' . htmlspecialchars($slider['title']) . '</h5>';
            $html .= '<p class="hero-slider__description-paragraph">' . nl2br(htmlspecialchars($slider['description'])) . '</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    //Render Associates
    public function renderAssociates()
    {
        $associates = $this->PageBuilder_model->getAssociates();
        $html = '';
        $html .= ' <div class="content-section associates">
        <div class="container">
            <div class="marquee-carousel" id="marquee-carousel">
                <div class="marquee-carousel__track" id="marquee-carousel-track">
                    <div class="active-outline" id="active-outline"></div>';
                    foreach ($associates as $associate) 
                    {
                        $html .= '<div class="marquee-carousel__item"><img src="' . base_url('uploads/brand-associates/' . $associate['image']) . '" alt="cisco-logo"
                                        class="marquee-carousel__item-logo"></div>';
                    }
                 $html .='</div>
                </div>
            </div>
        </div>';
    return $html;
    }

    //Render Certifications
    public function renderCertifications($page_id)
    {
        
        $certifications = $this->PageBuilder_model->getActiveCertifications();
        $html = '';
        if($page_id == 1){ //Home page
            $html .= '<div class="certification-categories__banner">
                <img src="website/images/certification-categories-banner-image.webp"
                    alt="certification-categories-banner-image" class="certification-categories__banner-image">
                <div class="certification-categories__banner-content">
                    <h2 class="certification-categories__banner-heading">Certification Training</h2>
                    <p class="certification-categories__banner-description">Through expert instruction via boot camps,
                        courses and hands-on labs, we prepare organizations and
                        professionals to earn certifications. Followings are our Certification categories</p>
                </div>
            </div>';
            $html .= '<div class="certification-categories__list">';
            foreach ($certifications as $certification) 
            {
                $link = base_url('certification-training/'.$certification['slug']);
                $html .='<div class="certification-categories__item">
                        <div class="certification-categories__item-logo-wrapper">
                            <img class="certification-categories__item-logo"
                                src="' . base_url('uploads/certifications/logo/' . $certification['image']) . '"
                                alt="cisco-logo-certifications-categories" width="80" height="44">
                        </div>
                        <h2 class="certification-categories__item-heading">'.$certification['name'].'</h2>
                        <p class="certification-categories__item-description">'.$certification['home_description'].'</p>
                        <a href="'.$link.'" class="btn2 certification-categories__item-btn">Learn More</a>
                    </div>';
            }
            $html .= '</div>';
        }
        //Not home page
        else
        {
            $html .= '<div class="content-section">
                    <div class="container">
                        <h2>Certifications deliver results for organizations and individuals</h2>
                        <p>Mastery of the subject. Increased productivity. Faster troubleshooting. Better decision making and job
                            performance. Sound like things you want? Then get certified. EMIGO NWETWORK EXPERTS PVT. LTD. is the
                            largest network training campus in India, located in Cochin, Kerala Since 2009. Through expert
                            instruction via boot camps, courses and hands-on labs, we prepare organizations and professionals to
                            earn certifications. We offer certification training in AWS, Cisco, CompTIA, EC-Council, Google Cloud,
                            Microsoft, Red Hat, VMware, Palo-Alto, Citrix, ITIL and more. We also cover topics like Cloud computing,
                            Cybersecurity and more. The combination of our breadth of certification training and flexible classroom
                            and online training schedules and exam vouchers makes it easy to train. Start today and begin working
                            towards earning one of the top 15 highest-paying IT certifications.</p>
                    </div>
                </div>';
            $html .= '<h2>Certification Brands</h2>';
            $html .= '<div class="certification-categories__list">';
            foreach ($certifications as $certification) 
            {
                $link = base_url('certification-training/'.$certification['slug']);
                $html .='<div class="certification-categories__item">
                        <div class="certification-categories__item-logo-wrapper">
                            <img class="certification-categories__item-logo"
                                src="' . base_url('uploads/certifications/logo/' . $certification['image']) . '"
                                alt="cisco-logo-certifications-categories" width="80" height="44">
                        </div>
                        <h2 class="certification-categories__item-heading">'.$certification['name'].'</h2>
                        <p class="certification-categories__item-description">'.$certification['home_description'].'</p>
                        <a href="'.$link.'" class="btn2 certification-categories__item-btn">Learn More</a>
                    </div>';
            }
            $html .= '</div>';

            $html .= '<div class="content-section benefits-of-certifications">
                <div class="container benefits-of-certifications__container">
                    <h2 class="benefits-of-certifications__heading">Benefits of Certifications</h2>
                    <p class="benefits-of-certifications__description">IT certifications offer numerous benefits,
                        including increased job opportunities, higher salaries,greater job security, enhanced skills, and increased self-confidence. They also provide a quick way for
                        hiring managers to assess an individuals abilities and validate their knowledge and skills. Followings are the core benefits of getting certified</p>
                    <div class="benefits-of-certifications__list">
                        <div class="benefits-of-certifications__list-item">
                            <i class="benefits-of-certifications__list-icon"></i>
                            <p class="benefits-of-certifications__list-text">Increased<br>
                                Job Opportunities</p>
                        </div>
                        <div class="benefits-of-certifications__list-item">
                            <i class="benefits-of-certifications__list-icon"></i>
                            <p class="benefits-of-certifications__list-text">Skill<br>
                                Enhancement</p>
                        </div>
                        <div class="benefits-of-certifications__list-item">
                            <i class="benefits-of-certifications__list-icon"></i>
                            <p class="benefits-of-certifications__list-text">Enhanced Credibility
                                and Recognition</p>
                        </div>
                        <div class="benefits-of-certifications__list-item">
                            <i class="benefits-of-certifications__list-icon"></i>
                            <p class="benefits-of-certifications__list-text">Career<br>
                                Advancement</p>
                        </div>
                    </div>
                </div>
            </div>';
        }
        return $html;
    }

    //Render Featured Courses
    public function renderFeaturedCourses()
    {
        $featured_courses = $this->PageBuilder_model->getCourses();
        $html = '';
        $html .= '<h2 class="featured-courses__title">Featured Courses</h2>
            <div class="featured-courses__list featured-courses-carousel splide">
                <div class="splide__track">
                    <ul class="splide__list">';
                    foreach ($featured_courses as $courses) 
                    {
                        $html .= '<li class="splide__slide">
                        <div class="featured-courses__item">
                            <h2 class="featured-courses__heading">'.$courses['name'].'</h2>
                            <div class="featured-courses__logo-wrapper">
                                <img src="' . base_url('uploads/course/course_logo/' . $courses['course_logo']) . '" class="featured-courses__logo" alt="ccna-logo"
                                    width="99" height="62">
                            </div>
                            <div class="featured-courses__image-wrapper">
                                <img src="' . base_url('uploads/course/course_image/' . $courses['course_image']) . '" alt="ccna-course-list-image"
                                    width="310" height="110" class="featured-courses__image">
                            </div>

                            <p class="featured-courses__description">'.$courses['description'].'</p>
                            <div class="featured-courses__btn-group">
                                <a href="" class="btn2 featured-courses__btn">Course Page</a>
                                
                                <!-- Trigger -->
<a class="modal-trigger btn2 btn-enquiry course-list__item-enquiry-btn" data-modal-type="enquiry"
    data-course-name="CCNA">Enquiry</a>

<!-- Template (hidden, reusable) -->
<template data-modal-template="enquiry">
    <div class="modal-content">
        <div class="modal-wrapper">
            <div class="modal-data">
                <div class="form form1">
                    <div class="form__header">
                        <h3 class="h3 form__heading">Enquiry</h3>
                        <div class="close-icon">x</div>
                    </div>
                    <form class="form__body">
                        <div class="form__field-container">
                            <input type="text" class="form__input-text" placeholder="Full Name">
                            <div class="form__validation"></div>
                        </div>
                        <div class="form__field-container">
                            <input type="text" class="form__input-text" placeholder="E-mail">
                            <div class="form__validation"></div>
                        </div>
                        <div class="form__field-container">
                            <div class="form__field-input-group form1__mobile-number">
                                <input type="text" class="form__input-text" name="e_code" value="" placeholder="+00">
                                <input type="text" class="form__input-text" placeholder="Mobile Number">
                            </div>
                            <div class="form__validation"></div>
                        </div>
                        <div class="form__field-container">
                            <!-- Course name injected dynamically -->
                            <input type="text" class="form__input-text course-name" placeholder="Course Name" readonly>
                            <div class="form__validation"></div>
                        </div>
                        <textarea class="form__textarea" rows="4" placeholder="Describe Your Training Needs"></textarea>
                        <p class="btn-wrapper">
                            <button class="form__submit-btn btn1">Submit</button>
                        </p>
                    </form>
                </div>

                <div class="form-response">
                    <img src="images/logo.svg" alt="form-response-logo" width="140" height="45"
                        class="form-response__logo">
                    <p class="form-response__message">Thank You for Choosing EMIGO</p>
                </div>
            </div>
        </div>
    </div>
</template>

                            </div>

                        </div>
                    </li>';
                    }
                    $html .= '</ul></div></div>';
                    return $html;
    }

    //Render tutors
    public function renderTutors()
    {
        $tutors = $this->PageBuilder_model->getTutors();
        $html = '';
        $html .= '<div class="trainers__banner">
                <img src="website/images/experts-banner-background.webp" alt="experts-banner-background"
                    class="trainers__banner-image" width="1250" height="300">
                <div class="trainers__banner-content">
                    <h2 class="trainers__banner-heading"> EMIGO Expert Training Team</h2>
                    <p class="trainers__banner-description"></p>
                </div>
            </div>

            <div class="trainers__carousel splide">
                <div class="splide__track">
                    <ul class="splide__list">';
                    foreach ($tutors as $tutor) 
                    {
                        $html .= '<li class="splide__slide">
                            <div class="trainers__data">
                                <img src="uploads/experts/'.$tutor['image'].'" alt="biju-k-baby" class="trainers__photo"
                                    width="120" height="120">
                                <div class="trainers__details">
                                    <p class="trainers__name">'.$tutor['name'].'</p>
                                    <p class="trainers__designation">'.$tutor['role'].'</p>
                                    <p class="trainers__modules">'.$tutor['remark'].'</p>
                                </div>
                            </div>
                        </li>';
                    }
                    $html .= '</ul>
                </div>
            </div>';
            return $html;
    }

    //Render Testimonials
    public function renderTestimonials()
    {
        $testimonials = $this->PageBuilder_model->getTestimonials();
        $html = '';
        $html .= '<h2 class="testimonials__heading">Testimonials</h2>
            <div class="testimonials-carousel splide">
                <div class="splide__track">
                    <ul class="splide__list">';
                    foreach ($testimonials as $testimonial) 
                    {
                         $html .= '<li class="splide__slide">
                            <div class="testimonials-carousel__content">
                                <div class="testimonials-carousel__header">
                                    <img src="uploads/testimonials/'.$testimonial['image'].'" class="testimonials-carousel__image"
                                        alt="testimonials-image1">
                                    <div class="testimonials-carousel__name-and-role">
                                        <p class="testimonials-carousel__name">'.$testimonial['name'].'</p>
                                        <p class="testimonials-carousel__role">'.$testimonial['position'].'</p>
                                        <p class="testimonials-carousel__company">'.$testimonial['company'].'</p>
                                    </div>
                                </div>
                                <p class="testimonials-carousel__description">'.$testimonial['description'].'</p>
                            </div>
                        </li>';
                    }
                    $html .= '</ul>
                </div>
            </div>';
            return $html;
    }

    //Certification Training Certifications
    public function certificationTrainingCertifications($certification_training_id)
    {
        $html = '';
        $certification_levels = $this->PageBuilder_model->getCertificationLevels($certification_training_id);

        foreach ($certification_levels as $level) 
        {
            $html .= '<div class="all-certifications__item">';
            $html .= '<h3 class="all-certifications__item-heading">' . htmlspecialchars($level['name']) . '</h3>';

            $certifications = $this->PageBuilder_model->getCertificationsByLevel($certification_training_id, $level['id']);

            if (!empty($certifications)) {
                $html .= '<div class="all-certifications__item-list">';
                $html .= '<ul class="all-certifications__item-ul">';
                foreach ($certifications as $certification) {
                    $html .= '<li class="all-certifications__item-li">';
                    $html .= '<a href="#" class="all-certifications__item-li-a">' . htmlspecialchars($certification['certification_title']) . '</a>';
                    $html .= '</li>';
                }
                $html .= '</ul>';
                $html .= '</div>';
            } else {
                $html .= '<p>No certifications available.</p>';
            }

            $html .= '</div>'; // Close .all-certifications__item
        }

        return $html;
    }


    //Video
    public function renderVideo()
    {
        $video = $this->PageBuilder_model->getVideo(1);
        $html = '';
        $html .='<div class="video-container">
            <video preload="none" class="video-player" poster="' . base_url('uploads/video/'.$video['image']) . '" controls>
                <source src="' . base_url('uploads/video/'.$video['path']) . '" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <button class="play-pause-btn play">
            </button>
        </div>';
        return $html;
    }
    //SEO Content
    public function renderSEOContent()
    {
        $seo_content = $this->PageBuilder_model->getSeoContent();
        $html ='';
        $html .= '<div class="service-brief__wrapper">
                '.$seo_content[0]['content'].'
            </div>';
            return $html;
    }
    //Render Page Banner
    public function renderPageBanner($page_id)
    {
        $page_details = $this->PageBuilder_model->getPage($page_id);
        return '<div class="content-section content-section-p-t-n subpage-banner">
            <div class="subpage-banner__container container">
                <div class="subpage-banner__wrapper">
                    <img src="' . base_url('uploads/banner/'.$page_details['banner_image']) . '"
                        alt="certification-training-page-banner" width="1170" height="390" class="subpage-banner__image">
                    <div class="subpage-banner__content">
                        <div class="subpage-banner__content-heading-and-description">
                            <h1 class="subpage-banner__heading">'.$page_details['banner_title'].'</h1>
                            <p class="subpage-banner__description">'.$page_details['banner_description'].'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-section-p-t-b-n">
        <div class="container">
            <div class="breadcrumb">
                <div class="container breadcrumb__container">
                    <ul class="breadcrumb__ul">
                        <li class="breadcrumb__li">
                            <a href="'.base_url().'" class="breadcrumb__link">Home</a>
                        </li>
                        <li class="breadcrumb__li">'.$page_details['title'].'</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>';
    }

    


    //Certifications menu subpage listing
    public function Certifications($slug)
    {   
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); // gets all URI segments as array
        // Build breadcrumbs
        $breadcrumbs = [];
        $link = base_url(); // start from base_url
        foreach ($segments as $index => $segment) 
        {
            $segment = urldecode($segment);
            $link .= $segment . '/';
            $is_last = ($index == count($segments));

            $breadcrumbs[] = [
                'label' => ucwords(str_replace('-', ' ', $segment)),
                'url'   => $is_last ? null : $link
            ];
        }
        $data['breadcrumbs'] = $breadcrumbs;
        $data['certificate_url'] = base_url('certifications');
        $certification_training_id = $this->PageBuilder_model->getCertificationIdBySlug($slug); //return Certificate id echo $certification_training_id;
        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($certification_training_id);
        $data['certification_levels'] = $this->PageBuilder_model->getCertificationLevels($certification_training_id);
        $data['training_levels_certifications'] = $this->PageBuilder_model->getTrainingLevelsCertifications(0,$certification_training_id); //Fetch certifications courses based on training id and level 0
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['certification_levels'] = $this->PageBuilder_model->getCertificationLevels($certification_training_id); //certification levels empty or not
        //$data['certification_training_certifications'] = $this->certificationTrainingCertifications($certification_training_id);
        $data['current_page_slug'] = 'certification_category'; //Depends on slug load css in header

        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery();
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);

        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        // SEO CONTENTS
        $data['page_title'] = $data['certification_details']['name'];
        $data['metakeywords'] = $data['certification_details']['metakeywords'];
        $data['metadescription'] = $data['certification_details']['metadescription'];

        $this->load->view('admin/includes/header', $data);
        $this->load->view('certification_category', $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
    }

    //Levels page Displaying
    public function levels($category_slug, $subcategory_slug)
    {
        //echo $category_slug;echo $subcategory_slug;
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); // gets all URI segments as array
        // Build breadcrumbs
        $breadcrumbs = [];
        $link = base_url(); // start from base_url
        foreach ($segments as $index => $segment) 
        {
            $segment = urldecode($segment);
            $link .= $segment . '/';
            $is_last = ($index == count($segments));

            $breadcrumbs[] = [
                'label' => ucwords(str_replace('-', ' ', $segment)),
                'url'   => $is_last ? null : $link
            ];
        }
        $data['breadcrumbs'] = $breadcrumbs;
        $level_id = $this->PageBuilder_model->getCertificationLevelIdBySlug($subcategory_slug); //echo $level_id; Return certification level id for getting details(Subcategory id)
        $data['certification_level_details'] = $this->PageBuilder_model->getCertificationLevelDetails($level_id);
        $certification_training_id = $data['certification_level_details']['certification-training-id'];
        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($certification_training_id);
        $data['certification_training_image'] = $data['certification_details']['image'];
        $data['training_levels_certifications'] = $this->PageBuilder_model->getTrainingLevelsCertifications($level_id,$certification_training_id); //Fetch courses or certifications based on levels
        $data['sub_sub_categories'] = $this->PageBuilder_model->getSubSubCategoriesByCategoryAndSubCategory($level_id,$certification_training_id);//print_r($data['sub_sub_categories']);exit; //Fetch Sub sub categories or certifications based on levels
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery();
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'certification_subcategory'; //Depends on slug load css in header
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        $data['page_title'] = $data['certification_level_details']['name'];
        $data['metakeywords'] = $data['certification_level_details']['metakeywords'];
        $data['metadescription'] = $data['certification_level_details']['metadescription'];

        $this->load->view('admin/includes/header', $data);
        $this->load->view('certification_levels', $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
    }

    // Sub Sub category page displaying (Ex:In cisco proffessional have collaboration as subsub category)
    

    //Course Page displaying
    public function course($category_slug, $subcategory_slug , $course)
    {
        //echo $category_slug;echo $subcategory_slug;echo $course;exit;
        $course_id = $this->PageBuilder_model->getCourseIdBySlug($course); //echo $course_id;exit;
        if(empty($course_id))
        {
            $course_id = $this->PageBuilder_model->getCourseIdBySlug($course);
        }
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); // gets all URI segments as array
        // Build breadcrumbs
        $breadcrumbs = [];
        $link = base_url(); // start from base_url
        foreach ($segments as $index => $segment) 
        {
            $segment = urldecode($segment);
            $link .= $segment . '/';
            $is_last = ($index == count($segments));

            $breadcrumbs[] = [
                'label' => ucwords(str_replace('-', ' ', $segment)),
                'url'   => $is_last ? null : $link
            ];
        }
        $data['breadcrumbs'] = $breadcrumbs;
        $data['course_details'] = $this->PageBuilder_model->getCourseDetails($course_id); //print_r($data['course_details']);exit;
        $data['course_syllabus'] = $this->PageBuilder_model->getCourseSyllabus($course_id);
        $data['whatlearn'] = $this->PageBuilder_model->getCourseWhatLearn($course_id);
        $data['related_certifications'] = $this->PageBuilder_model->getCourseRelatedCertifications($course_id);//print_r($data['related_certifications']);exit;
        $data['course_faq'] = $this->PageBuilder_model->getCourseFaq($course_id);
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery();
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'course'; //Depends on slug load css in header
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); // Main menu id is 1
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        $data['page_title'] = $data['course_details']['name'];
        $data['metakeywords'] = $data['course_details']['metakeywords'];
        $data['metadescription'] = $data['course_details']['metadescription'];
        $this->load->view('admin/includes/header', $data);
        $this->load->view('course_page', $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
    }


    public function save_editor()
    {
        $this->load->view('editor');
    }
/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Handles AJAX requests for saving course enquiries.
     *
     * This method validates input data received via AJAX and, upon successful
     * validation, inserts the enquiry into the database. The input data includes
     * the name, email, e_code, mobile, course, and message. If validation fails,
     * it returns a JSON response with error messages. Upon success, it returns
     * a JSON response indicating success. If the request is not AJAX, a 404 error
     * is shown.
     */

/*******  1f6069d7-99a3-49eb-a4b9-ba45ac2a2d3d  *******/
    public function save_enquiry() 
    {
         if ($this->input->is_ajax_request()) 
         {
            $data = json_decode(file_get_contents('php://input'), true);

            $this->load->library('form_validation');
            $this->form_validation->set_data($data);
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('e_code', 'Code', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('course', 'Course', 'required');

            if ($this->form_validation->run() === FALSE) 
            {
                echo json_encode(['status' => 'error', 'errors' => validation_errors()]);
                return;
            }

            // Save to DB
            $insert_data = [
                'full_name' => $data['name'],
                'email' => $data['email'],
                'country_code' => $data['e_code'],
                'mobile' => $data['mobile'],
                'course' => $data['course'],
                'message' => $data['message'],
                'enq_type' => $data['enq_type'],
                'status' => 'Pending',
                'enq_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('enquiries', $insert_data);
            echo json_encode(['status' => 'success']);
        } 
        else 
        {
            show_404();
        }
    }
}