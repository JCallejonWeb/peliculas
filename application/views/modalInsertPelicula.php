<?php
echo "
<!--Formulario modal de inserción-->
<div class='modal' id='insertModal'>
    <div class='modal-dialog'>
        <div class='modal-content'>

            <div class='modal-header'>
                <h4 class='modal-title'>Insercion de películas</h4>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
            </div>

            <div class='modal-body'>";
            
                echo form_open_multipart("peliculas/insertPelicula");
                echo "
                    <div class='form-group'>
                        <label for='nombre'>Nombre</label>
                        <input type='text' class='form-control bordeInputs' name='nombre' id='nombre'  placeholder='Nombre'>
                    </div>
                    <div class='form-group'>
                        <label for='anyo'>Año</label>
                        <input type='text' class='form-control bordeInputs' name='anyo' id='anyo'  placeholder='Año'>
                    </div>
                    <div class='form-group'>
                        <label for='sinopsis'>Sinopsis</label>
                        <input type='text' class='form-control bordeInputs' name='sinopsis' id='sinopsis'  placeholder='Sinopsis'>
                    </div>
                    <div class='form-group'>
                        <label for='Cartel'>Cartel</label>
                        <input type='file' class='form-control bordeInputs' name='cartel' id='cartel'  placeholder='Cartel'>
                    </div>
                        
                    ";  

                echo "<button class='btn btn-primary mainColor bordeBotones'  type='submit' name='Enviar' />Insertar</button>
                </form>
                ";  
                echo "
            </div>

            <div class='modal-footer'>
                <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
            </div>

        </div>
    </div>
</div>

   
"; 
?>