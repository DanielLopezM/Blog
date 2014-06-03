<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_registro extends CI_Controller {

 function __construct()
{
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->model('user_model','',TRUE);
}

 function index()
{

		$this->form_validation->set_rules('inputUsername', 'Username', 'trim|required|xss_clean|callback_check_Username');
		$this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputName', 'Realname', 'trim|required|xss_clean');
	   //$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	 
	if($this->form_validation->run() == FALSE)
	{

		redirect('home','refresh');
	}
	else
	{
		$this->user_model->register_user();


	     $sess_array = array();
	     
	       $sess_array = array(
	         'id' => $this->input->post('inputUsername'),
	         'name' => $this->input->post('inputName')
	       );

	    $this->session->set_userdata('logged_in', $sess_array);
		redirect('home', 'refresh');
	}
}

 function check_Username($username)
	{
	$this -> db -> select('login');
	   $this -> db -> from('usuarios');
	   $this -> db -> where('login', $username);
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
	   		$this->form_validation->set_message('check_Username', 'La cuenta solicitada ya existe.');

	   		return false;
	    
	   }
	   else
	   {
	     return true;
	   }

	}

}
	 
	?>

