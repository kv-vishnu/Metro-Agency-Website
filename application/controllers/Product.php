<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

        public function __construct() {
        parent::__construct();
        $this->load->model('admin/PageBuilder_model');
        $this->load->library('upload');
    }


    public function index($slug)
    {

$id = $this->PageBuilder_model->getProductIdBySlug($slug);
// echo $id;
$data['current_page_slug'] = 'productdetails'; /* Depends on slug load css in header */
$data['pages'] = $this->PageBuilder_model->getAllPagesList();  // get header menu items
$data['productdetails'] = $this->PageBuilder_model->getProductDetailsList($id);
$this->load->view('admin/includes/header',$data);
$this->load->view('website/productdetails', $data);
$this->load->view('admin/includes/footer',$data);
    }
}
?>