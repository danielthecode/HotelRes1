<?php

class Auth extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $_SESSION['user_logged'] = NULL;
    }

    public function index(){

        if( $_SESSION['user_logged'] == TRUE){
            
         
            
            redirect('admin/reservations','refresh');
            
        }

        $this->load->model('Auth_model');
        
        $data['rooms'] = $this->Auth_model->get_all_rooms();

        //load views
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');



    }

    public function login()
    {
        
        if( $_SESSION['user_logged'] == TRUE){
            
         
            
            redirect('users/index','refresh');
            
        }

        if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $this->db->select('*');
        $this->db->from('guest');
        $this->db->where(array('username'=>$username, 'password'=>$password));

        $query = $this->db->get();

        $user = $query->row();

        if ($user->email){
            $this->session->set_flashdata('success', 'You are logged in');

            $_SESSION['user_logged'] = TRUE;
            $_SESSION['username'] = $user->username;
            $_SESSION['userid'] = $user->guest_id;

            
            redirect('users/index','refresh');
            
            
        } else{
            $this->session->set_flashdata('error', 'Invalid Username or Password');
        
        redirect('auth/login','refresh');
        
        
        }

    }
         //load views
         $this->load->view('templates/header');
         $this->load->view('templates/navbar');
         $this->load->view('login');
         $this->load->view('templates/footer');
    
    }

    public function logout(){
        unset($_SESSION);
        session_destroy();
        redirect('auth/login','refresh');
        
    }

    public function register(){

        if( $_SESSION['user_logged'] == TRUE){
            
         
            
            redirect('users/index','refresh');
            
        }

        if(isset($_POST['register'])){

            
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[6]|matches[password]');
            $this->form_validation->set_rules('contactno', 'Phone No', 'min_length[11]|max_length[11]');

            
            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'first_name'=>$_POST['firstname'],
                    'last_name'=>$_POST['lastname'],
                    'email'=>$_POST['email'],
                    'address'=>$_POST['address'],
                    'phone'=>$_POST['contactno'],
                    'username'=>$_POST['username'],
                    'password'=>md5($_POST['password'])

                );

                $this->db->insert('guest',$data); 
                
                $this-$this->session->set_flashdata('success', 'You have successfully registered. You can now login');
                
                redirect('auth/register','refresh');
                
                
            } 
        
        }

        //load views
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('register');
        $this->load->view('templates/footer');
    }
}