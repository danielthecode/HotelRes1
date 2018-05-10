<?php

class Users extends CI_Controller{

    public function __construct(){

        parent::__construct();

        if($_SESSION['user_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('auth/login','refresh');
            
        }
    }

    public function index(){
    
        if($_SESSION['user_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('auth/login','refresh');
            
        }

        $this->load->model('User_model');
        $data['room_id'] = $this->User_model->get_room_no();

        if(isset($_POST['search'])){

            $this->User_model->search_reservation();
            

        }
        
        

        //load views
        $this->load->view('templates/header');
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function profile(){
       
        if($_SESSION['user_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('auth/login','refresh');
            
        }

        $this->load->model('User_model');

        $username = $_SESSION['username'];
        $profile = $this->User_model->get_profile($username);
        $data['profile'] = $profile;



        //load views
        $this->load->view('templates/header');
        $this->load->view('templates/logged_navbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function results(){

        if($_SESSION['user_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('auth/login','refresh');
            
        }


        $this->load->model('User_model');

        $data['room'] = $this->User_model->get_room();

        

        //load views
        $this->load->view('templates/header');
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/results', $data);
        $this->load->view('templates/footer');
    }
    
}