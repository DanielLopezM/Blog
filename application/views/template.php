<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('css/darkly.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('css/blog.css') ?>" rel="stylesheet">


    <link href="<?= base_url('css/jquery.dataTables.min.css') ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

     <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
         <?= $this->load->view($login) ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>



    <div class="container">


      <div class="blog-header">


        <h1 class="blog-title"><?php echo $tituloblog; ?></h1>
        <p class="lead blog-description"><?php echo $subtituloblog; ?></p>
        <?php if ($this->session->flashdata('registrado')){ 
                
                echo" <div class='alert alert-success alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  Registrado correctamenente. Ya puedes loguearte.
</div>";

               
          }?>

          <?php if ($this->session->flashdata('comentario_env')){ 
                
                echo" <div class='alert alert-success alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  Comentario enviado con éxito.
</div>";

               
          }?>

          <?php if ($this->session->flashdata('entrada_env')){ 
                
                echo" <div class='alert alert-success alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  Entrada enviada con éxito.
</div>";

               
          }?>

          <?php if ($this->session->flashdata('cambio_titulo')){ 
                
                echo" <div class='alert alert-success alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  Nombre del blog cambiado.
</div>";

               
          }?>

          <?php if ($this->session->flashdata('censurado')){ 
                
                echo" <div class='alert alert-success alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  Comentario censurado.
</div>";

               
          }?>

 
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

        <?= $this->load->view($principal) ?>


        </div><!-- /.blog-main -->

          <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

          <?= $this->load->view($registro) ?>
    
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->




      </div><!-- /.row -->

    </div><!-- /.container -->

   <div class="blog-footer">
      <div class="container">
        <p class="text-muted">Desarrollado por <b>Daniel López</b> para la prueba de <b>Kitmaker</b>.</p>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('js/jquery.js') ?>"></script>
        <script src="<?= base_url('js/javascript.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.dataTables.min.js') ?>"></script>
  </body>
</html>
