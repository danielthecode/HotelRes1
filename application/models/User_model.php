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


                $string = "SELECT * FROM room r where r.room_no NOT IN (SELECT res.room_id FROM reservation res WHERE (res.check_in_date <= '$checkout' AND res.check_out_date >= '$checkin') OR( res.check_in_date >= '$checkout' AND res.check_out_date <= '$checkin'))";

                $query= $this->db->query($string);

            if ($query->num_rows() > 0)
            {

                $result = $query->result();

                $this->session->set_flashdata('result', $result);
                $this->session->set_flashdata('checkin', $checkin);
                $this->session->set_flashdata('checkout', $checkout);
                $this->session->set_flashdata('no_guests', $no_guests);

                 $this->session->set_flashdata('success', 'Rooms are available');
                   
                   redirect('users/results','refresh');
                
               
    
    
            } else{

                $this->session->set_flashdata('error', 'Room has been booked');
            
                    redirect('users/index','refresh');
                   
            
                }
            
                
                
                
                

        }
            
        public function get_room($id){

           


            $this->db->select('*');
            $this->db->from('room');
            $this->db->where('room_no =', $id);
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

        public function book($userid){

            $data = array(
                'check_in_date'=> $this->input->post('check_in'),
                'check_out_date'=> $this->input->post('check_out'),
                'no_guests'=> $this->input->post('no_guests'),
                'guest_id' => $userid,
                'room_id' => $this->input->post('room_no')
                );
        
            $this->db->insert('reservation', $data);
        
            $id = $this->db->insert_id();
            return $id;
            
        }


        public function get_reservation($userid){

            $this->db->select('*');
            $this->db->from('reservation');
            $this->db->where('guest_id', $userid);
            
            $query = $this->db->get();
    
            return $query->result();
        }
}
