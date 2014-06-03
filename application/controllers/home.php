<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   	$this->load->library('form_validation');

	   	$this->load->model('entrada_model');
	 }

	public function index()
	{
		$postId = NULL;
		 $data['entrada'] = $this->entrada_model->getEntrada($postId);

	if($this->session->userdata('logged_in'))
	   {
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['id'];
	     $data['realname'] = $session_data['name'];

	    $data['principal'] = 'home/entradas';
		$data['login'] = "home/bienvenido.php";
		$data['registro'] = 'home/yaregistrado.php';
		$data['comentarios'] = 'home/comentarios.php';
	     $this->load->view('template', $data);
	   }
	   else
	   {
	    	

		$data['principal'] = 'home/entradas.php';
		$data['login'] = 'home/logueate.php';
		$data['registro'] = 'home/registrate.php';
		$data['comentarios'] = 'home/no_comentarios.php';
		//$data['registro'] ='home/registrate.php'
 		 $this->load->view('template', $data);
	   }
	
	}
	 function comprobar_login()
	 {
	  
	 
	   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	 
	   if($this->form_validation->run() == FALSE)
	   {
	   	
	     //Field validation failed.  User redirected to login page
   $redirect=$this->input->post('redirect'); 
   $this->session->set_flashdata('errors_login', validation_errors());
   redirect($this->input->post('redirect')); 
	      
	   	
	   }
	   else
	   {
	     //Go to private area
	     redirect('home', 'refresh');
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

	 function registrar()
{

		$this->form_validation->set_rules('inputUsername', 'Username', 'trim|required|xss_clean|callback_check_Username');
		$this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inputName', 'Realname', 'trim|required|xss_clean');
	   //$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	 
	if($this->form_validation->run() == FALSE)
	{

   $redirect=$this->input->post('redirect'); 
   $this->session->set_flashdata('errors_reg', validation_errors());
   redirect($this->input->post('redirect')); 
		
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


	function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   //session_destroy();
	   redirect('home', 'refresh');
	 }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */