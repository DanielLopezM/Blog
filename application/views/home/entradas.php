     
<?php 
            $cantidad = count($entrada['id']);
            for ($i=0;$i<$cantidad;$i++)
            {
                

echo "<div class='blog-post'>
            <h2 class='blog-post-title'>".$entrada['titulo'][$i]."</h2>
            <p>".$entrada['contenido'][$i].
            "</p>
            <p class='blog-post-meta'>Escrito el ".$entrada['fecha'][$i]." por ".$entrada['nombre'][$i]." desde un ".$entrada['marca'][$i]." ".$entrada['modelo'][$i]."</p>
            <p>".$entrada['comentarios'][$i]." comentarios</p>

          </div>"
          ;

$this->load->view($comentarios) ;
                  
          
            }

    ?>