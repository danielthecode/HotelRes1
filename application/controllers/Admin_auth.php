<?php

class Admin_auth extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $_SESSION['admin_logged'] = NULL;
    }

    public function login()
    {
        
        if( $_SESSION['admin_logged'] == TRUE){
            
         
            
            redirect('admin/reservations','refresh');
            
        }

        if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where(array('username'=>$username, 'password'=>$password));

        $query = $this->db->get();

        $user = $query->row();

        if ($user->email){
            $this->session->set_flashdata('success', 'You are logged in');

            $_SESSION['admin_logged'] = TRUE;
            $_SESSION['admin_username'] = $user->username;

            
            redirect('admin/reservations','refresh');
            
            
        } else{
            $this->session->set_flashdata('error', 'Invalid Username or Password');
        
        redirect('admin_auth/login','refresh');
        
        
        }

    }
         //load views
         $this->load->view('admin/templates/header');
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