<?php
class Admin extends CI_Controller{

    public function __construct(){

        parent::__construct();

        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }
    }

    public function reservations(){
    
        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        $this->load->model('Admin_model');
        $reservations = $this->Admin_model->get_reservations();
        $data['reservations'] = $reservations;

        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/reservations', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit_reservation($id){
        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        $this->load->model('Admin_model');
        if(isset($_POST['update'])){

            if($this->Admin_model->updateReservation($id)){
                $this->session->set_flashdata('success', 'Reservation Updated Successfully');
                
                redirect('admin/edit_reservation/'.$id,'refresh');
                
                
            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');
            
                redirect('admin/edit_reservation/'.$id,'refresh');
            }
        }

            

            $data['reservation'] = $this->Admin_model->getEmployee($id);

        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/edit_reservation', $data);
        $this->load->view('admin/templates/footer');
    }

    public function profile(){
       
        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/profile');
        $this->load->view('admin/templates/footer');
    }

    public function guests(){

        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        $this->load->model('Admin_model');
        $guests = $this->Admin_model->get_guests();
        $data['guests'] = $guests;

        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/guests', $data);
        $this->load->view('admin/templates/footer');
    }

    public function rooms(){

        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        $this->load->model('Admin_model');
        $rooms = $this->Admin_model->get_all_rooms();
        $data['rooms'] = $rooms;


        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/rooms', $data);
        $this->load->view('admin/templates/footer');
    }


    public function add_room(){
        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        if(isset($_POST['add'])){
            $this->load->model('Admin_model');
            if($this->Admin_model->add_room()){
                $this->session->set_flashdata('success', 'Room Added Successfully');
                
                redirect('admin/add_room','refresh');
                
                
            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');
            
                redirect('admin/add_room','refresh');
            }
        }

        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/add_room');
        $this->load->view('admin/templates/footer');
    }

    public function edit_room($id){
        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        $this->load->model('Admin_model');
        if(isset($_POST['update'])){

            if($this->Admin_model->updateRoom($id)){
                $this->session->set_flashdata('success', 'Room Updated Successfully');
                
                redirect('admin/edit_room/'.$id,'refresh');
                
                
            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');
            
                redirect('admin/edit_room/'.$id,'refresh');
            }
        }

            

            $data['room'] = $this->Admin_model->getRoom($id);

        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/edit_room', $data);
        $this->load->view('admin/templates/footer');
    }

    public function employees(){

        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        $this->load->model('Admin_model');
        $employees = $this->Admin_model->get_employees();
        $data['employees'] = $employees;


        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/employees', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add_employee(){
        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        if(isset($_POST['add'])){

            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[6]|matches[password]');
            $this->form_validation->set_rules('phone_no', 'Phone Number', 'min_length[11]|max_length[11]');
            

            if ($this->form_validation->run() == TRUE) {

                $this->load->model('Admin_model');
            if($this->Admin_model->add_employee()){
                $this->session->set_flashdata('success', 'Employee Added Successfully');
                
                redirect('admin/add_employee','refresh');
                
                
            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');
            
                redirect('admin/add_employee','refresh');
            }
                
                
            }
            
        }

        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/add_employee');
        $this->load->view('admin/templates/footer');
    }

    public function edit_employee($id){
        if($_SESSION['admin_logged'] == FALSE){
            
            $this->session->set_flashdata('error', 'Please Login first to view this page');
            
            redirect('admin_auth/login','refresh');
            
        }

        $this->load->model('Admin_model');
        if(isset($_POST['update'])){

            if($this->Admin_model->updateEmployee($id)){
                $this->session->set_flashdata('success', 'Employee Details Updated Successfully');
                
                redirect('admin/edit_employee/'.$id,'refresh');
                
                
            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');
            
                redirect('admin/edit_employee/'.$id,'refresh');
            }
        }

            

            $data['employee'] = $this->Admin_model->getEmployee($id);

        //load views
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/edit_employee', $data);
        $this->load->view('admin/templates/footer');
    }


}
