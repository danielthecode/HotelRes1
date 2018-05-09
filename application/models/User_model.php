<?php

    class User_model extends CI_Model{

        public function __construct(){

        parent::__construct();
    }

        public function get_room_no(){

            $this->db->select('*');
        $this->db->from('room');
        $query = $this->db->get();
        return $query->result();
        }

        public function search_reservation() {

            $room_id = $this->input->post('room_no');
            $checkin = $this->input->post('check_in');
            $checkout = $this->input->post('check_out');

            $this->db->where('check_in_date = ', $checkin);
            $this->db->where('check_out_date =', $checkout);
            $query = $this->db->get('reservation');

            if ($query->num_rows() > 0)
{
    $this->session->set_flashdata('error', 'Room has been booked');
    
                
    
                
    redirect('users/index','refresh');
    
    
} else{
    $this->session->set_flashdata('success', 'Room is available');

redirect('users/index','refresh');




}            
            
              

        }

        public function get_profile($username){

        $this->db->select('*');
        $this->db->from('guest');
        $this->db->where('username', $username);
        
        $query = $this->db->get();
        return $query->result();

        }

}
