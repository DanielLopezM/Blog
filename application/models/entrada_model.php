    <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
     
    Class Entrada_model extends CI_Model
    {
           
            function __construct()
            {
                    parent::__construct();
                    $this->load->model('user_model');
     
            }
     
         
            public function getEntrada($entradaID)
            {
                    $entrada=array();
                    if ($entradaID !== null){         
                            $query = $this->db->get_where('entradas', array('id' => $entradaID));
                            if ($query->num_rows() == 1) { 
                                    foreach($query->result() as $row){
                                    $entrada['id'] = $row->ID;
                                    $entrada['titulo'] = $row->titulo;
                                    $entrada['contenido'] = $row->contenido;
                                    $entrada['marca'] = $row->marca;
                                    $entrada['modelo'] = $row->modelo;
                                    $entrada['fecha'] = $row->fecha;
                                    $entrada['usuario_id'] = $row->usuario_ID;
                                    $entrada['comentarios'] = $row->usuario_ID;


//saca el nombre del que ha escrito la entrada.
                                    $query2 = $this->user_model->getUser($row->usuario_ID);
                                    if ($query2->num_rows() == 1)
                                    {
                                        foreach($query2->result() as $row2){
                                            $entrada['nombre'] = $row2->name;  
                                        }
                                    }
                                    }
                                    return $entrada;
                            }      
                    } else {
                            $query = $this->db->get('entradas');
                            if ($query->num_rows() !== 0 ){
                                    foreach($query->result() as $row){
                                    $entrada['id'][] = $row->ID;
                                    $entrada['titulo'][] = $row->titulo;
                                    $entrada['contenido'][] = $row->contenido;
                                    $entrada['marca'][] = $row->marca;
                                    $entrada['modelo'][] = $row->modelo;
                                    $entrada['fecha'][] = $row->fecha;
                                    $entrada['usuario_id'][] = $row->usuario_ID;
                                    $entrada['comentarios'][] = $row->num_comentarios;
                                    
                                    $query2 = $this->user_model->getUser($row->usuario_ID);
                                    if ($query2->num_rows() == 1)
                                    {
                                        foreach($query2->result() as $row2){
                                            $entrada['nombre'][] = $row2->name;  
                                        }
                                    }
                                    }
                                    return $entrada;
                            }
                           
                    }              
            }


            public function insert_entrada()
            {
                $data=array(

                'usuario_ID'=>$this->input->post('usuario_ID'),
                'titulo'=>$this->input->post('newTitulo'),
                'contenido'=>"<pre>".$this->input->post('newContenido')."</pre>",
                'marca'=>$this->input->post('marca'),
                'modelo' =>$this->input->post('modelo')

            );
                $this->db->insert('entradas',$data);



            return true;
            }
     
    }