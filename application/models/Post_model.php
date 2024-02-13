<?php
    class Post_model extends CI_Model{
    public function __construct() {
        $this->load->database(); // this will open the database
    }

    public function get_post(){

        $query = $this->db->get('posts');
        return $query->result_array();
    }

    public function create_post($data){
        return $this->db->insert('posts', $data);
    }

    public function delete_post($id){
        $this->db->where('id', $id);
        return $this->db->delete('posts');
    }

    public function update_post($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    }
}