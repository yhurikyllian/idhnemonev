<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Project_report extends CI_Controller{

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
			$this->load->view('project_report.php');
		}

		
	}

	public function input(){

		$project_title = $this->input->post("project_title");
		$project_year = $this->input->post("project_year");
		$activity = $this->input->post("activity");
		$session_title = $this->input->post("session_title");
		$session_type = $this->input->post("result");
		$reflection = $this->input->post("reflection");
		$followup = $this->input->post("follow");
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

		redirect("project_report");

		
	}

	function do_upload()
	{        
		$this->load->library('upload');

      //Configure upload.
		$this->upload->initialize(array(
			"allowed_types" => "*",
			"upload_path"   => "./uploads/rooster"
			));
		

             //Perform upload.
		if($this->upload->do_upload("rooster")) {
			$uploaded = $this->upload->data();
		

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
			"upload_path"   => "./uploads/activity_output"
			));
		

             //Perform upload.
		if($this->upload->do_upload("activity_output")) {
			$uploaded = $this->upload->data();
		

			return $uploaded;

		}else{

			return 'GAGAL UPLOAD';
		}
	}
}

?>