<?php 

class Admin_model extends CI_Model{
    
    public function add_room(){

        $data = array(
            'room_type'=> $this->input->post('room_type'),
            'room_price'=> $this->input->post('room_price'),
            'room_desc'=> $this->input->post('description'),
        );

        $this->db->insert('room', $this->db->escape_str($data));

        $id = $this->db->insert_id();
        return $id;
    }

    public function add_img($post_img,$id){


        $string = "UPDATE room
        SET room_img = '$post_img'
        WHERE room_no = '$id'";

                $query= $this->db->query($string);
        
    }

    public function get_all_rooms(){

        $this->db->select('*');
        $this->db->from('room');
        $query = $this->db->get();

        return $query->result();
    }

    public function getRoom($id){

        $this->db->select('*');
        $this->db->where('room_no', $this->db->escape_str($id));
        $this->db->from('room');
        $query = $this->db->get();
        return $query->row();
        
        
    }

    public function updateRoom($id){

        $data = array(
            'room_type'=> $this->input->post('room_type'),
            'room_price'=> $this->input->post('room_price'),
            'room_desc'=> $this->input->post('description'),
        );

        $this->db->where('room_no', $id);
        $this->db->update('room', $this->db->escape_str($data));

        return $id;
        
        
    }

    public function get_pending_reservations(){
        
        $status = "pending";
          $this->db->select('*');
          $this->db->from('reservation');
          $this->db->where('status', $this->db->escape_str($status));

          $query = $this->db->get();


        return $query->result();
    }

    public function get_rejected_reservation(){
        
        $status = "rejected";
          $this->db->select('*');
          $this->db->from('reservation');
          $this->db->where('status', $this->db->escape_str($status));

          $query = $this->db->get();


        return $query->result();
    }

    

      public function get_cancelled_reservation(){

          $status = "cancelled";
          $this->db->select('*');
          $this->db->from('reservation');
          $this->db->where('status', $this->db->escape_str($status));

          $query = $this->db->get();

          return $query->result();
      }

      public function get_approved_reservation(){

        $status = "approved";
        $this->db->select('*');
        $this->db->from('reservation');
        $this->db->where('status', $this->db->escape_str($status));

          $query = $this->db->get();

          return $query->result();
      }

    public function getReservation($id){

        $this->db->select('*');
        $this->db->where('res-id', $$this->db->escape_str($id));
        $this->db->from('reservation');
        $query = $this->db->get();
        return $query->row();
        
        
    }

    public function updateReservation($id){

        $data = array(
            'status'=> $this->input->post('approval')
        );

        $this->db->where('res_id', $this->db->escape_str($id));
        $this->db->update('reservation', $this->db->escape_str($data));

        return $id;
        
        
    }

    public function get_guests(){
        
        $this->db->select('*');
        $this->db->from('guest');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_employees(){
        
        $this->db->select('*');
        $this->db->from('employee');
        $query = $this->db->get();

        return $query->result();
    }

    public function add_employee(){

        $data = array(
            'first_name'=> $this->input->post('first_name'),
            'last_name'=> $this->input->post('last_name'),
            'address'=> $this->input->post('address'),
            'phone_no'=> $this->input->post('phone_no'),
            'email'=> $this->input->post('email'),
            'username'=> $this->input->post('password'),
            'password'=> md5($this->input->post('password')),
            
        );

        $this->db->insert('employee', $this->db->escape_str($data));
        $id = $this->db->insert_id();
        return $id;
    }

    public function getEmployee($id){

        $this->db->select('*');
        $this->db->where('employee_id', $this->db->escape_str($id));
        $this->db->from('employee');
        $query = $this->db->get();
        return $query->row();
        
        
    }

    public function updateEmployee($id){

        $data = array(
            'address'=> $this->input->post('address'),
            'phone_no'=> $this->input->post('phone_no'),
            'email'=> $this->input->post('email')
        );

        $this->db->where('employee_id', $id);
        $this->db->update('employee', $this->db->escape_str($data));

        return $id;
        
        
    }

    public function get_current_password($username){

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('username', $this->db->escape_str($username));

        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();

        }
        
    }

    public function update_password($username, $cnpassword){
        $data['password'] = $cnpassword;

        $this->db->where('username', $this->db->escape_str($username));
        $this->db->update('employee', $this->db->escape_str($data));

        return $username;
    }
}