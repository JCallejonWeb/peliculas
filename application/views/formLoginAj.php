<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url('css/estiloFront.css');?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="jumbotron text-center mainColor" id="">
  		<h1>Acceso a la administración de la aplicación</h1>
  		<h2>Filmoteca</h2> 
	</div>
	
	<div clasS="col-md-5 offset-3">

    <?php echo form_open("login/checkLogin"); ?>

		<div class="form-group">
    		<label for="usuario">Usuario</label>
    		<input type="text" class="form-control bordeInputs" name="usuario" id="usuario"  placeholder="Nombre de usuario">
  		</div>

		<div class="form-group">
    		<label for="contrasenya">Contraseña</label>
    		<input type="password" class="form-control bordeInputs" name="contrasenya" id="contrasenya"  placeholder="Contraseña">
  		</div>

		<button type="submit" class="btn btn-primary mainColor bordeBotones">Aceptar</button>
		<button type="reset" class="btn btn-primary mainColor bordeBotones">Cancelar</button>

    </form>
	</div>
	</div>

  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



