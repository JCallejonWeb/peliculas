<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo base_url();?>imgs/claqueta.png" />

    <link rel="stylesheet" href="<?php echo base_url();?>css/stiloFront.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/hover.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <link rel="stylesheet" href="http://localhost/peliculas/css/mdb.min.css">
    <link rel="stylesheet" href="http://localhost/peliculas/css/estiloFront.css">
  
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/roulette.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/frontJs.js"></script>

    <title>front</title>
    
</head>
<body>
    <nav id="barraNav" class="navbar navbar-expand-md bg-dark navbar-dark">

        <a class="navbar-brand" href="<?php echo base_url();?>">Filmoteca</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
              
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/buscador/listaGeneros">Géneros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/peliculas/filmSpin">FilmSpin</a>
                </li>
            </ul>
        </div> 
    </nav>
    <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
        <input id="buscador" name='buscador' class="form-control" type="text" placeholder="Nombre, director, género..." aria-label="Search">
    </form>
    <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
        <input id="buscador2" name='buscador' class="form-control" type="text" placeholder="Nombre, director, género..." aria-label="Search">
    </form>
    
    <div >
        <?php echo"<img id='fotoCabecera' src='".base_url("imgs/cabe.png")."'>";  ?>
    </div>

    <div id='contenido' class="container-fluid">