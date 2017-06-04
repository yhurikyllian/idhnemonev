<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Peserta extends CI_Controller{

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
			$this->load->view('attendees_report.php');
		}

		
	}

	function load_table(){

		$activity_code = $this->input->post("activity_code");
		$session = $this->input->post("session");
		// $activity_code = "IN2.1.1";
		$date2 = $this->m_db->getSessionbyId($session);
		$array = $this->m_db->getActivityUser($activity_code);
		
		$jumlah = count($array);
		$date_session = $date2[0]['session_date'];

		

		// echo json_encode($tes);
		echo json_encode(array("id"=> $array, "jml" => $jumlah, "session_date" => $date_session, ));

		// print_r($array);

		
	}

	function tes(){

		$activity_code = $this->input->post("activity_code");
		$session = "1";
		// $activity_code = "IN2.1.1";
		$date = $this->m_db->getSessionbyId($session);
		$array = $this->m_db->getActivityUser($activity_code);
		
		$jumlah = count($array);

		

		// echo json_encode($tes);
		// echo json_encode(array("id"=> $array, "jml" =>$jumlah, "$date"=>$date[0]['session_date']));
		echo $date[0]['session_date'];

		// print_r($array);

		
	}


}

?>