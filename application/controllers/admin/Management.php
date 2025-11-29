<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('admin/PageBuilder_model');

    }

    public function index()
    {
        $data['management'] = $this->PageBuilder_model->getManagement(); //Certifications list
        $this->load->view('admin/template/header');
        $this->load->view('admin/management/list', $data);
        $this->load->view('admin/template/footer');
    }
    public function create()
    {
        $template_type = 'Management';
        $this->load->view('admin/template/header');
        $this->load->view('admin/management/create');
        $this->load->view('admin/template/footer');
    }
    public function save() {
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name    = $this->input->post('management_name');
            $designation     = $this->input->post('management_description');
            $bio              = $this->input->post('short_bio');

            // Upload banner image
            $management_image = '';
            if (!empty($_FILES['management_image']['name'])) {
                $config['upload_path']   = './uploads/management/';
                 $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['management_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('management_image')) {
                    $uploadData    = $this->upload->data();
                    $management_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }

      
            // Save to DB via model
            $data = [
                'name'  => $name,
                'designation' => $designation,
                'short_bio' => $bio,
                'management_image' => $management_image,
                'is_active' => 0
            ];

            $inserted = $this->db->insert('tbl_management', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'Management saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Management.']);
            }
        }
    }
    public function edit($id)
    {
        $data['management'] = $this->PageBuilder_model->getManagementDetails($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/management/edit',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_management()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $name    = $this->input->post('management_name');
            $designation     = $this->input->post('management_description');
            $bio              = $this->input->post('short_bio');

            //$link               = $this->input->post('category_link');

            // Upload banner image
            $management_image = '';
            if (!empty($_FILES['edit_management_image']['name']))
            {
                // echo "here"; exit;
                // Delete the old image file if it exists
                $old_banner_image = $this->input->post('old_management_image');
                $upload_banner_path = './uploads/management/';
                if (file_exists($upload_banner_path . $old_banner_image) && is_file($upload_banner_path . $old_banner_image)) {
                    unlink($upload_banner_path . $old_banner_image);
                }
                $config['upload_path']   = './uploads/management/';
                $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['edit_management_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('edit_management_image')) {
                    $uploadData    = $this->upload->data();
                    $management_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                // echo "doesnt image";
                $management_image = $this->input->post('old_management_image', TRUE);
            }

         
            // Save to DB via model
            $data = [
                'name'  => $name,
                'designation' => $designation,
                'short_bio' => $bio,
                'management_image' => $management_image,
                'is_active' => 0
            ];

            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('tbl_management', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'Management updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Management.']);
            }
        }
    }

    public function update_management_status()
    {
        // Read JSON input
        $json = json_decode(file_get_contents("php://input"), true);
        $id = (int) $json['id'];
        $is_active = (int) $json['is_active'];
        $updated = $this->PageBuilder_model->updateManagementStatus($id, $is_active);
        if ($updated) {
            echo json_encode(['status' => true, 'message' => 'Status changed successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Update failed']);
        }
    }

}

