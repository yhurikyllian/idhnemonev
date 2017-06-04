<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Addproject extends CI_Controller{

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
			$this->load->view('addproject.php');
		}

		
	}

	public function addproject(){

			$project_title = $this->input->post("project_title");
			$project_year = $this->input->post("project_year");
			$activity_code = $this->input->post("activity_code");
			$activity_name = $this->input->post("activity_name");
			$start_date = $this->input->post("start_date");
			$array_start_date = explode("/",$start_date);
			$start_date_bersih = $array_start_date[2]."-".$array_start_date[0]."-".$array_start_date[1];;
			$end_date = $this->input->post("end_date");
			$array_end_date = explode("/",$end_date);
			$end_date_bersih = $array_end_date[2]."-".$array_end_date[0]."-".$array_end_date[1];
			$range_date = $this->input->post("range_date");
			$country = $this->input->post("country");
			$province = $this->input->post("province");
			$city = $this->input->post("city");
			$address = $this->input->post("venue_address");
			$activity_type = ($this->input->post("activityType") == '') ? "" : join("; ", $this->input->post("activityType"));
			$target_audience = ($this->input->post("targetAudience") == '') ? "" : join("; " , $this->input->post("targetAudience"));
			$activity_desc = $this->input->post("activity_desc");
			$objective = $this->input->post("objective");
			$anticipated_output = $this->input->post("anticipated_output");
			$anticipated_outcome = $this->input->post("anticipated_outcame");
			$local_expertise = $this->input->post("local_expertise");
			$external_support = $this->input->post("external_support");
			$one_health_core = $this->input->post("one_health_core");
			$agenda = $this->do_upload();
			if($agenda == "Gagal Upload"){

				$iddoc = array("","");
			}else{
				$iddoc = "";
				if(count($agenda) == 14){
					$file_name = $agenda['file_name'];
						$file_link = "uploads/doc/agenda/".$agenda['file_name'];
						$arraydoc = array(
							"file_name" => $file_name,
							"file_link" => $file_link,
							'num_download' => "0"

							);

						// $this->m_db->insert($arraydoc, 'document');

						// $iddocs[$i] = $this->m_db->getid_document($file_link[$i]);
						$iddoc .= ";".$file_link;

				}else{
				
					for($i=0;$i<count($agenda);$i++){

						$file_name[$i] = $agenda[$i]['file_name'];
						$file_link[$i] = "uploads/doc/agenda/".$agenda[$i]['file_name'];
						$arraydoc = array(
							"file_name" => $file_name[$i],
							"file_link" => $file_link[$i],
							'num_download' => "0"

							);

						// $this->m_db->insert($arraydoc, 'document');

						// $iddocs[$i] = $this->m_db->getid_document($file_link[$i]);
						$iddoc .= ";".$file_link[$i];
					}
				}
			}
			// $linkagenda = $agenda['file_name'];

		$array1 = array(
			
			"project_title" => $project_title,
			"project_year" => $project_year,
			"activity_code" => $activity_code,
			"activity_name" => $activity_name,
			"start_date"=> $start_date_bersih,
			"end_date" => $end_date_bersih,
			"country" => $country,
			"province" => $province,
			"city" => $city,
			"venue" => $address,
			"activity_type" => $activity_type,
			"target_audience" => $target_audience,
			"activity_description"=> $activity_desc,
			"objectives"=> $objective,
			"output"=> $anticipated_output,
			"outcomes" => $anticipated_outcome,
			"expertise" => $local_expertise,
			"external_support" => $external_support,
			"agenda"=> $iddoc,


			);

		$this->crud_model->add_user("project", $array1);

		// echo $iddoc;
		redirect("addproject");
		
		
	}

	function do_upload()
	{        
		$this->load->library('upload');

      //Configure upload.
		$this->upload->initialize(array(
			"allowed_types" => "*",
			"upload_path"   => "./uploads/doc/agenda"
			));

		// echo $this->input->post("input")." ".$this->input->post("input2");
		// echo "<br>";

             //Perform upload.
		if($this->upload->do_upload("agenda")) {
			$uploaded = $this->upload->data();
			

			return $uploaded;

		}else{

			return "Gagal Upload";
			
		}
	}
}


?>