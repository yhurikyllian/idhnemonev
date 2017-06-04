<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Tes extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_login');
		$this->load->model('m_upload');

		$this->load->library(array('session'));
	}

	public function index(){
		

		
		$data = $this->db->query('SELECT * FROM user')->result_array();
		foreach ($data as $d){
			if($d['province']=="DA"){
				$province = "Daerah Istimewa Aceh";
			} else if($d['province']=="SU"){
				$province = "Sumatera Utara";
			} else if($d['province']=="SB"){
				$province = "Sumatera Barat";
			} else if($d['province']=="SI"){
				$province = "Riau";
			} else if($d['province']=="JA"){
				$province = "Jambi";
			} else if($d['province']=="SS"){
				$province = "Sumatera Selatan";
			} else if($d['province']=="BE"){
				$province = "Bengkulu";
			} else if($d['province']=="Lampung"){
				$province = "LA";
			} else if($d['province']=="JK"){
				$province = "DKI Jakarta";
			} else if($d['province']=="JB"){
				$province = "Jawa Barat";
			} else if($d['province']=="JT"){
				$province = "Jawa Tengah";
			} else if($d['province']=="DY"){
				$province = "Daerah Istimewa Yogyakarta";
			} else if($d['province']=="JT"){
				$province = "Jawa Timur";
			} else if($d['province']=="KB"){
				$province = "Kalimantan Barat";
			} else if($d['province']=="KT"){
				$province = "Kalimantan Tengah";
			} else if($d['province']=="KI"){
				$province = "Kalimantan Timur";
			} else if($d['province']=="KS"){
				$province = "Kalimantan Selatan";
			} else if($d['province']=="BA"){
				$province = "Bali";
			} else if($d['province']=="NB"){
				$province = "Nusa Tenggara Barat";
			} else if($d['province']=="NT"){
				$province = "Nusa Tenggara Timur";
			} else if($d['province']=="SN"){
				$province = "Sulawesi Selatan";
			} else if($d['province']=="ST"){
				$province = "Sulawesi Tengah";
			} else if($d['province']=="SA"){
				$province = "Sulawesi Utara";
			} else if($d['province']=="SG"){
				$province = "Sulawesi Tenggara";
			} else if($d['province']=="MA"){
				$province = "Maluku";
			} else if($d['province']=="MU"){
				$province = "Maluku Utara";
			} else if($d['province']=="IJ"){
				$province = "Irian Jaya Timur";
			} else if($d['province']=="IT"){
				$province = "Irian Jaya Tengah";
			} else if($d['province']=="IB"){
				$province = "Irian Jaya Barat";
			} else if($d['province']=="BT"){
				$province = "Banten";
			} else if($d['province']=="BB"){
				$province = "Bangka Belitung";
			} else if($d['province']=="GO"){
				$province = "Gorontalo";
			} else if($d['province']==""){
				$province = "";
			}
			$province2 = str_replace(' ', '+', $province);
			$request = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$d['country'].",".$province2."&sensor=false");
			$json = json_decode($request, true);
			$array1 = array(
				'province' => $province,
				'lat' => $json['results'][0]['geometry']['location']['lat'],
				'lng' => $json['results'][0]['geometry']['location']['lng'],
				);
			$this->db->where('id_user', $d['id_user']);
			$this->db->update('user', $array1);
		}
		

		
	}

	public function tes(){

		// $date2 = "02/28/2017";
		// $array = explode("/",$date2);
		// $date = $array[2]."-".$array[0]."-".$array[1];
		// echo $date;
		$tes ="";
		$activity_type = ($tes == '') ? "fak" : "fuck";
		echo $activity_type;

	}

	public function db(){

					$project = $this->m_db->getProject();
                    for ($i=0; $i<count($project); $i++){
                      $title[$i] = $project[$i]["project_title"];
                      
                        
                      	for($j=0; $j<count($title); $j++ ){
                       	$year[$i] = $this->m_db->getYear($title[$i]);
                        
	                      for($k=0; $k<count($year[$i]); $k++){
	                      
	                      $activity[$i][$k] = $this->m_db->getActivity($year[$i][$k]["project_year"]);
	                            
	                        for($l=0; $l<count($activity[$i][$k]); $l++){

	                           $session[$i][$k][$l] = $this->m_db->getSession($activity[$i][$k][$l]['activity_code']);
	                       	}
	                      }
                        
                        }
                        // $year[$i][$j] = $project[$i]["project_year"];
                     }

                      echo "<pre>";
                      // print_r($title);
                      // print_r($year);
                      print_r($activity);
                      // print_r($session);
                      
                      echo "</pre>";
	}



	public function event(){
		$array1 = array(
			
		$project_title = $this->input->post("project_title"),
		$project_year = $this->input->post("project_year"),
		$activity = $this->input->post("activity"),
		$session_title = $this->input->post("session_title"),
		$session_type = $this->input->post("result"),
		$date = $this->input->post("reflection"),
		$time = $this->input->post("followup"),

		);

		
		echo '<pre>';		
		print_r($array1);
		echo '</pre><br/>';
		echo '<pre>';
		print_r($this->do_upload());
		echo '</pre>';
		echo '<pre>';
		print_r($this->do_upload2());
		echo '</pre>';
	}

	function do_upload()
	{        
		$this->load->library('upload');

      //Configure upload.
		$this->upload->initialize(array(
			"allowed_types" => "gif|jpg|png|jpeg|pdf|ppt|xls|csv|docx",
			"upload_path"   => "./uploads/rooster"
			));
		echo $this->input->post("input")." ".$this->input->post("input2");
		echo "<br>";

             //Perform upload.
		if($this->upload->do_upload("rooster")) {
			$uploaded = $this->upload->data();
			echo '<pre>';
			var_export($uploaded);
			echo '</pre>';

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
			"allowed_types" => "gif|jpg|png|jpeg|pdf|ppt|xls|csv|docx",
			"upload_path"   => "./uploads/activity_output"
			));
		echo $this->input->post("input")." ".$this->input->post("input2");
		echo "<br>";

             //Perform upload.
		if($this->upload->do_upload("activity_output")) {
			$uploaded = $this->upload->data();
			echo '<pre>';
			var_export($uploaded);
			echo '</pre>';

			return $uploaded;

		}else{

			return 'GAGAL UPLOAD';
		}
	}

}

