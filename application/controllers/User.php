

<?php

class User extends CI_Controller {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->library('session');
		
	}
	
	
	// public function index() {
		
		
	// }
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$error_data = new stdClass();
		$data['title'] = "Register";
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// // set validation rules
		// $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		// $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		


		$config = array(
			array(
					'field' => 'fname',
					'label' => 'First Name',
					'rules' => 'trim|required|regex_match[/^[a-zA-Z ]*$/]',
					'errors' => array(
							'required' => 'You must provide a %s.',
					),
			),
			array(
					'field' => 'lname',
					'label' => 'Last Name',
					'rules' => 'trim|required|alpha',
					'errors' => array(
							'required' => 'You must provide a %s.',
					),
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required|min_length[4]',
				'errors' => array(
						'required' => 'You must provide a %s.',						
				),
		),

			array(
				'field' => 'confirm_password',
				'label' => 'Confirm Password',
				'rules' => 'required|matches[password]',
				'errors' => array(
						'required' => 'You must provide a %s.',						
				),
		),
			array(
					'field' => 'email',
					'label' => 'email address',
					'rules' => 'required|valid_email|is_unique[users.email]',
					'errors' => array(
							'required' => 'You must provide an Email Address.',
							'valid_email' => 'Invalid Email Address',
							'is_unique' => 'This email is already registered.'
					),
			),
			array(
					'field' => 'phone',
					'label' => 'Phone Number',
					'rules' => 'required|numeric|exact_length[10]',
					'errors' => array(
							'required' => 'You must provide a %s.',
							'exact_length' => 'Only 10 digit %s allowed',
					),
			),
			array(
				'field' => 'institution_name',
				'label' => 'Institution Name',
				'rules' => 'trim',				
				),
		
			
		);
	
	
	
	
	
	
			$this->form_validation->set_rules($config);
			




		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('templates/header', $data);
			$this->load->view('user/register/register', $error_data);
			$this->load->view('templates/footer');
			
		} else {
			
			// set variables from the form
			$fname = ucfirst(strtolower($this->input->post('fname')));
			$lname = ucfirst(strtolower($this->input->post('lname')));
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			$phone = $this->input->post('phone');
			$gender = $this->input->post('gender');
			$institution_type = $this->input->post('institution_type');
			$institution_name = trim($this->input->post('institution_name'));			
			$department = $this->input->post('department');
			$supervisor = $this->input->post('supervisor');
			
			if ($this->user_model->create_user($fname, $lname, $phone, $gender, $email, $password, $institution_type, $institution_name, $department, $supervisor)) {
				
				// user creation ok
				$this->load->view('templates/header', $data);
				$this->load->view('user/register/register_success', $error_data);
				$this->load->view('templates/footer');
				
			} else {
				
				// user creation failed, this should never happen
				$error_data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('templates/header');
				$this->load->view('user/register/register', $error_data);
				$this->load->view('templates/footer');
				
			}
			
		}
		
	}



	public function editprofile(){

		if(!isset($_SESSION['logged_in']))
		redirect('user/login');

		// create the data object
		$error_data = new stdClass();
		$data['title'] = "Edit Profile";
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$config = array(
			array(
					'field' => 'fname',
					'label' => 'First Name',
					'rules' => 'trim|required|regex_match[/^[a-zA-Z ]*$/]',
					'errors' => array(
							'required' => 'You must provide a %s.',
					),
			),
			array(
					'field' => 'lname',
					'label' => 'Last Name',
					'rules' => 'trim|required|alpha',
					'errors' => array(
							'required' => 'You must provide a %s.',
					),
			),
			
			array(
					'field' => 'phone',
					'label' => 'Phone Number',
					'rules' => 'required|numeric|exact_length[10]',
					'errors' => array(
							'required' => 'You must provide a %s.',
							'exact_length' => 'Only 10 digit %s allowed',
					),
			),

			array(
				'field' => 'institution_type',
				'label' => 'Institution Type',
				'rules' => 'trim|required',				
				),

			array(
				'field' => 'institution_name',
				'label' => 'Institution Name',
				'rules' => 'trim|required',				
				),
			
		
			
			);
	
	
	
	
	
	
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() === false) {

			$user    = $this->user_model->get_user($_SESSION["email"]);
			
			$this->load->view('templates/header', $data);
			$this->load->view('user/editprofile/editprofile', $user);
			$this->load->view('templates/footer');
			
		} else {
			
			// set variables from the form
			$fname = ucfirst(strtolower($this->input->post('fname')));
			$lname = ucfirst(strtolower($this->input->post('lname')));			
			$phone = $this->input->post('phone');
			$gender = $this->input->post('gender');
			$institution_type = $this->input->post('institution_type');
			$institution_name = $this->input->post('institution_name');
			$department = $this->input->post('department');
			$supervisor = $this->input->post('supervisor');

			if($institution_type=="Dibrugarh University")
			$institution_name="Dibrugarh University";
			if ($this->user_model->update_user($fname, $lname, $phone, $gender, $institution_type, $institution_name, $department, $supervisor)) {

				$user    = $this->user_model->get_user($_SESSION["email"]);
				//$lname = $user->lname;
				// set session user datas
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['fname']      = $user->fname;
				$_SESSION["lname"]     = $user->lname;
				$_SESSION["phone"]     = $user->phone;
				$_SESSION["gender"]     = $user->gender;
				$_SESSION["email"]     = $user->email;
				$_SESSION["institution_type"]     = $user->institution_type;
				$_SESSION["institution_name"]     = $user->institution_name;
				$_SESSION["department"]     = $user->department;
				$_SESSION["supervisor"]     = $user->supervisor;
				$_SESSION["is_admin"] = $user->is_admin;
				
				redirect('dashboard');
				
			} else {
				
				// user creation failed, this should never happen
				$error_data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('templates/header');
				$this->load->view('user/editprofile/editprofile', $error_data);
				$this->load->view('templates/footer');
				
			}
			
		}


	}



	public function changepw(){
		if(!isset($_SESSION['logged_in']))
		redirect('user/login');

		$error_data = new stdClass();
		$data['title'] = "Change Password";

		$this->load->helper('form');
		$this->load->library('form_validation');


		$config = array(
			array(
					'field' => 'current_password',
					'label' => 'current password',
					'rules' => 'trim|required',
					'errors' => array(
							'required' => 'You must provide the %s.',
					),
			),
			array(
					'field' => 'new_password',
					'label' => 'new password',
					'rules' => 'trim|required|min_length[4]',
					'errors' => array(
							'required' => 'You must provide a %s.',
					),
			),
			
			array(
					'field' => 'confirm_password',
					'label' => 'confirm password',
					'rules' => 'required|matches[new_password]',
					'errors' => array(
							'required' => 'You must confirm the new password.',
							'matches' => 'Confirm password do not match new password',
							
					),
			),
			
			);
		
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() === false) {			
			
			$this->load->view('templates/header', $data);
			$this->load->view('user/editprofile/changepw');
			$this->load->view('templates/footer');
			
		}
		else{
			$user    = $this->user_model->get_user($_SESSION["email"]);

			$current_password = md5($this->input->post('current_password'));
			$new_password =		md5($this->input->post('new_password'));
			$confirm_password =	md5($this->input->post('confirm_password'));

			if($user->password != $current_password){
				$data["error"]="Current password mismatch";
				$this->load->view('templates/header', $data);
				$this->load->view('user/editprofile/changepw',$data);
				$this->load->view('templates/footer');
			}
			elseif($user->password == $current_password){

				if($this->user_model->changepw($new_password)){
					$data['message'] = "Password changed successfully!";
					$dara['title'] = "Change Password";
					$this->load->view('templates/header', $data);
					$this->load->view('user/editprofile/changepw_success',$data);
					$this->load->view('templates/footer');
					
				}
				else{
					$data["error"]="Something went wrong";
					$this->load->view('templates/header', $data);
					$this->load->view('user/editprofile/changepw',$data);
					$this->load->view('templates/footer');

				}

			}
			
			

		}
		

	}
		



	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$error_data = new stdClass();
		$data['title'] = "Login";
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('templates/header', $data);
			$this->load->view('user/login/login');
			$this->load->view('templates/footer');
			
		} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($email, $password)) {
				//echo "login success";
				
				//$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($email);
				//$lname = $user->lname;
				// set session user datas
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['fname']      = $user->fname;
				$_SESSION["lname"]     = $user->lname;
				$_SESSION["phone"]     = $user->phone;
				$_SESSION["gender"]     = $user->gender;
				$_SESSION["email"]     = $user->email;
				$_SESSION["institution_type"]     = $user->institution_type;
				$_SESSION["institution_name"]     = $user->institution_name;
				$_SESSION["department"]     = $user->department;
				$_SESSION["supervisor"]     = $user->supervisor;
				$_SESSION["is_admin"] = $user->is_admin;						
				
				redirect('dashboard');
				
			} else {
				echo "try again";
				// // login failed
				// $error_data->error = 'Wrong username or password.';
				
				// // send error to the view
				// $this->load->view('templates/header', $data);
				// $this->load->view('user/login/login', $error_data);
				// $this->load->view('footer');
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {

		if(!isset($_SESSION['logged_in']))
		redirect('user/login');
		
		// create the data object
		$error_data = new stdClass();
		$data['title']="Logout";
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			redirect('/');
			// // user logout ok
			// $this->load->view('templates/header', $data);
			// $this->load->view('user/logout/logout_success', $error_data);
			// $this->load->view('templates/footer', $data);
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
}
