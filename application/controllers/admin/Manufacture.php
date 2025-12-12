<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacture extends CI_Controller {
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

        $data['manufacture'] = $this->PageBuilder_model->getManfacture();
        $this->load->view('admin/template/header');
        $this->load->view('admin/manufacture/list',$data);
        $this->load->view('admin/template/footer');
    }

     public function create()
    {
        $data['categories'] = $this->PageBuilder_model->getCategoryList();
        $this->load->view('admin/template/header');
        $this->load->view('admin/manufacture/create',$data);
        $this->load->view('admin/template/footer');
    }

        public function save() {
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title           = $this->input->post('title');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $description     = $this->input->post('meta_description');
            $schema            = $this->input->post('page_schema');
            $manufacture_title    = $this->input->post('manufacture_title');
            $manufacture_category_id     = $this->input->post('manufacture_category_id');
            $categories = implode(",", $manufacture_category_id);
            $manufacture_email     = $this->input->post('manufacture_email');
            $manufacture_phone     = $this->input->post('manufacture_phone');
            $manufacture_address     = $this->input->post('manufacture_address');

            // echo $categories; exit;

            // Upload banner image
            $manufacture_image = '';
            if (!empty($_FILES['manufacture_image']['name'])) {
                $config['upload_path']   = './uploads/manufacture/';
                 $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['manufacture_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('manufacture_image')) {
                    $uploadData    = $this->upload->data();
                    $manufacture_image  = $uploadData['file_name'];
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
                'page_schema' =>  $schema,
                'manufacture_title'  => $manufacture_title,
                'manufacture_category_id'  => $categories,
                'manufacture_email'  => $manufacture_email,
                'manufacture_phone'  => $manufacture_phone,
                'manufacture_address'  => $manufacture_address,
                'manufacture_image'  => $manufacture_image,
                'is_active' => 0
            ];

            // print_r($data); exit;

            $inserted = $this->db->insert('tbl_manufacture', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'Manufacture saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Manufacture.']);
            }
        }
    }




        public function edit($id)
    {
        $data['manufacture'] = $this->PageBuilder_model->getManufactureDetails($id);
          $data['categories'] = $this->PageBuilder_model->getCategoryList();
        $this->load->view('admin/template/header');
        $this->load->view('admin/manufacture/edit',$data);
        $this->load->view('admin/template/footer');
    }


        public function update_manufacture()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $title           = $this->input->post('title');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $description     = $this->input->post('meta_description');
            $schema            = $this->input->post('page_schema');
            $manufacture_title    = $this->input->post('manufacture_title');
            $manufacture_category_id     = $this->input->post('manufacture_edit_category_id');
            $categories = implode(",", $manufacture_category_id);
            // echo $categories; exit;
            $manufacture_email     = $this->input->post('manufacture_email');
            $manufacture_phone     = $this->input->post('manufacture_phone');
            $manufacture_address     = $this->input->post('manufacture_address');

            // Upload banner image
            $manufacture_image = '';
            if (!empty($_FILES['manufacture_edit_image']['name']))
            {
                // Delete the old image file if it exists
                $old_banner_image = $this->input->post('old_manufacture_image');
                $upload_banner_path = './uploads/manufacture/';
                if (file_exists($upload_banner_path . $old_banner_image) && is_file($upload_banner_path . $old_banner_image)) {
                    unlink($upload_banner_path . $old_banner_image);
                }
                $config['upload_path']   = './uploads/manufacture/';
                $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['manufacture_edit_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('manufacture_edit_image')) {
                    $uploadData    = $this->upload->data();
                    $manufacture_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                // echo "doesnt image";
                $manufacture_image = $this->input->post('old_manufacture_image', TRUE);
            }

         
            // Save to DB via model
            $data = [
                'slug'          => $slug,
                'metatitle'         => $title,
                'metakeywords'      => $keywords,
                'metadescription'   => $description,
                'page_schema' =>  $schema,
                'manufacture_title'  => $manufacture_title,
                'manufacture_category_id'  => $categories,
                'manufacture_email'  => $manufacture_email,
                'manufacture_phone'  => $manufacture_phone,
                'manufacture_address'  => $manufacture_address,
                'manufacture_image'  => $manufacture_image,
                'is_active' => 0
            ];

            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('tbl_manufacture', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'Manufacture updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save Manufacture.']);
            }
        }
    }

        public function update_manufacture_status()
    {
        // Read JSON input
        $json = json_decode(file_get_contents("php://input"), true);
        $id = (int) $json['id'];
        $is_active = (int) $json['is_active'];
        $updated = $this->PageBuilder_model->updateManufactureStatus($id, $is_active);
        if ($updated) {
            echo json_encode(['status' => true, 'message' => 'Status changed successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Update failed']);
        }
    }
}
?>