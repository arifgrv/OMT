<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->library('seat_reservation');
        $this->load->library('invoice_generator');
        $this->load->library('session');
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

	public function logout() {
        $this->session->unset_userdata('user_email');
        $this->session->sess_destroy();
        redirect(base_url('index.php/home')); 
    }

	public function sit()
	{
		$this->load->view('sit');
	}


	public function newUser()
	{
		$this->load->view('Registration');
	}
  	
  	public function is_logged_in() {
        if ($this->session->userdata('user_email') == null) {
        	redirect(base_url('index.php/login')); 
        }
    }

	public function LgoCheck()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$result=$this->Login_model->LgoCheck($_POST['email'],$_POST['password']);
			
			if (!empty($result)) {
				//Set Session Data
				$this->session->set_userdata('user_email',$_POST['email']);

				//Show Dashboard
				switch ($result['acctype']) {
					case '1':
						$this->load->view('admin/admin_dashboard');
						break;
					
					default:
						$this->load->view('user_dashboard');
						break;
				}
			}else{
				redirect(base_url('index.php/login')); 
			}
		}else{
			redirect(base_url('index.php/login')); 
		}
	}

	public function RegSave()
	{
		// MAKE RESERVATION
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
		        	'accstatus'=>'1',
		        	);
				$result=$this->Login_model->RegSave($data);
				if ($result) {
					$this->load->view('Login');
				}
		    }
		}else{
			redirect(base_url('index.php/newUser')); 
		}
	}

	public function ticket_Search()
    {
    	//Login Check
    	$this->is_logged_in();

        $data['moviename']=$this->Login_model->moviename();
        $data['showtime']=$this->Login_model->showtime();
        $this->load->view('ticket_Search', $data);
    }

	public function D_ticket_Search()
    {
    	//Login Check
    	$this->is_logged_in();

        $data['moviename']=$this->Login_model->moviename();
        $data['showtime']=$this->Login_model->showtime();
        $this->load->view('D_ticket_Search', $data);
    }

    public function TicketBookingService()
    {

    	//Login Check
    	$this->is_logged_in();
    	
    	// viw sit plan 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
	    }else{
	    	redirect(base_url('index.php/BookTicket')); 
	    }
    }

    public function DisCountTicketBookingService()
    {

    	//Login Check
    	$this->is_logged_in();
    	
    	// viw sit plan 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

	         $this->load->view('discountsit', $data);
	    }else{
	    	redirect(base_url('index.php/BookTicket')); 
	    }
    }	
    
	public function makeResurve(){

		//Login Check
    	$this->is_logged_in();

    	// MAKE RESERVATION
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {

			date_default_timezone_set('Asia/Dhaka');
			$invoice_number=$this->invoice_generator->generateInvoiceNumber();
			
			$data['invoice_number']=$invoice_number;
			$data['customer_name']=$_POST['name'];
			$data['customer_mobile']=$_POST['mobile'];
			$data['movie_name']=$_POST['show_name'];
			$data['show_time']=$_POST['show_time'];
			$data['reserve_date']=date($_POST['show_date']);
			$data['currentdate']=date('Y-m-d');
			
			foreach ($_POST['seatcheckbox'] as $seat) {
			    switch (true) {
			        case strpos($seat, 'VIP') !== false:
			        	$id=3;
				        $data['sitcategory']=$id;
				        $data['seat_number']=$seat;
				        $data['price']=$this->Login_model->getTicketPriceById($id);
			          break;
			        case strpos($seat, 'J') !== false:
			        	$id=1;
				        $data['sitcategory']=$id;
				        $data['seat_number']=$seat;
				        $data['price']=$this->Login_model->getTicketPriceById($id);
			            break;
			        default:
			        	$id=2;
				        $data['sitcategory']=$id;
				        $data['seat_number']=$seat;
				        $data['price']=$this->Login_model->getTicketPriceById($id);
			            break;
			    }

			    $this->db->insert('reservationrecord',$data);

			}

			$invoice['invoice_record']=$this->Login_model->GetInfoByInvoice($invoice_number);
			$this->load->view('invoice',$invoice);
		}else{
			redirect(base_url('index.php/login')); 
		}
	}

	public function DiscountMakeResurve(){

		//Login Check
    	$this->is_logged_in();

    	// MAKE RESERVATION
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {

			date_default_timezone_set('Asia/Dhaka');
			$invoice_number=$this->invoice_generator->generateInvoiceNumber();
			$selectedSeats = $_POST['seatcheckbox'];
			$data['invoice_number']=$invoice_number;
			$data['customer_name']=$_POST['name'];
			$data['customer_mobile']=$_POST['mobile'];
			$data['movie_name']=$_POST['show_name'];
			$data['show_time']=$_POST['show_time'];
			$data['reserve_date']=date($_POST['show_date']);
			$data['currentdate']=date('Y-m-d');
			$data['seat_number']=implode(", ", $selectedSeats);
			$data['totalbill']=$_POST['totalbill'];
			$data['received']=$_POST['discount_amount'];
			$data['refarence']=$_POST['discount_ref'];
			
			$this->db->insert('discountreservationrecord',$data);

			$invoice['invoice_record']=$this->Login_model->GetInfoByDiscountInvoice($invoice_number);
			$this->load->view('discountinvoice',$invoice);
		}else{
			redirect(base_url('index.php/login')); 
		}
	}

	public function reprint($invoice_number){
		//Login Check
    	$this->is_logged_in();

		$invoice['invoice_record']=$this->Login_model->GetInfoByInvoice($invoice_number);
		$this->load->view('invoice',$invoice);
	}

	public function AccountsReport()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $fromDate=date($_POST['Date_From']);
            $toDate=date($_POST['Date_TO']);
            $data['accReport']=$this->Login_model->Accounts_data_FromTO($fromDate, $toDate);
            $this->load->view('accounts',$data);
        }else{
        	date_default_timezone_set('Asia/Dhaka');
            $fromDate=date('Y-m-d');
            $toDate=date('Y-m-d');
            $data['accReport']=$this->Login_model->Accounts_data_FromTO($fromDate, $toDate);
            $this->load->view('accounts',$data);
        }
    }

}
