        
          <form class="navbar-form navbar-right" role="form" action="home/comprobar_login" method="post">
         
         <label style="color:orange"> <?php if ($this->session->flashdata('errors')){ //change!
                
                echo $this->session->flashdata('errors');
               
          }?></label>

            <div class="form-group">
              <input type="text" size="20" id="username" name="username" placeholder="Usuario" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" size="20" id="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" value="submitb" id="submitb" name="submitb" class="btn btn-success"><span class="glyphicon glyphicon-user"</span>  Entrar</button>
          </form>