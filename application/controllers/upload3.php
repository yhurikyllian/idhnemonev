<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload3 extends CI_Controller {

 public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

 public function index()
 {
  $this->load->view('upload_form_multi_2');
 }
 
 function do_upload()
 {        
             $this->load->library('upload');
  
      //Configure upload.
             $this->upload->initialize(array(
                  "allowed_types" => "gif|jpg|png|jpeg",
                 "upload_path"   => "./uploads/"
             ));
             echo $this->input->post("input")." ".$this->input->post("input2");
             echo "<br>";
        
             //Perform upload.
             if($this->upload->do_upload("images")) {
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