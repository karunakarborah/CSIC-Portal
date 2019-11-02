<?php

class Dashboard extends CI_Controller{


	public function __construct()
        {
                parent::__construct();   

                $this->load->model('dashboard_model');             
                $this->load->helper('url_helper');
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->library('Pdf');
                $this->load->library('Zend');
                $this->zend->load('Zend/Barcode');   
                $this->load->library('session');       

        }


	public function index()
	{
        if(isset($_SESSION["logged_in"])){
        
            $data['title'] = "Dashboard";
            
            $this->load->view('templates/header',$data);
            $this->load->view('dashboard/home');
            $this->load->view('templates/footer');
        }

        else{
            redirect('user/login');
        }
    }
}