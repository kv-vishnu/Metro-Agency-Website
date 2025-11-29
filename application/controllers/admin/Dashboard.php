<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/PageBuilder_model');
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}
	public function index()
	{
		// echo "here";
		$data['title'] = 'Dashboard';
		$data['counts'] = $this->PageBuilder_model->get_counts(); //print_r($data['counts']);exit;
		$this->load->view('admin/template/header');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/template/footer');
	}


	public function contactus()
	{
		$data['contactus'] = $this->PageBuilder_model->getContactus(); //Certifications list
		$this->load->view('admin/template/header');
		$this->load->view('admin/contactus', $data);
		$this->load->view('admin/template/footer');
	}

	public function update_contactus(){
		 $contact_id = $this->input->post('contact_id', TRUE);
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $remarks           = $this->input->post('remarks');
            $status            = $this->input->post('status');

            // Save to DB via model
            $data = [
               'remarks'         => $remarks ?? 0,
			   'status'          => $status
            ];



            // print_r($data); exit;
            $this->db->where('id', $contact_id); // Replace 'id' with your primary key column
            $inserted = $this->db->update('contact_us', $data);

            if ($inserted) {
                echo json_encode(['status' => true,'message' => 'career saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Career.']);
            }
        }   
	}

	    public function update_contact_status(){
        $status = $this->input->post('status');
        $data['contactus'] = $this->PageBuilder_model->update_contact_status($status);
        $html = $this->load->view('admin/contactus', $data, TRUE);
         echo json_encode(['html' => $html]);
  
    }
}