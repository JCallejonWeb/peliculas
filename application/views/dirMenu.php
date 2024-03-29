<script>
    $(document).ready( function () {
        $('#tabla').DataTable();

        $(document).on('click','.eliminardirector',function(e) {
            var r = confirm("Vas a eliminar un registro!\n¿Estás seguro?");

            if (r == false) {

                e.preventDefault();

            }else{

                var idDirector = $(this).attr("value");
                $("." + idDirector).remove();
                cadena = "<?php echo site_url('directores/eliminarDirector'); ?>/" + idDirector;
                $.ajax({
                    url: cadena
                });
            }
        });

        $(".modificardirector").click(function(){

            var id = $(this).attr("value");
            var nombre = $("." + id + " input[name='nombre']").val();
            
            var datos = "id=" + id + "&nombre=" + nombre ;
            var cadena = "<?php echo site_url("directores/modificarDirector/"); ?>";

            $.ajax({
                type: "POST",
                url: cadena,
                data: datos,
                error: function () { alert("error al modificar!!") }
            }).done(function () { alert("Modificación efectuada con exito!!"); });

        });


        $("#nombre").on('keyup',function(){
            valorInput = $("#nombre").val();
            datos = "nombre="+valorInput;
            $.ajax({
                url:"<?php echo site_url("controlFormularios/ComprobarDirector/"); ?>", 
                method:"POST",
                data:datos,
                success:function(data){
                    if (data==1){

                        $("#nombre").css("border", "2px solid red");
                        $("#btnInsertar").attr('disabled',true);
           
                    } else {

                        $("#nombre").css("border", "2px solid green");
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
            <button id='menuDirectores' class='btn btn-info botonesNavegacion'>Directores</button>
            <button id='menuGeneros' class='btn btn-secondary botonesNavegacion'>Géneros</button>
            <button id='menuUsuarios' class='btn btn-secondary botonesNavegacion'>Usuarios</button>
        </div>
    </div>";
    echo "<div class='botonesPrincipales'>
        <button id='botonInsert' type='button' class='btn btn-success' data-toggle='modal' data-target='#insertModal'>
            Insertar un director
        </button>";
    echo "
        <button type='button' class='btn btn-danger' id='cerrarsesion'>";
    echo anchor("login/cerrar_session","Cerrar sesión");
    echo"</button>
        </div>
    <table id='tabla' class='table display'>
    <thead>
        <tr>
            <th>Nombre</th>
            <th class='alignCelda'>Modificar</th>
            <th class='alignCelda'>Eliminar</th>
        </tr>
        </thead>";

        for ($i = 0; $i < count($dirList); $i++) {
            $dir = $dirList[$i];

            echo "
                <tr class='$dir->id'>
                    <input type='hidden' name='id' value='$dir->id'/>
                    <td><input class='wInput' type='text' name='nombre' value='$dir->nombre'/><p hidden>'$dir->nombre'</p></td>
                    <td class='alignCelda'><button  class='btn btn-primary modificardirector' value='$dir->id' >Modificar</button></td>
                    <td class='alignCelda'><button class='btn btn-danger eliminardirector' value='$dir->id'>Eliminar</td>  
                </tr>
            ";
               
    }
        
        echo " </table>

        </div>";

        include("modalInsertDirector.php");
    ?>
    