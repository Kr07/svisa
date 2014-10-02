<!DOCTYPE html>
<html lang="es">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>Verificación</title>

   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">

   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
   <link href="<?php echo base_url('assets/css/bootstrapValidator.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('assets/js/bootstrapValidator.js') ?>"></script>
   <!--<link href="<?php //echo base_url('assets/css/custom.css') ?>" rel="stylesheet">-->
</head>
<body>

<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Company Info</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home Page</a></li>
            <li><a href="#">Contacts</a></li>
            <li><a href="#">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="home/logout">Cerrar Sesión</a></li>
        </ul>
    </div>
</div>   