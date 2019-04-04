<html>
  <head>
    <title>Login peliculas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>

  <body>
		<?php echo form_open("login/checkLogin"); ?>
		<table align="center">
			<tr>
				<td colspan="2" bgcolor="MEDIUMSLATEBLUE"><h3 align="center">Formulario peliculas con Ajax</h1></td>
			</tr>
			<tr>
				<td>Usuario</td>
				<td><input type="text" name="usuario" id="usuario" onBlur="comprobarUsuario()"/></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="text" name="contrasenya"/></td>
      </tr>
      <tr>
				<td align="center" colspan="2"><div id="mensajeAjax"></div></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Aceptar"/><input type="reset" value="Cancelar"/></td>
			</tr>
		</table>
		</form>
  </body>
</html>