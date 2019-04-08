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
        <button type='button' class='btn btn-success' data-toggle='modal' data-target='#insertModal'>
            Insertar un usuario
        </button>";
    echo "
        <button type='button' class='btn btn-danger' id='cerrarsesion'>";
    echo anchor("login/cerrar_session","Cerrar sesion");
    echo"</button>
        </div>
    <table id='tabla' class='display'>
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        </thead>";

        for ($i = 0; $i < count($userList); $i++) {
            $user = $userList[$i];

            echo "
                <tr class='$user->id'>
                    <input type='hidden' name='id' value='$user->id'/>
                    <td><input type='text' name='usuario' value='$user->usuario'/><p hidden>'$user->usuario'</p></td>
                    <td><input type='text' id='$user->id-contra' name='contrasenya' value='$user->contrasenya'/><p hidden>'$user->contrasenya'</p></td>
                    <td><button  class='btn btn-primary modificarusuario' value='$user->id' >Modificar</button></td>
                    <td><button class='btn btn-danger eliminarusuario' value='$user->id'>Eliminar</td>  
                </tr>
            ";
               
    }
        
        echo " </table>

        </div>";

        include("modalInsertUsuario.php");
    ?>
    