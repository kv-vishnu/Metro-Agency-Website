<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('admin/PageBuilder_model');

    }

    public function index()
    {
        $data['settings'] = $this->PageBuilder_model->getSettings(); //Certifications list
        $this->load->view('admin/template/header');
        $this->load->view('admin/settings/list', $data);
        $this->load->view('admin/template/footer');
    }
    public function create()
    {
        $template_type = 'category';
        $this->load->view('admin/template/header');
        $this->load->view('admin/settings/create');
        $this->load->view('admin/template/footer');
    }
    public function save() {
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $address             = $this->input->post('address');
            $phone_no            = $this->input->post('phone_no');
            $email               = $this->input->post('email');
            $working_hours       = $this->input->post('working_hours');


            
            // Upload banner image
           
            // Save to DB via model
            $data = [
                'address'          => $address,
                'phone_no'         => $phone_no,
                'email'      => $email,
                'working_hours'   => $working_hours,
                'is_active' => 0
            ];

            // print_r($data);exit;

            $inserted = $this->db->insert('tbl_settings', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'Settings saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save settings.']);
            }
        }
    }
    public function edit($id)
    {
        $data['settings'] = $this->PageBuilder_model->getSettingsDetails($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/settings/edit',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_settings()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $address             = $this->input->post('address');
            $phone_no            = $this->input->post('phone_no');
            $email               = $this->input->post('email');
            $working_hours       = $this->input->post('working_hours');
           
            // Save to DB via model
            $data = [
                'address'          => $address,
                'phone_no'         => $phone_no,
                'email'      => $email,
                'working_hours'   => $working_hours,
                'is_active' => 0
            ];
            
            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('tbl_settings', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'Settings updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to update settings.']);
            }
        }
    }



}