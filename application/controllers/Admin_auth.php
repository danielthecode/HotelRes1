<?php

class Admin_auth extends CI_Controller{

    public function __construct(){

        parent::__construct();

        
    }

    public function login()
    {
        
        if( isset($_SESSION['admin_logged'])){
            
         
            
            redirect('admin/reservations_pending','refresh');
            
        }

        if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where(array('username'=>$this->db->escape_str($username), 'password'=>$this->db->escape_str($password)));

        $query = $this->db->get();

        $user = $query->row();

        if ($user->email){
            $this->session->set_flashdata('success', 'You are logged in');

            $_SESSION['admin_logged'] = TRUE;
            $_SESSION['admin_username'] = $user->username;

            
            redirect('admin/reservations_pending','refresh');
            
            
        } else{
            $this->session->set_flashdata('error', 'Invalid Username or Password');
        
        redirect('admin_auth/login','refresh');
        
        
        }

    }
    $data['title'] = 'Hotel Reservation - Admin Login';
    //load views
    $this->load->view('admin/templates/header', $data);
         $this->load->view('admin/templates/navbar');
         $this->load->view('admin/login');
         $this->load->view('admin/templates/footer');
    
    }

    public function logout(){
        unset($_SESSION);
        session_destroy();
        redirect('admin_auth/login','refresh');
        
    }

    
}