<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Timeline</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/clean-blog.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/css/summernote.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Blogginet</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php if($this->session->userdata('logged')):?>
                        <li>
                            <a href="<?php echo base_url('post/new_entry'); ?>">Crear Post</a>
                        </li>
                        <li class="dropdown">
                            <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php echo $this->session->userdata('name').' '.$this->session->userdata('lastname')?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="<?php echo base_url('login/password'); ?>"> Cambiar Contraseña</a></li>
                                <li><a href="<?php echo base_url('login/logout'); ?>"> Salir</a></li>
                            </ul>
                        </li>
                    <?php else:?>
                        <li>
                            <a href="<?php echo base_url('login/register'); ?>">Registrarse</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('login/'); ?>">Entrar</a>
                        </li>
                    <?php endif?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
