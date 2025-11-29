<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homemodel extends CI_Model {

    public function get_user_by_email($email , $mobile) {
        $this->db->where('email', $email);
        $this->db->where('mobno', $mobile);
        $query = $this->db->get('tbl_student');
        return $query->row();
    }
    public function getCertificationSlug($id)
    {
        return 'here';
    }
}