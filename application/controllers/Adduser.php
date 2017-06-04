<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Adduser extends CI_Controller{

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
			$this->load->view('adduser.php');
		}

		
	}

	public function adduser(){

		$title_b = $this->input->post("title_b");
		$name = $this->input->post("name");
		$title_a = $this->input->post("title_a");
		$phone = $this->input->post("phone");
		$email = $this->input->post("email");
		$institution = $this->input->post("institution");
		$institution_type = $this->input->post("institution_type");
		$institution_pos = $this->input->post("institution_pos");
		$occupation = $this->input->post("occupation");
		$primary_work = $this->input->post("primary_work");
		$d_background = $this->input->post("d_background");
		$resume = $this->input->post("resume");
		$foe = $this->input->post("foe");
		$country = "ID";
		$province = $this->input->post("province");
		$gender = $this->input->post("gender");
		$age = $this->input->post("age");
		$place_birth = $this->input->post("place_birth");
		$start_date = $this->input->post("date_birth");
		$array_start_date = explode("/",$start_date);
		$start_date_bersih = $array_start_date[2]."-".$array_start_date[0]."-".$array_start_date[1];
		$id_pass = $this->input->post("idpass");
		$address = $this->input->post("address");

		$array1 = array(
		'name' => $name,
		'phone' => $phone,
		'email' => $email,
		'job' => $occupation,
		'before_name' => $title_b,
		'after_name' => $title_a,
		'gender' => $gender,
		'age' => $age,
		'place_birth' => $place_birth,
		'date_birth' => $start_date_bersih,
		'id_or_passport' => $id_pass,
		'address' => $address,
		// 'city' => 
		'country' => "Indonesia",
		'province' => $province,
		'institution' => $institution,
		'type_institution'=> $institution_type,
		'pos_institution'=> $institution_pos,
		'description' => $resume,
		'area_of_work' => $primary_work,
		'disciplinary'=> $d_background,
			
		// $project_title = $this->input->post("project_title"),
		// $project_year = $this->input->post("project_year"),
		// $activity_ = $this->input->post("activity"),
		



		);

		$this->m_db->insert($array1, "user");
		redirect('adduser');


		
	}
}

?>