<?php
class Admin extends CI_Controller{

    public function __construct(){

        parent::__construct();

        if(!isset($_SESSION['admin_logged'])){

            $this->session->set_flashdata('error', 'Please Login first to view this page');

            redirect('admin_auth/login','refresh');

        }
    }

    public function reservations_pending(){

        if($_SESSION['admin_logged'] == FALSE){

            $this->session->set_flashdata('error', 'Please Login first to view this page');

            redirect('admin_auth/login','refresh');

        }

        $this->load->model('Admin_model');
        $reservations = $this->Admin_model->get_pending_reservations();
        $data['reservations'] = $reservations;

        $data['title'] = 'Hotel Reservation - Pending Reservations';
        //load views
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/pending_reservations', $data);
        $this->load->view('admin/templates/footer');
    }

    public function reservations_approved(){


        $this->load->model('Admin_model');
        $reservation = $this->Admin_model->get_approved_reservation();
        $data['reservation'] = $reservation;

        $data['title'] = 'Hotel Reservation - Approved Reservations';
        //load views
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/approved_reservations', $data);
        $this->load->view('admin/templates/footer');
    }

    public function reservations_rejected(){


        $this->load->model('Admin_model');
        $reservation = $this->Admin_model->get_rejected_reservation();
        $data['reservation'] = $reservation;

        $data['title'] = 'Hotel Reservation - Rejected Reservations';
        //load views
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/rejected_reservations', $data);
        $this->load->view('admin/templates/footer');
    }

    public function reservations_cancelled(){


        $this->load->model('Admin_model');
        $reservation = $this->Admin_model->get_cancelled_reservation();
        $data['reservation'] = $reservation;

        $data['title'] = 'Hotel Reservation - Cancelled Reservations';
        //load views
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/cancelled_reservations', $data);
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

                redirect('admin/reservations_pending/','refresh');


            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');

                redirect('admin/edit_reservation/'.$id,'refresh');
            }
        }



          

            $data['title'] = 'Hotel Reservation - Edit Reservation';
            //load views
            $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/edit_reservation');
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

        $data['title'] = 'Hotel Reservation - Guests';
        //load views
        $this->load->view('admin/templates/header', $data);
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


        $data['title'] = 'Hotel Reservation - Rooms';
        //load views
        $this->load->view('admin/templates/header', $data);
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

                redirect('admin/rooms','refresh');


            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');

                redirect('admin/add_room','refresh');
            }
        }

        $data['title'] = 'Hotel Reservation - Add Room';
        //load views
        $this->load->view('admin/templates/header', $data);
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

            $data['title'] = 'Hotel Reservation - Edit Room';
            //load views
            $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/edit_room', $data);
        $this->load->view('admin/templates/footer');
    }

    public function upload($id){
        if($_SESSION['admin_logged'] == FALSE){

            $this->session->set_flashdata('error', 'Please Login first to view this page');

            redirect('admin_auth/login','refresh');

        }


        $data['id'] = $id;


        $data['title'] = 'Hotel Reservation - Upload Image';
        //load views
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/upload', $data);
        $this->load->view('admin/templates/footer');
    }

    public function do_upload($id)
        {

            if($_SESSION['admin_logged'] == FALSE){

                $this->session->set_flashdata('error', 'Please Login first to view this page');

                redirect('admin_auth/login','refresh');

            }
                $config['upload_path']          = './uploads';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 4000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                    $this->session->set_flashdata('error', 'An Error occured. Please try again later');

                        redirect('admin/upload/'.$id);
                }
                else
                {
                    $this->session->set_flashdata('success', 'Room Updated Successfully');

                        $post_img = $_FILES['userfile']['name'];
                        $this->load->model('Admin_model');
                $this->Admin_model->add_img($post_img, $id);
                }







                redirect('admin/upload/'.$id,'refresh');


        }

    public function employees(){

        if($_SESSION['admin_logged'] == FALSE){

            $this->session->set_flashdata('error', 'Please Login first to view this page');

            redirect('admin_auth/login','refresh');

        }

        $this->load->model('Admin_model');
        $employees = $this->Admin_model->get_employees();
        $data['employees'] = $employees;


        $data['title'] = 'Hotel Reservation - Employees';
        //load views
        $this->load->view('admin/templates/header', $data);
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

                redirect('admin/employees','refresh');


            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');

                redirect('admin/add_employee','refresh');
            }


            }

        }

        $data['title'] = 'Hotel Reservation - Employees';
        //load views
        $this->load->view('admin/templates/header', $data);
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

            $data['title'] = 'Hotel Reservation - Edit Employee';
            //load views
            $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/edit_employee', $data);
        $this->load->view('admin/templates/footer');
    }

    public function change_password(){



        $this->load->model('Admin_model');

        $username = $_SESSION['admin_username'];




        if(isset($_POST['update'])){

            $this->form_validation->set_rules('cpassword', 'Current Password', 'required|min_length[6]');
            $this->form_validation->set_rules('npassword', 'New Password', 'required|min_length[6]');
            $this->form_validation->set_rules('cnpassword', 'Confirm New Password', 'required|min_length[6]|matches[npassword]');

            if ($this->form_validation->run() == TRUE) {

                $cpassword = md5($_POST['cpassword']);

                $npassword =  md5($_POST['npassword']);

                $cnpassword = md5($_POST['cnpassword']);



                if($password = $this->Admin_model->get_current_password($username))
                {

                if($password->password == $cpassword){

                    if($this->Admin_model->update_password($username,$cnpassword)){
                        $this->session->set_flashdata('success', 'Password Update');

                        redirect('admin/change_password','refresh');


                    } else{
                        $this->session->set_flashdata('error', 'An Error occured. Please try again later');

                        redirect('admin/change_password','refresh');
                    }



                }else {
                    $this->session->set_flashdata('error', 'Current Password Does not match');

                    redirect('admin/change_password','refresh');

                }
            }else {
                $this->session->set_flashdata('error', 'Current Password Does not match');

                redirect('admin/change_password','refresh');

            }

                $data['password'] = md5($_POST['npassword']);





            }
        }

        $data['title'] = 'Hotel Reservation - Change Password';
        //load views
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/logged_navbar');
        $this->load->view('admin/change_password');
        $this->load->view('admin/templates/footer');
    }


}
