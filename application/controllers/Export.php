<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Export extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_export');

		$this->load->library(array('session'));
	}

	public function index(){
		$session = $this->session->userdata('isLogin');
		if($session == FALSE){
			redirect('login/login_form');
		}
		else {
			//$this->m_export->export("userproject", "IN2.3.2");
			$this->load->view('view_export.php');
		}

		
	}

	public function export() {
		$activity = $this->input->post("activity");
		$data = $this->input->post("data");
		$this->m_export->export($activity, $data);
		//$this->m_export->export("IN2.3.2", "session");
	}

	

	

}

?>