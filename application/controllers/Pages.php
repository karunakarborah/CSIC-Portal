<?php
class Pages extends CI_Controller {
                
        public function __construct()
        {
                parent::__construct();
                $this->load->model('pages_model');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                $this->load->library('Zend');
                $this->zend->load('Zend/Barcode'); 
                $this->load->helper('form');
                $this->load->library('form_validation');   
                $this->load->library('session');       

        }




            

        public function index()
        {
                if ( !file_exists(APPPATH.'views/pages/home.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                if(isset($_SESSION['logged_in'])){
                        redirect('dashboard');
                }


                else{
                $data['title'] = "Home"; // Capitalize the first letter

                $this->load->view('templates/homeheader', $data);
                $this->load->view('pages/home', $data);
                $this->load->view('templates/homefooter', $data);
                }

        }

        public function pricing()
        {
                $data['title'] = "Pricing";
                $this->load->view('templates/header', $data);
                $this->load->view('pages/pricing');
                $this->load->view('templates/footer');
        }

        public function validate()
        {
                $data['title'] = "Validate";
                $this->load->view('templates/header', $data);
                $this->load->view('pages/validate');
                $this->load->view('templates/footer');
        }

        public function contacts()
        {
                $data['title'] = "Contacts";
                $this->load->view('templates/header', $data);
                $this->load->view('pages/contacts');
                $this->load->view('templates/footer');
        }
}
