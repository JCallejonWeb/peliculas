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
                        <label for='director'>Director</label>
                        <select multiple name='idDirector[]' id=''>";
                        
                        for ($j = 0; $j < count($dirList); $j++) {
                            $dir = $dirList[$j];
                            if($j==0){
                                echo "<option  value='$dir->id' selected >$dir->nombre</option> ";                      
                            }else{
                                echo "<option  value='$dir->id'>$dir->nombre</option> ";                  
                            }
                        }
                    
                    echo "</select>
                    </div>
                    <div class='form-group'>
                        <label for='director'>Genero</label>
                        <select multiple name='idGenero[]' id=''>";
                        
                        for ($j = 0; $j < count($genList); $j++) {
                            $gen = $genList[$j];
                            if($j==0){
                                echo "<option  value='$gen->id' selected >$gen->nombre</option> ";                      
                            }else{
                                echo "<option  value='$gen->id'>$gen->nombre</option> ";                  
                            }
                        }
                    
                    echo "</select>
                    </div>
                    <div class='form-group'>
                        <label for='Cartel'>Cartel</label>
                        <input required type='file' class='form-control bordeInputs' name='cartel' id='cartel'  placeholder='Cartel'>
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