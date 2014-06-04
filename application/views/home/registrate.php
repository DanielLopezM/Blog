          <div class="sidebar-module sidebar-module-inset">
             <label style="color:#63CF5F"> <?php if ($this->session->flashdata('errors_reg')){ //change!
                
                echo $this->session->flashdata('errors_reg');
                echo "<br>";
               
               }?>
                           
             </label>


              <p>¿No estás registrado o quieres crear otra cuenta?
              <br>Puedes registrarte ahora</p>
            <button type="button" id="bregistro" class="btn btn-lg btn-success" >Registro Nuevo  <span class="glyphicon glyphicon-star-empty"></span></button>
                <p></p>
                <div id="registrooculto">
                <form class="form-horizontal" role="form" action="home/registrar" method="post">
                <div class="form-group">
                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="Login">
                  </div>
                </div>
                <div class="form-group">
                  
                  <div class="col-sm-12">
                    <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                  </div>
                </div>

                <div class="form-group">
                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Nombre real">
                  </div>
                </div>

                  <div class="form-group">
                   <div class="col-sm-12">
                    <br>
                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok-sign"></span><b>  Confirmar</b></button>
                   </div>
                  </div>
                </form>
                </div>
              
            </div>




          