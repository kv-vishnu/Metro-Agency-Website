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
        // echo "here";
        $data['pages'] = $this->PageBuilder_model->getAllPages();
        // $data['categories'] = $this->PageBuilder_model->getCategory();
        // $data['subcategories'] = $this->PageBuilder_model->getSubcategories();
        // $data['subsubcategories'] = $this->PageBuilder_model->getSubSubcategoriesSearch();
        // $data['courses'] = $this->PageBuilder_model->getCoursesList();
        $this->load->view('admin/template/header');
        $this->load->view('admin/pages/list', $data);
        $this->load->view('admin/template/footer');
    }

    public function create(){
        $this->load->view('admin/template/header');
        $this->load->view('admin/pages/create');
        $this->load->view('admin/template/footer');
    }


    public function test()
    {
        // $title = 'CyberOps Associate 200-201';
        // $slug = generate_slug($title);echo $slug;exit;
        $this->load->view('admin/template/header');
        $this->load->view('test');
        $this->load->view('admin/template/footer');
    }

       //Edit page
    public function edit($page_id)
    {
        if($page_id == 7) //If it is corporate-training page
        {
           
            $data['page_details'] = $this->PageBuilder_model->getPage($page_id);
            $data['slug'] = $data['page_details']['slug'];
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/pages/edit_manfacture_page', $data);
            $this->load->view('admin/template/footer');
            return;
        }
        if($page_id == 9) //If it is about-us page
        {
            $data['contents'] = $this->PageBuilder_model->getPageContents('page_aboutus');
            $data['page_details'] = $this->PageBuilder_model->getPage($page_id);
            $data['slug'] = $data['page_details']['slug'];
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/pages/edit_about_us_page', $data);
            $this->load->view('admin/template/footer');
            return;
        }

         if($page_id == 2) //If it is product page
        {
            // $data['contents'] = $this->PageBuilder_model->getPageContents('page_product');
            $data['page_details'] = $this->PageBuilder_model->getPage($page_id);
            // print_r($data['page_details']);
            $data['slug'] = $data['page_details']['slug'];
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/pages/edit_product_page', $data);
            $this->load->view('admin/template/footer');
            return;
        }


        if($page_id == 11) //If it is product page
        {
            // $data['contents'] = $this->PageBuilder_model->getPageContents('page_product');
            $data['page_details'] = $this->PageBuilder_model->getPage($page_id);
            // print_r($data['page_details']);
            $data['slug'] = $data['page_details']['slug'];
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/pages/edit_product_page', $data);
            $this->load->view('admin/template/footer');
            return;
        }
        if($page_id == 3) //If it is contact page
        {
           
            $data['page_details'] = $this->PageBuilder_model->getPage($page_id);
            $data['slug'] = $data['page_details']['slug'];
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/pages/edit_contact_page', $data);
            $this->load->view('admin/template/footer');
            return;
        }
        if($page_id == 8) //If it is Training and tech support page
        {
          
            $data['page_details'] = $this->PageBuilder_model->getPage($page_id);
            $data['slug'] = $data['page_details']['slug'];
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/pages/edit_infrastructure_page', $data);
            $this->load->view('admin/template/footer');
            return;
        }
    $sections = $this->PageBuilder_model->getSections($page_id);

   
    }


    //Render Unstructured elements outside row
   
    public function update_field()
    {
        $field = $this->input->post('field');
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $value = $this->input->post('value');
       

        if ($field && $table && $id) {
            if($table == 'pages')
            {
               
                $this->db->where('page_id', $id);
            }
            else
            {
                echo "test2";
                $this->db->where('page_id', $id);
            }
            $this->db->update($table, [$field => $value]);

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Missing data']);
        }
    }


    public function update_status()
    {
          // Read JSON input
        $json = json_decode(file_get_contents("php://input"), true);
        $id = (int) $json['id'];
        $is_active = (int) $json['is_active'];
        $updated = $this->PageBuilder_model->updatePageStatus($id, $is_active);
        if ($updated) {
            echo json_encode(['status' => true, 'message' => 'Status changed successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Update failed']);
        }
    }

    public function update_image()
    {
        $field = $this->input->post('field');
        $table = $this->input->post('table');
        $old_image = $this->input->post('oldimg');
        $upload_path = $this->input->post('upload_path');
        $id = $this->input->post('id');

        if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {

           $old_file_path = (strpos($old_image, $upload_path) === false) ? $upload_path . basename($old_image) : $old_image;

            if (file_exists($old_file_path) && is_file($old_file_path)) {
                unlink($old_file_path);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG'; // Your allowed types
            $config['max_size'] = 2048;
            $config['file_name'] = uniqid('img_');

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image_path = $upload_path . $upload_data['file_name'];

                // Update database
                if($table == 'pages')
                {
                    $this->db->where('page_id', $id);
                }
                else
                {
                    $this->db->where('id', $id);
                }
                $this->db->update($table, [$field => $image_path]);

                echo json_encode(['status' => 'success', 'image_url' => base_url($image_path)]);
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
        }
    }







}