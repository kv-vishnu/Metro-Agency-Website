<?php
class Loginmodel extends CI_Model {
    
	public function checkLogin()
	{
		$encrypt_password = md5($_POST['password']);
		$this->db->select('*');
        $this->db->from('users');
        $this->db->where('userName ', $_POST['username'] );
		$this->db->where('userPassword ', $encrypt_password );
		$query = $this->db->get();
		//echo $this->db->last_query();exit;

		if ($query->num_rows() > 0) 
		{
			$row = $query->row();
			if($encrypt_password == $row->userPassword)
			{
				return $row; 
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}
?>