<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['homepage']=$this->Login_model->homepage();
		$this->load->view('homepage', $data);
	}

	public function login()
	{
		$this->load->view('Login');
	}

	public function sit()
	{
		$this->load->view('sit');
	}


	public function newUser()
	{
		$this->load->view('Registration');
	}

	public function LgoCheck()
	{

		$result=$this->Login_model->LgoCheck($_POST['email'],$_POST['password']);


		switch ($result['status']) {
			case '1':
				$this->load->view('admin_dashboard');
				break;
			
			default:
				$this->load->view('user_dashboard');
				break;
		}

	}

	public function RegSave()
	{

		// Set validation rules
	    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[50]');
	    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	    $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|exact_length[11]|numeric');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
	    $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[password]');

		// Run form validation
	    if ($this->form_validation->run() == FALSE) {
	        // If validation fails, reload the form with validation errors
	        $this->load->view('Registration');
	    } else {
	        
	        //save to DB
	        $data=array(
	        	'username'=>$_POST['username'],
	        	'email'=>$_POST['email'],
	        	'mobile'=>$_POST['mobile'],
	        	'password'=>$_POST['password'],
	        	'status'=>'1',
	        	);
			$result=$this->Login_model->RegSave($data);
			if ($result) {
				$this->load->view('Login');
			}
	    }

	}

	public function ticket_Search()
    {
        $data['moviename']=$this->Login_model->moviename();
        $data['showtime']=$this->Login_model->showtime();
        $this->load->view('ticket_Search', $data);
    }

    public function TicketBookingService()
    {
         $MV_Name = $this->input->post('show_name');
         $Show_date = date('Y-m-d', strtotime($this->input->post('show_date')));
         $showtime = $this->input->post('show_time');

        // Set the timezone to Asian/Dhaka
        date_default_timezone_set('Asia/Dhaka');

        $data = array(
            'current_date' => date('Y-m-d'),
            'Movie_Name' => $this->Login_model->movie_name($MV_Name),
            'show_time' => $this->Login_model->show_time($showtime),
            'Show_date' => $Show_date,
            'MV_ID' => $MV_Name,
            'Show_ID' => $showtime,
        );

         $this->load->view('sit', $data);
    }
	

	
}
