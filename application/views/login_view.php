<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Inicio sesión</title>
    <!-- Hoja de estilos-->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/login.css')?>" rel="stylesheet" type="text/css">
    <!-- scripts -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>

<body>
    <div class="head">
          <img src="<?php echo base_url('assets/img/logo_mover01.png')?>" width="206" height="78">
    </div>
    <div class="container">
        <div class="box_center">
            <div class="box_br">
                <?php echo validation_errors(); ?>
                <?php echo form_open('verifylogin'); ?>
                <form class="form-signin" role="form">
                    <p class="form-signin-heading" style="font-size: 20px; color:#727272;">
                        Bienvenido al sistema de <br>
                        verificación de aula
                    </p>
                    
                    <input type="text" class="form-control" placeholder="Nombre de usuario" id="username" name="username" required autofocus>
                    <br/>
                    <input type="password" class="form-control" placeholder="Contraseña" id="passowrd" name="password" required>
                    <br/>
                    <button class="btn btn-lg btn-primary btn-block" type="submit"value="Login">Iniciar sesión</button>
                </form>
            </div>
        </div>
        <div class="rights">SECRETARÍA DE EDUCACIÓN PÚBLICA, MÉXICO © 2014</div>
    </div> 
    <!-- /container -->
        
        
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js') ?>"></script>
</body>
</html>
