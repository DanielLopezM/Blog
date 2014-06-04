<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   	$this->load->library('form_validation');

	   	$this->load->model('entrada_model');
	   	$this->load->model('comentario_model');
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
		$data['id'] = $session_data['idnumber'];
		$data['accounttype'] = $session_data['accounttype'];


		//al loguearse, se recogen datos del dispositivo gracias a WURLF Cloud

		// Include the autoloader - edit this path!
require_once 'WURFL/src/autoload.php';
 
// Create a configuration object 
$config = new ScientiaMobile\WurflCloud\Config(); 
 
// Set your WURFL Cloud API Key 
$config->api_key = '954898:bBcFxmhVfn9DWP28LweyCT63YNkJ1jaX';  
 
// Create the WURFL Cloud Client 
$client = new ScientiaMobile\WurflCloud\Client($config); 
 
// Detect your device 
$client->detectDevice(); 
 
// Use the capabilities 
if ($client->getDeviceCapability('ux_full_desktop')) { 
    	$data['marca'] = "dispositivo"; 
        $data['modelo'] = "de escritorio"; 
} else { 
    $data['marca'] = $client->getDeviceCapability('brand_name');
    $data['modelo'] = $client->getDeviceCapability('model_name');
}

		//usuario normal
		if ($data['accounttype'] == 2)
		{

	    $data['principal'] = 'home/entradas';
		$data['login'] = "home/bienvenido.php";
		$data['registro'] = 'home/yaregistrado.php';
		$data['comentarios'] = 'home/comentarios.php';
	     $this->load->view('template', $data);
	 }

	 //administrador
	 else {

//cambio
	 }
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
   //$redirect=$this->input->post('redirect'); 
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
	         'name' => $row->name,
	         'idnumber' =>$row->id,
	         'accounttype' =>$row->tipoid
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


	    /* $sess_array = array();
	     
	       $sess_array = array(
	         'id' => $this->input->post('inputUsername'),
	         'name' => $this->input->post('inputName')
	       );*/

	    //$this->session->set_userdata('logged_in', $sess_array);
$this->session->set_flashdata('registrado', 'registrado2');
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

	function nuevo_comentario()
	{
		$this->form_validation->set_rules('texto', 'Texto', 'trim|required|xss_clean');
		$this->form_validation->set_rules('entradaID', 'EntradaID', 'trim|required|xss_clean');
		$this->form_validation->set_rules('usuario_ID', 'UsuarioID', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
	{

   $redirect=$this->input->post('redirect'); 
	}
	else
	{
		$this->comentario_model->insert_comentario();


$this->db->where('ID', $this->input->post('entradaID'));
$this->db->set('num_comentarios', 'num_comentarios+1', FALSE);
$this->db->update('entradas');
		/*$this->db->set('num_comentarios', 'num_comentarios+1', FALSE);
		$this->db->where('ID', $this->input->post->('entradaID'));
		$this->db->update('entradas');*/
		redirect('home', 'refresh');
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