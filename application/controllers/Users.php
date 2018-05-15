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

           $room = $this->User_model->search_reservation();
            $data['room'] = $room;

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

        if($_SESSION['result'] == NULL){
            
            $this->session->set_flashdata('error', 'Please Search for room first');
            
            redirect('users/index','refresh');
            
        }


        $this->load->model('User_model');


        $data = array(
            'room' => $_SESSION['result'],
            'checkin' => $_SESSION['checkin'],
            'checkout' => $_SESSION['checkout'],
            'no_guests' => $_SESSION['no_guests'],

        );

        

        //load views
        $this->load->view('templates/header');
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/results', $data);
        $this->load->view('templates/footer');
    }

    public function booking($id){
        
        if($_SESSION['user_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('auth/login','refresh');
            
        }

        $this->load->model('User_model');
        

        $data1 = $this->User_model->get_room($id);
        

        $data = array(

            'room' => $data1,
            'checkin' => $_SESSION['checkin'],
            'checkout' => $_SESSION['checkout'],
            'no_guests' => $_SESSION['no_guests'],

        );

        if(isset($_POST['book'])){

            $this->load->model('Admin_model');
            $userid = $_SESSION['userid'];
            if($this->User_model->book($userid)){
                $this->session->set_flashdata('success', 'Booking made Successfully');
                
                redirect('users/reservations','refresh');
                
                
            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');
            
                redirect('users/index','refresh');
            }
        }



        //load views
        $this->load->view('templates/header');
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/book', $data);
        $this->load->view('templates/footer');


    }

    public function reservations(){

        if($_SESSION['user_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('auth/login','refresh');
            
        }


        $this->load->model('User_model');
        $userid = $_SESSION['userid'];
        $reservation = $this->User_model->get_reservation($userid);
        $data['reservation'] = $reservation;

        //load views
        $this->load->view('templates/header');
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/reservations', $data);
        $this->load->view('templates/footer');
    }
    
}