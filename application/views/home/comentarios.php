    
<?php
//si solo hay un comentario muestra la palabra comentario, y no comentarios
$cantidadcom = "comentarios";
if ($numcomentarios == 1) $cantidadcom = "comentario";
?>


<div style="margin-left:70%;">
  <button type="button" id="<?php echo $entrada; ?>comentarios" class="btn btn-default" onClick="vercomentarios('<?php echo $entrada; ?>');"><span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;&nbsp;<?php echo $numcomentarios." ".$cantidadcom; ?></button><br>
</div>
<div class="comentarios" id="<?php echo $entrada; ?>comments" > 
<hr>
<?php 
           $cantidad = count($comentarios['id']);
            for ($i=0;$i<$cantidad;$i++)
            {

  echo "     <div class='row'>
          <div class='col-lg-3'>
            <p><b>".$comentarios['nombre'][$i].":</b><br></p>
          </div>
          <div class='col-lg-9'>
            <div class='bs-component'>
              <div class='well well-sm' style='background-color:#FFF5F0;color:#black;font-size:medium;'>"
                .$comentarios['texto'][$i].
              "<p class='notas_comment'>".$comentarios['fecha'][$i]." desde <b>".$comentarios['marca'][$i]." ".$comentarios['modelo'][$i]."</b></p></div>
            </div>
          </div>
        </div>
";
       }
      ?>
<hr>
     <div class="nuevocomentario">
     <div class="row">
  <div class="col-lg-3">
    <p style="color:black;">Tu comentario:</p>
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-9">
    <form action="home/nuevo_comentario" method="post">
      <input type="text" hidden id="entradaID" name="entradaID" value="<?php echo $entrada; ?>">
      <input type="text" hidden id="usuario_ID" name="usuario_ID" value="<?php echo $id; ?>">
      <input type="text" hidden id="marca" name="marca" value="<?php echo $marca; ?>">
      <input type="text" hidden id="modelo" name="modelo" value="<?php echo $modelo; ?>">


    <div class="input-group">
      <label class="sr-only" for="texto">Texto</label>
      <textarea class="form-control" id="texto" name="texto" maxlength="400"></textarea>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Enviar</button>
      </span>
    </div><!-- /input-group -->
  </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

    </div>     
    </div>
    

