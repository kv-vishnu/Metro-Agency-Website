<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('admin/PageBuilder_model');
    }

    public function index()
    {
        $data['products'] = $this->PageBuilder_model->getProduct(); //Certifications list
        $this->load->view('admin/template/header');
        $this->load->view('admin/product/list', $data);
        $this->load->view('admin/template/footer');
    }
    public function create()
    {
        $template_type = 'Product';
         $data['categories'] = $this->PageBuilder_model->getCategoryList();
        $this->load->view('admin/template/header');
        $this->load->view('admin/product/create',$data);
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
            $product_category    = $this->input->post('product_category');
            $product_name     = $this->input->post('product_name');
            $product_description  = $this->input->post('product_description');
            $product_link               = $this->input->post('product_link');

            // Upload banner image
            $product_image = '';
            if (!empty($_FILES['product_image']['name'])) {
                $config['upload_path']   = './uploads/product/';
                 $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                $config['file_name']     = $_FILES['product_image']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('product_image')) {
                    $uploadData    = $this->upload->data();
                    $product_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }







$product_brodhure = '';

if (!empty($_FILES['product_brodhure']['name'])) {

    $config['upload_path']   = './uploads/productbrodhure/';
    $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg||JPG|PNG|JPEG|SVG|pdf|csv|xls|xlsx|PDF|CSV|XLS|XLSX';
    $config['file_name']     = $_FILES['product_brodhure']['name'];

    $this->upload->initialize($config);

    if ($this->upload->do_upload('product_brodhure')) {
        $uploadData         = $this->upload->data();
        $product_brodhure   = $uploadData['file_name'];
    } else {
        echo json_encode([
            'status' => false, 
            'message' => $this->upload->display_errors()
        ]);
        return;
    }
}


      
            // Save to DB via model
            $data = [
                'slug'          => $slug,
                'metatitle'         => $title,
                'metakeyword'      => $keywords,
                'canonical'         => $slug,
                'metadescription'   => $description,
                'page_schema' =>  $schema,
                'product_category' => $product_category,
                'product_name'  => $product_name,
                'product_description'   => $product_description,
                'product_image'  => $product_image,
                'product_brodhure'  => $product_brodhure,
                'product_link' => $product_link,
                'is_active' => 0
            ];


            $inserted = $this->db->insert('tbl_product', $data);
            $last_id = $this->db->insert_id();

            if ($inserted) {
                echo json_encode(['status' => true,'id' => $last_id,'message' => 'product saved successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to save product.']);
            }
        }
    }
    public function edit($id)
    {
        $data['categories'] = $this->PageBuilder_model->getCategoryList();
        // $data['category'] = $this->PageBuilder_model->getCategoryName($id);
        $data['product'] = $this->PageBuilder_model->getProductDetails($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/product/edit',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_product()
    {
        $edit_id = $this->input->post('edit_id', TRUE);
        // Handle AJAX POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title           = $this->input->post('title');
            $slug            = $this->input->post('slug');
            $keywords        = $this->input->post('keywords');
            $description     = $this->input->post('meta_description');
            $schema            = $this->input->post('page_schema');
            $product_category    = $this->input->post('product_category');
            $product_name     = $this->input->post('product_name');
            $product_description  = $this->input->post('product_description');
            $product_link               = $this->input->post('product_link');

            $product_image = '';
            if (!empty($_FILES['edit_product_image']['name']))
            {
                
                // Delete the old image file if it exists
                $old_banner_image = $this->input->post('old_product_image');
                $upload_banner_path = './uploads/product/';
                if (file_exists($upload_banner_path . $old_banner_image) && is_file($upload_banner_path . $old_banner_image)) {
                    unlink($upload_banner_path . $old_banner_image);
                }
                $config['upload_path']   = './uploads/product/';
                $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG';
                
                $config['file_name'] = $_FILES['edit_product_image']['name'];
                // echo $config['file_name']; exit;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('edit_product_image')) {
                    $uploadData    = $this->upload->data();
                    $product_image  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                // echo "doesnt image";
                $product_image = $this->input->post('old_product_image', TRUE);
            }



            if (!empty($_FILES['edit_product_brodhure']['name']))
            {
              
                // Delete the old image file if it exists
                $old_banner_image = $this->input->post('old_product_brodhure');
                $upload_banner_path = './uploads/productbrodhure/';
                if (file_exists($upload_banner_path . $old_banner_image) && is_file($upload_banner_path . $old_banner_image)) {
                    unlink($upload_banner_path . $old_banner_image);
                }
                $config['upload_path']   = './uploads/productbrodhure/';
                $config['allowed_types'] = 'webp|avif|svg|png|jpg|jpeg|JPG|PNG|JPEG|SVG|pdf|csv|xls|xlsx|PDF|CSV|XLS|XLSX';
                $config['file_name']     = $_FILES['edit_product_brodhure']['name'];
                $this->upload->initialize($config);

                if ($this->upload->do_upload('edit_product_brodhure')) {
                    $uploadData    = $this->upload->data();
                    $product_brodhure  = $uploadData['file_name'];
                } else {
                    echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                    return;
                }
            }
            else
            {
                
                $product_brodhure = $this->input->post('old_product_brodhure', TRUE);
            }


         
            // Save to DB via model
           $data = [
                'slug'          => $slug,
                'metatitle'         => $title,
                'metakeyword'      => $keywords,
                'canonical'         => $slug,
                'metadescription'   => $description,
                'page_schema' =>  $schema,
                'product_category' => $product_category,
                'product_name'  => $product_name,
                'product_description'   => $product_description,
                'product_image'  => $product_image,
                'product_brodhure'  => $product_brodhure,
                'product_link' => $product_link,
                'is_active' => 0
            ];

            // print_r($data); exit;

            $this->db->where('id', $edit_id); // Replace 'id' with your primary key column
            $updated = $this->db->update('tbl_product', $data);

            if ($updated) {
                echo json_encode(['status' => true, 'message' => 'Product updated successfully.']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Failed to update  Product .']);
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

