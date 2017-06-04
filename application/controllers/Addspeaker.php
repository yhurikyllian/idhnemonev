<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Addspeaker extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_login');
		$this->load->model('m_upload');
		$this->load->model('crud_model');

		$this->load->library(array('session'));
	}

	public function index(){
		
		$session = $this->session->userdata('isLogin');
		if($session == FALSE){
			redirect('login/login_form');
		}
		else {
			$this->load->view('addspeaker.php');
		}

		
	}

	public function addspeaker(){
		
		// $project_title = $this->input->post("project_title"),
		// $project_year = $this->input->post("project_year"),
		// $activity_ = $this->input->post("activity"),
		$title_b = $this->input->post("title_b");
		$name = $this->input->post("name");
		$title_a = $this->input->post("title_a");
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
		$photo = $this->do_upload();
		if($photo == "Gagal Upload"){
		$file_link_photo = "";
		}else{
		$linkphoto = $photo['file_name'];
		$file_link_photo = "uploads/img/speaker/".$linkphoto;
		}
		
		$cv = $this->do_upload2();
		if($cv == "Gagal Upload"){
		$file_link_cv = "";
		}else{
		$linkcv = $cv['file_name'];
		$file_link_cv = "uploads/doc/cv/".$linkcv;
		}
		$short_bio = $this->input->post("short_bio");
		$bio = $this->input->post("bio");
		$address = $this->input->post("address");
		$phone = $this->input->post("phone");
		$email = $this->input->post('email_speaker');

		$array1 = array(
			
		'before_name' => $title_b,
		'name' => $name,
		'after_name' => $title_a,
		'institution' => $institution,
		'type_institution' => $institution_type,
		'pos_institution' => $institution_pos,
		'occupation' => $occupation,
		'area_of_work'=> $primary_work,
		'disciplinary'=> $d_background,
		'resume'=> $resume,
		'expertise'=> $foe,
		'country'=> $country,
		'province'=> $province,
		'speaker_photo' => $file_link_photo,
		'cv' => $file_link_cv,
		'bio' => $bio,
		'shortbio' => $short_bio,
		'address' => $address,
		'phone' =>$phone,
		'email' => $email,
		

		);

		// echo "<pre>";
		// print_r($array1);
		// echo "</pre>";

		$this->crud_model->add_user("speaker", $array1);
		redirect("addspeaker");
		
		?>

			<!-- <script>
				alert('Data_masuk');
				
				</script> -->
		<?php
		


		
	}

	function do_upload()
	{        
		$this->load->library('upload');

      //Configure upload.
		$this->upload->initialize(array(
			"allowed_types" => "*",
			"upload_path"   => "./uploads/img/speaker/"
			));
		

             //Perform upload.
		if($this->upload->do_upload("photo")) {
			$uploaded = $this->upload->data();
			
			return $uploaded;
			

			

		}else{

			return "Gagal Upload";

			// echo "<br/> gagal";
			
		}
	}

	function do_upload2()
	{        
		$this->load->library('upload');

      //Configure upload.
		$this->upload->initialize(array(
			"allowed_types" => "*",
			"upload_path"   => "./uploads/doc/cv/"
			));
		

             //Perform upload.
		if($this->upload->do_upload("cv")) {
			$uploaded = $this->upload->data();
			
			return $uploaded;
			

			

		}else{

			return "Gagal Upload";
			
		}
	}
}

?>