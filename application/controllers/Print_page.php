<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Print_page extends CI_Controller

	{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_db');
		$this->load->model('m_upload');
		$this->load->helper('dompdf');
		$this->load->helper('url');
		$this->load->library('pdfgenerator');
		require 'vendor/autoload.php';
	}

	
	public function index(){
		$id = $this->m_db->getID('surat');

		$nama_surat = $this->input->post('nama_surat');
		$nomor_surat = $this->input->post('nomor_surat');
		$status_surat = "Processed";
		$jenis_surat = $this->input->post('jenis_surat');
		// $tanggal_masuk = $this->input->post('tanggal_masuk');
		// $tanggal_keluar = $this->input->post('tanggal_keluar');
		
		$tanggal_masuk = $this->m_db->get_datetime();
		$disposisi = $this->input->post('disposisi');
		$tingkat_keamanan = $this->input->post('tingkat_keamanan');
		$select_tanggal = $this->input->post('select_tanggal');
		$status = $this->input->post('status');
		$perihal = $this->input->post('perihal');
		$nomor_register = $id[0]['MAX(`nomor_register`)']+1;
		$tanggal = $this->m_db->get_datetime();
		if($select_tanggal == "otomatis"){
		$tanggal_surat = $this->m_db->get_datetime();
		}	else {
		$tanggal_surat = $this->input->post('tanggal_surat');
		}
		// $nomor_surat = $this->input->post('nomor_surat');
		// $nama_surat = $this->input->post('nama_surat');
		// $perihal = $this->input->post('perihal');
		// $disposisi = $this->input->post('disposisi');
		// $tingkat_keamanan = $this->input->post('tingkat_keamanan');

		$data = array(
			'nomor_surat' => $nomor_surat,
			'nomor_register' => $nomor_register,
			'nama_surat' => $nama_surat,
			'tanggal_masuk' => $tanggal,
			'tanggal_keluar' => "",
			'perihal' => $perihal,
			'disposisi' => $disposisi,
			'status' => "",
			'status_surat' => "",
			'tingkat_keamanan' => $tingkat_keamanan,
			'jenis_surat' => "",
			'tanggal' => $tanggal_surat,
			'disposisi_ketuaumum' => "",
			'disposisi_sekertariat' => "",
			'disposisi_panitera' => "",

			);
		// $html = $this->load->view('page_prints', $data, true);
		$html = $this->load->view('view_print_page', $data, true);
    // create pdf using dompdf
		
		$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'potrait';
		pdf_create($html, $filename, $paper, $orientation);



		// print_r($data);
	}

	public function cetak_langsung($status){

		if ($status == "Masuk"){

			 $id = $this->m_db->getID('surat_masuk');

			 $nomor_register = $id[0]['MAX(`nomor_register`)']+1;
			
			// $nomor_register = $this->input->post('nomor_register');
			$nama_surat = $this->input->post('nama_surat');
			$nomor_surat = $this->input->post('nomor_surat');
			$status_surat = "Processed";
			// $jenis_surat = $this->input->post('jenis_surat');
			// $tanggal_masuk = $this->input->post('tanggal_masuk');
			// $tanggal_keluar = $this->input->post('tanggal_keluar');
			
			$tanggal_masuk = $this->input->post('tanggal_masuk');
			$tanggal_surat = $this->input->post('tanggal_surat');
			$disposisi = $this->input->post('disposisi');
			$tingkat_keamanan = $this->input->post('tingkat_keamanan');
			// $select_tanggal = $this->input->post('select_tanggal');
			// $status = $this->input->post('status');
			$perihal = $this->input->post('perihal');
			
			
			// $nomor_surat = $this->input->post('nomor_surat');
			// $nama_surat = $this->input->post('nama_surat');
			// $perihal = $this->input->post('perihal');
			// $disposisi = $this->input->post('disposisi');
			// $tingkat_keamanan = $this->input->post('tingkat_keamanan');

			$data = array(
				'nomor_surat' => $nomor_surat,
				'nomor_register' => $nomor_register,
				'nama_surat' => $nama_surat,
				'tanggal_masuk' => $tanggal_masuk,
				'tanggal_keluar' => "",
				'status_surat' => "Processed",
				'perihal' => $perihal,
				'disposisi' => $disposisi,
				'tingkat_keamanan' => $tingkat_keamanan,
			// 'status' => $tes[0]['status'],
			// 'jenis_surat' => $tes[0]['jenis_surat'],
				'tanggal' => $tanggal_surat,
				'disposisi_ketuaumum' => "",
				'disposisi_sekertariat' => "",
				'disposisi_panitera' => "",

				);
			// $html = $this->load->view('page_prints', $data, true);
			$html = $this->load->view('view_print_page_masuk', $data, true);
	    // create pdf using dompdf
			
			$filename = $this->m_upload->get_datetime();
			$paper = 'A4';
			$orientation = 'potrait';
			pdf_create($html, $filename, $paper, $orientation);

		} else {
			// $nomor = urldecode(urldecode($nomor_surat));
			$nomor_surat = $this->input->post("nomor_surat");
			$perihal = $this->input->post("perihal");
			$nomor_register = $this->input->post("nomor_register");
    //load content html
			// $tes = $this->m_db->getRow('surat_keluar',"*", $nomor);
			$data = array(
				'nomor_surat' => $nomor_surat,
				'nomor_register' => $nomor_register,
				'perihal' => $perihal,
			
			);

		
			$html = $this->load->view('view_print_page_keluar', $data, true);
			
	    // create pdf using dompdf
			
			$filename = $this->m_upload->get_datetime();

			$paper = 'A4';
			$orientation = 'potrait';
			pdf_create($html, $filename, $paper, $orientation);
		}

	}


	public function cetak_masuk($nomor_surat){

		$nomor = urldecode(urldecode($nomor_surat));
    //load content html
		$tes = $this->m_db->getRow('surat_masuk',"*", $nomor);
		$data = array(
			'nomor_surat' => $tes[0]['nomor_surat'],
			'nomor_register' => $tes[0]['nomor_register'],
			'nama_surat' => $tes[0]['nama_surat'],
			'tanggal_masuk' => $tes[0]['tanggal_masuk'],
			'tanggal_keluar' => $tes[0]['tanggal_keluar'],
			'status_surat' => $tes[0]['status_surat'],
			'perihal' => $tes[0]['perihal'],
			'disposisi' => $tes[0]['disposisi'],
			'tingkat_keamanan' => $tes[0]['tingkat_keamanan'],
			// 'status' => $tes[0]['status'],
			// 'jenis_surat' => $tes[0]['jenis_surat'],
			'lampiran' => $tes[0]['lampiran'],
			'tanggal' => $tes[0]['tanggal_surat'],
			'disposisi_ketuaumum' => $tes[0]['disposisi_ketuaumum'],
			'disposisi_sekertariat' => $tes[0]['disposisi_sekertaris'],
			'disposisi_panitera' => $tes[0]['disposisi_panitera'],
			);

		$html = $this->load->view('view_print_page_masuk', $data, true);
		
    // create pdf using dompdf
		
		$filename = $this->m_upload->get_datetime();

		$paper = 'A4';
		$orientation = 'potrait';
		$this->load->view('view_print_page_masuk', $data);
		pdf_create($html, $filename, $paper, $orientation);


	}

	public function cetak_perkara($nomor_surat){

		$nomor = urldecode(urldecode($nomor_surat));
    //load content html
		$tes = $this->m_db->getRow('surat_perkara',"*", $nomor);
		$data = array(
			'nomor_surat' => $tes[0]['nomor_surat'],
			'nomor_register' => $tes[0]['nomor_register'],
			'nama_surat' => $tes[0]['nama_surat'],
			'tanggal_masuk' => $tes[0]['tanggal_masuk'],
			'tanggal_keluar' => $tes[0]['tanggal_keluar'],
			'status_surat' => $tes[0]['status_surat'],
			'perihal' => $tes[0]['perihal'],
			'disposisi' => $tes[0]['disposisi'],
			'tingkat_keamanan' => $tes[0]['tingkat_keamanan'],
			// 'status' => $tes[0]['status'],
			// 'jenis_surat' => $tes[0]['jenis_surat'],
			'lampiran' => $tes[0]['lampiran'],
			'tanggal' => $tes[0]['tanggal_surat'],
			'disposisi_ketuaumum' => $tes[0]['disposisi_ketuaumum'],
			'disposisi_sekertariat' => $tes[0]['disposisi_sekertaris'],
			'disposisi_panitera' => $tes[0]['disposisi_panitera'],
			'jenis_perkara' => $tes[0]['jenis_perkara'], 
			);

		$html = $this->load->view('view_print_page_perkara', $data, true);
		
    // create pdf using dompdf
		
		$filename = $this->m_upload->get_datetime();

		$paper = 'A4';
		$orientation = 'potrait';
		// $this->load->view('view_print_page_perkara', $data);
		pdf_create($html, $filename, $paper, $orientation);


	}

	public function cetak_keluar($nomor_surat){

		$nomor = urldecode(urldecode($nomor_surat));
    //load content html
		$tes = $this->m_db->getRow('surat_keluar',"*", $nomor);
		$data = array(
			'nomor_surat' => $tes[0]['nomor_surat'],
			'nomor_register' => $tes[0]['nomor_register'],
			'perihal' => $tes[0]['perihal'],
			
			);

		
		$html = $this->load->view('view_print_page_keluar', $data, true);
		
    // create pdf using dompdf
		
		$filename = $this->m_upload->get_datetime();

		$paper = 'A4';
		$orientation = 'potrait';
		pdf_create($html, $filename, $paper, $orientation);


	}

	public function print_rekap($status){

		 $tes = array('data'=> $this->m_db->getFrom('status', $status), 'date' => $this->m_db->get_datetime());    	
		 
		 $html = $this->load->view('view_print_page', $tes, true);
		 $filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'potrait';
		pdf_create($html, $filename, $paper, $orientation);
		
	}

	public function tes(){

		 $tertanda = $this->input->post('tertanda');
		 echo $tertanda;
		
	}

	public function print_rekap_hari_ini($status, $perkara = ""){

		$date2 = $this->m_db->get_date();
    	$pecah = explode("-", $date2);
		$year = $pecah[0];
		$month = $pecah[1];
		$day = $pecah[2];

		$tertanda = $this->input->post('tertanda');

		if ($perkara != "") {

			$data = $this->m_laporan->getDay($day, $month, $year, $status, $perkara);
			$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date2)), 'status'=> "PERKARA", 'tertanda' =>$tertanda, 'perkara'=> strtoupper($perkara));
			$this->load->view('view_print_page_harian_perkara', $tes);
			// $html = $this->load->view('view_print_page_harian_perkara', $tes, true);

		} else {
			$data = $this->m_laporan->getDay($day, $month, $year, $status);

			if($status == "surat_masuk"){
		    	$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date2)), 'status'=> "MASUK", 'tertanda' =>$tertanda);
		    	$html = $this->load->view('view_print_page_harian_masuk', $tes);
		    	$this->load->view('view_print_page_harian_masuk', $tes, true);
	    	} else {
	    	$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date2)), 'status'=> "KELUAR", 'tertanda' =>$tertanda);
	    	// $html = $this->load->view('view_print_page_harian_keluar', $tes, true);
	    		$this->load->view('view_print_page_harian_keluar', $tes);
	    	}
    	}

    	$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'landscape';
		// $tertanda;
		// pdf_create($html, $filename, $paper, $orientation);
		
	}

	public function print_rekap_bulan_ini($status, $perkara = ""){

		$date2 = $this->m_db->get_date();
    	$pecah = explode("-", $date2);
		$year = $pecah[0];
		$month = $pecah[1];
		$day = $pecah[2];

		$tertanda = $this->input->post('tertanda');

		if ($perkara != "") {

			$data = $this->m_laporan->getMonth($month, $year, $status, $perkara);
			$tes = array('data'=> $data, 'date'=> $date2, 'status'=> "PERKARA ".strtoupper($perkara), 'month' => $month, 'year' => $year, 'tertanda' =>$tertanda);
		    	// $html = $this->load->view('view_print_page_bulanan_masuk', $tes, true);
		    $this->load->view('view_print_page_bulanan_perkara', $tes);

		} else {

			$data = $this->m_laporan->getMonth($month, $year, $status);
			if($status == "surat_masuk"){
		    	$tes = array('data'=> $data, 'date'=> $date2, 'status'=> "MASUK", 'month' => $month, 'year' => $year, 'tertanda' =>$tertanda);
		    	// $html = $this->load->view('view_print_page_bulanan_masuk', $tes, true);
		    	$this->load->view('view_print_page_bulanan_masuk', $tes);
	    	} else {
		    	$tes = array('data'=> $data, 'date'=> $date2, 'status'=> "KELUAR", 'month' => $month, 'year' => $year, 'tertanda' =>$tertanda);
		    	$html = $this->load->view('view_print_page_bulanan_keluar', $tes, true);
		    	$this->load->view('view_print_page_bulanan_keluar', $tes);
	    	}
    	}

    	$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'landscape';
		// pdf_create($html, $filename, $paper, $orientation);
		// echo $tertanda;
		}

	public function print_rekap_bulanan($status, $month, $year, $perkara=""){

		$data = $this->m_laporan->getMonth($month, $year, $status);	

		$tertanda = $this->input->post('tertanda');

		if ($perkara != "") {

			$data = $this->m_laporan->getMonth($month, $year, $status, $perkara);
			$tes = array('data'=> $data, 'status'=> "PERKARA ".strtoupper($perkara), 'month' => $month, 'year' => $year, 'tertanda' =>$tertanda);
		    	// $html = $this->load->view('view_print_page_bulanan_masuk', $tes, true);
		    $this->load->view('view_print_page_bulanan_perkara', $tes);

		} else {

		if($status == "surat_masuk"){
    	$tes = array('data'=> $data, 'status'=> "MASUK", 'month' => $month, 'year' => $year, 'tertanda' =>$tertanda);
    	// $html = $this->load->view('view_print_page_bulanan_masuk', $tes, true);
    	$this->load->view('view_print_page_bulanan_masuk', $tes);
    	} else {
    	$tes = array('data'=> $data, 'status'=> "KELUAR", 'month' => $month, 'year' => $year, 'tertanda' =>$tertanda);
    	// $html = $this->load->view('view_print_page_bulanan_keluar', $tes, true);
    	$this->load->view('view_print_page_bulanan_keluar', $tes);
    	}

    	}
    	

		$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'landscape';
		// pdf_create($html, $filename, $paper, $orientation);

		// print_r($tes);

		//$this->load->view('view_excel', $tes);

	}

	public function print_rekap_tahun_ini($status, $perkara=""){

		$date2 = $this->m_db->get_date();
    	$pecah = explode("-", $date2);
		$year = $pecah[0];
		$month = $pecah[1];
		$day = $pecah[2];

		$tertanda = $this->input->post('tertanda');

		if ($perkara != "") {

			$data = $this->m_laporan->getYear($year, $status, $perkara);
			$tes = array('data'=> $data, 'status'=> "PERKARA ".strtoupper($perkara), 'month' => $month, 'year' => $year, 'tertanda' =>$tertanda);
		    	// $html = $this->load->view('view_print_page_bulanan_masuk', $tes, true);
		    $this->load->view('view_print_page_tahunan_perkara', $tes);

		} else {

			$data = $this->m_laporan->getYear($year, $status);
			
			if($status == "surat_masuk"){
	    	$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date2)), 'status'=> "MASUK", 'year'=>$year, 'tertanda' =>$tertanda);
	    	// $html = $this->load->view('view_print_page_tahunan_masuk', $tes, true);
	    	$this->load->view('view_print_page_tahunan_masuk', $tes);
	    	} else {
	    	$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date2)), 'status'=> "KELUAR", 'year'=>$year, 'tertanda' =>$tertanda);
	    	// $html = $this->load->view('view_print_page_tahunan_keluar', $tes, true);
	    	$this->load->view('view_print_page_tahunan_keluar', $tes);
	    		// $this->load->view('view_print_page_tahunan_keluar', $tes);
	    	}
    	}
    	$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'landscape';
		// $this->load->view('view_print_page_tahunan_masuk', $tes);
		// pdf_create($html, $filename, $paper, $orientation);
		
	}

	public function print_rekap_harian($status, $date, $perkara=""){

		$date2 = urldecode(urldecode($date));
    	$pecah = explode("-", $date2);
		$year = $pecah[0];
		$month = $pecah[1];
		$day = $pecah[2];

		$tertanda = $this->input->post('tertanda');
		if ($perkara != "") {

			$data = $this->m_laporan->getDay($day, $month, $year, $status, $perkara);
			$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date2)), 'status'=> "PERKARA", 'tertanda' =>$tertanda, 'perkara'=> strtoupper($perkara));
			$this->load->view('view_print_page_harian_perkara', $tes);
			// $html = $this->load->view('view_print_page_harian_perkara', $tes, true);

		} else {

			
			$data = $this->m_laporan->getDay($day, $month, $year, $status);

			if($status == "surat_masuk"){
		    	$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date2)), 'status'=> "MASUK", 'tertanda' =>$tertanda);
		    	$html = $this->load->view('view_print_page_harian_masuk', $tes, true);
		    	$this->load->view('view_print_page_harian_masuk', $tes);
	    	} else {
		    	$tes = array('data'=> $data, 'date'=>date("d-m-Y", strtotime($date2)), 'status'=> "KELUAR", 'tertanda' =>$tertanda);
		    	$html = $this->load->view('view_print_page_harian_keluar', $tes, true);
		    	$this->load->view('view_print_page_harian_keluar', $tes);
    		}

    	}

		$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'landscape';
		// $this->load->view('view_print_page_harian_masuk', $tes);
		// pdf_create($html, $filename, $paper, $orientation);
	}

	public function print_rekap_harian_between($status, $date1, $date2, $perkara =""){

		$date3 = urldecode(urldecode($date1));
		$pecah1 = explode("-", $date3);
		$year1 = $pecah1[0];
		$month1 = $pecah1[1];
		$day1 = $pecah1[2];

		$date4 = urldecode(urldecode($date2));
		$pecah2 = explode("-", $date4);
		$year2 = $pecah2[0];
		$month2 = $pecah2[1];
		$day2 = $pecah2[2];

		$tertanda = $this->input->post('tertanda');

		if ($perkara != "") {

			$data = $this->m_laporan->getDayJarak($day1, $month1, $year1, $day2, $month2, $year2, $status, $perkara);
			$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date1))." Sampai Dengan ".date("d-m-Y", strtotime($date2)), 'status'=> "Perkara", 'tertanda' =>$tertanda, 'perkara'=> strtoupper($perkara));
			$this->load->view('view_print_page_harian_perkara', $tes);
			// $html = $this->load->view('view_print_page_harian_perkara', $tes, true);

		} else {
		
		$data = $this->m_laporan->getDayJarak($day1, $month1, $year1, $day2, $month2, $year2, $status);

		if($status == "surat_masuk"){
    	$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date1))." Sampai Dengan ".date("d-m-Y", strtotime($date2)), 'status'=> "MASUK", 'tertanda' =>$tertanda);
    	$this->load->view('view_print_page_harian_masuk', $tes);
    	} else {

    	$tes = array('data'=> $data, 'date'=> date("d-m-Y", strtotime($date1))." Sampai Dengan ".date("d-m-Y", strtotime($date2)), 'status'=> "KELUAR", 'tertanda' =>$tertanda);
    	$this->load->view('view_print_page_harian_keluar', $tes);
    	anchor('Banding/Perdata_buku_register/lihat_semua/','Lihat Buku Register', array('target' => '_blank'));
     		}

	    }

		$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'landscape';

		// $this->session->set_userdata('rekap_harian_between',FALSE);


		
		//$this->load->view('view_print_page_harian_masuk');
		// pdf_create($html, $filename, $paper, $orientation);
	}

	public function print_rekap_mingguan($status, $week, $month, $year){

		$data = $this->m_laporan->getWeek($week, $month, $year, $status);

    	if($status == "surat_masuk"){
    	$tes = array('data'=> $data, 'date'=> $date2, 'status'=> "MASUK", 'month' => $month, 'year' => $year );
    	$html = $this->load->view('view_print_page_bulanan_masuk', $tes, true);
    	} else {
    	$tes = array('data'=> $data, 'date'=> $date2, 'status'=> "KELUAR", 'month' => $month, 'year' => $year);
    	$html = $this->load->view('view_print_page_bulanan_keluar', $tes, true);
    	}

		$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'landscape';
		pdf_create($html, $filename, $paper, $orientation);
		

	}

	

	public function print_rekap_tahunan($status, $year,$perkara=""){

		

		$tertanda = $this->input->post('tertanda');

		if ($perkara != "") {

			$data = $this->m_laporan->getYear($year, $status, $perkara);
			$tes = array('data'=> $data, 'status'=> "PERKARA ".strtoupper($perkara), 'year' => $year, 'tertanda' =>$tertanda);
		    	// $html = $this->load->view('view_print_page_bulanan_masuk', $tes, true);
		    $this->load->view('view_print_page_tahunan_perkara', $tes);

		} else {
			$data = $this->m_laporan->getYear($year, $status);	

			if($status == "surat_masuk"){
	    	$tes = array('data'=> $data, 'date'=> $date2, 'status'=> "MASUK", 'year' => $year, 'tertanda' =>$tertanda);
	    	// $html = $this->load->view('view_print_page_tahunan_masuk', $tes, true);
	    	$this->load->view('view_print_page_tahunan_masuk', $tes);
	    	} else {
	    	$tes = array('data'=> $data, 'date'=> $date2, 'status'=> "KELUAR", 'year' => $year, 'tertanda' =>$tertanda);
	    	// $html = $this->load->view('view_print_page_tahunan_keluar', $tes, true);
	    	$this->load->view('view_print_page_tahunan_keluar', $tes);
    		}
    	}
    	
		$filename = $this->m_upload->get_datetime();
		$paper = 'A4';
		$orientation = 'landscape';
		// pdf_create($html, $filename, $paper, $orientation);
		//$this->load->view('view_excel', $tes);

	}

	private function gen_pdf($html,$paper='A4')
	{
		ob_end_clean();
		$this->load->library('MPDF56/mpdf');
		$mpdf=new mPDF('utf-8', $paper );
		$mpdf->debug = true;
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
	public function doprint($pdf=false)
	{
		$data = array ('data4' => $this->m_upload->show('surat'));
		$output = $this->load->view('view_print_page',$data);
		return $this->gen_pdf($output);
	}
}