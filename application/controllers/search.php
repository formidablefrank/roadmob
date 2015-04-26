<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("pagination");
    $this->load->library('table');
	}

    public function index()
    {
       $data['title']="RoadMob | Search Results";
       $data['main_content']="report/search";

       $pn = $this->input->get('plate_number');
       $this->load->database();
       $this->load->model('report_model');
       $data['results'] = $this->report_model->searchPlate($pn);
      
       $this->load->view('includes/head', $data); 
       $this->load->view('account/report_results',$data);
       $this->load->view('includes/footer',$data);

    }

}