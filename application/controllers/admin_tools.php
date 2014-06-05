<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_tools extends CI_Controller {


	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   	$this->load->library('form_validation');

	   	$this->load->model('entrada_model');
	   	$this->load->model('comentario_model');
	   	$this->load->model('blog_model');
	 }

	public function index()
	{
$apariencia = $this->blog_model->getTitulo();
$data['tituloblog'] = $apariencia['tituloblog'];
$data['subtituloblog'] = $apariencia['subtituloblog'];

		
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

		//es admin, bien
		if ($data['accounttype'] == 1)
		{

	    $data['principal'] = "home/herramientas";
		$data['login'] = "home/bienvenido.php";
		$data['registro'] = 'home/yaregistrado_admin.php';
		$data['comentarios'] = 'home/comentarios.php';
	     $this->load->view('template', $data);


	 }

	 //no es admin, mal
	 else {
		redirect('home', 'refresh');
	 	
	 }
	   }
	   else
	   {
		redirect('home', 'refresh');
	   }
	
	}


	function nueva_entrada()
	{
		$this->form_validation->set_rules('newTitulo', 'Titulo', 'trim|required|xss_clean');
		$this->form_validation->set_rules('newContenido', 'Contenido', 'trim|required|xss_clean');
		$this->form_validation->set_rules('usuario_ID', 'UsuarioID', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
	{


redirect('admin_tools', 'refresh');	
	}
	else
	{
		$this->entrada_model->insert_entrada();

$this->session->set_flashdata('entrada_env', 'entrada_env2');
		redirect('admin_tools', 'refresh');
	}
}

	function cambiar_titulo()
	{
		
		$this->blog_model->cambiar_titulo();

		$this->session->set_flashdata('cambio_titulo', 'cambio_titulo2');
		redirect('admin_tools', 'refresh');
	}

	 

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */