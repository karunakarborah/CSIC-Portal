<?php

class Apply extends CI_Controller{


	public function __construct() //constructor starts here
        {
                parent::__construct();   

                $this->load->model('pages_model');
                $this->load->model('apply_model');
                $this->load->model('user_model');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->library('Pdf');
                $this->load->library('Zend');
                $this->zend->load('Zend/Barcode');   
                $this->load->library('session');       

        } // constructor ends here


	public function index() //index function starts here
	{

		$data['title'] = "Apply";

		 
		$this->load->view('templates/header',$data);



                //config array starts
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
                'field' => 'email',
                'label' => 'email address',
                'rules' => 'required|valid_email',
                'errors' => array(
                        'required' => 'You must provide an Email Address.',
                        'valid_email' => 'Invalid Email Address'
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
        
                );
                //config array ends






		$this->form_validation->set_rules($config);
		

		if ($this->form_validation->run() == FALSE)
                {
                	$this->load->view('apply/home');
                }
                else
                {
                        
                        $this->load->view('apply/createform');
                
                }
		

		$this->load->view('templates/footer');
        }// index function ends
        
        

	public function createform()
	{
		$this->load->view('apply/createform');
        }
        


        public function createpdf()
        {
                $this->load->view('apply/createpdf');
        }



    //SEM apply function def

    public function applynmr(){

        $data['title'] = " Apply NMR";        

        $this->load->view('templates/header', $data);
        $this->load->view('apply/applynmr');
        $this->load->view('templates/footer');



    }//apply sem



    //SEM apply function def

    public function applysem(){

        $data['title'] = " Apply SEM";
        $this->load->view('templates/header', $data);



        //config array for sem form validation starts
		$config = array(
                        array(
                                'field' => 'sample_type',
                                'label' => 'Sample Type',
                                'rules' => 'trim|required',
                                'errors' => array(
                                        'required' => 'You must mention a Sample type',
                                ),
                        ),
                        array(
                                'field' => 'no_of_samples',
                                'label' => 'number of sample',
                                'rules' => 'trim|required|numeric',
                                'errors' => array(
                                        'required' => 'You must provide %s.',
                                ),
                        ),
                        array(
                                'field' => 'sample_code',
                                'label' => 'sample code(s)',
                                'rules' => 'required',
                                'errors' => array(
                                        'required' => 'You must provide sample code(s).',                                        
                                ),
                        ),
                        array(
                                'field' => 'structure',
                                'label' => 'structure',
                                'rules' => 'required',
                                'errors' => array(
                                        'required' => 'You must select a %s.',                                        
                                ),
                        ),
                        array(
                                'field' => 'volatility',
                                'label' => 'volatility',
                                'rules' => 'required',
                                'errors' => array(
                                        'required' => 'You must select a %s.',                                        
                                ),
                        ),
                        array(
                                'field' => 'moisture_sensitivity',
                                'label' => 'moisture sensitivity',
                                'rules' => 'required',
                                'errors' => array(
                                        'required' => 'You must select a %s.',                                        
                                ),
                        ),
                        array(
                                'field' => 'conductivity',
                                'label' => 'conductivity',
                                'rules' => 'required',
                                'errors' => array(
                                        'required' => 'You must select a %s.',                                        
                                ),
                        ),
                        array(
                                'field' => 'analysis[]',
                                'label' => 'analysis',
                                'rules' => 'required',
                                'errors' => array(
                                        'required' => 'You must select an %s to perform.',                                        
                                ),
                        ),
                        array(
                                'field' => 'accept',
                                'label' => 'accept',
                                'rules' => 'required',
                                'errors' => array(
                                        'required' => 'You must accept the terms and conditions to proceed.',                                        
                                ),
                        ),
                        array(
                                'field' => 'instructions',
                                'label' => 'instructions',
                                'rules' => 'trim|max_length[1000]',
                                'errors' => array(
                                        'max_length' => 'Maximum 1000 characters allowed for instructions',                                        
                                ),
                        ),

                        
                                );
                                //config array ends
                                
                
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE)
                {
                	$this->load->view('apply/applysem');
                }
        else{


                $sample_type = $this->input->post('sample_type');
                $no_of_samples = $this->input->post('no_of_samples');
                $sample_code = $this->input->post('sample_code');
                $structure = $this->input->post('structure');
                $volatility = $this->input->post('volatility');
                $moisture_sensitivity = $this->input->post('moisture_sensitivity');
                $conductivity = $this->input->post('conductivity');
                $analysis = json_encode($this->input->post('analysis'));
                $instructions = $this->input->post('instructions');
                $application_no = "SEM".date('HisdmY').chr(rand(65,90));
                
                if($this->apply_model->apply_sem($application_no, $sample_type, $no_of_samples, $sample_code, $structure, $volatility, $moisture_sensitivity, $conductivity, $analysis, $instructions)){

                        $data['application_no']=$application_no;
                        $imageResource=Zend_Barcode::factory('code128', 'image', array('text'=>$application_no, 'barHeight'=> 74, 'factor'=>1, 'drawText'=>FALSE), array('imageType' => 'png'))->draw();
                        imagepng($imageResource, 'assets/barcode/'.$application_no.'.png');
                        $this->load->view('apply/sem_success',$data);
                }
                else{
                        $this->load->view('apply/error');
                }
        }

