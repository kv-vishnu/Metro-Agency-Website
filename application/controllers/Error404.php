<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

    public function index() {
        // Set the response status to 404
        $this->output->set_status_header('404');

        // Load the custom 404 view
        $this->load->view('errors/custom_404');
    }
}
