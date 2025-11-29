<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('admin/PageBuilder_model');

    }

    public function index()
    {
        $data['categories'] = $this->PageBuilder_model->getCategory(); //Certifications list
        $this->load->view('admin/template/header');
        $this->load->view('admin/categories/list', $data);
        $this->load->view('admin/template/footer');
    }
    public function create()
    {
        $template_type = 'category';
        $this->load->view('admin/template/header');
        $this->load->view('admin/categories/create');
        $this->load->view('admin/template/footer');
    }
    public function save() {
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title           = $this->input->post('title');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $description     = $this->input->post('meta_description');
            $category_title    = $this->input->post('category_title');
            $category_text     = $this->input->post('category_text');
            $schema            = $this->input->post('page_schema');
            $link               = $this->input->post('category_link');

            // Upload banner image
            $category_image = '';
            if (!empty($_FILES['category_image']['name'])) {
                $config['upload_path']   = './uploads/category/';
                 $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['category_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('category_image')) {
                    $uploadData    = $this->upload->data();
                    $category_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }

      
            // Save to DB via model
            $data = [
                'slug'          => $slug,
                'metatitle'         => $title,
                'metakeywords'      => $keywords,
                'metadescription'   => $description,
                'canonical'         => $slug,
                'page_schema' =>  $schema,
                'category_title'  => $category_title,
                'category_description'   => $category_text,
                'category_image'  => $category_image,
                'category_link' => $link ?? 0,
                'is_active' => 0
            ];

            $inserted = $this->db->insert('product_category', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'Category saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save category.']);
            }
        }
    }
    public function edit($category_id)
    {
        $data['category'] = $this->PageBuilder_model->getCategoryDetails($category_id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/categories/edit',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_category()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title           = $this->input->post('title');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $description     = $this->input->post('meta_description');
            $category_title    = $this->input->post('category_title');
            $category_text     = $this->input->post('category_text');
            $schema            = $this->input->post('page_schema');
            //$link               = $this->input->post('category_link');

            // Upload banner image
            $category_image = '';
            if (!empty($_FILES['category_edit_image']['name']))
            {
                // echo "here"; exit;
                // Delete the old image file if it exists
                $old_banner_image = $this->input->post('old_category_image');
                $upload_banner_path = './uploads/category/';
                if (file_exists($upload_banner_path . $old_banner_image) && is_file($upload_banner_path . $old_banner_image)) {
                    unlink($upload_banner_path . $old_banner_image);
                }
                $config['upload_path']   = './uploads/category/';
                $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['category_edit_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('category_edit_image')) {
                    $uploadData    = $this->upload->data();
                    $category_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                // echo "doesnt image";
                $category_image = $this->input->post('old_category_image', TRUE);
            }

         
            // Save to DB via model
            $data = [
                'slug'          => $slug,
                'metatitle'         => $title,
                'metakeywords'      => $keywords,
                'metadescription'   => $description,
                'canonical'         => $slug,
                'page_schema' =>  $schema,
                'category_title'  => $category_title,
                'category_description'   => $category_text,
                'category_image'  => $category_image,
                'category_link' => $link ?? 0,
                'is_active' => 0
            ];

            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('product_category', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'Category updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save category.']);
            }
        }
    }

    public function update_category_status()
    {
        // Read JSON input
        $json = json_decode(file_get_contents("php://input"), true);
        $id = (int) $json['id'];
        $is_active = (int) $json['is_active'];
        $updated = $this->PageBuilder_model->updateCategoryStatus($id, $is_active);
        if ($updated) {
            echo json_encode(['status' => true, 'message' => 'Status changed successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Update failed']);
        }
    }

}

