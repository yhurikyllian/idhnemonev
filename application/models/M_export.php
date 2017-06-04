<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_export extends CI_Model{

    public function export($activity_code, $opt){
		$filename = $opt;
		
		if($opt == "Event"){
			$query = $this->db->query("SELECT * FROM project p WHERE p.activity_code = '$activity_code'"); 
		} elseif ($opt == "Session") {
			$query = $this->db->query("SELECT s.*, sp.name as nama_speaker, d.file_name as doc FROM session s JOIN speaker sp ON s.id_speaker = sp.id_speaker JOIN document d ON s.id_document = d.id_document WHERE s.activity_code = '$activity_code'"); 
		} elseif ($opt == "Survey") {
			$query = $this->db->query("SELECT * FROM survey s WHERE s.activity_code = '$activity_code'"); 
		} elseif ($opt == "User") {
			$query = $this->db->query("SELECT * FROM userproject up JOIN user u ON up.id_user = u.id_user WHERE up.activity_code = '$activity_code'"); 
		} else {
			$query = $this->db->query("SELECT DISTINCT sp.* FROM session s JOIN speaker sp ON s.id_speaker = sp.id_speaker WHERE s.activity_code = '$activity_code'"); 
		}
		
		
		//$result = $query->result_array(); 
		$file_ending = "xls";

		//header info for browser
		header("Content-Type: application/xls");    
		header("Content-Disposition: attachment; filename=$filename.xls");  
		header("Pragma: no-cache"); 
		header("Expires: 0");

		/*******Start of Formatting for Excel*******/   
		//define separator (defines columns in excel & tabs in word)
		$sep = "\t"; //tabbed character
		//start of printing column names as names of MySQL fields

		$i = 0;
			foreach ($query->list_fields() as $field)
			{
			   	$col[$i] = $field;
			   	$i++;
			} 

		$numcol = sizeof($col);
		//$numcol = $query->num_fields();
		$numrow = $query->num_rows();
		for ($i = 0; $i < $numcol; $i++) {
			echo $col[$i]."\t";
		}
		
		print("\n");  

		foreach ($query->result_array() as $row) {
			$schema_insert = "";

	        for($j=0; $j < $numcol; $j++){

	            if(!isset($row[$col[$j]])) {
                	$schema_insert .= "NULL".$sep;
	            }
	            elseif ($row[$col[$j]] != ""){
	                $schema_insert .= $row[$col[$j]].$sep;
	            }
	            else {
	                $schema_insert .= "".$sep;
	            }
	        }
	        $schema_insert = str_replace($sep."$", "", $schema_insert);
	        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
	        $schema_insert .= "\t";
	        print(trim($schema_insert));
	        print "\n";
		}
	      
	}
    
    
}
?>