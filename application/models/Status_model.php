<?php
class Status_model extends CI_Model {

	public function __construct()
	{

		$this->load->database();
	}

	public function get_status($application_no)
	{

		$query = $this->db->get_where('requests', array('application_no' => $application_no));
		return $query->row_array();

	}
}