<div class='entradas'>
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
<br>

<div class='entradas'>
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
<br>
<div class='entradas'>
	<div class='blog-post'>
          <p>Censura de comentarios</p>
	</div>
</div>