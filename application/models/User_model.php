<?php
class User_model extends CI_Model {

	public function __construct()
	{

		$this->load->database();
	}


	public function create_user($fname, $lname, $phone, $gender, $email, $password, $institution_type, $institution_name, $department, $supervisor) {
		
		$data = array(
			'fname'   => $fname,
			'lname'   => $lname,
			'phone' => $phone,
			'email'      => $email,
			'password'   => md5($password),
			'gender'  => $gender,
			'institution_type' => $institution_type,
			'institution_name' => $institution_name,
			'department' => $department,
			'supervisor' => $supervisor
		);
		
		return $this->db->insert('users', $data);
		
	}

	public function update_user($fname, $lname, $phone, $gender, $institution_type, $institution_name, $department, $supervisor){

		$data = array(
			'fname'   => $fname,
			'lname'   => $lname,
			'phone'	=> $phone,	
			'gender' => $gender,		
			'institution_type' => $institution_type,
			'institution_name' => $institution_name,
			'department' => $department,
			'supervisor' => $supervisor
		);
		
		$this->db->where('email', $_SESSION['email']);
		return $this->db->update('users', $data); 



	}


	public function changepw($new_password){

		$data = array(
			'password'   => $new_password,			
		);
		
		$this->db->where('email', $_SESSION['email']);
		return $this->db->update('users', $data); 



	}



	public function resolve_user_login($email, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}

	public function get_user($email){
		$this->db->from('users');
		$this->db->where('email', $email);
		return $this->db->get()->row();
	}


	private function verify_password_hash($password, $hash) {
		
		$password = md5($password);
		if($password==$hash)
		return TRUE;
		else
		return FALSE;
		
	}

	
}