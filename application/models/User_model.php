<?php
class User_model extends CI_Model {
    public function __construct() {
            $this->load->database(); // this will open the database
        }

    public function get_user(){

        $query = $this->db->get('users');
        return $query->result_array();
    }

}