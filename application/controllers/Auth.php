<?php


//this is the controller for customers not signed in


class Auth extends CI_Controller{

    public function __construct(){

        parent::__construct();


    }

    //index page for user not logged in
    public function index(){

        if( isset($_SESSION['user_logged'])){



            redirect('admin/reservations','refresh');

        }

        $data['title'] = 'Hotel Reservation - Index';

        $this->load->model('Auth_model');

        $data['rooms'] = $this->Auth_model->get_all_rooms();

        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');



    }

    //about us page

    public function about(){

        $data['title'] = 'Hotel Reservation - About';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('about');
        $this->load->view('templates/footer');
    }

    //handles the login for the user
    public function login()
    {

        if(isset($_SESSION['user_logged'])){



            redirect('users/index','refresh');

        }

        if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $this->db->select('*');
        $this->db->from('guest');
        $this->db->where(array('username'=>$this->db->escape_str($username), 'password'=>$this->db->escape_str($password)));

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

    $data['title'] = 'Hotel Reservation - Login';
    //load views
    $this->load->view('templates/header', $data);
         $this->load->view('templates/navbar');
         $this->load->view('login');
         $this->load->view('templates/footer');

    }

    //handles the logout for the user
    public function logout(){
        unset($_SESSION);
        session_destroy();
        redirect('login','refresh');

    }

    public function register(){

        if( isset($_SESSION['user_logged'])){



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

                $this->db->insert('guest',$this->db->escape_str($data));

                $this-$this->session->set_flashdata('success', 'You have successfully registered. You can now login');

                redirect('auth/register','refresh');


            }

        }

         $data['title'] = 'Hotel Reservation - Register';
        //load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('register');
        $this->load->view('templates/footer');
    }

}
