<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Addevent extends CI_Controller{

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
			$this->load->view('addevent.php');
		}

		
	}

	public function addevent(){

		$project_title = $this->input->post("project_title");
		$project_year = $this->input->post("project_year");
		$activity = $this->input->post("activity");
		$session_title = $this->input->post("session_title");
		$session_type = $this->input->post("session_type");

		$date = $this->input->post("date");
		$array_start_date = explode("/",$date);
		$date_bersih = $array_start_date[2]."-".$array_start_date[0]."-".$array_start_date[1];

		$time = $this->input->post("time");
		$venue = $this->input->post("venue");
		$speakers = $this->input->post("speaker");
		
		$moderator = $this->input->post("moderator");

		$doc = $this->do_upload();
		
			if($doc == "GAGAL UPLOAD"){

				$iddoc = array("","");
			}else{
				if(count($doc) == 14){
					$file_name = $doc['file_name'];
					$file_link = "uploads/doc/doc/".$file_name;
					$arraydoc = array(
							"file_name" => $file_name,
							"file_link" => $file_link,
							'num_download' => "0"

							);
					$this->m_db->insert($arraydoc, 'document');
					$iddocs = $this->m_db->getid_document($file_link);
					$iddoc[0] = $iddocs[0]['id_document'];

				}else{
					for($i=0;$i<count($doc);$i++){


						$file_name[$i] = $doc[$i]['file_name'];
						$file_link[$i] = "uploads/doc/doc/".$doc[$i]['file_name'];
						$arraydoc = array(
							"file_name" => $file_name[$i],
							"file_link" => $file_link[$i],
							'num_download' => "0"

							);

						$this->m_db->insert($arraydoc, 'document');

						$iddocs[$i] = $this->m_db->getid_document($file_link[$i]);
						$iddoc[$i] = $iddocs[$i][0]['id_document'];
					}}
				}



			$speakerss = $this->m_db->getid_speaker($speakers);
			$speaker = $speakerss[0]['id_speaker'];



			$array1 = array(


				'activity_code' => $activity ,
				'session_title'=> $session_title ,
				'type_session' => $session_type ,
				'session_date' => $date_bersih,
				'session_time' => $time,
				'session_venue' => $venue,
				'id_speaker' => $speaker,
				'moderator' => $moderator,
				'id_document' => implode(";", $iddoc),


				);


			$this->m_db->insert($array1, 'session');


		redirect('addevent');
		// echo implode(";", $iddoc);



		}

		function do_upload()
		{        
			$this->load->library('upload');

      //Configure upload.
			$this->upload->initialize(array(
				"allowed_types" => "*",
				"upload_path"   => "./uploads/doc/doc"
				));


             //Perform upload.
			if($this->upload->do_upload("doccument")) {
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

	?>