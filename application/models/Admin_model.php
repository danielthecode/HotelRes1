<?php 

class Admin_model extends CI_Model{
    
    public function add_room(){

        $data = array(
            'room_type'=> $this->input->post('room_type'),
            'room_price'=> $this->input->post('room_price'),
            'room_desc'=> $this->input->post('description'),
        );

        $this->db->insert('room', $data);

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
        $this->db->where('room_no', $id);
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
        $this->db->update('room', $data);

        return $id;
        
        
    }

    public function get_reservations(){
        
        $this->db->select('*');
        $this->db->from('reservation');
        $query = $this->db->get();

        return $query->result();
    }

    public function getReservation($id){

        $this->db->select('*');
        $this->db->where('res-id', $id);
        $this->db->from('reservation');
        $query = $this->db->get();
        return $query->row();
        
        
    }

    public function updateReservation($id){

        $data = array(
            'approved'=> $this->input->post('approval')
        );

        $this->db->where('res_id', $id);
        $this->db->update('reservation', $data);

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

        $this->db->insert('employee', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function getEmployee($id){

        $this->db->select('*');
        $this->db->where('employee_id', $id);
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
        $this->db->update('employee', $data);

        return $id;
        
        
    }
}