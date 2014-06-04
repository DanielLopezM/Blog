   <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
     
    Class Comentario_model extends CI_Model
    {
           
            function __construct()
            {
                    parent::__construct();
                    $this->load->model('user_model');
                    $this->load->model('entrada_model');
     
            }

            public function insert_comentario()
            {
                $data=array(

                'entrada_ID'=>$this->input->post('entradaID'),
                'usuario_ID'=>$this->input->post('usuario_ID'),
                'texto'=>$this->input->post('texto')

            );
                $this->db->insert('comentarios',$data);



            return true;
            }
     
         
            public function getComentario($entradaID)
            {
                    $comentarios=array();
                             
                    $query = $this->db->get_where('comentarios', array('entrada_ID' => $entradaID));
                    if ($query->num_rows() !== 0) { 
                                    foreach($query->result() as $row){
                                    $comentarios['id'][] = $row->ID;
                                    $comentarios['entrada_id'][] = $row->entrada_ID;
                                    $comentarios['usuario_ID'][] = $row->usuario_ID;
                                    $comentarios['texto'][] = $row->texto;
                                    $comentarios['modelo'][] = $row->modelo;
                                    $comentarios['marca'][] = $row->marca;
                                    $comentarios['fecha'][] = $row->fecha;
        


//saca el nombre del que ha escrito el comentario
                                    $query2 = $this->user_model->getUser($row->usuario_ID);
                                    if ($query2->num_rows() == 1)
                                    {
                                        foreach($query2->result() as $row2){
                                            $comentarios['nombre'][] = $row2->name;  
                                        }
                                    }
                                    }
                                    return $comentarios;
                            }      
                    
                           
                                  
            }
     
    }