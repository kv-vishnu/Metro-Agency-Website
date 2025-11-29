<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infrastructure extends CI_Controller {

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
          $this->load->library('upload');
		$this->load->model('admin/PageBuilder_model');
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}

    public function index()
    {

        $data['infrastructure'] = $this->PageBuilder_model->getInfrastructure();
        $this->load->view('admin/template/header');
        $this->load->view('admin/infrastructure/list',$data);
        $this->load->view('admin/template/footer');
    }


        public function edit($id)
    {
        $data['infrastructure'] = $this->PageBuilder_model->getInfrastructureDetails($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/infrastructure/edit',$data);
        $this->load->view('admin/template/footer');
    }

    public function create()
    {
        $template_type = 'infrastructure';
        $this->load->view('admin/template/header');
        $this->load->view('admin/infrastructure/create');
        $this->load->view('admin/template/footer');
    }




        public function save() {
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
            $title           = $this->input->post('title');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $description     = $this->input->post('meta_description');
            $schema = $this->input->post('page_schema');
            $infrastructure_title    = $this->input->post('infrastructure_title');
            $infrastructure_description     = $this->input->post('infrastructure_description');




// echo "here";
            // Upload banner image
            $infrastructure_image = '';
            if (!empty($_FILES['infrastructure_image']['name'])) {
                $config['upload_path']   = './uploads/infrastructure/';
                 $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['infrastructure_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('infrastructure_image')) {
                    $uploadData    = $this->upload->data();
                    $infrastructure_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }

      
            // Save to DB via model
            $data = [
                'slug'          => $slug,
                'metatitle'         => $title,
                'metakeyword'      => $keywords,
                'metadescription'   => $description,
                'page_schema' =>  $schema ?? 0,
                'infrastructure_title'  => $infrastructure_title,
                'infrastructure_description'   => $infrastructure_description,
                'infrastructure_image'  => $infrastructure_image,
                'is_active' => 0
            ];

           

            $inserted = $this->db->insert('tbl_infrastructure', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'Infrastructure saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Infrastructure.']);
            }
        }
    }


        public function update_infrastructure()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title           = $this->input->post('title');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $description     = $this->input->post('meta_description');
            $infrastructure_title    = $this->input->post('infrastructure_title');
            $infrastructure_description     = $this->input->post('infrastructure_description');
            $schema            = $this->input->post('page_schema');
            //$link               = $this->input->post('category_link');

            // Upload banner image
            $infrastructure_image = '';
            if (!empty($_FILES['infrastructure_edit_image']['name']))
            {
                // echo "here"; exit;
                // Delete the old image file if it exists
                $old_banner_image = $this->input->post('old_infrastructure_image');
                $upload_banner_path = './uploads/infrastructure/';
                if (file_exists($upload_banner_path . $old_banner_image) && is_file($upload_banner_path . $old_banner_image)) {
                    unlink($upload_banner_path . $old_banner_image);
                }
                $config['upload_path']   = './uploads/infrastructure/';
                $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['infrastructure_edit_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('infrastructure_edit_image')) {
                    $uploadData    = $this->upload->data();
                    $infrastructure_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                // echo "doesnt image";
                $infrastructure_image = $this->input->post('old_infrastructure_image', TRUE);
            }

         
            // Save to DB via model
             $data = [
                'slug'          => $slug,
                'metatitle'         => $title,
                'metakeyword'      => $keywords,
                'metadescription'   => $description,
                'page_schema' =>  $schema ?? 0,
                'infrastructure_title'  => $infrastructure_title,
                'infrastructure_description'   => $infrastructure_description,
                'infrastructure_image'  => $infrastructure_image,
                'is_active' => 0
            ];

            // print_r($data); exit;


            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('tbl_infrastructure', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'infrastructure updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save infrastructure.']);
            }
        }
    }

      public function update_infrastructure_status()
    {
        // Read JSON input
        $json = json_decode(file_get_contents("php://input"), true);
        $id = (int) $json['id'];
        $is_active = (int) $json['is_active'];
        $updated = $this->PageBuilder_model->updateInfrastructureStatus($id, $is_active);
        if ($updated) {
            echo json_encode(['status' => true, 'message' => 'Status changed successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Update failed']);
        }
    }



}
?>