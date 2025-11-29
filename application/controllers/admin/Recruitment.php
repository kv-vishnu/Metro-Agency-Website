<?php class Recruitment extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->library('upload');
        $this->load->model('admin/PageBuilder_model');
	}

    public function index()
    {
        
        $data['recruitment'] = $this->PageBuilder_model->getRecruitment(); //Certifications list
        $this->load->view('admin/template/header');
        $this->load->view('admin/recruitment/list', $data);
        $this->load->view('admin/template/footer');
    }


    public function getRecruitmentDetails($id)
{
    $row = $this->db->where('id', $id)->get('tbl_recruitment')->row_array();
  echo json_encode([
         'remarks' => $row['remarks'],
        'status' => $row['status']
       

    ]);
}

    	public function update_recruitment(){
		 $recruitment_id = $this->input->post('recruitment_id', TRUE);
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $remarks           = $this->input->post('remarks');
            $status            = $this->input->post('status');

            // Save to DB via model
            $data = [
               'remarks'         => $remarks ?? 0,
			   'status'          => $status
            ];



            // print_r($data); exit;
            $this->db->where('id', $recruitment_id); // Replace 'id' with your primary key column
            $inserted = $this->db->update('tbl_recruitment', $data);

            if ($inserted) {
                echo json_encode(['status' => true,'message' => 'career saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Career.']);
            }
        }   
	}

    public function update_recruitment_status(){
        $status = $this->input->post('status');
        $data['recruitment'] = $this->PageBuilder_model->update_recruitment_status($status);
        $html = $this->load->view('admin/recruitment/list', $data, TRUE);
         echo json_encode(['html' => $html]);
        // $this->load->view('admin/template/header');
        // $this->load->view('admin/recruitment/list',$data);
        // $this->load->view('admin/template/footer');
  
    }
}


?>