     
<?php 
            $cantidad = count($entrada['id']);
            for ($i=0;$i<$cantidad;$i++)
            {
                

echo "<div class='entradas'><div class='blog-post'><br>
            <h2 class='blog-post-title'>".$entrada['titulo'][$i]."</h2>
            <br>
            <p>".$entrada['contenido'][$i].
            "</p><br>
            <p class='blog-post-meta'>Escrito el ".$entrada['fecha'][$i]." por ".$entrada['nombre'][$i]." desde un ".$entrada['marca'][$i]." ".$entrada['modelo'][$i]."</p>
          </div>"
          ;


$data['entrada'] = $entrada['id'][$i];
$data['comentarios'] = $this->comentario_model->getComentario($entrada['id'][$i]);
$data['numcomentarios'] = $entrada['comentarios'][$i];
$this->load->view($comentarios, $data) ;
                  
          echo"</div><br>";
            }

    ?>

