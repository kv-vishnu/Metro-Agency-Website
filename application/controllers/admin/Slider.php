<?php class Slider extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->library('upload');
        $this->load->model('admin/PageBuilder_model');
		//$this->load->model('admin/Brand_Associates_model');
	}



    public function index()
    {
        // echo "here";
        $data['slider'] = $this->PageBuilder_model->getSlider(); //Certifications list
        $this->load->view('admin/template/header');
        $this->load->view('admin/slider/list', $data);
        $this->load->view('admin/template/footer');
    }
    public function create()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/slider/create');
        $this->load->view('admin/template/footer');
    }



    public function save() {
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // echo "here";
            $slider_title    = $this->input->post('slider_title');
            $slider_text     = $this->input->post('slider_text');

         

            // Upload banner image
            $slider_image = '';
            if (!empty($_FILES['slider_image']['name'])) {
                $config['upload_path']   = './uploads/slider';
                 $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['slider_image']['name'];
                // echo $config['file_name']; exit;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('slider_image')) {
                    $uploadData    = $this->upload->data();
                    $slider_image  = $uploadData['file_name'];
                    
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }

            
            // Save to DB via model
            $data = [
                'title'       => $slider_title,
                'description' => $slider_text,
                'image'       => $slider_image,
  
            ];

            $inserted = $this->db->insert('tbl_slider', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'slider saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save slider.']);
            }
        }
    }


      public function edit($category_id)
    {
        $data['slider'] = $this->PageBuilder_model->getSliderDetails($category_id);
        print_r($data['slider']);
        $this->load->view('admin/template/header');
        $this->load->view('admin/slider/edit',$data);
        $this->load->view('admin/template/footer');
    }


public function update_slider()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $slider_title    = $this->input->post('slider_title');
            $slider_text     = $this->input->post('slider_text');

            // Upload banner image
//             $slider_image = $this->input->post('old_slider_image', TRUE); // default old image


// if (isset($_FILES['slider_image']) && $_FILES['slider_image']['error'] == UPLOAD_ERR_OK) {

//     $config['upload_path']   = './uploads/slider/';
//     $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
//     $config['file_name']     = $_FILES['slider_image']['name'];

//     $this->upload->initialize($config);

//     if ($this->upload->do_upload('slider_image')) {

//         // Upload success — update name
//         $uploadData = $this->upload->data();
//         $slider_image = $uploadData['file_name'];

//         // NOW delete the old image AFTER success
//         $old_image = $this->input->post('old_slider_image');
//         $old_path  = './uploads/slider/' . $old_image;

//         if (!empty($old_image) && file_exists($old_path)) {
//             unlink($old_path);
//         }

//     } else {
//         echo json_encode([
//             'status' => false, 
//             'message' => $this->upload->display_errors()
//         ]);
//         return;
//     }
// }

            $slider_image = '';
            if (!empty($_FILES['slider_image']['name']))
            {
                // Delete the old image file if it exists
                $old_banner_image = $this->input->post('old_slider_image');
                $upload_banner_path = './uploads/slider/';
                if (file_exists($upload_banner_path . $old_banner_image) && is_file($upload_banner_path . $old_banner_image)) {
                    unlink($upload_banner_path . $old_banner_image);
                }
                $config['upload_path']   = './uploads/slider/';
                  $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['slider_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('slider_image')) {
                    $uploadData    = $this->upload->data();
                    $slider_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                $slider_image = $this->input->post('old_slider_image', TRUE);
            }

            // Upload intro image
            
            // Save to DB via model
            $data = [
                 'title'       => $slider_title,
                'description' => $slider_text,
                'image'       => $slider_image,
            ];

            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('tbl_slider', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'Slider updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save slider.']);
            }
        }
    }



        public function update_slider_status()
    {
        // Read JSON input
        $json = json_decode(file_get_contents("php://input"), true);
        $id = (int) $json['id'];
        $is_active = (int) $json['is_active'];
        $updated = $this->PageBuilder_model->updateSliderStatus($id, $is_active);
        if ($updated) {
            echo json_encode(['status' => true, 'message' => 'Status changed successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Update failed']);
        }
    }


    public function delete() 
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->db->where('id', $id);
            $this->db->delete('tbl_slider');
            echo json_encode(['status' => 'success','message' => 'Slider Deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

}

?>