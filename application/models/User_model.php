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


                $string = "SELECT * FROM room r where r.room_no NOT IN (SELECT res.room_id FROM reservation res WHERE (res.status != 'cancelled' ) AND (res.status = 'pending') AND (res.check_in_date <= '$checkout' AND res.check_out_date >= '$checkin') OR( res.check_in_date >= '$checkout' AND res.check_out_date <= '$checkin'))";

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
            $this->db->where('room_no =', $this->db->escape_str($id));
            $query = $this->db->get();

            return $query->result();



        }



        public function get_profile($username){

            $this->db->select('*');
            $this->db->from('guest');
            $this->db->where('username', $this->db->escape_str($username));

        $query = $this->db->get();


        return $query->result();

        }

        public function update_profile($username){
            $data = array(
                'address'=> $this->input->post('address'),
                'phone'=> $this->input->post('phone'),
                'email'=> $this->input->post('email')
            );

            $this->db->where('username', $this->db->escape_str($username));
            $this->db->update('guest', $this->db->escape_str($data));

            return $username;
        }

        public function get_current_password($username){

            $this->db->select('*');
            $this->db->from('guest');
            $this->db->where('username', $this->db->escape_str($username));

            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->row();

            }

        }

        public function update_password($username, $cnpassword){
            $data['password'] = $cnpassword;

            $this->db->where('username', $this->db->escape_str($username));
            $this->db->update('guest', $this->db->escape_str($data));

            return $username;
        }

        public function book($userid){

            $data = array(
                'check_in_date'=> $this->input->post('check_in'),
                'check_out_date'=> $this->input->post('check_out'),
                'no_guests'=> $this->input->post('no_guests'),
                'guest_id' => $userid,
                'room_id' => $this->input->post('room_no')
                );

            $this->db->insert('reservation', $this->db->escape_str($data));

            $id = $this->db->insert_id();
            return $id;

        }


        public function get_reservation($userid){

          $status = "pending";
          $this->db->select('*');
          $this->db->from('reservation');
          $this->db->where('guest_id', $this->db->escape_str($userid));
          $this->db->where('status', $this->db->escape_str($status));

            $query = $this->db->get();

            return $query->result();
        }

        public function get_cancelled_reservation($userid){

            $status = "cancelled";
            $this->db->select('*');
            $this->db->from('reservation');
            $this->db->where('guest_id', $this->db->escape_str($userid));
            $this->db->where('status', $this->db->escape_str($status));

            $query = $this->db->get();

            return $query->result();
        }

        public function get_approved_reservation($userid){

          $status = "approved";
          $this->db->select('*');
          $this->db->from('reservation');
          $this->db->where('guest_id', $this->db->escape_str($userid));
          $this->db->where('status', $this->db->escape_str($status));

            $query = $this->db->get();

            return $query->result();
        }

        public function get_rejected_reservation($userid){

          $status = "rejected";
          $this->db->select('*');
          $this->db->from('reservation');
          $this->db->where('guest_id', $this->db->escape_str($userid));
          $this->db->where('status', $this->db->escape_str($status));

            $query = $this->db->get();

            return $query->result();
        }


        public function cancel_booking($id){


            $string = "UPDATE reservation
            SET status = 'cancelled'
            WHERE res_id = '$id'";

                    $query= $this->db->query($string);

        }


        }
