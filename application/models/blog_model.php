   <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
     
    Class Blog_model extends CI_Model
    {
           
            function __construct()
            {
                    parent::__construct();

     
            }

            public function cambiar_titulo()
            {
                $data=array(

                'titulo'=>$this->input->post('newTituloBlog'),
                'subtitulo'=>$this->input->post('newDescripcion')

            );
                $this->db->where('ID', '1')->update('apariencia',$data);



            return true;
            }
     
            public function getTitulo()
            {
                    $datos=array();
                             
                    $query = $this->db->get('apariencia');
                    if ($query->num_rows() == 1) { 
                                    foreach($query->result() as $row){
                                    $datos['tituloblog'] = $row->titulo;
                                    $datos['subtituloblog'] = $row->subtitulo;
                    }

                                    return $datos;
                            }      
                    
                           
                                  
            }
           
     
    }