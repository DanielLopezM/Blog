        <?php echo validation_errors(); ?>
          <form class="navbar-form navbar-right" role="form" action="comprobar_login" method="post">
            <div class="form-group">
              <input type="text" size="20" id="username" name="username" placeholder="Usuario" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" size="20" id="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-user"</span>  Entrar</button>
          </form>