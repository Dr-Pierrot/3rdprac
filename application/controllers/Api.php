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
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Origin: http://localhost:3000'); // Adjust this to match your frontend origin
      
        // Check if it's a preflight request and exit early
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit;
        }
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

       public function deletepost() {
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Origin: *');
    
        $id = $this->input->post('id');
    
        if (!empty($id)) {
            $this->load->model('post_model');
            $result = $this->post_model->delete_post($id);
    
            if ($result) {
                // Post successfully deleted
                echo json_encode(array('message' => 'Post deleted successfully'));
            } else {
                // Error deleting post
                echo json_encode(array('error' => 'Failed to delete post'));
            }
        } else {
            // No post ID provided
            echo json_encode(array('error' => 'No post ID provided'));
        }
    }
    public function updatepost(){
      header('Access-Control-Allow-Headers: Content-Type');
      header('Access-Control-Allow-Methods: POST');
      header('Access-Control-Allow-Origin: http://localhost:3000'); // Adjust this to match your frontend origin

      // Check if it's a preflight request and exit early
      if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
          exit;
      }
      
        $id = $this->input->post('id');  
        $title = $this->input->post('title');
        $slug = url_title($this->input->post('title'));
        $body = $this->input->post('body');
       
       $data = array(
          'title' => $title,
          'slug' => $slug,
          'body' => $body,
       );

       // $this->load->model('post_model');
       $query = $this->post_model->update_post($id, $data);
       echo json_encode($query);
     }

       // Add API endpoints as needed
}