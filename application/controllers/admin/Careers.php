<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Careers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('admin/PageBuilder_model');

    }

    public function index()
    {
        $data['careers'] = $this->PageBuilder_model->getCareers();
        $this->load->view('admin/template/header');
        $this->load->view('admin/careers/list', $data);
        $this->load->view('admin/template/footer');
    }
    public function create()
    {
        $template_type = 'careers';
        $this->load->view('admin/template/header');
        $this->load->view('admin/careers/create');
        $this->load->view('admin/template/footer');
    }
    public function save() {
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $job_name     = $this->input->post('job');
            $job_description    = $this->input->post('description');
            $job_experience    = $this->input->post('experience');
            $job_location    = $this->input->post('location');

            // Upload banner image


      
            // Save to DB via model
            $data = [
                'job'  => $job_name,
                'description' => $job_description,
                'experience' => $job_experience,
                'location' => $job_location,
                'is_active' => 0
            ];

            $inserted = $this->db->insert('tbl_career', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'Category saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save category.']);
            }
        }
    }
    public function edit($id)
    {
        $data['careers'] = $this->PageBuilder_model->getCareersDetails($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/careers/edit',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_career()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $job_name     = $this->input->post('job');
            $job_description    = $this->input->post('description');
             $job_experience    = $this->input->post('experience');
            $job_location    = $this->input->post('location');


           

         
            // Save to DB via model
         $data = [
                'job'  => $job_name,
                'description' => $job_description,
                'experience' => $job_experience,
                'location' => $job_location,
                'is_active' => 0
            ];


            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('tbl_career', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'Category updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save category.']);
            }
        }
    }

    public function update_career_status()
    {
        // Read JSON input
        $json = json_decode(file_get_contents("php://input"), true);
        $id = (int) $json['id'];
        $is_active = (int) $json['is_active'];
        $updated = $this->PageBuilder_model->updateCareerStatus($id, $is_active);
        if ($updated) {
            echo json_encode(['status' => true, 'message' => 'Status changed successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Update failed']);
        }
    }




}

