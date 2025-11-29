<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/PageBuilder_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['subcategories'] = $this->PageBuilder_model->getSubcategories(); //Levels under each certification training
        $this->load->view('admin/template/header');
        $this->load->view('admin/subcategories/list', $data);
        $this->load->view('admin/template/footer');
    }
    public function create()
    {
        $template_type = 'subcategory';
        $data['templates'] = $this->PageBuilder_model->getAllTemplates($template_type);
        $data['categories'] = $this->PageBuilder_model->getCertifications();
        $this->load->view('admin/template/header');
        $this->load->view('admin/subcategories/create',$data);
        $this->load->view('admin/template/footer');
    }
    public function save() {
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $select_category_template = $this->input->post('select_category_template');
            $category           = $this->input->post('category');
            $title           = $this->input->post('title');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $metadescription     = $this->input->post('metadescription');
            $description     = $this->input->post('home_desc');
            $banner_title    = $this->input->post('banner_title');
            $banner_text     = $this->input->post('banner_text');
            $intro_title     = $this->input->post('intro_title');
            $intro_text      = $this->input->post('intro_text');
            $content  = $this->input->post('content');
            $certifications  = $this->input->post('certifications');
            $benefits      = $this->input->post('benefits');
            $job      = $this->input->post('job');
            $faq      = $this->input->post('faq');


            // Upload banner image
            $banner_image = '';
            if (!empty($_FILES['banner_image']['name'])) {
                $config['upload_path']   = './uploads/certifications/levels/banner/';
                $config['allowed_types'] = 'webp|avif|svg';
                $config['file_name']     = $_FILES['banner_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('banner_image')) {
                    $uploadData    = $this->upload->data();
                    $banner_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }

            // Upload intro image
            $intro_image = '';
            if (!empty($_FILES['intro_image']['name'])) {
                $config['upload_path']   = './uploads/certifications/levels/';
                $config['allowed_types'] = 'webp|avif|svg';
                $config['file_name']     = $_FILES['intro_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('intro_image')) {
                    $uploadData   = $this->upload->data();
                    $intro_image = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }

            // Upload intro image
            $logo = '';
            if (!empty($_FILES['logo']['name'])) {
                $config['upload_path']   = './uploads/certifications/levels/logo/';
                $config['allowed_types'] = 'webp|avif|svg';
                $config['file_name']     = $_FILES['logo']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo')) {
                    $uploadData   = $this->upload->data();
                    $logo = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }

            // Save to DB via model
            $data = [
                'certification-training-id' => $category,
                'template_id' => $select_category_template,
                'name'         => $title,
                'slug'          => $slug,
                'metakeywords'      => $keywords,
                'metadescription'   => $metadescription,
                'banner_title'  => $banner_title,
                'banner_description'   => $banner_text,
                'banner_image'  => $banner_image,
                'banner_img_alt' => $this->input->post('banner_img_alt'),
                'img_alt' => $this->input->post('img_alt'),
                'intro_title'   => $intro_title,
                'description' => $description,
                'introduction_text'    => $intro_text, //Introduction text
                'image'   => $intro_image,
                'logo' => $logo,
                'logo_img_alt' => $this->input->post('logo_img_alt'),
                'content' => $content,
                'certifications' => $certifications,
                'benefits'      => $benefits,
                'job'      => $job,
                'faq'      => $faq,
                'type'     => 'sub_category', //Certification
                'is_active' => 1
            ];

            //print_r($data);exit;

            $inserted = $this->db->insert('certification-levels', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id, 'message' => 'Subcategory saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save category.']);
            }
        }
    }
    public function edit($subcategory_id)
    {
        $template_type = 'subcategory';
        $data['templates'] = $this->PageBuilder_model->getAllTemplates($template_type);
        $data['categories'] = $this->PageBuilder_model->getCertifications();
        $data['subcategory'] = $this->PageBuilder_model->getCertificationLevelDetails($subcategory_id);
        $data['cat_slug'] = $this->PageBuilder_model->getCategorySlug($data['subcategory']['certification-training-id']);
        $data['category'] = $this->PageBuilder_model->getCertificationDetails($data['subcategory']['certification-training-id']);//print_r($data['category']['name']);exit;
        $data['courses'] = $this->PageBuilder_model->getActiveTrainingLevelsCertifications($subcategory_id,$data['subcategory']['certification-training-id']); //Fetch courses or certifications based on levels
        $data['subsub_categories'] = $this->PageBuilder_model->getSubSubCategoriesByCategoryAndSubCategory($subcategory_id,$data['subcategory']['certification-training-id']);//print_r($data['sub_sub_categories']);exit; //Fetch Sub sub categories or certifications based on levels
        $data['cat_name'] = $data['category']['name'];
        $this->load->view('admin/template/header');
        $this->load->view('admin/subcategories/edit',$data);
        $this->load->view('admin/template/subcategory/' . $data['subcategory']['template_id'] . '_edit', $data);
        $this->load->view('admin/template/footer');
    }
    public function update_subcategory()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $select_category_template = $this->input->post('select_category_template');
            $category           = $this->input->post('category');
            $title           = $this->input->post('title');
            $metatitle           = $this->input->post('metatitle');
            $canonical           = $this->input->post('canonical');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $metadescription     = $this->input->post('metadescription');
            $page_schema     = $this->input->post('page_schema');
            $description     = $this->input->post('home_desc');
            $banner_title    = $this->input->post('banner_title');
            $banner_text     = $this->input->post('banner_text');
            $intro_title     = $this->input->post('intro_title');
            $intro_text      = $this->input->post('intro_text');
            $content      = $this->input->post('content');
            $certifications  = $this->input->post('certifications');
            $benefits      = $this->input->post('benefits');
            $job      = $this->input->post('job');
            $faq      = $this->input->post('faq');
            $status      = $this->input->post('status');
            $location_courses      = $this->input->post('location_courses');

            // Upload banner image
            $banner_image = '';
            if (!empty($_FILES['banner_image']['name']))
            {
                // Delete the old image file if it exists
                $old_banner_image = $this->input->post('old_banner_image');
                $upload_banner_path = './uploads/certifications/levels/banner/';
                if (file_exists($upload_banner_path . $old_banner_image) && is_file($upload_banner_path . $old_banner_image)) {
                    unlink($upload_banner_path . $old_banner_image);
                }

                $config['upload_path']   = './uploads/certifications/levels/banner/';
                $config['allowed_types'] = 'webp|avif|svg';
                $config['file_name']     = $_FILES['banner_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('banner_image')) {
                    $uploadData    = $this->upload->data();
                    $banner_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                $banner_image = $this->input->post('old_banner_image', TRUE);
            }

            // Upload intro image
            $intro_image = '';
            if (!empty($_FILES['intro_image']['name'])) {

                // Delete the old image file if it exists
                $old_intro_image = $this->input->post('old_intro_image');
                $upload_introduction_path = './uploads/certifications/levels/';
                if (file_exists($upload_introduction_path . $old_intro_image) && is_file($upload_introduction_path . $old_intro_image)) {
                    unlink($upload_introduction_path . $old_intro_image);
                }

                $config['upload_path']   = './uploads/certifications/levels/';
                $config['allowed_types'] = 'webp|avif|svg';
                $config['file_name']     = $_FILES['intro_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('intro_image')) {
                    $uploadData   = $this->upload->data();
                    $intro_image = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                $intro_image = $this->input->post('old_intro_image', TRUE);
            }

            // Upload intro image
            $logo = '';
            if (!empty($_FILES['logo']['name'])) {

                // Delete the old image file if it exists
                $old_logo_image = $this->input->post('old_logo');
                $upload_logo_path = './uploads/certifications/levels/logo/';
                if (file_exists($upload_logo_path . $old_logo_image) && is_file($upload_logo_path . $old_logo_image)) {
                    unlink($upload_logo_path . $old_logo_image);
                }

                $config['upload_path']   = './uploads/certifications/levels/logo/';
                $config['allowed_types'] = 'webp|avif|svg';
                $config['file_name']     = $_FILES['logo']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo')) {
                    $uploadData   = $this->upload->data();
                    $logo = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                $logo = $this->input->post('old_logo', TRUE);
            }

            // Save to DB via model
            $data = [
                'certification-training-id' => $category,
                'template_id' => $select_category_template,
                'metatitle'    => $metatitle,
                'canonical'    => $canonical,
                'name'         => $title,
                'slug'          => $slug,
                'metakeywords'      => $keywords,
                'metadescription'   => $metadescription,
                'page_schema'   => $page_schema,
                'banner_title'  => $banner_title,
                'banner_description'   => $banner_text,
                'banner_image'  => $banner_image,
                'banner_img_alt' => $this->input->post('banner_img_alt'),
                'img_alt' => $this->input->post('img_alt'),
                'intro_title'   => $intro_title,
                'description' => $description,
                'introduction_text'    => $intro_text, //Introduction text
                'image'   => $intro_image,
                'logo' => $logo,
                'logo_img_alt' => $this->input->post('logo_img_alt'),
                'content' => $content,
                'certifications' => $certifications,
                'benefits'      => $benefits,
                'job'      => $job,
                'faq'      => $faq,
                'location_courses' => $location_courses
            ];

            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('certification-levels', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'Subategory updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save category.']);
            }
        }
    }

    public function update_subcategory_status()
    {
        // Read JSON input
        $json = json_decode(file_get_contents("php://input"), true);
        $id = (int) $json['id'];
        $is_active = (int) $json['is_active'];
        $updated = $this->PageBuilder_model->updateSubCategoryStatus($id, $is_active);
        if ($updated) {
            echo json_encode(['status' => true, 'message' => 'Status changed successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Update failed']);
        }
    }
}