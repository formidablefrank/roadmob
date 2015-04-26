<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("pagination");
	}

    public function validate_platenumber($str)
    {
       $str = str_replace(' ', '', $str);
       $str = str_replace('-', '', $str);


       if (!(preg_match('/^[a-zA-Z]+$/', substr($str,0,3))
       && preg_match('/^[0-9]+$/', substr($str,3,3))
       && strlen($str) == 6) )
       {
            return (preg_match('/^[a-zA-Z]+$/', substr($str,0,3))
            && preg_match('/^[0-9]+$/', substr($str,3,4))
            && strlen($str) == 7);
       }

       else
            return true;

    }

    public function validate_vehicle($str)
    {
        if(strcmp($str,"bus"))
            return true;
        if(strcmp($str,"jeep"))
            return true;
        if(strcmp($str,"taxi"))
            return true;
        if(strcmp($str,"van"))
            return true;
        if(strcmp($str,"others"))
            return true;

        return false;
    }

	public function index()
	{
		$data['title'] = 'RoadMob';
		$data['main_content'] = "account/home";


        $this->load->database();
        $this->load->model('report_model');
        $this->load->model('user_model');
        $data['reports']=$this->report_model->getAllReports()->result();
        $data['results'] = $this->report_model->getCountPerLocation();

        /*$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        $this->form_validation->set_rules('plate_number', 'plate_number', 'required');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('vehicle_type', 'vehicle_type', 'required');
        */


        //$this->load->view('report/report');


		$this->load->view('includes/default_template', $data);

	}

	public function searchPlate()
	{
		$data['plate_number'] = $this->input->post('plate_number');
		$this->load->database();
		$this->load->model('report_model');
		$data['results'] = $this->report_model->searchPlate();


		$this->load->view('includes/head', $data);
		$this->load->view('account/report_results',$data);
       	$this->load->view('includes/footer',$data);

	}

	public function sortBy()
	{
		$this->load->library('table');
		$criteria = $this->input->post('criteria');
		$this->load->database();
		$this->load->model('report_model');
		$data['results'] = $this->report_model->getAllReports();

		#Redirect to a view
       	$this->load->view('includes/head', $data);
		$this->load->view('account/test',$data);
       	$this->load->view('includes/footer', $data);

	}

	public function getReportsByUser()
	{
		$this->load->library('table');
		$username = $this->input->post('username');
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('report_model');
		$data['results'] = $this->user_model->getReportsByUser('username');

		$this->load->view('includes/head', $data);
		$this->load->view('account/test',$data);
       	$this->load->view('includes/footer', $data);

	}

    public function viewMap(){
        $this->load->database();
        $this->load->model('report_model');
        $data['results'] = $this->report_model->getCountPerLocation();
        $data['title'] = 'View Map';

        $this->load->view('includes/head', $data);
        $this->load->view('account/map',$data);
        $this->load->view('includes/footer', $data);
    }

    public function acceptReport()
    {
        $this->load->helper('date');

        $plate_number = $this->input->post('plate_number');
        $vehicle_type = $this->input->post('vehicle_type');
        $incident_type = $this->input->post('incident_type');
        $date_incident = $this->input->post('date_incident');
        $date_submitted = mdate("%Y-%m-%d",time());
        $location = $this->input->post('location');
        $lat = $this->input->post('lat');
        $lon = $this->input->post('lon');
        $description = $this->input->post('description');

        $this->load->database();
		$this->load->model('report_model');

        $this->report_model->createReport($plate_number, $vehicle_type, $date_incident, $incident_type, $location, $lat, $lon, $description, "asdf", 0);
        $this->load->helper('url');

        $this->load->driver('session');
        $this->session->set_flashdata('message', 'Report Sent!');
        redirect(site_url('#recent-reports'), 'refresh');
    }

    function showForm()
    {
        $this->load->driver('session');
        $message = $this->session->flashdata('message');

        $data['message'] = $message;
        $data['title']="RoadMob | Create Report";
    	$this->load->view('includes/head',$data);
        $this->load->view('report/report');
        $this->load->view('includes/footer');
    }

}
