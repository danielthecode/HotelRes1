<?php

class Users extends CI_Controller{

    public function __construct(){

        parent::__construct();

        if($_SESSION['user_logged'] == FALSE && !isset($_SESSION['user_logged'])){

            $this->session->set_flashdata('error', 'Please Login first to view this page');

            redirect('auth/login','refresh');

        }
    }


    public function index(){



        $this->load->model('User_model');

        if(isset($_POST['search'])){

            $this->User_model->search_reservation();


        }



        $data['title'] = 'Hotel Reservation - Index';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }

    public function about(){

        $data['title'] = 'Hotel Reservation - About';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/about');
        $this->load->view('templates/footer');
    }


    public function profile(){



        $this->load->model('User_model');

        $username = $_SESSION['username'];
        $profile = $this->User_model->get_profile($username);
        $data['profile'] = $profile;



        $data['title'] = 'Hotel Reservation - Profile';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile(){



        $this->load->model('User_model');

        $username = $_SESSION['username'];
        $profile = $this->User_model->get_profile($username);
        $data['profile'] = $profile;


        if(isset($_POST['update'])){

            if($this->User_model->update_profile($username)){
                $this->session->set_flashdata('success', 'Employee Details Updated Successfully');

                redirect('users/profile','refresh');


            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');

                redirect('users/edit_profile','refresh');
            }
        }

        $data['title'] = 'Hotel Reservation - Edit Profile';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar', $data);
        $this->load->view('user/edit_profile', $data);
        $this->load->view('templates/footer');
    }

    public function change_password(){



        $this->load->model('User_model');

        $username = $_SESSION['username'];




        if(isset($_POST['update'])){

            $this->form_validation->set_rules('cpassword', 'Current Password', 'required|min_length[6]');
            $this->form_validation->set_rules('npassword', 'New Password', 'required|min_length[6]');
            $this->form_validation->set_rules('cnpassword', 'Confirm New Password', 'required|min_length[6]|matches[npassword]');

            if ($this->form_validation->run() == TRUE) {

                $cpassword = md5($_POST['cpassword']);

                $npassword =  md5($_POST['npassword']);

                $cnpassword = md5($_POST['cnpassword']);



                if($password = $this->User_model->get_current_password($username))
                {

                if($password->password == $cpassword){

                    if($this->User_model->update_password($username,$cnpassword)){
                        $this->session->set_flashdata('success', 'Password Update');

                        redirect('users/profile','refresh');


                    } else{
                        $this->session->set_flashdata('error', 'An Error occured. Please try again later');

                        redirect('users/change_password','refresh');
                    }



                }else {
                    $this->session->set_flashdata('error', 'Current Password Does not match');

                    redirect('users/change_password','refresh');

                }
            }else {
                $this->session->set_flashdata('error', 'Current Password Does not match');

                redirect('users/change_password','refresh');

            }

                $data['password'] = md5($_POST['npassword']);
            }
        }

        $data['title'] = 'Hotel Reservation - Change Password';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/change_password');
        $this->load->view('templates/footer');
    }

    public function results(){



        if(!isset($_SESSION['result'])){

            $this->session->set_flashdata('error', 'Please Search for room first');

            redirect('users/index','refresh');

        }

        $this->load->model('User_model');
        if(isset($_POST['search'])){


            $this->User_model->search_reservation();


        }





        $data = array(
            'room' => $_SESSION['result'],
            'checkin' => $_SESSION['checkin'],
            'checkout' => $_SESSION['checkout'],
            'no_guests' => $_SESSION['no_guests'],

        );



        $data['title'] = 'Hotel Reservation - Results';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/results', $data);
        $this->load->view('templates/footer');
    }

    public function booking($id){



        if(!isset($_SESSION['result'])){

            $this->session->set_flashdata('error', 'Please Search for room first');

            redirect('users/index','refresh');

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

$username = $_SESSION['username'];
          $this->User_model->get_profile($username);


            $this->load->library('email');




            $userid = $_SESSION['userid'];
            if($this->User_model->book($userid)){

              $this->load->library('email');

$this->email->from('olugbodidanie@gmail.com', 'Your Name');
$this->email->to('olugbodidanie@gmail.com');

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');

$this->email->send();



                $this->session->set_flashdata('success', 'Booking made Successfully');

                redirect('users/reservations','refresh');


            } else{
                $this->session->set_flashdata('error', 'An Error occured. Please try again later');

                redirect('users/index','refresh');
            }
        }



        $data['title'] = 'Hotel Reservation - Book';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/book', $data);
        $this->load->view('templates/footer');


    }

    public function reservations(){


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

    public function reservations_approved(){


        $this->load->model('User_model');
        $userid = $_SESSION['userid'];
        $reservation = $this->User_model->get_approved_reservation($userid);
        $data['reservation'] = $reservation;

        $data['title'] = 'Hotel Reservation - Approved Reservations';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/approved_reservations', $data);
        $this->load->view('templates/footer');
    }

    public function reservations_cancelled(){


        $this->load->model('User_model');
        $userid = $_SESSION['userid'];
        $reservation = $this->User_model->get_cancelled_reservation($userid);
        $data['reservation'] = $reservation;

        $data['title'] = 'Hotel Reservation - Cancelled';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/cancelled_reservations', $data);
        $this->load->view('templates/footer');
    }

    public function reservations_rejected(){


        $this->load->model('User_model');
        $userid = $_SESSION['userid'];
        $reservation = $this->User_model->get_rejected_reservation($userid);
        $data['reservation'] = $reservation;

        $data['title'] = 'Hotel Reservation - Rejected Reservations';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/logged_navbar');
        $this->load->view('user/rejected_reservations', $data);
        $this->load->view('templates/footer');
    }

    public function cancel_booking($id){

      $this->load->model('User_model');

      $this->User_model->cancel_booking($id);
          $this->session->set_flashdata('success', 'Reservation has been cancelled');

          redirect('users/reservations','refresh');


    }




}
