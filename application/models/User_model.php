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
            $no_guests = $this->input->post('number_guest');

            $this->db->where('room_id = ', $room_id);
            $this->db->where('check_in_date = ', $checkin);
            $this->db->where('check_out_date =', $checkout);
            $query = $this->db->get('reservation');

            if ($query->num_rows() > 0)
            {

                
                
                $this->session->set_flashdata('error', 'Room has been booked');
            
                    redirect('users/index','refresh');
    
    
            } else{

                $this->session->set_flashdata('room_id', $room_id);
                $this->session->set_flashdata('checkin', $checkin);
                $this->session->set_flashdata('checkout', $checkout);
                $this->session->set_flashdata('no_guests', $no_guests);

                 $this->session->set_flashdata('success', 'Room is available');
                   
                   redirect('users/results','refresh');
                   
            
                }

        }
            
        public function get_room(){

            //$room_id = $this->input->post('room_no');

            $room_id = $this->session->flashdata('room_id');


            $this->db->select('*');
            $this->db->from('room');
            $this->db->where('room_no =', $room_id);
            $query = $this->db->get();

            return $query->result();
            
            

        }

        

        public function get_profile($username){

        $this->db->select('*');
        $this->db->from('guest');
        $this->db->where('username', $username);
        
        $query = $this->db->get();
        return $query->result();

        }

}
