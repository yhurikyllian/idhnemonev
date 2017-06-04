<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Geomaps extends CI_Controller{

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
			
			$this->load->view('geomaps.php');
		}

		
	}

	public function addspeaker(){

		$array1 = array(
			
		$project_title = $this->input->post("project_title"),
		$project_year = $this->input->post("project_year"),
		$activity_ = $this->input->post("activity"),
		$title_b = $this->input->post("title_b"),
		$name = $this->input->post("name"),
		$title_a = $this->input->post("title_a"),
		$institution = $this->input->post("institution"),
		$institution_type = $this->input->post("institution_type"),
		$institution_pos = $this->input->post("institution_pos"),
		$occupation = $this->input->post("occupation"),
		$primary_work = $this->input->post("primary_work"),
		$d_background = $this->input->post("d_background"),
		$resume = $this->input->post("resume"),
		$foe = $this->input->post("foe"),
		$country = "ID",
		$province = $this->input->post("province"),



		);

		
		print_r($array1);


		
	}

	function load_table(){

		$activity_code = $this->input->post("activity_code");
		// $activity_code = "IN2.1.1";
		$array = $this->m_db->getActivityMap($activity_code);
		
		$jumlah = count($array);

		

		// echo json_encode($tes);
		echo json_encode(array("id"=> $array, "jml" =>$jumlah));

		// print_r($array);

		
	}

	function tes(){

		$tes = $this->m_db->getActivityMap("IN2.1.1");

		print_r($tes);
	}
}

?>