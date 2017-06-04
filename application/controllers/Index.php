<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Index extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_login');
		$this->load->model('m_upload');

		$this->load->library(array('session'));
	}

	public function index(){
		

		$session = $this->session->userdata('isLogin');
		if($session == FALSE){
			redirect('login/login_form');
		}
		else {
			$this->load->view('event_report.php');
		}

		
	}



	public function event(){

		$project_title = $this->input->post("project_title");
		$project_year = $this->input->post("project_year");
		$activity = $this->input->post("activity");
		$session_title = $this->input->post("session_title");
		$session_type = $this->input->post("result");
		$reflection = $this->input->post("reflection");
		$followup = $this->input->post("followup");
		$rooster = $this->do_upload();
		$result = $this->input->post("result");
		$linkrooster = "uploads/doc/rooster/".$rooster['file_name'];
		$activity_output = $this->do_upload2();
		$linkactivity = "uploads/doc/activity_output/".$activity_output['file_name'];
		
		$array1 = array(
			
		'project_title' => $project_title,
		'project_year' => $project_year,
		'activity_code' => $activity,
		'results' => $result,
		'reflections'=>$reflection,
		'followup_plan' => $followup,
		'roster' => $linkrooster,
		'activity_output' =>$linkactivity

		);

		$this->m_db->insert($array1, "project_report");

		redirect("index");
		// echo "<pre>";
		// print_r($array1);
		// echo "</pre>";
	}

	function do_upload()
	{        
		$this->load->library('upload');

      //Configure upload.
		$this->upload->initialize(array(
			"allowed_types" => "*",
			"upload_path"   => "./uploads/doc/rooster"
			));
		// echo $this->input->post("input")." ".$this->input->post("input2");
		// echo "<br>";

             //Perform upload.
		if($this->upload->do_upload("rooster")) {
			$uploaded = $this->upload->data();
			// echo '<pre>';
			// var_export($uploaded);
			// echo '</pre>';

			return $uploaded;

		}else{

			return 'GAGAL UPLOAD';
		}
	}

	function do_upload2()
	{        
		$this->load->library('upload');

      //Configure upload.
		$this->upload->initialize(array(
			"allowed_types" => "*",
			"upload_path"   => "./uploads/doc/activity_output"
			));
		// echo $this->input->post("input")." ".$this->input->post("input2");
		// echo "<br>";

             //Perform upload.
		if($this->upload->do_upload("activity_output")) {
			$uploaded = $this->upload->data();
			// echo '<pre>';
			// var_export($uploaded);
			// echo '</pre>';

			return $uploaded;

		}else{

			return 'GAGAL UPLOAD';
		}
	}

}

