<?php
Class Commonmodel extends CI_Model
{

	public function __construct()
	{ 
        parent::__construct(); 
    }
    public function fetchuserDetails($roleID,$loginID)
    {
        $query="SELECT * from users";
        $query.=" WHERE userid='".$this->loginID."'";
        $query = $this->db->query($query);
        $rows = $this->db->affected_rows();
        if($rows!=0)
        {
            return $query->result_array();
        }
        else
        {
            return;
                
        }
    }

}	
?>