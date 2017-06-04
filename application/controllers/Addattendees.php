<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Addattendees extends CI_Controller{

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
			$this->load->view('addattendees.php');
		}

		
	}

	public function addattendees(){

		$array1 = array(
			
		$project_title = $this->input->post("project_title"),
		$project_year = $this->input->post("project_year"),
		$activity = $this->input->post("activity"),
		$session_title = $this->input->post("session_title"),
		$session_type = $this->input->post("session_type"),
		$date = $this->input->post("date"),
		$time = $this->input->post("time"),
		$venue = $this->input->post("venue"),
		$speaker = $this->input->post("speaker"),
		$moderator = $this->input->post("moderator"),

		);

		
		print_r($array1);


		
	}

	function search_nama(){
		// $nama = "aditya";
		$nama = $this->input->post("nama");
		$array = $this->crud_model->search($nama);
		
		$jumlah = count($array);

		
		// print_r($array);
		echo json_encode(array("id"=> $array, "jml" =>$jumlah));
			
	}

	function search_id(){

		$id = $this->input->post("id");
		$array = $this->crud_model->search("",$id);
		
		$jumlah = count($array);

		

		// echo json_encode($tes);
		echo json_encode(array("id"=> $array, "jml" =>$jumlah));

		
	}

	function load_table(){

		$activity_code = $this->input->post("activity_code");
		// $activity_code = "IN2.1.1";
		$array = $this->m_db->getActivityUser($activity_code);
		
		$jumlah = count($array);

		

		// echo json_encode($tes);
		echo json_encode(array("id"=> $array, "jml" =>$jumlah));

		// print_r($array);

		
	}

	function input_user(){

		$id = $this->input->post("id");
		$activity_code = $this->input->post("activity_code");
		// $id = "FBDJA767XX";
		$array = $this->m_db->getId($id);

		
		$id_user = $array[0]['id_user'];
		$name	= $array[0]['name'];
		$age	= $array[0]['age'];	
		$phone = $array[0]['phone'];
		$id_or_passport = $array[0]['id_or_passport'];

		$array1 = $this->m_db->getId_project($id_user);

		$data = array(
			'id_user' => $id_user,
			'activity_code' => $activity_code,);

		$this->m_db->insert($data, "userproject");

		$data2 = array(
			'name' => $name,
			'age' => $age,
			'phone' => $phone,
			'id_or_passport' => $id_or_passport,
			'id_userproject' => $array1[0]['id_userproject'],


			);

		echo json_encode(array("id"=> $data2));
	}
	
	function delete(){
		$id= $this->input->post("id");
		$this->crud_model->delete($id);
		echo "{}";
	}

	function tes(){
		// $activity_code = $this->input->post("activity_code");
		$activity_code = "IN2.1.1";
		$array = $this->m_db->getActivityUser($activity_code);
		
		$jumlah = count($array);

		

		// echo json_encode($tes);
		// echo json_encode(array("id"=> $array, "jml" =>$jumlah));

		print_r($array);

	}


}

?>