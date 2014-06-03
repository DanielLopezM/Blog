<?php
	Class User_model extends CI_Model
	{

     function __construct()
     {
        parent::__construct();
     
     }
     
	 public function login($username, $password)
	 {
	   $this -> db -> select('login, password, name');
	   $this -> db -> from('usuarios');
	   $this -> db -> where('login', $username);
	   $this -> db -> where('password', $password);
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {

	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	 }

	public function register_user()
	{
	$data=array(
		'login'=>$this->input->post('inputUsername'),
		'password'=>$this->input->post('inputPassword'),
		'name'=>$this->input->post('inputName')
	);
		$this->db->insert('usuarios',$data);
	return true;
	}

	public function getUser($id)
	{
	   $this -> db -> select('name');
	   $this -> db -> from('usuarios');
	   $this -> db -> where('id', $id);
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();

	   return $query;

	}


	}
	?>