	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	session_start(); //we need to call PHP's session object to access it through CI
	class Bienvenido extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	   	$this->load->library('form_validation');
	 }
	 
	 function index()
	 {
	   if($this->session->userdata('logged_in'))
	   {
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['id'];
	     $data['realname'] = $session_data['name'];

	    $data['principal'] = 'home/entradas';
		$data['login'] = "home/bienvenido.php";
		$data['registro'] = 'home/yaregistrado.php';
	     $this->load->view('template', $data);
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('home', 'refresh');
	   }
	 }
	 
	 function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('home', 'refresh');
	 }
	 
	}
	 
	?>