<?php

class M_laporan extends CI_Model {
	function __construct() {
		parent::__construct();
		
	}
	
	public function getDay($day, $month, $year, $status, $perkara = "")
	{
		
		if ($perkara == ""){
		$data = $this->db->query("SELECT * FROM `".$status."` WHERE  DAY(tanggal_surat) = ".$day." AND MONTH(tanggal_surat) =".$month." AND YEAR(tanggal_surat)= ".$year); 
		} else {
		$data = $this->db->query("SELECT * FROM `".$status."` WHERE  DAY(tanggal_surat) = ".$day." AND MONTH(tanggal_surat) =".$month." AND YEAR(tanggal_surat)= ".$year." AND `jenis_perkara` = '".$perkara."'"); 	
		}
		
		return $data->result_array();
	}

	public function getDayJarak($day1, $month1, $year1, $day2, $month2, $year2, $status, $perkara= "")
	{
		if ($perkara == ""){
			if ($status == "surat_masuk"){
			$data = $this->db->query("SELECT * FROM `".$status."` WHERE `tanggal_masuk` BETWEEN '".$year1."-".$month1."-".$day1."' AND '".$year2."-".$month2."-".$day2."'" );
			} else {
				$data = $this->db->query("SELECT * FROM `".$status."` WHERE `tanggal_surat` BETWEEN '".$year1."-".$month1."-".$day1."' AND '".$year2."-".$month2."-".$day2."'" );
			}
		} else {
		$data = $this->db->query("SELECT * FROM `".$status."` WHERE `tanggal_surat` BETWEEN '".$year1."-".$month1."-".$day1."' AND '".$year2."-".$month2."-".$day2."' AND `jenis_perkara` = '".$perkara."'");
		}
		return $data->result_array();
	}	


	// public function getWeek($week, $month, $year, $status, $perkara= "")
	// {
	// 	if ($perkara == ""){
	// 	$data = $this->db->query("SELECT * FROM `surat` WHERE  Week(tanggal_surat) = ".$week." AND MONTH(tanggal_surat) =".$month." AND YEAR(tanggal_surat)= ".$year." AND `surat`.`status` = '".$status."'" );
	// 	} else {
	// 	$data = $this->db->query("SELECT * FROM `surat` WHERE  Week(tanggal_surat) = ".$week." AND MONTH(tanggal_surat) =".$month." AND YEAR(tanggal_surat)= ".$year." AND `surat`.`status` = '".$status."' AND `jenis_perkara` = '".$perkara."'" );
		
	// 	}
	// 	return $data->result_array();
	// }

	public function getMonth($month, $year, $status, $perkara= "")
	{
		if ($perkara == ""){
		$data = $this->db->query("SELECT * FROM `".$status."` WHERE MONTH(tanggal_surat) = ".$month." AND YEAR(tanggal_surat) = ".$year);
		} else {
		$data = $this->db->query("SELECT * FROM `".$status."` WHERE MONTH(tanggal_surat) =".$month." AND YEAR(tanggal_surat) = ".$year." AND `jenis_perkara` = '".$perkara."'");
			
		}
		return $data->result_array();
	}
	

	public function getYear($year, $status, $perkara= "")
	{
		if ($perkara == ""){
		$data = $this->db->query("SELECT * FROM `".$status."` WHERE YEAR(tanggal_surat)= ".$year);
		}else {
		$data = $this->db->query("SELECT * FROM `".$status."` WHERE YEAR(tanggal_surat)= ".$year." AND `jenis_perkara` = '".$perkara."'");
		
		}
		return $data->result_array();
	}
	

	

}