<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /*
      View page
      Render header element
      Render footer element
      Render sliders
      Render Associates
      Render Gallery Caption
      Render Corporate Training
      Render Certifications And Training
      Render Introduction
      Render Unstructured elements outside row
      Render gallery
      Render Course Categories OR Course Subjects
      Render blogs
      Render Upcoming Batches
      Certifications menu subpage listing
      Levels page Displaying
      Video
      SEO Content
      Render Page Banner
    */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/PageBuilder_model');
        $this->load->library('upload');
    }


public function index(){
    // echo "here";
    $this->viewPage('home');  /* This is the home page slug.Default controller redirecting to index function */
}

//MARK:  - View Page
public function viewPage($slug)
{
    if($slug == 'home')
    {
        $data['current_page_slug'] = 'home'; /* Depends on slug load css in header */
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['slider'] = $this->PageBuilder_model->getSliderList();
        $data['aboutus'] = $this->PageBuilder_model->getAboutuscontent(9);
        $data['categories'] = $this->PageBuilder_model->getCategoryList();
        $data['settings'] = $this->PageBuilder_model->getSettings();
        $data['products'] = $this->PageBuilder_model->getProductList();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/home',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }


    if($slug == 'careers')
    {
        $data['current_page_slug'] = 'careers'; /* Depends on slug load css in header */

        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['careerheader'] = $this->PageBuilder_model->getCareerscontent(11);
        $data['careers'] = $this->PageBuilder_model->getCareersList();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/careers',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }

    if($slug == 'about-us')
    {
        $data['current_page_slug'] = 'about-us'; /* Depends on slug load css in header */
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['aboutheader'] = $this->PageBuilder_model->getAboutcontent(9);
        $data['aboutus'] = $this->PageBuilder_model->getAboutuscontent(9);
        $data['management'] = $this->PageBuilder_model->getManagementList();
        // $data['careers'] = $this->PageBuilder_model->getCareersList();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/about-us',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }


    if($slug == 'contact')
    {
        $data['current_page_slug'] = 'contact'; /* Depends on slug load css in header */
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['contactheader'] = $this->PageBuilder_model->getContactcontent(3);
         $data['settings'] = $this->PageBuilder_model->getSettings();
          $data['products'] = $this->PageBuilder_model->getProductList();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/contact',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }


        if($slug == 'manufacturing-units')
    {
        // echo "here";
        $data['current_page_slug'] = 'manfacturingunits'; /* Depends on slug load css in header */
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['manfacturingheader'] = $this->PageBuilder_model->getManfacturingcontent(7);
        // print_r($data['manfacturingheader']);
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/manfacturing',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }


    if($slug == 'infrastructure')
    {
        $data['current_page_slug'] = 'infrastructure'; /* Depends on slug load css in header */
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['infrastructureheader'] = $this->PageBuilder_model->getInfrastructurecontent(8);
        $data['careers'] = $this->PageBuilder_model->getCareersList();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/infrastructure',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }


        if($slug == 'product')
    {
        $data['current_page_slug'] = 'product'; /* Depends on slug load css in header */
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['productheader'] = $this->PageBuilder_model->getProductcontent(2);
        $data['categories'] = $this->PageBuilder_model->getCategoryList();
        $data['products'] = $this->PageBuilder_model->getProductList();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/product',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }







    

    if($slug == 'login' || $slug == 'admin'){
        redirect('admin/Login');
    }

    if($slug == 'gallery')
    {
        $data['current_page_slug'] = 'gallery'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        /* SEO CONTENTS */
        $data['gallery'] = $this->PageBuilder_model->getGallery();
        $data['page_title'] = "Gallery";
        $data['metakeywords'] = "Gallery keywords";
        $data['metadescription'] = "Description";
        $data['canonical'] = "Canonical URL";
        $data['page_schema'] = "";

        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        $this->load->view('admin/includes/header',$data);
        $this->load->view('template/gallery',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
    }

    
    /* sitemaps end */
    $slug_exist_row = $this->PageBuilder_model->check_slug_exists($slug);
    if(empty($slug_exist_row))
    {
        $this->output->set_status_header('404');
        $this->load->view('errors/custom_404');
        return;
    }

     if($slug == 'landing'){
        $page_id = $this->PageBuilder_model->getPageIdBySlug($slug);
        $data['page_details'] = $this->PageBuilder_model->getPagedetails($page_id);
        $data['current_page_slug'] = 'landing';
        /* SEO CONTENTS */
        $data['page_title'] = $data['page_details']['metatitle'];
        $data['metakeywords'] = $data['page_details']['metakeywords'];
        $data['metadescription'] = $data['page_details']['metadescription'];
        $data['canonical'] = $data['page_details']['canonical'];
        $data['page_schema'] = $data['page_details']['page_schema'];
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1);
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        $data['sliders'] = $this->PageBuilder_model->getSliders();
        $data['associates'] = $this->PageBuilder_model->getAssociates();
        $data['introduction'] = $this->db->get_where('widgets', ['id' => 1])->result_array();
        $data['certification'] = $this->db->get_where('widgets', ['id' => 2])->row_array(); // Only need one row
        $data['corporate'] = $this->db->get_where('widgets', ['id' => 3])->row_array(); // Only need one row
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        $data['seo_content'] = $this->PageBuilder_model->getSeoContent();
        $data['featured_courses'] = $this->PageBuilder_model->getCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['landing_popup'] = $this->landing_popup_enquiry();
        $data['landing_featured_course_enquiry'] = $this->landing_featured_course_enquiry();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('landing-page',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
    }

    /* If slug is corporate-training then redirect to corporate-training */
    if($slug == 'corporate-training')
    {
        $page_id = $this->PageBuilder_model->getPageIdBySlug($slug); /* echo $page_id;exit; */
        $data['page_details'] = $this->PageBuilder_model->getPagedetails($page_id);
        $data['contents'] = $this->PageBuilder_model->getPageContents('page_corporate_training'); /* print_r($data['contents']); */
        $data['current_page_slug'] = 'corporate-training'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        $data['corporate_training_section1'] = $this->PageBuilder_model->getPageModuleLoopItems($page_id,'corporate-training-section1-module'); /* section1 modules from loop table */
        $data['corporate_training_section3'] = $this->PageBuilder_model->getPageModuleLoopItems($page_id,'corporate-training-section3-module'); /* section1 modules from loop table */

        /* SEO CONTENTS */
        $data['page_title'] = $data['page_details']['metatitle'];
        $data['metakeywords'] = $data['page_details']['metakeywords'];
        $data['metadescription'] = $data['page_details']['metadescription'];
        $data['canonical'] = $data['page_details']['canonical'];
        $data['page_schema'] = $data['page_details']['page_schema'];

        $data['corporate_training_footer_enquiry'] = $this->corporate_training_footer_enquiry();

        $this->load->view('admin/includes/header',$data);
        $this->load->view('template/corporate-training',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
    }

    /* If slug is support then redirect to support */
    if($slug == 'support' || $slug == 'Support')
    {
        /* echo "hello";exit; */
        $page_id = $this->PageBuilder_model->getPageIdBySlug($slug); /* echo $page_id;exit; */
        $data['page_details'] = $this->PageBuilder_model->getPagedetails($page_id);
        $data['contents'] = $this->PageBuilder_model->getPageContents('page_support');
        $data['current_page_slug'] = 'support'; /* Depends on slug load css in header */
        $data['page_details'] = $this->PageBuilder_model->getPagedetails($page_id);
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        /* SEO CONTENTS */
        $data['page_title'] = $data['page_details']['metatitle'];
        $data['metakeywords'] = $data['page_details']['metakeywords'];
        $data['metadescription'] = $data['page_details']['metadescription'];
        $data['canonical'] = $data['page_details']['canonical'];
        $data['page_schema'] = $data['page_details']['page_schema'];

        $this->load->view('admin/includes/header',$data);
        $this->load->view('template/support',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
    }

    /* If slug is contact-us then redirect to contact-us  */
    
    /* If slug is about-us then redirect to about-us  */
    if($slug == 'about-us')
    {
        /* echo "hello";exit; */
        $page_id = $this->PageBuilder_model->getPageIdBySlug($slug); /* echo $page_id;exit; */
        $data['page_details'] = $this->PageBuilder_model->getPagedetails($page_id); /* print_r($data['page_details']); */
        $data['contents'] = $this->PageBuilder_model->getPageContents('page_aboutus'); /* print_r($data['contents']); */
        $data['current_page_slug'] = 'about-us'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        /* SEO CONTENTS */
        $data['page_title'] = $data['page_details']['metatitle'];
        $data['metakeywords'] = $data['page_details']['metakeywords'];
        $data['metadescription'] = $data['page_details']['metadescription'];
        $data['canonical'] = $data['page_details']['canonical'];
        $data['page_schema'] = $data['page_details']['page_schema'];

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




}



// public function product($id)
// {
// echo "product";exit;
// $data['current_page_slug'] = 'productdetails'; /* Depends on slug load css in header */
// $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
// $data['productdetails'] = $this->PageBuilder_model->getProductDetails($id);
// $this->load->view('admin/includes/header',$data);
// $this->load->view('website/productdetails', $data);
// $this->load->view('admin/includes/footer',$data);
 
// }

public function savecontactus()
{
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name           = $this->input->post('name');
            $email            = $this->input->post('email');
            $phone_no        = $this->input->post('phone_no');
            $subject     = $this->input->post('subject');
            $message    = $this->input->post('message');
            $productname = $this->input->post('productname');

            // Save to DB via model
            $data = [
                'name'          => $name,
                'email'         => $email,
                'phone_no'      => $phone_no,
                'subject'   =>   $subject ?? 0,
                'message'         => $message,
                'productname'   => $productname,
                'date'          => date('Y-m-d')
            ];

            // print_r($data);exit;

            $inserted = $this->db->insert('contact_us', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'Contact us saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Contact us.']);
            }
        }   
}


public function savecareer(){
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name           = $this->input->post('name');
            $email            = $this->input->post('email');
            $phone        = $this->input->post('phone');
            $address     = $this->input->post('address');
            $designation    = $this->input->post('designation');


$career_file='';
    if (!empty($_FILES['career_file']['name'])) {

    $config['upload_path']   = './uploads/recruitment/';
    $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg||JPG|PNG|JPEG|SVG|pdf|csv|xls|xlsx|PDF|CSV|XLS|XLSX';
    $config['file_name']     = $_FILES['career_file']['name'];

    $this->upload->initialize($config);

    if ($this->upload->do_upload('career_file')) {
        $uploadData         = $this->upload->data();
        $career_file   = $uploadData['file_name'];
    } else {
        echo json_encode([
            'status' => false, 
            'message' => $this->upload->display_errors()
        ]);
        return;
    }
}



            // Save to DB via model
            $data = [
                'name'          => $name,
                'email'         => $email,
                'phone'      => $phone,
                'address'   => $address,
                'designation'  => $designation,
                'file'  => $career_file,
                'date'          => date('Y-m-d')
            ];

            // print_r($data); exit;

            $inserted = $this->db->insert('tbl_recruitment', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'career saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Career.']);
            }
        }   
}


public function getMessage($id)
{
    $row = $this->db->where('id', $id)->get('contact_us')->row_array();
  echo json_encode([
        'message' => $row['message'],
         'remarks' => $row['remarks'],
        'status' => $row['status']
       

    ]);
}


    /* Render Unstructured elements outside row */
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
                $section_html .= $this->renderFeaturedCourses_rev1();
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
        $gallery = $this->PageBuilder_model->getGallery(9);
        $html = '';
        $html .='<div class="content-section photo-gallery">
        <div class="container photo-gallery__container" data-animate="fadeup"><div class="photo-gallery__col1">
                <h2 class="photo-gallery__heading">We empower
                    candidates
                    with hands on labs</h2>
                <p class="photo-gallery__description">Our training sessions are meticulously crafted by our expert
                    trainers. Every detail is designed to
                    maximize efficiency, ensuring that you get the most value out of your time.</p>
                <p class="btn-wrapper">
                    <a href="'.base_url('gallery').'" class="btn1">View Gallery</a>
                </p>
            </div>
            <div class="photo-gallery__col2">
                <div class="photo-gallery__body">';
                foreach ($gallery as $item) {
                    $html .='<div class="photo-gallery__item">
                        <a href="' . base_url('uploads/gallery/' . $item['image']) . '" class="glightbox">
                            <img src="' . base_url('uploads/gallery/' . $item['image']) . '" alt="' . $item['img_alt'] . '"
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
            $html.='<a href="'.base_url('courses/subject_course/'.$course['slug']).'" class="subject-based-courses__item" data-animate="fadeup">
                <div class="subject-based-courses__content" >
                    <h3 class="subject-based-courses__item-heading">'.$course['name'].'</h3>
                    <p class="subject-based-courses__item-description">'.$course['description'].'</p>
                </div>
                <img class="subject-based-courses__item-image" src="'.base_url('uploads/subject_courses/' . $course['image']) .'"
                    alt="'.$course['img_alt'].'" width="400" height="200">
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
        <div class="container new-batches__container" data-animate="fadeup">
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
            <div class="introduction__col1"  data-animate="fade-from-left-long">
                <div class="introduction__monogram">
                    <div class="monogram-icon">
                        <img src="website/images/monogram-icon1.svg" alt="monogram-icon1" class="monogram-icon__a1">
                        <img src="website/images/monogram-icon2.svg" alt="monogram-icon2" class="monogram-icon__a2">
                        <img src="website/images/monogram-icon3.svg" alt="monogram-icon3" class="monogram-icon__a3">
                        <img src="website/images/monogram-icon4.svg" alt="monogram-icon4" class="monogram-icon__a4">
                    </div>
                </div>
            </div>
            <div class="introduction__col2" data-animate="fade-from-right-long" style="animation-delay: 0.3s; animation-duration: 1s;" >
                <h2 class="introduction__heading">'.$introduction[0]['title'].'</h2>
                <p class="introduction__paragraph">'.$introduction[0]['description'].'</p>
                <a href="'.$introduction[0]['link'].'" class="btn1">Learn More</a>
            </div>
        </div>';
        return $html;
    }

        /* Render Certifications And Training */
    public function renderCertificationsTraining()
    {
        $certification = $this->db->get_where('widgets', ['id' => 2])->result_array(); /* Get data from widgets table id 2(certification) */
        $corporate = $this->db->get_where('widgets', ['id' => 3])->result_array(); /* Get data from widgets table id 3(corporate) */
        $html = '';
        $html .= '<div class="container trainings__container">
            <div class="trainings__section">
                <div class="trainings__col1" data-animate="fade-from-left-long">
                    <h2 class="trainings__heading">'.$certification[0]['title'].'</h2>
                    <p class="trainings__paragraph">'.$certification[0]['description'].'</p>
                    <a href="'.$certification[0]['link'].'" class="btn1">Learn More</a>
                </div>
                <div class="trainings__col2" data-animate="fade-from-right-long">
                    <img src="uploads/widgets/'.$certification[0]['image'].'" alt="'.$certification[0]['img_alt'].'" width="570" height="290" class="trainings__image">
                </div>
            </div>
            <div class="trainings__section">
                <div class="trainings__col1" data-animate="fade-from-right-long">
                    <h2 class="trainings__heading">'.$corporate[0]['title'].'</h2>
                    <p class="trainings__paragraph">'.$corporate[0]['description'].'</p>
                    <a href="'.$corporate[0]['link'].'" class="btn1">Learn More</a>
                </div>
                <div class="trainings__col2" data-animate="fade-from-left-long">
                    <img src="uploads/widgets/'.$corporate[0]['image'].'" alt="'.$corporate[0]['img_alt'].'" width="570" height="290" class="trainings__image">
                </div>
            </div>
        </div>';
                return $html;

    }


    /* Render sliders */
    public function renderSliders()
    {
        $sliders = $this->PageBuilder_model->getSliders();
        $html = '';
        $html .= '<div class="hero-slider__container container">';
        $html .= '<div class="hero-slider__carousel splide" data-animate="fadeup">';
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
                                        <source media="(min-width:768px)" srcset="' . base_url('uploads/slider/' . $slider['tabimage']) . '"
                                            width="728" height="400">
                                        <img src="' . base_url('uploads/slider/' . $slider['mobileimage']) . '" class="hero-slider__image"
                                            alt="'.$slider['img_alt'].'" width="300" height="400">
                                    </picture>';
            /* $html .= '<img class="hero-slider__image" alt="slider" src="' . base_url('uploads/slider/' . $slider['image']) . '">'; */
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

    /* Render Associates */
    public function renderAssociates()
    {
        $associates = $this->PageBuilder_model->getAssociates();
        $html = '';
        $html .= ' <div class="content-section associates" data-animate="fade-up">
        <div class="container">
            <div class="marquee-carousel" id="marquee-carousel">
                <div class="marquee-carousel__track" id="marquee-carousel-track">
                    <div class="active-outline" id="active-outline"></div>';
                    foreach ($associates as $associate)
                    {
                        $html .= '<div class="marquee-carousel__item"><a href="' . base_url($associate['link']) . '"><img src="' . base_url('uploads/brand-associates/' . $associate['image']) . '" alt="'.$associate['img_alt'].'"
                                        class="marquee-carousel__item-logo"></a></div>';
                    }
                 $html .='</div>
                </div>
            </div>
        </div>';
    return $html;
    }

    /* Render Certifications */
    public function renderCertifications($page_id)
    {

        $certifications = $this->PageBuilder_model->getActiveCertifications();
        $html = '';
        if($page_id == 1){ /* Home page */
            $html .= '<div class="certification-categories__banner" data-animate="fadeup">
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
            $counter = 0;
            foreach ($certifications as $certification)
            {
                $link = base_url('certification-training/'.$certification['slug']);
                   $html .='<div class="certification-categories__item" data-animate="fadeup">
                        <a class="certification-categories__item-link" href="'.$link.'"></a><div class="certification-categories__item-logo-wrapper">
                            <img class="certification-categories__item-logo"
                                src="' . base_url('uploads/certifications/logo/' . $certification['image']) . '"
                                alt="'.$certification['logo_img_alt'].'" width="110" height="36">
                        </div>
                        <h2 class="certification-categories__item-heading">'.$certification['name'].'</h2>
                        <p class="certification-categories__item-description">'.$certification['home_description'].'</p>
                        <span class="btn2 certification-categories__item-btn">Learn More</span>
                    </div>';
                    if (++$counter == 2)
                    {
                        $link = base_url('certification-training/microsoft-certifications/azure-certification-training');
                        /* Add Azure certification static here */
                        $html .= '<div class="certification-categories__item" data-animate="fadeup">
                            <a class="certification-categories__item-link" href="'.$link.'"></a><div class="certification-categories__item-logo-wrapper">
                                <img class="certification-categories__item-logo" src="'.base_url('uploads/brand-associates/azure-logo.svg').'" alt="azure-logo-certifications-categories" width="110" height="32" loading="lazy">
                            </div>
                            <h2 class="certification-categories__item-heading">Azure Certifications</h2>
                            <p class="certification-categories__item-description">Microsoft Azure certifications validate your
                                expertise in cloud solutions, covering roles like administrator, developer, architect, and
                                security engineer. These globally recognized credentials enhance career prospects in
                                cloud computing.</p>
                            <span class="btn2 certification-categories__item-btn">Learn More</span>
                        </div>';
                        /* end */
                    }
            }

            $html .= '</div>';
        }
        /* Not home page */
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
            $counter = 0;
            foreach ($certifications as $certification)
            {
                $link = base_url('certification-training/'.$certification['slug']);
                $html .='<div class="certification-categories__item" data-animate="fadeup">
                        <a class="certification-categories__item-link" href="'.$link.'"></a><div class="certification-categories__item-logo-wrapper">
                            <img class="certification-categories__item-logo"
                                src="' . base_url('uploads/certifications/logo/' . $certification['image']) . '"
                                alt="'.$certification['logo_img_alt'].'" width="80" height="44">
                        </div>
                        <h2 class="certification-categories__item-heading">'.$certification['name'].'</h2>
                        <p class="certification-categories__item-description">'.$certification['home_description'].'</p>
                        <span class="btn2 certification-categories__item-btn">Learn More</span>
                    </div>';
                    if (++$counter == 2)
                    {
                         /* Add Azure certification static here */
                        $html .= '<div class="certification-categories__item" data-animate="fadeup">
                            <a class="certification-categories__item-link" href="'.$link.'"></a><div class="certification-categories__item-logo-wrapper">
                                <img class="certification-categories__item-logo" src="'.base_url('uploads/brand-associates/azure-logo.svg').'" alt="azure-logo-certifications-categories" width="110" height="32" loading="lazy">
                            </div>
                            <h2 class="certification-categories__item-heading">Azure Certifications</h2>
                            <p class="certification-categories__item-description">Microsoft Azure certifications validate your
                                expertise in cloud solutions, covering roles like administrator, developer, architect, and
                                security engineer. These globally recognized credentials enhance career prospects in
                                cloud computing.</p>
                            <span class="btn2 certification-categories__item-btn">Learn More</span>
                        </div>';
                        /* end */
                    }
            }

            $html .= '</div>';

            $html .= '<div class="content-section benefits-of-certifications" data-animate="fadeup">
                <div class="container benefits-of-certifications__container">
                    <h2 class="benefits-of-certifications__heading">Benefits of Certifications</h2>
                    <p class="benefits-of-certifications__description">IT certifications offer numerous benefits,
                        including increased job opportunities, higher salaries,greater job security, enhanced skills, and increased self-confidence. They also provide a quick way for
                        hiring managers to assess an individuals abilities and validate their knowledge and skills. Followings are the core benefits of getting certified</p>
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
        $home_featured_course_enquiry = $this->home_featured_course_enquiry();
        $html = '';
        $html .= '<h2 class="featured-courses__title">Featured Courses</h2>
            <div class="featured-courses__list featured-courses-carousel splide">
                <div class="splide__track">
                    <ul class="splide__list">';
                    foreach ($featured_courses as $courses)
                    {
                        $html .= '<li class="splide__slide">
                        <div class="featured-courses__item" data-animate="fadeup">
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
                            <a class="modal-trigger btn2 btn-enquiry course-list__item-enquiry-btn"
                               data-modal-type="home-featured-course-enquiry"
                               data-course-name="' . $course_name . '">Enquiry</a>

                            ' . $home_featured_course_enquiry . '

</div>
</li>';
}
$html .= '</ul>
</div>
</div>';
return $html;
}

/* Featured Courses Rev 1 */
    public function renderFeaturedCourses_rev1()
    {
        $featured_courses = $this->PageBuilder_model->getCourses();
        $home_featured_course_enquiry = $this->home_featured_course_enquiry();
        $html = '';

        $html .= '<h2 class="featured-courses-rev1__title">Featured Courses</h2>
            <div class="featured-courses-rev1__list featured-courses-carousel splide">
                <div class="splide__track">
                    <ul class="splide__list">';
                    foreach ($featured_courses as $courses)
                    {
                        $category_slug = $this->PageBuilder_model->getSlugById('certification-training', $courses['certification_training_id']);
                        $subcategory_slug = $this->PageBuilder_model->getSlugById('certification-levels', $courses['certification_level_id']);
                        $subsubcat_slug = $this->PageBuilder_model->getSlugById('sub-sub-categories', $courses['subsub_category_id']);
                        $course_slug = $this->PageBuilder_model->getSlugById('training-levels-certifications', $courses['id']);
                        $course_url = base_url("certification-training/{$category_slug}/{$subcategory_slug}/{$subsubcat_slug}{$course_slug}");

                        $html .= '<li class="splide__slide">
                        <div class="featured-courses-rev1__item" data-animate="fadeup"><a class="featured-courses-rev1__item-link" href="'.$course_url.'"></a>
                            <h2 class="featured-courses-rev1__heading">'.$courses['name'].'</h2>
                            <div class="featured-courses-rev1__logo-wrapper">
                                <img src="' . base_url('uploads/course/course_logo/' . $courses['course_logo']) . '" class="featured-courses-rev1__logo" alt="ccna-logo"
                                    width="99" height="62">
                            </div>
                            <div class="featured-courses-rev1__image-wrapper">
                                <img src="' . base_url('uploads/course/course_image/' . $courses['course_image']) . '" alt="ccna-course-list-image"
                                    width="310" height="110" class="featured-courses-rev1__image">
                            </div>

                            <p class="featured-courses-rev1__description">'.$courses['description'].'</p>
                            <div class="featured-courses-rev1__btn-group">
                                <a href="'.$course_url.'" class="btn2 featured-courses-rev1__btn">Course Page</a>

                               <!-- Trigger -->
                            <a class="modal-trigger btn2 btn-enquiry course-list__item-enquiry-btn"
                               data-modal-type="home-featured-course-enquiry"
                               data-course-name="' . $courses['name'] . '">Enquiry</a>

                            ' . $home_featured_course_enquiry . '

</div>
</li>';
}
$html .= '</ul>
</div>
</div>';
return $html;
}

//Render tutors
public function renderTutors()
{
$tutors = $this->PageBuilder_model->getTutors();
$html = '';
$html .= '<div class="trainers__banner" data-animate="fadeup">
    <img src="website/images/experts-banner-background.webp" alt="experts-banner-background"
        class="trainers__banner-image" width="1250" height="300">
    <div class="trainers__banner-content">
        <h2 class="trainers__banner-heading"> EMIGO Expert Training Team</h2>
        <p class="trainers__banner-description"></p>
    </div>
</div>

<div class="trainers__carousel splide" data-animate="fadeup">
    <div class="splide__track">
        <ul class="splide__list">';
            foreach ($tutors as $tutor)
            {
            $html .= '<li class="splide__slide">
                <div class="trainers__data">
                    <img src="uploads/experts/'.$tutor['image'].'" alt="'.$tutor['img_alt'].'" class="trainers__photo"
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
$html .= '<h2 class="testimonials__heading" data-animate="fadeup">Testimonials</h2>
<div class="testimonials-carousel splide" data-animate="fadeup">
    <div class="splide__track">
        <ul class="splide__list">';
            foreach ($testimonials as $testimonial)
            {
            $html .= '<li class="splide__slide">
                <div class="testimonials-carousel__content">
                    <div class="testimonials-carousel__header">
                        <img src="uploads/testimonials/'.$testimonial['image'].'" class="testimonials-carousel__image"
                            alt="'.$testimonial['img_alt'].'">
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
$html .= '<div class="all-            ">';
    $html .= '<h3 class="all-certifications__item-heading">' . htmlspecialchars($level['name']) . '</h3>';
    $certifications = $this->PageBuilder_model->getCertificationsByLevel($certification_training_id, $level['id']);
    if (!empty($certifications)) {
    $html .= '<div class="all-certifications__item-list">';
        $html .= '<ul class="all-certifications__item-ul">';
            foreach ($certifications as $certification) {
            $html .= '<li class="all-certifications__item-li">';
                $html .= '<a href="#" class="all-certifications__item-li-a">' .
                    htmlspecialchars($certification['certification_title']) . '</a>';
                $html .= '</li>';
            }
            $html .= '</ul>';
        $html .= '</div>';
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
$html .='<div class="video-container" data-animate="fadeup">
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
$html .= '<div class="service-brief__wrapper" data-animate="fadeup">
    '.$seo_content[0]['content'].'
</div>';
return $html;
}

public function landing_popup_enquiry()
{
    $data = []; // optional data array for view
    $html = $this->load->view('template/forms/landing/landing-popup-enquiry', $data, TRUE);
    return $html;
}

//Render Page Banner
public function renderPageBanner($page_id)
{
$page_details = $this->PageBuilder_model->getPage($page_id);
return '<div class="content-section content-section-p-t-n subpage-banner">
    <div class="subpage-banner__container container" data-animate="fadeup">
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


    /* Certifications menu subpage listing */
public function Certifications($slug)
{
    /* echo "certifications  slug=".$slug; */
    /* check slug exist which table */
    $is_category = $this->PageBuilder_model->is_category($slug); /* returns true or false */
    $slug_exist_row = $this->PageBuilder_model->check_slug_exists($slug);/* print_r($slug_exist_row);exit; */

    if(!$is_category)
    {
        $this->output->set_status_header('404');
        $this->load->view('errors/custom_404');
        return;
    }

    if(empty($slug_exist_row))
    {
        $this->output->set_status_header('404');
        $this->load->view('errors/custom_404');
        return;
    }

    $data['selected_certification'] = $slug_exist_row['data']->name;/* Display within Enquiry form on footer */

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443)
  ? "https://" : "http://";

    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];//echo $url;

    $parsedUrl = parse_url($url);
    $path = trim($parsedUrl['path'], '/');
    $segments = $this->uri->segment_array(); /* gets all URI segments as array */
    /* Build breadcrumbs */
    $breadcrumbs = [];
    $link = base_url(); /* start from base_url */
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

    if($slug_exist_row['type'] == 'category')
    {
        //echo "category";
        $certification_training_id = $this->PageBuilder_model->getCertificationIdBySlug($slug); /* echo $certification_training_id;exit; */
        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($certification_training_id); /* print_r($data['certification_details']); */
        $data['training_levels_certifications'] = $this->PageBuilder_model->getActiveTrainingLevelsCertifications(0,$certification_training_id); /* Fetch certifications courses based on training id and level 0 */
        /* $data['certification_levels'] = $this->PageBuilder_model->getCertificationLevels($certification_training_id); */
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['certification_levels'] = $this->PageBuilder_model->getActiveCertificationLevels($certification_training_id , 1); /* certification levels empty or not */
        $data['all_certifications'] = $this->certificationTrainingCertifications($certification_training_id);
        $data['current_page_slug'] = 'certification_category'; /* Depends on slug load css in header */
        $data['page_module_loop_items'] = $this->PageBuilder_model->getPageModuleLoopItems($certification_training_id,'microsoft_module'); /* print_r($data['page_module_loop_items']); Get microsoft module loop items */

        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);

        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        $data['enquiry_popup'] = $this->category_page_footer_enquiry();
        /* SEO CONTENTS */
        $data['page_title'] = $data['certification_details']['metatitle'];
        $data['metakeywords'] = $data['certification_details']['metakeywords'];
        $data['metadescription'] = $data['certification_details']['metadescription'];
        $data['canonical'] = $data['certification_details']['canonical'];
        $data['page_schema'] = $data['certification_details']['page_schema'];

        $data['enquiry_popup'] = $this->course_footer_enquiry();
        $data['category_course_enquiry'] = $this->category_course_enquiry();

        //echo  $data['certification_details']['template_id'];

        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/category/'.$data['certification_details']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
    }
    if($slug_exist_row['type'] == 'sub_category')
    {
        //echo "sub_category";exit;
        $level_id = $this->PageBuilder_model->getCertificationLevelIdBySlug($slug); /* echo $level_id; Return certification level id for getting details(Subcategory id) */
        $data['certification_level_details'] = $this->PageBuilder_model->getCertificationLevelDetails($level_id);
        $certification_training_id = $data['certification_level_details']['certification-training-id'];
        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($certification_training_id);
        $data['certification_training_image'] = $data['certification_details']['image'];
        $data['training_levels_certifications'] = $this->PageBuilder_model->getActiveTrainingLevelsCertifications($level_id,$certification_training_id); /* Fetch courses or certifications based on levels */
        $data['sub_sub_categories'] = $this->PageBuilder_model->getActiveSubSubCategoriesByCategoryAndSubCategory($level_id,$certification_training_id);/* print_r($data['sub_sub_categories']);exit; Fetch Sub sub categories or certifications based on levels */
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'certification_subcategory'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        $data['page_title'] = $data['certification_level_details']['metatitle'];
        $data['metakeywords'] = $data['certification_level_details']['metakeywords'];
        $data['metadescription'] = $data['certification_level_details']['metadescription'];
        $data['canonical'] = $data['certification_level_details']['canonical'];
        $data['page_schema'] = $data['certification_level_details']['page_schema'];
        $data['enquiry_popup'] = $this->category_page_footer_enquiry();

        /* echo $data['certification_level_details']['template_id']; */

        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/subcategory/'.$data['certification_level_details']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
    }
}


/* Levels page Displaying */
public function levels($category_slug, $subcategory_slug)
{
    $CheckParamSubcategory = $this->PageBuilder_model->CheckCourseOrSubcategory($subcategory_slug); /* print_r($CheckParamSubcategory);exit; */
    if($CheckParamSubcategory)
    {
        //echo "here 33";exit;
        $subcat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($subcategory_slug);
        $is_category = $this->PageBuilder_model->is_category($category_slug);
        $is_subcategory = $this->PageBuilder_model->is_subcategory($subcategory_slug);
        $cat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($category_slug);
        $data['selected_certification'] = $subcat_slug_exist_row['data']->name ?? '';

        if (empty($cat_slug_exist_row) || empty($subcat_slug_exist_row) || !$is_category || !$is_subcategory )
        {
            $this->output->set_status_header('404');
            $this->load->view('errors/custom_404');
            return;
        }

       $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443)
  ? "https://" : "http://";

    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];//echo $url;
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); /* gets all URI segments as array */
        /* Build breadcrumbs */
        $breadcrumbs = [];
        $link = base_url(); /* start from base_url */
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
        $level_id = $this->PageBuilder_model->getCertificationLevelIdBySlug($subcategory_slug); /* echo $level_id; Return certification level id for getting details(Subcategory id) */
        $data['certification_level_details'] = $this->PageBuilder_model->getCertificationLevelDetails($level_id);
        $certification_training_id = $data['certification_level_details']['certification-training-id'];
        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($certification_training_id);

        $data['selected_certification'] = $data['certification_level_details']['name']." - ".$data['certification_details']['name'];/* Selected certification name on enquiry popup */
        $data['certification_training_image'] = $data['certification_details']['image'];
        $data['training_levels_certifications'] = $this->PageBuilder_model->getActiveTrainingLevelsCertifications($level_id,$certification_training_id); /* Fetch courses or certifications based on levels */
        $data['sub_sub_categories'] = $this->PageBuilder_model->getActiveSubSubCategoriesByCategoryAndSubCategory($level_id,$certification_training_id);/* print_r($data['sub_sub_categories']);exit;  Fetch Sub sub categories or certifications based on levels */
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'certification_subcategory'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        $data['page_title'] = $data['certification_level_details']['metatitle'];
        $data['metakeywords'] = $data['certification_level_details']['metakeywords'];
        $data['metadescription'] = $data['certification_level_details']['metadescription'];
        $data['canonical'] = $data['certification_level_details']['canonical'];
        $data['page_schema'] = $data['certification_level_details']['page_schema'];
        $data['enquiry_popup'] = $this->sub_category_footer_enquiry();
        $data['sub_category_course_list_enquiry'] = $this->sub_category_course_list_enquiry();

        //echo $data['certification_level_details']['template_id'];

        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/subcategory/'.$data['certification_level_details']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
    }
    else
    {
        //echo "here";
        $course_id = $this->PageBuilder_model->getCourseIdBySlug($subcategory_slug);
        $is_subcategory = $this->PageBuilder_model->is_subcategory($subcategory_slug);
            $data['course_details'] = $this->PageBuilder_model->getCourseDetails($course_id);//print_r($data['course_details']);exit;
            $slug_exist_row = $this->PageBuilder_model->check_slug_exists($subcategory_slug);
            $is_category = $this->PageBuilder_model->is_category($category_slug);
            $is_course = $this->PageBuilder_model->is_course($subcategory_slug);
            $cat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($category_slug);
            $data['selected_certification'] = $slug_exist_row['data']->name ?? '';

            if(!$is_category)
            {
                $this->output->set_status_header('404');
                $this->load->view('errors/custom_404');
                return;
            }

            if($course_id == 0)
            {
                if(!$is_subcategory)
                {
                    $this->output->set_status_header('404');
                    $this->load->view('errors/custom_404');
                    return;
                }
            }

            if($data['course_details']['certification_level_id'] != 0)
            {
                if(!$is_subcategory)
                {
                    $this->output->set_status_header('404');
                    $this->load->view('errors/custom_404');
                    return;
                }
            }

        if($slug_exist_row['type'] == 'course')
        {
            /* print_r($data['course_details']);exit; */
            if($data['course_details']['parent_course_id'] && $data['course_details']['parent_course_id'] != 0)
            {
                if (!$is_course )
                {
                    $this->output->set_status_header('404');
                    $this->load->view('errors/custom_404');
                    return;
                }

                $parent_course_id = $data['course_details']['parent_course_id'];
                if($data['course_details']['parent_course_type'] == 'course')
                {
                    $this->load_location_course_template($parent_course_id , $course_id);
                    return;
                }
                if($data['course_details']['parent_course_type'] == 'category')
                {
                    $this->load_location_category_template($parent_course_id , $course_id);
                    return;
                }
                if($data['course_details']['parent_course_type'] == 'sub_category')
                {
                    $this->load_location_sub_category_template($parent_course_id , $course_id);
                    return;
                }
                if($data['course_details']['parent_course_type'] == 'sub_sub_category')
                {
                    $this->load_location_sub_sub_category_template($parent_course_id , $course_id);
                    return;
                }
            }

            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parsedUrl = parse_url($url);
            $path = trim($parsedUrl['path'], '/');
            $segments = $this->uri->segment_array(); /* gets all URI segments as array */
            /* Build breadcrumbs */
            $breadcrumbs = [];
            $link = base_url(); /* start from base_url */
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
            $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($data['course_details']['certification_training_id']);/* print_r($data['certification_details']);exit; */
            /* $data['certification_level_details'] = $this->PageBuilder_model->getCertificationLevelDetails($level_id); */
            $data['course_details'] = $this->PageBuilder_model->getCourseDetails($course_id); /* print_r($data['course_details']);exit; */
            $data['course_syllabus'] = $this->PageBuilder_model->getCourseSyllabus($course_id);
            $data['whatlearn'] = $this->PageBuilder_model->getCourseWhatLearn($course_id);
            $location_id = $data['course_details']['location_id'];
            $data['related_certifications'] = $this->PageBuilder_model->getCourseRelatedCertifications($location_id, $data['course_details']['certification_training_id']);/* print_r($data['related_certifications']);exit; */
            $data['course_faq'] = $this->PageBuilder_model->getCourseFaq($course_id);
            $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
            $data['tutors'] = $this->PageBuilder_model->getTutors();
            $data['gallery'] = $this->PageBuilder_model->getGallery(9);
            $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
            $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
            $data['video'] = $this->PageBuilder_model->getVideo(1);
            $data['current_page_slug'] = 'course'; /* Depends on slug load css in header */
            $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
            $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
            $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
            $data['pages'] = $this->PageBuilder_model->getAllPages();
            $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

            $data['page_title'] = $data['course_details']['metatitle'];
            $data['metakeywords'] = $data['course_details']['metakeywords'];
            $data['metadescription'] = $data['course_details']['metadescription'];
            $data['canonical'] = $data['course_details']['canonical'];
            $data['page_schema'] = $data['course_details']['page_schema'];
            $data['enquiry_popup'] = $this->course_footer_enquiry();
            $data['related_courses_enquiry'] = $this->course_related_courses_enquiry();
            $data['course_sidebar_enquiry'] = $this->course_sidebar_enquiry($data['selected_certification']);

            $this->load->view('admin/includes/header', $data);
            $this->load->view('template/course/'.$data['course_details']['template_id'], $data);
            $this->load->view('common_section', $data);
            $this->load->view('admin/includes/footer', $data);
        }
        if($slug_exist_row['type'] == 'sub_sub_category')
        {
                //echo "Sub Sub Category";
                $subsubcategory_id = $this->PageBuilder_model->getSubsubCategoryIdBySlug($subcategory_slug);/*  echo $level_id;exit; */
                $data['subSubCatDetails'] = $this->PageBuilder_model->getSubSubCategoryDetails($subsubcategory_id);
                $data['level_slug'] = $this->PageBuilder_model->getCommonContents('certification-levels','slug','id', $data['subSubCatDetails']['certification_level_id'])[0]['slug'];
                $data['training_levels_certifications'] = $this->PageBuilder_model->getTrainingLevelsCertificationsBySubSubCategory($subsubcategory_id);
                /* print_r($data['subSubCatDetails']); */
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $parsedUrl = parse_url($url);
                $path = trim($parsedUrl['path'], '/');
                $segments = $this->uri->segment_array(); /* gets all URI segments as array */
                /* Build breadcrumbs */
                $breadcrumbs = [];
                $link = base_url(); /* start from base_url */
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
                $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
                $data['tutors'] = $this->PageBuilder_model->getTutors();
                $data['gallery'] = $this->PageBuilder_model->getGallery(9);
                $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
                $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
                $data['video'] = $this->PageBuilder_model->getVideo(1);
                $data['current_page_slug'] = 'course'; /* Depends on slug load css in header */
                $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
                $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
                $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
                $data['pages'] = $this->PageBuilder_model->getAllPages();
                $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

                $data['page_title'] = $data['subSubCatDetails']['metatitle'];
                $data['metakeywords'] = $data['subSubCatDetails']['metakeywords'];
                $data['metadescription'] = $data['subSubCatDetails']['metadescription'];
                $data['canonical'] = $data['subSubCatDetails']['canonical'];
                $data['page_schema'] = $data['subSubCatDetails']['page_schema'];

                $this->load->view('admin/includes/header', $data);
                $this->load->view('template/sub_sub_category/'.$data['subSubCatDetails']['template_id'], $data);
                $this->load->view('common_section', $data);
                $this->load->view('admin/includes/footer', $data);
        }
    }
}


   /* Course Page displaying */
public function course($category_slug, $subcategory_slug , $param3)
{
    //echo "course  category_slug=".$category_slug." subcategory_slug=".$subcategory_slug." param3=".$param3;exit;
    $is_category = $this->PageBuilder_model->is_category($category_slug);
    $is_subcategory = $this->PageBuilder_model->is_subcategory($subcategory_slug);
    $cat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($category_slug);
    $subcat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($subcategory_slug);
    $course_slug_exist_row = $this->PageBuilder_model->check_slug_exists($param3);
    /* end */

    /* echo "course";exit; */
    $CheckParamSubcategory = $this->PageBuilder_model->CheckParam3CourseOrSubcategory($param3); /* Check para3 is course or subcategory */
    /* check slug exist which table */
    $slug_exist_row = $this->PageBuilder_model->check_slug_exists($param3);/* print_r($slug_exist_row);exit; */
    /* end */

    $data['selected_certification'] = $slug_exist_row['data']->name ?? '';/* Display within Enquiry form on footer */
    if($CheckParamSubcategory)/* If param3 is subsubcategory if condition works */
    {
        //echo "Sub Sub Category";exit;
        $subsubcategory_id = $this->PageBuilder_model->getSubsubCategoryIdBySlug($param3);
        $data['subSubCatDetails'] = $this->PageBuilder_model->getSubSubCategoryDetails($subsubcategory_id);

        if (empty($cat_slug_exist_row) || empty($subcat_slug_exist_row) || empty($course_slug_exist_row) || !$is_category || !$is_subcategory )
        {
            //echo "here";exit;
            $this->output->set_status_header('404');
            $this->load->view('errors/custom_404');
            return;
        }
        $data['level_slug'] = $this->PageBuilder_model->getCommonContents('certification-levels','slug','id', $data['subSubCatDetails']['certification_level_id'])[0]['slug'];
        $data['cat_slug'] = $this->PageBuilder_model->getCommonContents('certification-training','slug','id', $data['subSubCatDetails']['certification_training_id'])[0]['slug'];
        $data['training_levels_certifications'] = $this->PageBuilder_model->getTrainingLevelsCertificationsBySubSubCategory($subsubcategory_id);
        /* print_r($data['subSubCatDetails']); */
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); /* gets all URI segments as array */
        /* Build breadcrumbs */
        $breadcrumbs = [];
        $link = base_url(); /* start from base_url */
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
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'course'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        $data['page_title'] = $data['subSubCatDetails']['metatitle'];
        $data['metakeywords'] = $data['subSubCatDetails']['metakeywords'];
        $data['metadescription'] = $data['subSubCatDetails']['metadescription'];
        $data['canonical'] = $data['subSubCatDetails']['canonical'];
        $data['page_schema'] = $data['subSubCatDetails']['page_schema'];

        $data['enquiry_popup'] = $this->course_footer_enquiry();
        $data['course_enquiry'] = $this->course_related_courses_enquiry();

        //echo $data['subSubCatDetails']['template_id'];exit;

        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/sub_sub_category/'.$data['subSubCatDetails']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
    }
    else
    {
        //echo "course test";
        $course_id = $this->PageBuilder_model->getCourseIdBySlug($param3); /* echo $param3; echo $course_id;exit; */
        $data['course_details'] = $this->PageBuilder_model->getCourseDetails($course_id); /* print_r($data['course_details']);exit; */

        if (empty($cat_slug_exist_row) || empty($subcat_slug_exist_row) || empty($course_slug_exist_row) || !$is_category || !$is_subcategory )
        {
            $this->output->set_status_header('404');
            $this->load->view('errors/custom_404');
            return;
        }

        if($data['course_details']['parent_course_id'] && $data['course_details']['parent_course_id'] != 0)
        {
            /* echo "location course";echo $data['course_details']['parent_course_type'];exit; */
            $parent_course_id = $data['course_details']['parent_course_id'];
            if($data['course_details']['parent_course_type'] == 'course')
            {
                $this->load_location_course_template($parent_course_id , $course_id);
                return;
            }
            if($data['course_details']['parent_course_type'] == 'category')
            {
                $this->load_location_category_template($parent_course_id , $course_id);
                return;
            }
            if($data['course_details']['parent_course_type'] == 'sub_category')
            {
                $this->load_location_sub_category_template($parent_course_id , $course_id);
                return;
            }
            if($data['course_details']['parent_course_type'] == 'sub_sub_category')
            {
                $this->load_location_sub_sub_category_template($parent_course_id , $course_id);
                return;
            }
        }
        /* If This is not location based course */
        else
        {
                $parent_course_id = $course_id;
                $data['course_details']['benefits'] = $data['course_details']['benefits'] ?? '';
                $data['course_details']['faq'] = $data['course_details']['faq'] ?? '';
        }
        /* If param3 is course else condition works */
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); /* gets all URI segments as array */
        /* Build breadcrumbs */
        $breadcrumbs = [];
        $link = base_url(); /* start from base_url */
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

        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($data['course_details']['certification_training_id']);/* print_r($data['certification_details']);exit; */
        $data['certification_level_details'] = $this->PageBuilder_model->getCertificationLevelDetails($data['course_details']['certification_level_id']);/* print_r($data['certification_level_details']);exit; */
        $data['course_syllabus'] = $this->PageBuilder_model->getCourseSyllabus($parent_course_id);
        $data['whatlearn'] = $this->PageBuilder_model->getCourseWhatLearn($parent_course_id);
        $location_id = 0;
        $data['related_certifications'] = $this->PageBuilder_model->getCourseRelatedCertifications($location_id,$data['course_details']['certification_training_id']);/* print_r($data['related_certifications']);exit; */
        $data['course_faq'] = $this->PageBuilder_model->getCourseFaq($course_id);
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'course'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        /* echo $data['course_details']['template_id']; */

        $data['page_title'] = $data['course_details']['metatitle'];
        $data['metakeywords'] = $data['course_details']['metakeywords'];
        $data['metadescription'] = $data['course_details']['metadescription'];
        $data['canonical'] = $data['course_details']['canonical'];
        $data['page_schema'] = $data['course_details']['page_schema'];
        $data['enquiry_popup'] = $this->course_footer_enquiry();
        $data['related_courses_enquiry'] = $this->course_related_courses_enquiry();
        $data['course_sidebar_enquiry'] = $this->course_sidebar_enquiry($data['selected_certification']);
        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/course/'.$data['course_details']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
    }
}

public function level_course($category_slug, $subcategory_slug , $subsubcat_slug , $param4)
{
    //echo "course  category_slug=".$category_slug." subcategory_slug=".$subcategory_slug. "qweeqwe= .$subsubcat_slug. param3=".$param4;exit;
    $course_slug_exist_row = $this->PageBuilder_model->check_slug_exists($param4);
    $subsubcat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($subsubcat_slug);
    $subcat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($subcategory_slug);
    $cat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($category_slug);
    $course_id = $this->PageBuilder_model->getCourseIdBySlug($param4);
    $data['course_details'] = $this->PageBuilder_model->getCourseDetails($course_id); //print_r($data['course_details']);exit;
    // Check if any of the slugs are empty
    if (
        empty($category_slug) ||
        empty($subcategory_slug) ||
        empty($subsubcat_slug) ||
        empty($param4)
    ) {
        $this->output->set_status_header('404');
        $this->load->view('errors/custom_404');
        return;
    }

    // Validate if all slugs exist
    $cat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($category_slug);
    $subcat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($subcategory_slug);
    $subsubcat_slug_exist_row = $this->PageBuilder_model->check_slug_exists($subsubcat_slug);
    $course_slug_exist_row = $this->PageBuilder_model->check_slug_exists($param4);

    // If any of the slugs are invalid (not found in DB)
    if (
        empty($cat_slug_exist_row) ||
        empty($subcat_slug_exist_row) ||
        empty($subsubcat_slug_exist_row) ||
        empty($course_slug_exist_row)
    ) {
        $this->output->set_status_header('404');
        $this->load->view('errors/custom_404');
        return;
    }
    $slug_exist_row = $this->PageBuilder_model->check_slug_exists($param4);
    $data['selected_certification'] = $slug_exist_row['data']->name ?? '';
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); /* gets all URI segments as array */
        /* Build breadcrumbs */
        $breadcrumbs = [];
        $link = base_url(); /* start from base_url */
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
        $parent_course_id = $course_id;
        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($data['course_details']['certification_training_id']);/* print_r($data['certification_details']);exit; */
        $data['certification_level_details'] = $this->PageBuilder_model->getCertificationLevelDetails($data['course_details']['certification_level_id']);/* print_r($data['certification_level_details']);exit; */
        $data['course_syllabus'] = $this->PageBuilder_model->getCourseSyllabus($parent_course_id);
        $data['whatlearn'] = $this->PageBuilder_model->getCourseWhatLearn($parent_course_id);
        $location_id = 0;
        $data['related_certifications'] = $this->PageBuilder_model->getCourseRelatedCertifications($location_id,$data['course_details']['certification_training_id']);/* print_r($data['related_certifications']);exit; */
        $data['course_faq'] = $this->PageBuilder_model->getCourseFaq($course_id);
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'course'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
        /* echo $data['course_details']['template_id']; */

        $data['page_title'] = $data['course_details']['metatitle'];
        $data['metakeywords'] = $data['course_details']['metakeywords'];
        $data['metadescription'] = $data['course_details']['metadescription'];
        $data['canonical'] = $data['course_details']['canonical'];
        $data['page_schema'] = $data['course_details']['page_schema'];

        $data['enquiry_popup'] = $this->course_footer_enquiry();
        $data['related_courses_enquiry'] = $this->course_related_courses_enquiry();
        $data['course_sidebar_enquiry'] = $this->course_sidebar_enquiry($data['selected_certification']);

        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/course/'.$data['course_details']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
}




   public function load_location_course_template($parent_course_id , $course_id_detail)
{
        $course_id = $parent_course_id;
        /* echo $course_id;exit; */
        $data['course_details'] = $this->PageBuilder_model->getCourseDetails($course_id_detail);

        $data['selected_certification'] = $data['course_details']['name']; /* Display within Enquiry form on footer */
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); /* gets all URI segments as array */
        /* Build breadcrumbs */
        $breadcrumbs = [];
        $link = base_url(); /* start from base_url */
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

        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($data['course_details']['certification_training_id']); /* print_r($data['certification_details']);exit; */
        $data['course_details']['course_content'] = $data['course_details']['course_content'];
        $data['course_details']['course_overview'] = $data['course_details']['course_overview'];
        $data['course_details']['benefits'] = $data['course_details']['benefits'];
        $data['certification_level_details'] = $this->PageBuilder_model->getCertificationLevelDetails($data['course_details']['certification_level_id']); /* print_r($data['certification_level_details']);exit; */
        $data['course_syllabus'] = $this->PageBuilder_model->getCourseSyllabus($course_id);
        $data['whatlearn'] = $this->PageBuilder_model->getCourseWhatLearn($course_id);
        $location_id = $data['course_details']['location_id'];
        $data['related_certifications'] = $this->PageBuilder_model->getCourseRelatedCertifications($location_id,$data['course_details']['certification_training_id']); /* print_r($data['related_certifications']);exit; */
        $data['course_faq'] = $this->PageBuilder_model->getCourseFaq($course_id);
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'course'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        $data['course_details']['banner_image'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','banner_image','id', $data['course_details']['parent_course_id'])[0]['banner_image'];
        $data['course_details']['banner_img_alt'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','banner_img_alt','id', $data['course_details']['parent_course_id'])[0]['banner_img_alt'];
        //$data['course_details']['image'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','image','id', $data['course_details']['parent_course_id'])[0]['image'];
        $data['course_details']['logo_img_alt'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','logo_img_alt','id', $data['course_details']['parent_course_id'])[0]['logo_img_alt'];
        $data['course_details']['introduction_logo'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','introduction_logo','id', $data['course_details']['parent_course_id'])[0]['introduction_logo'];


        //print_r( $data['course_details']);exit;
        $data['course_footer_enquiry'] = $this->course_footer_enquiry();
        $data['related_courses_enquiry'] = $this->course_related_courses_enquiry();
        $data['course_sidebar_enquiry'] = $this->course_sidebar_enquiry($data['selected_certification']);

        $data['page_title'] = $data['course_details']['metatitle'];
        $data['metakeywords'] = $data['course_details']['metakeywords'];
        $data['metadescription'] = $data['course_details']['metadescription'];
        $data['canonical'] = $data['course_details']['canonical'];
        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/course/'.$data['course_details']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
}
public function load_location_category_template($parent_course_id , $course_id)
{
   /* echo $parent_course_id;echo $course_id;exit; */
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parsedUrl = parse_url($url);
    $path = trim($parsedUrl['path'], '/');
    $segments = $this->uri->segment_array(); /* gets all URI segments as array */
    /* Build breadcrumbs */
    $breadcrumbs = [];
    $link = base_url(); /* start from base_url */
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
    $certification_training_id = $parent_course_id; /* echo $certification_training_id;exit; */
    $data['certification_details'] = $this->PageBuilder_model->getCourseDetails($course_id); /* echo $course_id; print_r($data['certification_details']);exit; */
    $data['certification_details']['benefits'] = $this->PageBuilder_model->getCommonContents('certification-training','benefits','id', $certification_training_id)[0]['benefits'];
    $data['certification_details']['faq'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','faq','id', $course_id)[0]['faq'];
    $data['certification_details']['course_overview'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','course_overview','id', $course_id)[0]['course_overview'];
    $data['certification_details']['course_content'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','course_content','id', $course_id)[0]['course_content'];
    $data['certification_details']['job'] = '';
    $data['selected_certification'] = $this->PageBuilder_model->getCommonContents('certification-training','name','id', $certification_training_id)[0]['name'];
    $data['training_levels_certifications'] = $this->PageBuilder_model->getActiveTrainingLevelsCertifications(0,$certification_training_id); /* print_r($certification_training_id);  Fetch certifications courses based on training id and level 0 */
    $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
    $data['tutors'] = $this->PageBuilder_model->getTutors();
    $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
    $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
    $data['certification_levels'] = $this->PageBuilder_model->getActiveCertificationLevels($certification_training_id , 1); /* certification levels empty or not */
    /* $data['certification_training_certifications'] = $this->certificationTrainingCertifications($certification_training_id); */
    $data['current_page_slug'] = 'certification_category'; /* Depends on slug load css in header */
    $data['page_module_loop_items'] = $this->PageBuilder_model->getPageModuleLoopItems($certification_training_id,'microsoft_module'); /* print_r($data['page_module_loop_items']);  Get microsoft module loop items */

    $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
    $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
    $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
    $data['tutors'] = $this->PageBuilder_model->getTutors();
    $data['gallery'] = $this->PageBuilder_model->getGallery(9);
    $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
    $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
    $data['video'] = $this->PageBuilder_model->getVideo(1);

    $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
    $data['pages'] = $this->PageBuilder_model->getAllPages();
    $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

    $data['certification_details']['banner_image'] = $this->PageBuilder_model->getCommonContents('certification-training','banner_image','id', $certification_training_id)[0]['banner_image'];
    $data['certification_details']['banner_img_alt'] = $this->PageBuilder_model->getCommonContents('certification-training','banner_img_alt','id', $certification_training_id)[0]['banner_img_alt'];
    $data['certification_details']['image'] = $this->PageBuilder_model->getCommonContents('certification-training','image','id', $certification_training_id)[0]['image'];
    $data['certification_details']['logo_img_alt'] = $this->PageBuilder_model->getCommonContents('certification-training','logo_img_alt','id', $certification_training_id)[0]['logo_img_alt'];
    $data['certification_details']['introduction_logo'] = $this->PageBuilder_model->getCommonContents('certification-training','image','id', $certification_training_id)[0]['image'];

    $data['certification_slug'] = $this->PageBuilder_model->getCommonContents('certification-training','slug','id', $data['certification_details']['parent_course_id'])[0]['slug'];
    /* SEO CONTENTS */
    $data['page_title'] = $data['certification_details']['metatitle'];
    $data['metakeywords'] = $data['certification_details']['metakeywords'];
    $data['metadescription'] = $data['certification_details']['metadescription'];
    $data['canonical'] = $data['certification_details']['canonical'];
    /* echo 'template = ' . $data['certification_details']['template_id']; */

    $data['related_courses_enquiry'] = $this->course_related_courses_enquiry();
    $data['course_footer_enquiry'] = $this->course_footer_enquiry();

    $this->load->view('admin/includes/header', $data);
    $this->load->view('template/category/'.$data['certification_details']['template_id'], $data);
    $this->load->view('common_section', $data);
    $this->load->view('admin/includes/footer', $data);
}

   public function load_location_sub_category_template($parent_course_id , $course_id)
{
    /* echo "Sub Category";exit; */
        /* echo $parent_course_id;echo $course_id;exit; */
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); /* gets all URI segments as array */
        /* Build breadcrumbs */
        $breadcrumbs = [];
        $link = base_url(); /* start from base_url */
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
        $level_id = $parent_course_id;
        $data['certification_level_details'] = $this->PageBuilder_model->getCertificationLevelDetails($level_id);

        $data['certification_level_details']['banner_title'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','banner_title','id', $course_id)[0]['banner_title'];
        $data['certification_level_details']['banner_description'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','banner_description','id', $course_id)[0]['banner_description'];
        $data['certification_level_details']['intro_title'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','introduction_title','id', $course_id)[0]['introduction_title'];
        $data['certification_level_details']['introduction_text'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','introduction_text','id', $course_id)[0]['introduction_text'];
        $data['certification_level_details']['faq'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','faq','id', $course_id)[0]['faq'];
        $data['certification_level_details']['benefits'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','benefits','id', $course_id)[0]['benefits'];
        $data['certification_level_details']['content'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','course_overview','id', $course_id)[0]['course_overview'];
        $data['certification_level_details']['certifications'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','course_content','id', $course_id)[0]['course_content'];
        $data['certification_level_details']['banner_image'] = $this->PageBuilder_model->getCommonContents('certification-levels','banner_image','id', $level_id)[0]['banner_image'];
        $data['certification_level_details']['banner_img_alt'] = $this->PageBuilder_model->getCommonContents('certification-levels','banner_img_alt','id', $level_id)[0]['banner_img_alt'];
        $data['certification_level_details']['logo'] = $this->PageBuilder_model->getCommonContents('certification-levels','logo','id', $level_id)[0]['logo'];
        $certification_training_id = $data['certification_level_details']['certification-training-id'];
        $data['certification_details'] = $this->PageBuilder_model->getCertificationDetails($certification_training_id);
        $data['certification_training_image'] = $data['certification_details']['image'];
        $data['training_levels_certifications'] = $this->PageBuilder_model->getActiveTrainingLevelsCertifications($level_id,$certification_training_id); /* Fetch courses or certifications based on levels */
        $data['sub_sub_categories'] = $this->PageBuilder_model->getActiveSubSubCategoriesByCategoryAndSubCategory($level_id,$certification_training_id);/* print_r($data['sub_sub_categories']);exit;  Fetch Sub sub categories or certifications based on levels */
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'certification_subcategory'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        $data['related_courses_enquiry'] = $this->course_related_courses_enquiry();
        $data['sub_category_footer_enquiry'] = $this->sub_category_footer_enquiry();
        $data['sub_category_course_list_enquiry'] = $this->sub_category_course_list_enquiry();

        $data['page_title'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','metatitle','id', $course_id)[0]['metatitle'];
        $data['metakeywords'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','metakeywords','id', $course_id)[0]['metakeywords'];
        $data['metadescription'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','metadescription','id', $course_id)[0]['metadescription'];
        $data['canonical'] = $this->PageBuilder_model->getCommonContents('training-levels-certifications','canonical','id', $course_id)[0]['canonical'];
        $data['selected_certification'] = $data['certification_details']['name'];
        /* echo "Template=". $data['certification_level_details']['template_id'];exit; */
        //print_r($data['certification_level_details']);

        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/subcategory/'.$data['certification_level_details']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
}
public function load_location_sub_sub_category_template($parent_course_id , $course_id)
{
        /* echo "Sub sub category". $parent_course_id;exit; */
        $subsubcategory_id = $parent_course_id;
        $data['parentCourseDetails'] = $this->PageBuilder_model->getSubSubCategoryDetails($parent_course_id);
        /* echo $course_id;print_r($data['parentCourseDetails']);exit; */
        $data['subSubCatDetails'] = $this->PageBuilder_model->getCourseDetails($course_id);
        /* echo $course_id;print_r($data['subSubCatDetails']);exit; */
        $data['subSubCatDetails']['course_overview'] = $data['subSubCatDetails']['course_overview'] ?? '';
        $data['subSubCatDetails']['course_content'] = $data['subSubCatDetails']['course_content'] ?? '';
        $data['subSubCatDetails']['benefits'] = $data['subSubCatDetails']['benefits'] ?? '';
        $data['subSubCatDetails']['faq'] = $data['subSubCatDetails']['faq'] ?? '';
        // $data['subSubCatDetails']['course_overview'] = $this->PageBuilder_model->getCommonContents('sub-sub-categories','course_overview','id', $subsubcategory_id)[0]['course_overview'];
        // $data['subSubCatDetails']['course_content'] = $this->PageBuilder_model->getCommonContents('sub-sub-categories','course_content','id', $subsubcategory_id)[0]['course_content'];
        $data['level_slug'] = $this->PageBuilder_model->getCommonContents('certification-levels','slug','id', $data['subSubCatDetails']['certification_level_id'])[0]['slug']??'';
        $data['cat_slug'] = $this->PageBuilder_model->getCommonContents('certification-training','slug','id', $data['subSubCatDetails']['certification_training_id'])[0]['slug'];
        $data['training_levels_certifications'] = $this->PageBuilder_model->getTrainingLevelsCertificationsBySubSubCategory($subsubcategory_id);
        /* print_r($data['subSubCatDetails']); */
        $data['selected_certification'] = $data['subSubCatDetails']['name'];
        /* Display within Enquiry form on footer */
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl = parse_url($url);
        $path = trim($parsedUrl['path'], '/');
        $segments = $this->uri->segment_array(); /* gets all URI segments as array */
        /* Build breadcrumbs */
        $breadcrumbs = [];
        $link = base_url(); /* start from base_url */
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
        $data['subject_based_courses'] = $this->PageBuilder_model->getSubjectBasedCourses();
        $data['tutors'] = $this->PageBuilder_model->getTutors();
        $data['gallery'] = $this->PageBuilder_model->getGallery(9);
        $data['batches'] = $this->PageBuilder_model->getUpcomingBatches();
        $data['testimonials'] = $this->PageBuilder_model->getTestimonials();
        $data['video'] = $this->PageBuilder_model->getVideo(1);
        $data['current_page_slug'] = 'course'; /* Depends on slug load css in header */
        $headerMenuItems = $this->PageBuilder_model->getMenuItems(1); /* Main menu id is 1 */
        $data['header_menu'] = $this->PageBuilder_model->buildMenu($headerMenuItems);
        $data['course_categories'] = $this->PageBuilder_model->getCourseCategories();
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();

        /* echo $data['parentCourseDetails']['banner_image']; */
        $data['subSubCatDetails']['banner_image'] = $data['parentCourseDetails']['banner_image'];
        $data['subSubCatDetails']['banner_img_alt'] = $data['parentCourseDetails']['banner_img_alt'];
        $data['subSubCatDetails']['course_logo'] = $data['parentCourseDetails']['course_logo'];
        $data['subSubCatDetails']['logo_img_alt'] = $data['parentCourseDetails']['logo_img_alt'];

        $data['related_courses_enquiry'] = $this->course_related_courses_enquiry();
        $data['course_footer_enquiry'] = $this->course_footer_enquiry();

        $data['page_title'] = $data['subSubCatDetails']['metatitle'];
        $data['metakeywords'] = $data['subSubCatDetails']['metakeywords'];
        $data['metadescription'] = $data['subSubCatDetails']['metadescription'];
        $data['canonical'] = $data['subSubCatDetails']['canonical'];
        $this->load->view('admin/includes/header', $data);
        $this->load->view('template/sub_sub_category/'.$data['parentCourseDetails']['template_id'], $data);
        $this->load->view('common_section', $data);
        $this->load->view('admin/includes/footer', $data);
}

public function course_footer_enquiry()
{
    $this->load->view('template/forms/course/course-footer-enquiry');
}
public function course_sidebar_enquiry($selected_certification)
{
    return $this->load->view(
        'template/forms/course/course-sidebar-enquiry.php',
        ['selected_certification' => $selected_certification],
        true
    );
}
public function category_page_footer_enquiry()
{
    $this->load->view('template/forms/category/category-page-footer-enquiry.php');
}
public function category_course_enquiry()
{
    $this->load->view('template/forms/category/category-course-enquiry.php');
}
public function sub_category_footer_enquiry()
{
    $this->load->view('template/forms/sub-category/sub-category-footer-enquiry.php');
}
public function course_related_courses_enquiry()
{
    $this->load->view('template/forms/course/course-related-course-enquiry.php');
}
public function sub_category_course_list_enquiry()
{
    $this->load->view('template/forms/sub-category/sub-category-course-list-enquiry.php');
}
public function home_featured_course_enquiry()
{
    return $this->load->view('template/forms/home/home-featured-course-enquiry.php', [], true);
}
public function landing_featured_course_enquiry()
{
    return $this->load->view('template/forms/landing/landing-featured-course-enquiry.php', [], true);
}
public function corporate_training_footer_enquiry()
{
    $this->load->view('template/forms/corporate-training/corporate-training-footer-enquiry.php');
}
public function contact_us_page_enquiry()
{
    return $this->load->view('template/forms/contact-us/contact-us-page-enquiry.php', [], true);
}

public function save_editor()
{
    $this->load->view('editor');
}
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

public function test1()
{
    $this->load->view('test');
}
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

        // Mobile uniqueness check
       $existing = $this->db
            ->where('mobile', $data['mobile'])
            ->or_where('whatsapp', $data['whatsapp'])
            ->get('enquiries')
            ->row();
        if ($existing) {
            echo json_encode(['status' => 'exist', 'message' => 'This mobile number is already registered.']);
            return;
        }

        /* Save to DB */
        $insert_data = [
            'full_name' => $data['name'],
            'email' => $data['email'],
            'country_code' => $data['e_code'],
            'mobile' => $data['mobile'],
            'whatsapp' => $data['whatsapp'],
            'course' => $data['course'],
            'message' => $data['message'],
            'country' => $data['country'],
            'state_city' => '',
            'qualification' => '',
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
public function save_sidebar_enquiry()
{
    if ($this->input->is_ajax_request())
     {
        $data = json_decode(file_get_contents('php://input'), true);

        /* Save to DB */
        $insert_data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'code' => $data['code'],
            'status' => 'Pending',
            'enq_date' => date('Y-m-d'),
        ];

        $this->db->insert('sidebar_enquiries', $insert_data);
        echo json_encode(['status' => 'success']);
    }
}
}

