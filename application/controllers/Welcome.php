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
		$this->load->view('Login');
	}

	public function newUser()
	{
		$this->load->view('Registration');
	}

	public function LgoCheck()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		$e=$_POST['email'];
		$p=$_POST['password'];
		$result=$this->Login_model->LgoCheck($e,$p);

		echo "<pre>";
		print_r($result);
		echo "</pre>";

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
	    }


	}
	
}
