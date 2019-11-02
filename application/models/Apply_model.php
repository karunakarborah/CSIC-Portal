<?php
class Apply_model extends CI_Model {

	public function __construct()
	{

		$this->load->database();
		
		
	}

	public function apply_sem($application_no, $sample_type, $no_of_samples, $sample_code, $structure, $volatility, $moisture_sensitivity, $conductivity, $analysis, $instructions){
		
		if($_SESSION["institution_type"]=="Dibrugarh University")
		$amount= $no_of_samples * ((250 * in_array("Morphology", json_decode($analysis))) + (200 * in_array("EDX", json_decode($analysis))));
		elseif($_SESSION["institution_type"]=="Other Academic Institution")
		$amount= $no_of_samples * ((500 * in_array("Morphology", json_decode($analysis))) + (200 * in_array("EDX", json_decode($analysis))));
		elseif($_SESSION["institution_type"]=="Industry")
		$amount= $no_of_samples * ((1000 * in_array("Morphology", json_decode($analysis))) + (200 * in_array("EDX", json_decode($analysis))));


		$data = array(
			'fname'   => $_SESSION['fname'],
			'lname'   => $_SESSION['lname'],
			'phone'   => $_SESSION['phone'],
			'email'   => $_SESSION['email'],

			'application_no' => $application_no,			
			'sample_type'   => $sample_type,
			'no_of_samples'  => $no_of_samples,
			'sample_code' => $sample_code,
			'structure' => $structure,
			'volatility' => $volatility,
			'moisture_sensitivity' => $moisture_sensitivity,
			'conductivity' => $conductivity,
			'analysis' => $analysis,
			'instructions' => $instructions,
			'amount'  => $amount
		);

		return $this->db->insert('semapplication', $data);
	}

	public function get_semapplication($application_no){
		$this->db->from('semapplication');
		$this->db->where('application_no', $application_no);
		return $this->db->get()->row();
	}




	
}//end of apply model class