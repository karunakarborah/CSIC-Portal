<?php
class Status extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('status_model');
                $this->load->helper('url_helper');
                $this->load->library('session');       

        }
                
        public function view($page = 'home')
        {
        if ( !file_exists(APPPATH.'views/status/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('status/'.$page, $data);
        $this->load->view('templates/footer', $data);

        }
}
