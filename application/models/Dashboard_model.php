<?php
class Dashboard_model extends CI_Model {

	public function __construct()
	{

		$this->load->database();
    }

    public function get_user($email){
		$this->db->from('users');
		$this->db->where('email', $email);
		return $this->db->get()->row();
    }
    
    

}