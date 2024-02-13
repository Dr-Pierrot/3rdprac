<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
    class Api extends CI_Controller {
       public function index() {
          $this->load->view('index');
       }

       public function getdata(){

        header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); //method allowed
        header('Access-Control-Allow-Origin: *');


        $data = $this->user_model->get_user();

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
       }

       public function getpost(){
         header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
         header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); //method allowed
         header('Access-Control-Allow-Origin: *');

         $data = $this->post_model->get_post();

         $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
       }
       
       public function insertpost(){
         header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
         header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); //method allowed
         header('Access-Control-Allow-Origin: *');

         $title = $this->input->post('title');
         $slug = $this->input->post('title');
         $body = $this->input->post('body');
         
         $data = array(
            'title' => $title,
            'body' => $body,
         );

         // $this->load->model('post_model');
         $query = $this->post_model->create_post($data);
         echo json_encode($query);
       }

       // Add API endpoints as needed
}