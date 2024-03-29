<script>
    $(document).ready( function () {
        $('#tabla').DataTable();

        $(document).on('click','.eliminarusuario',function(e) {
            var r = confirm("Vas a eliminar un registro!\n¿Estás seguro?");

            if (r == false) {

                e.preventDefault();

            }else{

                var id = $(this).attr("value");
                $("." + id).remove();
                cadena = "<?php echo site_url('usuarios/eliminarUsuario'); ?>/" + id;
                $.ajax({
                    url: cadena
                });
            }
        });

        $(document).on('click','.modificarusuario',function(e) {

            var id = $(this).attr("value");
            var usuario = $("." + id + " input[name='usuario']").val();
            var contrasenya = $("#" + id + "-contra").val();


            var datosJson = {
                'id': id,
                'usuario': usuario,
                'contrasenya': contrasenya
            };

            
            var cadena = "<?php echo site_url("usuarios/modificarUsuario/"); ?>";

            $.ajax({
                type: "POST",
                url: cadena,
                data: datosJson,
                error: function () { alert("error al modificar!!") }
            }).done(function () { alert("Modificación efectuada con exito!!"); });

        });

        $("#usuario").on('keyup',function(){
            valorInput = $("#usuario").val();
            datos = "usuario="+valorInput;
            $.ajax({
                url:"<?php echo site_url("controlFormularios/ComprobarUsuario/"); ?>", 
                method:"POST",
                data:datos,
                success:function(data){
                    if (data==1){

                        $("#usuario").css("border", "2px solid red");
                        $("#btnInsertar").attr('disabled',true);
           
                    } else {

                        $("#usuario").css("border", "2px solid green");
                        $("#btnInsertar").removeAttr('disabled');
               
                    }
                }
            });
      });

        $("#menuPeliculas").click(function(){
            location.href='<?php echo base_url("index.php/peliculas/homeFilms"); ?>'
        });
         
        $("#menuDirectores").click(function(){
            location.href='<?php echo base_url("index.php/directores/homeDirectors"); ?>'
        });

        $("#menuGeneros").click(function(){
            location.href='<?php echo base_url("index.php/generos/homeGenders"); ?>'
        });

        $("#menuUsuarios").click(function(){
            location.href='<?php echo base_url("index.php/usuarios/homeUsers"); ?>'
        });

  
    });
</script>
<?php
    echo "<div class='row'>
        <div class='col-md-8 offset-4' id='navegacionMenu'>
            <button id='menuPeliculas' class='btn btn-secondary'>Películas</button>
            <button id='menuDirectores' class='btn btn-secondary botonesNavegacion'>Directores</button>
            <button id='menuGeneros' class='btn btn-secondary botonesNavegacion'>Géneros</button>
            <button id='menuUsuarios' class='btn btn-info botonesNavegacion'>Usuarios</button>
        </div>
    </div>";
    echo "<div class='botonesPrincipales'>
        <button id='botonInsert' type='button' class='btn btn-success' data-toggle='modal' data-target='#insertModal'>
            Insertar un usuario
        </button>";
    echo "
        <button type='button' class='btn btn-danger' id='cerrarsesion'>";
    echo anchor("login/cerrar_session","Cerrar sesión");
    echo"</button>
        </div>
    <table id='tabla' class='table display'>
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th class='alignCelda'>Modificar</th>
            <th class='alignCelda'>Eliminar</th>
        </tr>
        </thead>";

        for ($i = 0; $i < count($userList); $i++) {
            $user = $userList[$i];

            echo "
                <tr class='$user->id'>
                    <input type='hidden' name='id' value='$user->id'/>
                    <td><input class='wInput' type='text' name='usuario' value='$user->usuario'/><p hidden>'$user->usuario'</p></td>
                    <td><input class='wInput' type='text' id='$user->id-contra' name='contrasenya' value='$user->contrasenya'/><p hidden>'$user->contrasenya'</p></td>
                    <td class='alignCelda'><button  class='btn btn-primary modificarusuario' value='$user->id' >Modificar</button></td>
                    <td class='alignCelda'><button class='btn btn-danger eliminarusuario' value='$user->id'>Eliminar</td>  
                </tr>
            ";
               
    }
        
        echo " </table>

        </div>";

        include("modalInsertUsuario.php");
    ?>
    