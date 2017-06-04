<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
class Survey extends CI_Controller{

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
			$this->load->view('survey_report.php');
		}

		

		
	}

	public function load_chart(){

		$activity_code = $this->input->post("activity_code");
		$session = $this->input->post("session");
		$type = $this->input->post("type_value");
		if($type != "country"){
		$chart = 	$this->m_db->getActivitysurvey($activity_code, $type);
		} else{
		$chart = 	$this->m_db->getActivitysurvey($activity_code, 'survey.country');
			
		}
		$jumlah = count($chart);

		for($i = 0; $i< count($chart); $i++){

			$arraychart[$i] = $chart[$i][$type];
	
		}

		$countschart = array_count_values($arraychart);
		$valuechart = array_unique($arraychart);

		$i = 0;

		foreach($valuechart as $d) {
			$valuechart[$i] = $d;
			$nilaichart[] = $countschart[$d];
			$persenchart[] = $countschart[$d] / $jumlah *100;
			$i++;
		}

		ksort($valuechart);	
		$data2 = array('chart'=>$chart,"valuechart" => array_unique($valuechart),
			"persenchart" => $persenchart,"nilaichart"=> $nilaichart);

		echo json_encode($data2);
		
	}



	public function load_table(){

		$activity_code = $this->input->post("activity_code");
		$session = $this->input->post("session");
		// $session = "12";
		// $activity_code = "IN2.1.1";
		$date2 = $this->m_db->getSessionbyId($session);

		$gender = 	$this->m_db->getActivitysurvey($activity_code, 'gender');
		$country = $this->m_db->getActivitysurvey($activity_code, 'survey.country');
		$type_institution = $this->m_db->getActivitysurvey($activity_code, 'type_institution');
		$pos_institution = $this->m_db->getActivitysurvey($activity_code, 'pos_institution');
		$occupation = $this->m_db->getActivitysurvey($activity_code, 'occupation');
		$area_of_work = $this->m_db->getActivitysurvey($activity_code, 'area_of_work');
		$disciplinary = $this->m_db->getActivitysurvey($activity_code, 'disciplinary');
		$questioner = $this->m_db->getActivitysurvey($activity_code, 'q1,q2,q3,q4,q5,q6,q7,q8,q12,q13,q14,q15,q16,q17');
					
		
		$jumlah = count($gender);
		$date_session = $date2[0]['session_date'];


		

		// echo json_encode($data);


		for($i = 0; $i< count($gender); $i++){

			$arraygender[$i] = $gender[$i]['gender'];
			$arraycountry[$i] = $country[$i]['country'];
			$arraytype[$i] = $type_institution[$i]['type_institution'];
			$arraypos[$i] = $pos_institution[$i]['pos_institution'];
			$arrayoccupation[$i] = $occupation[$i]['occupation'];
			$arrayarea[$i] = $area_of_work[$i]['area_of_work'];
			$arraydisciplinary[$i] = $disciplinary[$i]['disciplinary'];
			$arrayquestioner1[$i] = $questioner[$i]['q1'];
			$arrayquestioner2[$i] = $questioner[$i]['q2'];
			$arrayquestioner3[$i] = $questioner[$i]['q3'];
			$arrayquestioner4[$i] = $questioner[$i]['q4'];
			$arrayquestioner5[$i] = $questioner[$i]['q5'];
			$arrayquestioner6[$i] = $questioner[$i]['q6'];
			$arrayquestioner7[$i] = $questioner[$i]['q7'];
			$arrayquestioner8[$i] = $questioner[$i]['q8'];
			$arrayquestioner12[$i] = $questioner[$i]['q12'];
			$arrayquestioner13[$i] = $questioner[$i]['q13'];
			$arrayquestioner14[$i] = $questioner[$i]['q14'];
			$arrayquestioner15[$i] = $questioner[$i]['q15'];
			$arrayquestioner16[$i] = $questioner[$i]['q16'];
			$arrayquestioner17[$i] = $questioner[$i]['q17'];
	
		}

		$countsgender = array_count_values($arraygender);
		$countscountry = array_count_values($arraycountry);
		$countstype = array_count_values($arraytype);
		$countspos = array_count_values($arraypos);
		$countsoccupation = array_count_values($arrayoccupation);
		$countsarea = array_count_values($arrayarea);
		$countsdisciplinary = array_count_values($arraydisciplinary);



		$valuegender = array_unique($arraygender);
		$valuecountry = array_unique($arraycountry);
		$valuetype = array_unique($arraytype);
		$valuepos = array_unique($arraypos);
		$valueoccupation = array_unique($arrayoccupation);
		$valuearea = array_unique($arrayarea);
		$valuedisciplinary = array_unique($arraydisciplinary);

		$i = 0;
		$j = 0;
		$k = 0;
		$l = 0;
		$m = 0;
		$n = 0;
		$o = 0;
		$p = 0;
		
		//JUMLAH QUESTION TOTAL
			$sumquestioner1 = 0;
			$sumquestioner2 = 0;
			$sumquestioner3 = 0;
			$sumquestioner4 = 0;
			$sumquestioner5 = 0;
			$sumquestioner6 = 0;
			$sumquestioner7 = 0;
			$sumquestioner8 = 0;
			$sumquestioner12= 0;
			$sumquestioner13 = 0;
			$sumquestioner14 = 0;
			$sumquestioner15 = 0;
			$sumquestioner16 = 0;
			$sumquestioner17 = 0;

		for($q = 0; $q<$jumlah; $q++){

			$sumquestioner1 += $arrayquestioner1[$q];
			$sumquestioner2 += $arrayquestioner2[$q];
			$sumquestioner3 += $arrayquestioner3[$q];
			$sumquestioner4 += $arrayquestioner4[$q];
			$sumquestioner5 += $arrayquestioner5[$q];
			$sumquestioner6 += $arrayquestioner6[$q];
			$sumquestioner7 += $arrayquestioner7[$q];
			$sumquestioner8 += $arrayquestioner8[$q];
			$sumquestioner12 += $arrayquestioner12[$q];
			$sumquestioner13 += $arrayquestioner13[$q];
			$sumquestioner14 += $arrayquestioner14[$q];
			$sumquestioner15 += $arrayquestioner15[$q];
			$sumquestioner16 += $arrayquestioner16[$q];
			$sumquestioner17 += $arrayquestioner17[$q];

		}

		$total = 7*$jumlah;

		$valueq1 = $sumquestioner1/$jumlah;
		$valueq2 = $sumquestioner2/$jumlah;
		$valueq3 = $sumquestioner3/$jumlah;
		$valueq4 = $sumquestioner4/$jumlah;
		$valueq5 = $sumquestioner5/$jumlah;
		$valueq6 = $sumquestioner6/$jumlah;
		$valueq7 = $sumquestioner7/$jumlah;
		$valueq8 = $sumquestioner8/$jumlah;
		$valueq12 = $sumquestioner12/$jumlah;
		$valueq13 = $sumquestioner13/$jumlah;
		$valueq14 = $sumquestioner14/$jumlah;
		$valueq15 = $sumquestioner15/$jumlah;
		$valueq16 = $sumquestioner16/$jumlah;
		$valueq17 = $sumquestioner17/$jumlah;

		// foreach($valuegender as $d) {
		// 	$valuegender[$i] = $d;
		// 	$persengender[] = $countsgender[$d] / $jumlah *100;
		// 	$i++;
		// }


		// foreach($valuecountry as $d) {
		// 	$valuecountry[$j]=$d;
		// 	$persencountry[] = $countscountry[$d] / $jumlah *100;
		// 	$j++;
		// }
		
		// foreach($valuetype as $d) {

		// 	$valuetype[$k] = $d;
		// 	$persentype[] = $countstype[$d] / $jumlah *100;
		// 	$k++;
		
		// }
		// foreach($valuepos as $d) {
		// 	$valuepos[$l] = $d;
		// 	$persenpos[] = $countspos[$d] / $jumlah *100;
		// 	$l++;
		// }
		// foreach($valueoccupation as $d) {
		// 	$valueoccupation[$m]=$d;
		// 	$persenoccupation[] = $countsoccupation[$d] / $jumlah *100;
		// 	$m++;
		// }

		// foreach($valuearea as $d) {
		// 	$valuearea[$n]=$d;
		// 	$persenarea[] = $countsarea[$d] / $jumlah *100;
		// 	$n++;
		// }
		// foreach($valuedisciplinary as $d) {
		// 	$valuedisciplinary[$o]= $d;
		// 	$persenbackground[] = $countsdisciplinary[$d] / $jumlah *100;
		// 	$o++;
		// }

		foreach($valuegender as $d) {
			$valuegender[$i] = $d;
			$persengender[] = $countsgender[$d] ;
			$i++;
		}


		foreach($valuecountry as $d) {
			$valuecountry[$j]=$d;
			$persencountry[] = $countscountry[$d] ;
			$j++;
		}
		
		foreach($valuetype as $d) {

			$valuetype[$k] = $d;
			$persentype[] = $countstype[$d] ;
			$k++;
		
		}
		foreach($valuepos as $d) {
			$valuepos[$l] = $d;
			$persenpos[] = $countspos[$d] ;
			$l++;
		}
		foreach($valueoccupation as $d) {
			$valueoccupation[$m]=$d;
			$persenoccupation[] = $countsoccupation[$d] ;
			$m++;
		}

		foreach($valuearea as $d) {
			$valuearea[$n]=$d;
			$persenarea[] = $countsarea[$d];
			$n++;
		}
		foreach($valuedisciplinary as $d) {
			$valuedisciplinary[$o]= $d;
			$persenbackground[] = $countsdisciplinary[$d] ;
			$o++;
		}

		ksort($valuegender);
		ksort($valuecountry);
		ksort($valuetype);
		ksort($valuepos);
		ksort($valueoccupation);
		ksort($valuearea);
		ksort($valuedisciplinary);

		

		$data2 = array(
			"jml" => $jumlah, 
			"session_date" => $date_session, 
			"valuegender" => array_unique($valuegender),
			"persengender" => $persengender,
			"valuecountry" => array_unique($valuecountry),
			"persencountry" => $persencountry,
			"valuetype" => array_unique($valuetype),
			"persentype" => $persentype,
			"valueoccupation" => array_unique($valueoccupation),
			"persenoccupation" => $persenoccupation,
			"valuearea" => array_unique($valuearea),
			"persenarea" => $persenarea,
			"valuebackground" => array_unique($valuedisciplinary),
			"persenbackground" => $persenbackground,
			"q1" => $valueq1,
			"q2" => $valueq2,
			"q3" => $valueq3,
			"q4" => $valueq4,
			"q5" => $valueq5,
			"q6" => $valueq6,
			"q7" => $valueq7,
			"q8" => $valueq8,
			"q12" => $valueq12,
			"q13" => $valueq13,
			"q14" => $valueq14,
			"q15" => $valueq15,
			"q16" => $valueq16,
			"q17" => $valueq17,
			);


		// print_r($data2);

		echo json_encode($data2);

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		// print_r($array);

		
	}

	public function load_table2(){

		$activity_code = $this->input->post("activity_code");
		$session = $this->input->post("session");
		// $session = "12";
		// $activity_code = "IN2.1.1";
		$date2 = $this->m_db->getSessionbyId($session);

		$gender = 	$this->m_db->getActivitysurvey($activity_code, 'gender');
		$country = $this->m_db->getActivitysurvey($activity_code, 'survey.country');
		$type_institution = $this->m_db->getActivitysurvey($activity_code, 'type_institution');
		$pos_institution = $this->m_db->getActivitysurvey($activity_code, 'pos_institution');
		$occupation = $this->m_db->getActivitysurvey($activity_code, 'occupation');
		$area_of_work = $this->m_db->getActivitysurvey($activity_code, 'area_of_work');
		$disciplinary = $this->m_db->getActivitysurvey($activity_code, 'disciplinary');
		$questioner = $this->m_db->getActivitysurvey($activity_code, 'q1,q2,q3,q4,q5,q6,q7,q8,q12,q13,q14,q15,q16,q17');
					
		
		$jumlah = count($gender);
		$date_session = $date2[0]['session_date'];


		

		// echo json_encode($data);


		for($i = 0; $i< count($gender); $i++){

			$arraygender[$i] = $gender[$i]['gender'];
			$arraycountry[$i] = $country[$i]['country'];
			$arraytype[$i] = $type_institution[$i]['type_institution'];
			$arraypos[$i] = $pos_institution[$i]['pos_institution'];
			$arrayoccupation[$i] = $occupation[$i]['occupation'];
			$arrayarea[$i] = $area_of_work[$i]['area_of_work'];
			$arraydisciplinary[$i] = $disciplinary[$i]['disciplinary'];
			$arrayquestioner1[$i] = $questioner[$i]['q1'];
			$arrayquestioner2[$i] = $questioner[$i]['q2'];
			$arrayquestioner3[$i] = $questioner[$i]['q3'];
			$arrayquestioner4[$i] = $questioner[$i]['q4'];
			$arrayquestioner5[$i] = $questioner[$i]['q5'];
			$arrayquestioner6[$i] = $questioner[$i]['q6'];
			$arrayquestioner7[$i] = $questioner[$i]['q7'];
			$arrayquestioner8[$i] = $questioner[$i]['q8'];
			$arrayquestioner12[$i] = $questioner[$i]['q12'];
			$arrayquestioner13[$i] = $questioner[$i]['q13'];
			$arrayquestioner14[$i] = $questioner[$i]['q14'];
			$arrayquestioner15[$i] = $questioner[$i]['q15'];
			$arrayquestioner16[$i] = $questioner[$i]['q16'];
			$arrayquestioner17[$i] = $questioner[$i]['q17'];
	
		}

		$countsq1 = array_count_values($arrayquestioner1);
		$countsq2 = array_count_values($arrayquestioner2);
		$countsq3 = array_count_values($arrayquestioner3);
		$countsq4 = array_count_values($arrayquestioner4);
		$countsq5 = array_count_values($arrayquestioner5);
		$countsq6 = array_count_values($arrayquestioner6);
		$countsq7 = array_count_values($arrayquestioner7);
		$countsq8 = array_count_values($arrayquestioner8);
		$countsq12 = array_count_values($arrayquestioner12);
		$countsq13 = array_count_values($arrayquestioner13);
		$countsq14 = array_count_values($arrayquestioner14);
		$countsq15 = array_count_values($arrayquestioner15);
		$countsq16 = array_count_values($arrayquestioner16);
		$countsq17 = array_count_values($arrayquestioner17);

		ksort($countsq1);
		ksort($countsq2);
		ksort($countsq3);
		ksort($countsq4);
		ksort($countsq5);
		ksort($countsq6);
		ksort($countsq7);
		ksort($countsq8);
		ksort($countsq12);
		ksort($countsq13);
		ksort($countsq14);
		ksort($countsq15);
		ksort($countsq16);
		ksort($countsq17);

		foreach ($countsq1 as $key => $value) {
			$valueq1[] = $key;
		}

		foreach ($countsq2 as $key => $value) {
			$valueq2[] = $key;
		}

		foreach ($countsq3 as $key => $value) {
			$valueq3[] = $key;
		}

		foreach ($countsq4 as $key => $value) {
			$valueq4[] = $key;
		}

		foreach ($countsq5 as $key => $value) {
			$valueq5[] = $key;
		}
		foreach ($countsq6 as $key => $value) {
			$valueq6[] = $key;
		}
		foreach ($countsq7 as $key => $value) {
			$valueq7[] = $key;
		}
		foreach ($countsq8 as $key => $value) {
			$valueq8[] = $key;
		}
		foreach ($countsq12 as $key => $value) {
			$valueq12[] = $key;
		}
		foreach ($countsq13 as $key => $value) {
			$valueq13[] = $key;
		}
		foreach ($countsq14 as $key => $value) {
			$valueq14[] = $key;
		}

		foreach ($countsq15 as $key => $value) {
			$valueq15[] = $key;
		}

		foreach ($countsq16 as $key => $value) {
			$valueq16[] = $key;
		}

		foreach ($countsq17 as $key => $value) {
			$valueq17[] = $key;
		}

		$countsq = array(

			'q1' => array_values( array_filter($countsq1)),
			'q2' => array_values( array_filter($countsq2)),
			'q3' => array_values( array_filter($countsq3)),
			'q4' => array_values( array_filter($countsq4)),
			'q5' => array_values( array_filter($countsq5)),
			'q6' => array_values( array_filter($countsq6)),
			'q7' => array_values( array_filter($countsq7)),
			'q8' => array_values( array_filter($countsq8)),
			'q12' => array_values( array_filter($countsq12)),
			'q13' => array_values( array_filter($countsq13)),
			'q14' => array_values( array_filter($countsq14)),
			'q15' => array_values( array_filter($countsq15)),
			'q16' => array_values( array_filter($countsq16)),
			'q17' => array_values( array_filter($countsq17)),
			);

		$valueq = array(

			'q1' => $valueq1,
			'q2' => $valueq2,
			'q3' => $valueq3,
			'q4' => $valueq4,
			'q5' => $valueq5,
			'q6' => $valueq6,
			'q7' => $valueq7,
			'q8' => $valueq8,
			'q12' => $valueq12,
			'q13' => $valueq13,
			'q14' => $valueq14,
			'q15' => $valueq15,
			'q16' => $valueq16,
			'q17' => $valueq17,

			);

		$countsgender = array_count_values($arraygender);
		$countscountry = array_count_values($arraycountry);
		$countstype = array_count_values($arraytype);
		$countspos = array_count_values($arraypos);
		$countsoccupation = array_count_values($arrayoccupation);
		$countsarea = array_count_values($arrayarea);
		$countsdisciplinary = array_count_values($arraydisciplinary);



		$valuegender = array_unique($arraygender);
		$valuecountry = array_unique($arraycountry);
		$valuetype = array_unique($arraytype);
		$valuepos = array_unique($arraypos);
		$valueoccupation = array_unique($arrayoccupation);
		$valuearea = array_unique($arrayarea);
		$valuedisciplinary = array_unique($arraydisciplinary);

		$i = 0;
		$j = 0;
		$k = 0;
		$l = 0;
		$m = 0;
		$n = 0;
		$o = 0;
		$p = 0;
		
		//JUMLAH QUESTION TOTAL
			

		

		// foreach($valuegender as $d) {
		// 	$valuegender[$i] = $d;
		// 	$persengender[] = $countsgender[$d] / $jumlah *100;
		// 	$i++;
		// }


		// foreach($valuecountry as $d) {
		// 	$valuecountry[$j]=$d;
		// 	$persencountry[] = $countscountry[$d] / $jumlah *100;
		// 	$j++;
		// }
		
		// foreach($valuetype as $d) {

		// 	$valuetype[$k] = $d;
		// 	$persentype[] = $countstype[$d] / $jumlah *100;
		// 	$k++;
		
		// }
		// foreach($valuepos as $d) {
		// 	$valuepos[$l] = $d;
		// 	$persenpos[] = $countspos[$d] / $jumlah *100;
		// 	$l++;
		// }
		// foreach($valueoccupation as $d) {
		// 	$valueoccupation[$m]=$d;
		// 	$persenoccupation[] = $countsoccupation[$d] / $jumlah *100;
		// 	$m++;
		// }

		// foreach($valuearea as $d) {
		// 	$valuearea[$n]=$d;
		// 	$persenarea[] = $countsarea[$d] / $jumlah *100;
		// 	$n++;
		// }
		// foreach($valuedisciplinary as $d) {
		// 	$valuedisciplinary[$o]= $d;
		// 	$persenbackground[] = $countsdisciplinary[$d] / $jumlah *100;
		// 	$o++;
		// }

		foreach($valuegender as $d) {
			$valuegender[$i] = $d;
			$persengender[] = $countsgender[$d] ;
			$i++;
		}


		foreach($valuecountry as $d) {
			$valuecountry[$j]=$d;
			$persencountry[] = $countscountry[$d] ;
			$j++;
		}
		
		foreach($valuetype as $d) {

			$valuetype[$k] = $d;
			$persentype[] = $countstype[$d] ;
			$k++;
		
		}
		foreach($valuepos as $d) {
			$valuepos[$l] = $d;
			$persenpos[] = $countspos[$d] ;
			$l++;
		}
		foreach($valueoccupation as $d) {
			$valueoccupation[$m]=$d;
			$persenoccupation[] = $countsoccupation[$d] ;
			$m++;
		}

		foreach($valuearea as $d) {
			$valuearea[$n]=$d;
			$persenarea[] = $countsarea[$d];
			$n++;
		}
		foreach($valuedisciplinary as $d) {
			$valuedisciplinary[$o]= $d;
			$persenbackground[] = $countsdisciplinary[$d] ;
			$o++;
		}

		ksort($valuegender);
		ksort($valuecountry);
		ksort($valuetype);
		ksort($valuepos);
		ksort($valueoccupation);
		ksort($valuearea);
		ksort($valuedisciplinary);

		

		$data2 = array(
			"jml" => $jumlah, 
			"session_date" => $date_session, 
			"valuegender" => array_unique($valuegender),
			"persengender" => $persengender,
			"valuecountry" => array_unique($valuecountry),
			"persencountry" => $persencountry,
			"valuetype" => array_unique($valuetype),
			"persentype" => $persentype,
			"valueoccupation" => array_unique($valueoccupation),
			"persenoccupation" => $persenoccupation,
			"valuearea" => array_unique($valuearea),
			"persenarea" => $persenarea,
			"valuebackground" => array_unique($valuedisciplinary),
			"persenbackground" => $persenbackground,
			'value' => $valueq, 
			'counts' => $countsq,
			
			);


		// print_r($data2);

		echo json_encode($data2);

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		// print_r($array);

		
	}

	function tes3(){

		$questioner = $this->m_db->getActivitysurvey('IN2.1.1', 'q1,q2,q3,q4,q5,q6,q7,q8,q12,q13,q14,q15,q16,q17');
		for($i = 0; $i< count($questioner); $i++){
			$arrayquestioner1[$i] = $questioner[$i]['q1'];
			$arrayquestioner2[$i] = $questioner[$i]['q2'];
			$arrayquestioner3[$i] = $questioner[$i]['q3'];
			$arrayquestioner4[$i] = $questioner[$i]['q4'];
			$arrayquestioner5[$i] = $questioner[$i]['q5'];
			$arrayquestioner6[$i] = $questioner[$i]['q6'];
			$arrayquestioner7[$i] = $questioner[$i]['q7'];
			$arrayquestioner8[$i] = $questioner[$i]['q8'];
			$arrayquestioner12[$i] = $questioner[$i]['q12'];
			$arrayquestioner13[$i] = $questioner[$i]['q13'];
			$arrayquestioner14[$i] = $questioner[$i]['q14'];
			$arrayquestioner15[$i] = $questioner[$i]['q15'];
			$arrayquestioner16[$i] = $questioner[$i]['q16'];
			$arrayquestioner17[$i] = $questioner[$i]['q17'];
	
		}

		$countsq1 = array_count_values($arrayquestioner1);
		$countsq2 = array_count_values($arrayquestioner2);
		$countsq3 = array_count_values($arrayquestioner3);
		$countsq4 = array_count_values($arrayquestioner4);
		$countsq5 = array_count_values($arrayquestioner5);
		$countsq6 = array_count_values($arrayquestioner6);
		$countsq7 = array_count_values($arrayquestioner7);
		$countsq8 = array_count_values($arrayquestioner8);
		$countsq12 = array_count_values($arrayquestioner12);
		$countsq13 = array_count_values($arrayquestioner13);
		$countsq14 = array_count_values($arrayquestioner14);
		$countsq15 = array_count_values($arrayquestioner15);
		$countsq16 = array_count_values($arrayquestioner16);
		$countsq17 = array_count_values($arrayquestioner17);

		ksort($countsq1);
		ksort($countsq2);
		ksort($countsq3);
		ksort($countsq4);
		ksort($countsq5);
		ksort($countsq6);
		ksort($countsq7);
		ksort($countsq8);
		ksort($countsq12);
		ksort($countsq13);
		ksort($countsq14);
		ksort($countsq15);
		ksort($countsq16);
		ksort($countsq17);

		$q1 =0;
		$q2 =0;
		$q3 =0;
		$q4 =0;
		$q5 =0;
		$q6 =0;
		$q7 =0;
		$q8 =0;
		$q12 =0;
		$q13 =0;
		$q14 =0;
		$q15 =0;
		$q16 =0;
		$q17 =0;
		


		foreach ($countsq1 as $key => $value) {
			// $countsq1[$q1]=$value;
			$valueq1[] = $key;
		}

		foreach ($countsq2 as $key => $value) {
			$valueq2[] = $key;
		}

		foreach ($countsq3 as $key => $value) {
			$valueq3[] = $key;
		}

		foreach ($countsq4 as $key => $value) {
			$valueq4[] = $key;
		}

		foreach ($countsq5 as $key => $value) {
			$valueq5[] = $key;
		}
		foreach ($countsq6 as $key => $value) {
			$valueq6[] = $key;
		}
		foreach ($countsq7 as $key => $value) {
			$valueq7[] = $key;
		}
		foreach ($countsq8 as $key => $value) {
			$valueq8[] = $key;
		}
		foreach ($countsq12 as $key => $value) {
			$valueq12[] = $key;
		}
		foreach ($countsq13 as $key => $value) {
			$valueq13[] = $key;
		}
		foreach ($countsq14 as $key => $value) {
			$valueq14[] = $key;
		}

		foreach ($countsq15 as $key => $value) {
			$valueq15[] = $key;
		}

		foreach ($countsq16 as $key => $value) {
			$valueq16[] = $key;
		}

		foreach ($countsq17 as $key => $value) {
			$valueq17[] = $key;
		}

		$countsq = array(

			'q1' => array_values( array_filter($countsq1)),
			'q2' => array_values( array_filter($countsq2)),
			'q3' => array_values( array_filter($countsq3)),
			'q4' => array_values( array_filter($countsq4)),
			'q5' => array_values( array_filter($countsq5)),
			'q6' => array_values( array_filter($countsq6)),
			'q7' => array_values( array_filter($countsq7)),
			'q8' => array_values( array_filter($countsq8)),
			'q12' => array_values( array_filter($countsq12)),
			'q13' => array_values( array_filter($countsq13)),
			'q14' => array_values( array_filter($countsq14)),
			'q15' => array_values( array_filter($countsq15)),
			'q16' => array_values( array_filter($countsq16)),
			'q17' => array_values( array_filter($countsq17)),

			);

		$valueq = array(

			'q1' => $valueq1,
			'q2' => $valueq2,
			'q3' => $valueq3,
			'q4' => $valueq4,
			'q5' => $valueq5,
			'q6' => $valueq6,
			'q7' => $valueq7,
			'q8' => $valueq8,
			'q12' => $valueq12,
			'q13' => $valueq13,
			'q14' => $valueq14,
			'q15' => $valueq15,
			'q16' => $valueq16,
			'q17' => $valueq17,

			);

		$question = array(
			'value' => $valueq, 'counts' => $countsq

			);

		foreach ($countsq1 as $key => $value) {
			$valueq1[] = $key;
		}

		echo "<pre>";
		print_r($question);
		// echo $counts ;
		echo "</pre>";
		
		
	}


	function tes(){

		// $activity_code = $this->input->post("activity_codess");
		// $session = $this->input->post("session");
		$session = "12";
		$activity_code = "IN2.1.1";
		$date2 = $this->m_db->getSessionbyId($session);

		$gender = 	$this->m_db->getActivitysurvey($activity_code, 'gender');
		$country = $this->m_db->getActivitysurvey($activity_code, 'survey.country');
		$type_institution = $this->m_db->getActivitysurvey($activity_code, 'type_institution');
		$pos_institution = $this->m_db->getActivitysurvey($activity_code, 'pos_institution');
		$occupation = $this->m_db->getActivitysurvey($activity_code, 'occupation');
		$area_of_work = $this->m_db->getActivitysurvey($activity_code, 'area_of_work');
		$disciplinary = $this->m_db->getActivitysurvey($activity_code, 'disciplinary');
		$questioner = $this->m_db->getActivitysurvey($activity_code, 'q1,q2,q3,q4,q5,q6,q7,q8,q12,q13,q14,q15,q16,q17');
					
		
		$jumlah = count($gender);
		$date_session = $date2[0]['session_date'];


		

		// echo json_encode($data);


		for($i = 0; $i< count($gender); $i++){

			$arraygender[$i] = $gender[$i]['gender'];
			$arraycountry[$i] = $country[$i]['country'];
			$arraytype[$i] = $type_institution[$i]['type_institution'];
			$arraypos[$i] = $pos_institution[$i]['pos_institution'];
			$arrayoccupation[$i] = $occupation[$i]['occupation'];
			$arrayarea[$i] = $area_of_work[$i]['area_of_work'];
			$arraydisciplinary[$i] = $disciplinary[$i]['disciplinary'];
			$arrayquestioner1[$i] = $questioner[$i]['q1'];
			$arrayquestioner2[$i] = $questioner[$i]['q2'];
			$arrayquestioner3[$i] = $questioner[$i]['q3'];
			$arrayquestioner4[$i] = $questioner[$i]['q4'];
			$arrayquestioner5[$i] = $questioner[$i]['q5'];
			$arrayquestioner6[$i] = $questioner[$i]['q6'];
			$arrayquestioner7[$i] = $questioner[$i]['q7'];
			$arrayquestioner8[$i] = $questioner[$i]['q8'];
			$arrayquestioner12[$i] = $questioner[$i]['q12'];
			$arrayquestioner13[$i] = $questioner[$i]['q13'];
			$arrayquestioner14[$i] = $questioner[$i]['q14'];
			$arrayquestioner15[$i] = $questioner[$i]['q15'];
			$arrayquestioner16[$i] = $questioner[$i]['q16'];
			$arrayquestioner17[$i] = $questioner[$i]['q17'];
	
		}

		$countsgender = array_count_values($arraygender);
		$countscountry = array_count_values($arraycountry);
		$countstype = array_count_values($arraytype);
		$countspos = array_count_values($arraypos);
		$countsoccupation = array_count_values($arrayoccupation);
		$countsarea = array_count_values($arrayarea);
		$countsdisciplinary = array_count_values($arraydisciplinary);



		$valuegender = array_unique($arraygender);
		$valuecountry = array_unique($arraycountry);
		$valuetype = array_unique($arraytype);
		$valuepos = array_unique($arraypos);
		$valueoccupation = array_unique($arrayoccupation);
		$valuearea = array_unique($arrayarea);
		$valuedisciplinary = array_unique($arraydisciplinary);

		$i = 0;
		$j = 0;
		$k = 0;
		$l = 0;
		$m = 0;
		$n = 0;
		$o = 0;
		$p = 0;
		
		//JUMLAH QUESTION TOTAL
			$sumquestioner1 = 0;
			$sumquestioner2 = 0;
			$sumquestioner3 = 0;
			$sumquestioner4 = 0;
			$sumquestioner5 = 0;
			$sumquestioner6 = 0;
			$sumquestioner7 = 0;
			$sumquestioner8 = 0;
			$sumquestioner12= 0;
			$sumquestioner13 = 0;
			$sumquestioner14 = 0;
			$sumquestioner15 = 0;
			$sumquestioner16 = 0;
			$sumquestioner17 = 0;

		for($q = 0; $q<$jumlah; $q++){

			$sumquestioner1 += $arrayquestioner1[$q];
			$sumquestioner2 += $arrayquestioner2[$q];
			$sumquestioner3 += $arrayquestioner3[$q];
			$sumquestioner4 += $arrayquestioner4[$q];
			$sumquestioner5 += $arrayquestioner5[$q];
			$sumquestioner6 += $arrayquestioner6[$q];
			$sumquestioner7 += $arrayquestioner7[$q];
			$sumquestioner8 += $arrayquestioner8[$q];
			$sumquestioner12 += $arrayquestioner12[$q];
			$sumquestioner13 += $arrayquestioner13[$q];
			$sumquestioner14 += $arrayquestioner14[$q];
			$sumquestioner15 += $arrayquestioner15[$q];
			$sumquestioner16 += $arrayquestioner16[$q];
			$sumquestioner17 += $arrayquestioner17[$q];

		}

		$total = 7*$jumlah;

		$valueq1 = $sumquestioner1/$jumlah;
		$valueq2 = $sumquestioner2/$jumlah;
		$valueq3 = $sumquestioner3/$jumlah;
		$valueq4 = $sumquestioner4/$jumlah;
		$valueq5 = $sumquestioner5/$jumlah;
		$valueq6 = $sumquestioner6/$jumlah;
		$valueq7 = $sumquestioner7/$jumlah;
		$valueq8 = $sumquestioner8/$jumlah;
		$valueq12 = $sumquestioner12/$jumlah;
		$valueq13 = $sumquestioner13/$jumlah;
		$valueq14 = $sumquestioner14/$jumlah;
		$valueq15 = $sumquestioner15/$jumlah;
		$valueq16 = $sumquestioner16/$jumlah;
		$valueq17 = $sumquestioner17/$jumlah;

		foreach($valuegender as $d) {
			$valuegender[$i] = $d;
			$persengender[] = $countsgender[$d] / $jumlah *100;
			$i++;
		}


		foreach($valuecountry as $d) {
			$valuecountry[$j]=$d;
			$persencountry[] = $countscountry[$d] / $jumlah *100;
			$j++;
		}
		
		foreach($valuetype as $d) {

			$valuetype[$k] = $d;
			$persentype[] = $countstype[$d] / $jumlah *100;
			$k++;
		
		}
		foreach($valuepos as $d) {
			$valuepos[$l] = $d;
			$persenpos[] = $countspos[$d] / $jumlah *100;
			$l++;
		}
		foreach($valueoccupation as $d) {
			$valueoccupation[$m]=$d;
			$persenoccupation[] = $countsoccupation[$d] / $jumlah *100;
			$m++;
		}

		foreach($valuearea as $d) {
			$valuearea[$n]=$d;
			$persenarea[] = $countsarea[$d] / $jumlah *100;
			$n++;
		}
		foreach($valuedisciplinary as $d) {
			$valuedisciplinary[$o]= $d;
			$persenbackground[] = $countsdisciplinary[$d] / $jumlah *100;
			$o++;
		}
		ksort($valuegender);
		ksort($valuecountry);
		ksort($valuetype);
		ksort($valuepos);
		ksort($valueoccupation);
		ksort($valuearea);
		ksort($valuedisciplinary);

		

		$data2 = array(
			"jml" => $jumlah, 
			"session_date" => $date_session, 
			"valuegender" => array_unique($valuegender),
			"persengender" => $persengender,
			"valuecountry" => array_unique($valuecountry),
			"persencountry" => $persencountry,
			"valuetype" => array_unique($valuetype),
			"persentype" => $persentype,
			"valueoccupation" => array_unique($valueoccupation),
			"persenoccupation" => $persenoccupation,
			"valuearea" => array_unique($valuearea),
			"persenarea" => $persenarea,
			"valuebackground" => array_unique($valuedisciplinary),
			"persenbackground" => $persenbackground,
			"q1" => $valueq1,
			"q2" => $valueq2,
			"q3" => $valueq3,
			"q4" => $valueq4,
			"q5" => $valueq5,
			"q6" => $valueq6,
			"q7" => $valueq7,
			"q8" => $valueq8,
			"q12" => $valueq12,
			"q13" => $valueq13,
			"q14" => $valueq14,
			"q15" => $valueq15,
			"q16" => $valueq16,
			"q17" => $valueq17,
			);

		echo "<pre>";
		print_r($data2);
		// print_r($valuetype);
		echo "</pre>";


	}

	function tes2(){

		// $activity_code = $this->input->post("activity_code");
		// $session = $this->input->post("session");
		// $type = $this->input->post("type_value");

		$activity_code = "IN2.1.1";
		$type = "country";
		$chart = 	$this->m_db->getActivitysurvey($activity_code, $type);

		$jumlah = count($chart);

		for($i = 0; $i< count($chart); $i++){

			$arraychart[$i] = $chart[$i][$type];
	
		}

		$countschart = array_count_values($arraychart);
		$valuechart = array_unique($arraychart);

		$i = 0;

		foreach($valuechart as $d) {
			$valuechart[$i] = $d;
			$persenchart[] = $countschart[$d] / $jumlah *100;
			$i++;
		}

		ksort($valuechart);	
		$data2 = array("valuechart" => array_unique($valuechart),
			"persenchart" => $persenchart,);
		echo "<pre>";
		print_r($data2);
		echo "</pre>";
		// echo json_encode($data2);
	}
}

?>