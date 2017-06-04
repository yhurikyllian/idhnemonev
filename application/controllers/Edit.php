<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Edit extends CI_Controller{

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
			$this->load->view('edit.php');
		}

		
	}

	public function show_table(){

		$activity = $this->input->post("activity");
		$this->session->set_userdata("activity", $activity);
		$this->load->view("edit");
	}


	public function edit_session($id){
		$session = $this->session->userdata('isLogin');
		if($session == FALSE){
			redirect('login/login_form');
		}
		else {
			$data = $this->db->query("SELECT * FROM session WHERE id_session = ".$id)->result_array();
			$data2 = $this->db->query("SELECT * FROM project WHERE activity_code = '".$data[0]['activity_code']."'")->result_array();
			// print_r($data2);
			$this->load->view('edit_session.php', array('data' => $data, 'data2' => $data2));

		}
	}
	public function edit_activity($id){
		$session = $this->session->userdata('isLogin');
		if($session == FALSE){
			redirect('login/login_form');
		}
		else {
			$data = $this->db->query("SELECT * FROM project WHERE activity_code = '".$id."'")->result_array();
			// print_r($data);
			$this->load->view('edit_activity.php', array('data' => $data));
		}
	}
	public function edit_speaker($id){
		$session = $this->session->userdata('isLogin');
		if($session == FALSE){
			redirect('login/login_form');
		}
		else {
			$data = $this->db->query("SELECT * FROM speaker WHERE id_speaker = '".$id."'")->result_array();
			$this->load->view('edit_speaker.php', array('data' => $data));
		}
	}
	public function edit_user($id){

		$session = $this->session->userdata('isLogin');
		if($session == FALSE){
			redirect('login/login_form');
		}
		else {
			$data = $this->db->query("SELECT * FROM user WHERE id_user = '".$id."'")->result_array();
			$this->load->view('edit_user.php', array('data' => $data));
		}
	}

	public function edit_report($id){

		$session = $this->session->userdata('isLogin');
		if($session == FALSE){
			redirect('login/login_form');
		}
		else {
			$data = $this->db->query("SELECT * FROM project_report WHERE id_project_report = '".$id."'")->result_array();
			$data2 = $this->db->query("SELECT * FROM project WHERE activity_code = '".$data[0]['activity_code']."'")->result_array();
			$this->load->view('edit_project_report.php', array('data' => $data, 'data2' => $data2));
		}
	}

	public function update_speaker($id){

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
		$this->db->where('id_speaker', $id);
		$this->db->update('speaker', $array1);
		redirect("edit");

	}

	public function update_user($id){

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
		$country = "Indonesia";
		$province = $this->input->post("province");
		$gender = $this->input->post("gender");
		$age = $this->input->post("age");
		$place_birth = $this->input->post("place_birth");
		$start_date = $this->input->post("date_birth");
		$array_start_date = explode("/",$start_date);
		$start_date_bersih = $array_start_date[2]."-".$array_start_date[0]."-".$array_start_date[1];
		$id_pass = $this->input->post("idpass");
		$address = $this->input->post("address");
		$city = $this->input->post("city");

		// $address = urlencode($_POST['address']);
		//$ch = curl_init();
		//curl_setopt($ch, CURLOPT_URL, "http://maps.google.com/maps/api/geocode/json?address=".$country.",".$province); 
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		//$output = curl_exec($ch);   

		
		//$json = json_decode($output, true);
		$province2 = str_replace(' ', '+', $province);
		$request = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$country.",".$province2."&sensor=false");
		$json = json_decode($request, true);

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
		'city' => $city, 
		'country' => "Indonesia",
		'province' => $province,
		'institution' => $institution,
		'type_institution'=> $institution_type,
		'pos_institution'=> $institution_pos,
		'description' => $resume,
		'area_of_work' => $primary_work,
		'disciplinary'=> $d_background,
		'lat' => $json['results'][0]['geometry']['location']['lat'],
		'lng' => $json['results'][0]['geometry']['location']['lng'],
			
		// $project_title = $this->input->post("project_title"),
		// $project_year = $this->input->post("project_year"),
		// $activity_ = $this->input->post("activity"),
		



		);

		
		// echo "<pre>";
		// print_r($array1);
		// echo "</pre>";

		$this->db->where('id_user', $id);
		$this->db->update('user', $array1);
		redirect("edit");
		
	}

	public function update_session($id){
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

		$doc = $this->do_upload_doc();
		
		
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
					}
				}
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

		// 	echo "<pre>";
		// print_r($array1);
		// echo "</pre>";

		$this->db->where('id_session', $id);
		$this->db->update('session', $array1);
		redirect('edit');
	
	}

	public function update_activity($id){
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
			$agenda = $this->do_upload_agenda();
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
						$iddoc .= "; ".$file_link;

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
						$iddoc .= "; ".$file_link[$i];
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

		// echo "<pre>";
		// print_r($array1);
		// echo "</pre>";
		$this->db->where('activity_code', $id);
		$this->db->update('project', $array1);
		redirect('edit');
	}

	function update_report($id){

		$project_title = $this->input->post("project_title");
		$project_year = $this->input->post("project_year");
		$activity = $this->input->post("activity");
		$session_title = $this->input->post("session_title");
		$session_type = $this->input->post("result");
		$reflection = $this->input->post("reflection");
		$followup = $this->input->post("follow");
		$rooster = $this->do_upload_roster();
		$result = $this->input->post("result");
		$linkrooster = "uploads/doc/rooster/".$rooster['file_name'];
		$activity_output = $this->do_upload_act();
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

		echo "<pre>";
		print_r($array1);
		echo "</pre>";

		$this->db->where('id_project_report', $id);
		$this->db->update('project_report', $array1);
		redirect('edit');
	}

	function do_upload_roster()
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

	function do_upload_act()
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

	function do_upload_agenda()
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

	function do_upload_doc()
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

	public function tes(){


		$data = $this->m_db->getTabel('project', "*"); 
		echo "<table>";
                              foreach($data as $d){ ?>
                              
                              <tr>
                              <?php
                                foreach(array_keys($data[0]) as $d2){
                                echo "<td>".$d[$d2]."</td>";

                                }
                              
                                ?>
                              
                              </tr>


                              <?php } 
                              echo "</table>";
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
}

?>