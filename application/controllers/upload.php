<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {

                $config['upload_path']          = './uploads/baru';
                $config['allowed_types']        = 'gif|jpg|png|pdf|docx|ppt';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }

        public function tes(){

                $number_of_files = sizeof($_FILES['userfile']['tmp_name']);
                echo $number_of_files."<br / >". $this->input->post("shit");

                $config['upload_path']          = './uploads/baru';
                $config['allowed_types']        = 'gif|jpg|png|pdf|docx|ppt|txt';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                $files = $_FILES['userfile'];


                for ($i = 1 ; $i <$number_of_files; $i++){

                $_FILES['userfile']['name'] = $files['name'][$i];
                $_FILES['userfile']['type'] = $files['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['type'][$i];
                $_FILES['userfile']['error'] = $files['error'][$i];
                $_FILES['userfile']['size'] = $files['size'][$i];

                $this->upload->initialize($config);
                $this->load->library('upload', $config);


                     if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
              

                       
                }
        }
}
?>