<?php
echo "
<!--Formulario modal de inserción-->
<div class='modal' id='insertModal'>
    <div class='modal-dialog'>
        <div class='modal-content'>

            <div class='modal-header'>
                <h4 class='modal-title'>Inserción de directores</h4>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
            </div>

            <div class='modal-body'>";
            
                echo form_open_multipart("directores/insertDirector");
                echo "
                    <div class='form-group'>
                        <label for='nombre'>Nombre</label>
                        <input required type='text' class='form-control bordeInputs' name='nombre' id='nombre'  placeholder='Nombre'>
                    </div>  
                    ";  

                echo "<button id='btnInsertar' class='btn btn-primary mainColor bordeBotones'  type='submit' name='Enviar' />Insertar</button>
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