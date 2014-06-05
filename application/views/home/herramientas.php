<div class='entradas'>
<button type="button" id="bnuevaentrada" class="btn btn-default"><h4 style="color:white">Nueva entrada</h4></button>

     <div id="nuevaentrada">

	<div class='blog-post'>
   
   <form role="form" action="admin_tools/nueva_entrada" method="post">
  <div class="form-group">
    <label for="newTitulo">Título</label>
    <input type="text" class="form-control" id="newTitulo" name="newTitulo" placeholder="Título">
  </div>
  <div class="form-group">
    <label for="newContenido">Contenido</label>
    <textarea rows="15" class="form-control" id="newContenido" name="newContenido">Escribe el contenido de la entrada...</textarea>
  </div>
       <input type="text" hidden id="usuario_ID" name="usuario_ID" value="<?php echo $id; ?>">
      <input type="text" hidden id="marca" name="marca" value="<?php echo $marca; ?>">
      <input type="text" hidden id="modelo" name="modelo" value="<?php echo $modelo; ?>">

  <button type="submit" class="btn btn-default">Enviar</button>
</form>
</div>
	</div>
</div>
<br>

<div class='entradas'>
<button type="button" id="bcambiartitulo" class="btn btn-default"><h4 style="color:white">Cambiar título</h4></button>

<div id="cambiartitulo">
	<div class='blog-post'>

          <form role="form" action="admin_tools/cambiar_titulo" method="post">
  <div class="form-group">
    <label for="newTituloBlog">Título Blog</label>
    <input type="text" class="form-control" id="newTituloBlog" name="newTituloBlog" placeholder="Título del blog">
  </div>
  <div class="form-group">
    <label for="newDescripcion">Descripción</label>
    <input type="text" class="form-control" id="newDescripcion" name="newDescripcion" placeholder="Descripción del blog">
  </div>
  
  <button type="submit" class="btn btn-default">Aplicar cambios</button>
</form>


	</div>
</div>
</div>
<br>
<div class='entradas'>
      <button type="button" id="bcontrolcomentarios" class="btn btn-default"><h4 style="color:white">Control de comentarios</h4></button>
<div id="controlcomentarios">
	<div class='blog-post'>

          <p>Censura de comentarios</p>
	</div>
</div>
</div>