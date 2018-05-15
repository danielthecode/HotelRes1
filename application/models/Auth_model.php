<?php 

class Auth_model extends CI_Model{

    public function _construct(){
        parent::__construct();
    }


    public function get_all_rooms(){

        $this->db->select('*');
        $this->db->from('room');
        $query = $this->db->get();

        return $query->result();
    }
    
}