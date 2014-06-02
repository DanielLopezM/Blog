<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   	$this->load->library('form_validation');
	 }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//cambio
		$data['principal'] = 'home/entradas.php';
		$data['login'] = 'home/logueate.php';
		$data['registro'] = 'home/registrate.php';
		//$data['registro'] ='home/registrate.php'
 		 $this->load->view('template', $data);
	}
	 function comprobar_login()
	 {
	  
	 
	   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	 
	   if($this->form_validation->run() == FALSE)
	   {
	   	
	     //Field validation failed.  User redirected to login page
	      $redirect=$this->input->post('redirect'); 
   $this->session->set_flashdata('errors', validation_errors());
   redirect($this->input->post('redirect')); 
	      //index();
	   	
	   }
	   else
	   {
	     //Go to private area
	     redirect('bienvenido', 'refresh');
	   }
	 
	 }
	 

function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');
	 
	   //query the database
	   $result = $this->user_model->login($username, $password);
	 
	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'id' => $row->login,
	         'name' => $row->name
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {

	     $this->form_validation->set_message('check_database', 'Nombre de usuario o contraseña incorrectos.');
	     return false;
	   }
	 }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */