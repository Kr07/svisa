<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">	
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>Verificación</title>

   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('assets/js/jquery-1.11.0.js') ?>"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
 
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   
   <link href="<?php echo base_url('assets/css/survey.css') ?>" rel="stylesheet">
    <!--<link href="<?php //echo base_url('assets/css/custom.css') ?>" rel="stylesheet">-->
</head>
<body>


<div class="navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div style="margin-right:24px;"><img src="<?php echo base_url('/assets/img/logo_sep01.png') ?>" width="194" height="66"></div>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url('/index.php/Home') ?>">Inicio</a></li>
            <li><a href="#">Cuestionarios</a></li>
            <li><a href="#">Reportes</a></li>
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
            <li><?php echo $this->session->userdata('logged_in')['username']; ?><a href="<?php echo base_url('/index.php/Home/logout') ?>">Cerrar Sesión</a></li>
        </ul>
    </div>
</div>


