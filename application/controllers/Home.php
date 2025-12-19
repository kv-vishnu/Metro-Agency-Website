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
    // echo "here";
    if($slug == 'home')
    {
      $page = $this->PageBuilder_model->getPageBySlug($slug);

    if (!$page) {
        show_404();
    }

    // Send meta data to view
        $data['metatitle']        = $page['metatitle'];
        $data['metakeywords']     = $page['metakeywords'];
        $data['metadescription']  = $page['metadescription'];
        $data['canonical']        = base_url($slug);
        $data['page_title']       = $page['page_heading']; // Or another title
        $data['slug']             = $slug;
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
        $page = $this->PageBuilder_model->getPageBySlug($slug);

    if (!$page) {
        show_404();
    }

    // Send meta data to view
        $data['metatitle']        = $page['metatitle'];
        $data['metakeywords']     = $page['metakeywords'];
        $data['metadescription']  = $page['metadescription'];
        $data['canonical']        = base_url($slug);
        $data['page_title']       = $page['page_heading']; // Or another title
        $data['slug']             = $slug;
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

    if($slug == 'aboutus')
    {
        $page = $this->PageBuilder_model->getPageBySlug($slug);

    if (!$page) {
        show_404();
    }

    // Send meta data to view
        $data['metatitle']        = $page['metatitle'];
        $data['metakeywords']     = $page['metakeywords'];
        $data['metadescription']  = $page['metadescription'];
        $data['canonical']        = base_url($slug);
        $data['page_title']       = $page['page_heading']; // Or another title
        $data['slug']             = $slug;
        $data['current_page_slug'] = 'aboutus'; /* Depends on slug load css in header */
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
        $page = $this->PageBuilder_model->getPageBySlug($slug);

    if (!$page) {
        show_404();
    }

    // Send meta data to view
        $data['metatitle']        = $page['metatitle'];
        $data['metakeywords']     = $page['metakeywords'];
        $data['metadescription']  = $page['metadescription'];
        $data['canonical']        = base_url($slug);
        $data['page_title']       = $page['page_heading']; // Or another title
        $data['slug']             = $slug;
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
        $page = $this->PageBuilder_model->getPageBySlug($slug);

    if (!$page) {
        show_404();
    }

    // Send meta data to view
        $data['metatitle']        = $page['metatitle'];
        $data['metakeywords']     = $page['metakeywords'];
        $data['metadescription']  = $page['metadescription'];
        $data['canonical']        = base_url($slug);
        $data['page_title']       = $page['page_heading']; // Or another title
        $data['slug']             = $slug;
        // echo "here";
        $data['current_page_slug'] = 'manfacturingunits'; /* Depends on slug load css in header */
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['manfacturingheader'] = $this->PageBuilder_model->getManfacturingcontent(7);
        $data['manufacturing'] = $this->PageBuilder_model->getManufactureList();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/manfacturing',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }


    if($slug == 'infrastructure')
    {
        $page = $this->PageBuilder_model->getPageBySlug($slug);

    if (!$page) {
        show_404();
    }

    // Send meta data to view
        $data['metatitle']        = $page['metatitle'];
        $data['metakeywords']     = $page['metakeywords'];
        $data['metadescription']  = $page['metadescription'];
        $data['canonical']        = base_url($slug);
        $data['page_title']       = $page['page_heading']; // Or another title
        $data['slug']             = $slug;
        $data['current_page_slug'] = 'infrastructure'; /* Depends on slug load css in header */
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['infrastructureheader'] = $this->PageBuilder_model->getInfrastructurecontent(8);
        $data['infrastructure'] = $this->PageBuilder_model->getInfrastructureList();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/infrastructure',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
        //echo "here home";exit;
    }


    if($slug == 'product')
    {
    $data['current_page_slug'] = 'product'; /* Depends on slug load css in header */
    $manfacture_category_id = $this->input->post('manfacture_category_id'); 
    // echo $manfacture_category_id; exit;
    if($manfacture_category_id)
{
    $page = $this->PageBuilder_model->getPageBySlug($slug);

    if (!$page) {
        show_404();
    }

    // Send meta data to view
        $data['metatitle']        = $page['metatitle'];
        $data['metakeywords']     = $page['metakeywords'];
        $data['metadescription']  = $page['metadescription'];
        $data['canonical']        = base_url($slug);
        $data['page_title']       = $page['page_heading']; // Or another title
        $data['slug']             = $slug;
       $manfacture_ids = explode(',', $manfacture_category_id);
       $data['manfacture_ids'] = $manfacture_category_id;
       $data['products'] = $this->PageBuilder_model->getManufactureproductsByIds($manfacture_ids);
       $data['categories'] = $this->PageBuilder_model->getManufactureCategoryList($manfacture_ids);
       $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
       $data['productheader'] = $this->PageBuilder_model->getProductcontent(2);
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/product',$data);
        $this->load->view('admin/includes/footer',$data);
        return;
}
    else
{
    $page = $this->PageBuilder_model->getPageBySlug($slug);

    if (!$page) {
        show_404();
    }

    // Send meta data to view
        $data['metatitle']        = $page['metatitle'];
        $data['metakeywords']     = $page['metakeywords'];
        $data['metadescription']  = $page['metadescription'];
        $data['canonical']        = base_url($slug);
        $data['page_title']       = $page['page_heading']; // Or another title
        $data['slug']             = $slug;
        $data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
        $data['productheader'] = $this->PageBuilder_model->getProductcontent(2);
        $data['categories'] = $this->PageBuilder_model->getCategoryList();
        $data['products'] = $this->PageBuilder_model->getProductList();
        // $data['units'] = $this->PageBuilder_model->getCategoryListManufactureUnitWise();
        $this->load->view('admin/includes/header',$data);
        $this->load->view('website/product',$data);
        $this->load->view('admin/includes/footer',$data);
        return;  
}
        //echo "here home";exit;
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