        $this->load->view('templates/footer');



    }//apply sem



    //XRD apply function def

    public function applyxrd(){

        $data['title'] = " Apply XRD";

        $this->load->view('templates/header', $data);
        $this->load->view('apply/applyxrd');
        $this->load->view('templates/footer');



    }//apply xrd





    public function create_pdf_sem($application_no){

        //create pdf using TCPDF library


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('CSIC');
        $pdf->SetTitle('CSIC Application');
        $pdf->SetSubject('Application');
        $pdf->SetKeywords('CSIC');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // add a page
        $pdf->AddPage();



        //getting application info from db

        $semapplication    = $this->apply_model->get_semapplication($application_no);
        $email     = $semapplication->email;
        $user    = $this->user_model->get_user($email);

        $fname= $user->fname;
        $lname= $user->lname;
        $phone= $user->phone;        
        $supervisor= $user->supervisor;
        $department= $user->department;
        $institution= $user->institution_name;

        $amount = $semapplication->amount;
        $sample_type = $semapplication->sample_type;
        $no_of_samples = $semapplication->no_of_samples;
        $sample_code = $semapplication->sample_code;
        $structure = $semapplication->structure;
        $volatility = $semapplication->volatility;
        $moisture_sensitivity = $semapplication->moisture_sensitivity;
        $conductivity = $semapplication->conductivity;
        $analysis = json_decode($semapplication->analysis);
        $n=0;
        $tests="";
        foreach($analysis as $value){
                if($n==0){
                $tests .= $value;
                $n++; }
                else
                $tests .= " and ".$value;
        }
        $instructions = $semapplication->instructions;


        // set cell padding
        $pdf->setCellPaddings(1, 1, 1, 1);

        // set cell margins
        $pdf->setCellMargins(1, 1, 1, 1);

        // set color for background
        $pdf->SetFillColor(255, 255, 255);

        // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

        $pdf->SetFont('times', '', 20);
        $pdf->MultiCell(25, 10, '<img src="assets/img/dulogo.png" width="75" height="75">', 0, 'L', 0, 0, '10', '10', true, 0, true);
        $pdf->MultiCell(150, 10, 'Central Sophisticated Instrumentation Centre', 0, 'L', 0, 0, '35', '12', true, 0, false);
        $pdf->SetFont('times', '', 12);
        $pdf->MultiCell(150, 10, 'Dibrugarh University, Assam', 0, 'L', 0, 0, '35', '22', true, 0, false);

        $pdf->SetFont('times', '', 12);
        $pdf->MultiCell(135, 10, 'APPLICATION FOR SEM ANALYSIS', 0, 'C', 0, 0, '35', '32', true, 0, false);

        $pdf->MultiCell(55, 42, 'Application No:<br><br><img src="assets/barcode/'.$application_no.'.png" width="132px" height="62px"></br>'.$application_no, 1, 'C', 0, 0, '130', '40', true, 0, true, true, 0, 'B');



        $pdf->SetFont('times', '', 10);
        $pdf->MultiCell(35, 7, 'Name:   ', 1, 'R', 0, 0, '15', '40', true, 0, false);
        $pdf->MultiCell(80, 7, $fname.' '.$lname, 1, 'L', 0, 0, '50', '40', true, 0, false);
        $pdf->MultiCell(35, 7, 'Phone:   ', 1, 'R', 0, 0, '15', '47', true, 0, false);
        $pdf->MultiCell(80, 7, $phone, 1, 'L', 0, 0, '50', '47', true, 0, false);
        $pdf->MultiCell(35, 7, 'Email:   ', 1, 'R', 0, 0, '15', '54', true, 0, false);
        $pdf->MultiCell(80, 7, $email, 1, 'L', 0, 0, '50', '54', true, 0, false);
        $pdf->MultiCell(35, 7, 'Supervisor:   ', 1, 'R', 0, 0, '15', '61', true, 0, false);
        $pdf->MultiCell(80, 7, $supervisor, 1, 'L', 0, 0, '50', '61', true, 0, false);
        $pdf->MultiCell(35, 7, 'Department:   ', 1, 'R', 0, 0, '15', '68', true, 0, false);
        $pdf->MultiCell(80, 7, $department, 1, 'L', 0, 0, '50', '68', true, 0, false);
        $pdf->MultiCell(35, 7, 'Institution:   ', 1, 'R', 0, 0, '15', '75', true, 0, false);
        $pdf->MultiCell(80, 7, $institution, 1, 'L', 0, 0, '50', '75', true, 0, false);
        $pdf->MultiCell(35, 7, 'Payment Details:   ', 1, 'R', 0, 0, '15', '82', true, 0, false);
        $pdf->MultiCell(80, 7, "", 1, 'L', 0, 0, '50', '82', true, 0, false);
        $pdf->MultiCell(55, 7, "Payable Amount: Rs. ".$amount, 1, 'C', 0, 0, '130', '82', true, 0, false);




        $pdf->MultiCell(35, 7, 'Sample Type:   ', 1, 'R', 0, 0, '15', '95', true, 0, false);
        $pdf->MultiCell(135, 7, $sample_type, 1, 'L', 0, 0, '50', '95', true, 0, false);
        

        $pdf->MultiCell(35, 14, 'Sample code:   ', 1, 'R', 0, 0, '15', '102', true, 0, false);
        $pdf->MultiCell(135, 14, $sample_code, 1, 'L', 0, 0, '50', '102', true, 0, false);

        $pdf->MultiCell(35, 7, 'Structure:   ', 1, 'R', 0, 0, '15', '116', true, 0, false);
        $pdf->MultiCell(50, 7, $structure, 1, 'C', 0, 0, '50', '116', true, 0, false);
        $pdf->MultiCell(35, 7, 'Volatility:   ', 1, 'R', 0, 0, '100', '116', true, 0, false);
        $pdf->MultiCell(50, 7, $volatility, 1, 'C', 0, 0, '135', '116', true, 0, false);

        $pdf->MultiCell(35, 7, 'Moisture Sensitivity:   ', 1, 'R', 0, 0, '15', '123', true, 0, false);
        $pdf->MultiCell(50, 7, $moisture_sensitivity, 1, 'C', 0, 0, '50', '123', true, 0, false);
        $pdf->MultiCell(35, 7, 'Conductivity:   ', 1, 'R', 0, 0, '100', '123', true, 0, false);
        $pdf->MultiCell(50, 7, $conductivity, 1, 'C', 0, 0, '135', '123', true, 0, false);

        $pdf->MultiCell(35, 7, 'Analysis:   ', 1, 'R', 0, 0, '15', '130', true, 0, false);
        $pdf->MultiCell(50, 7, $tests, 1, 'C', 0, 0, '50', '130', true, 0, false);        
        $pdf->MultiCell(35, 7, 'No of Samples:   ', 1, 'R', 0, 0, '100', '130', true, 0, false);
        $pdf->MultiCell(50, 7, $no_of_samples, 1, 'C', 0, 0, '135', '130', true, 0, false);
        

        $pdf->MultiCell(170, 28, "Note: \n * Please provide reference data, image, published papers for best results. \n * If the sample(s) present(s) any danger to the operator or equipment then kindly provide appropriate handling instructions or stipulates any special treatment as protocol, otherwise the user will be solely responsible for the damage done. \n * The use of this facility (CSIC, Dibrugarh University) must be acknowledged in the publications/thesis/reports of the user and same should be informed via email to csic@dibru.ac.in.", 0, 'L', 0, 0, '15', '137', true, 0, false);

        $pdf->MultiCell(85, 28, "\n \n \n \n \n Signature of Applicant", 1, 'C', 0, 0, '15', '170', true, 0, false);
        $pdf->MultiCell(85, 28, "\n \n \n \n \n Signature of Supervisor/HOD/Chairperson", 1, 'C', 0, 0, '100', '170', true, 0, false);

        $style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'phase' => 10, 'color' => array(0, 0, 0));
        $pdf->Line(10, 202, 195, 202, $style);
        $pdf->MultiCell(170, 7, 'FOR OFFICE USE', 0, 'C', 0, 0, '15', '200', true, 0, false);
        $pdf->Line(10, 235, 195, 235, $style);


        $pdf->SetFont('times', '', 9);
        $pdf->MultiCell(170, 7, "<b>Special Instructions:   </b></br>", 0, 'L', 0, 0, '10', '240', true, 0, true);
        $pdf->MultiCell(170, 14, $instructions, 0, 'L', 0, 0, '10', '245', true, 0, false);
        






        // reset pointer to the last page
        $pdf->lastPage();

        // ---------------------------------------------------------

        //Close and output PDF document
        $pdf->Output($application_no.'.pdf', 'I');

    }//end of function create_pdf_sem






}//end of apply controller class