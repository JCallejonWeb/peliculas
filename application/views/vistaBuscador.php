
    <div class='row'>
        <div  class='col-md-11 col-sm-11 col-xs-11 offset-1'>
        </div>
    </div>
   <?php
    if (isset($tituloBusqueda)){ 
      echo "<h2 id='lastBooks' class='display-4 text-center'>Busqueda: $tituloBusqueda </h2>";}
    
      echo "<div class='row' >";
      for ($i = 0; $i < count($listaBusqueda); $i++) {
          $bus = $listaBusqueda[$i];
         
          
          echo"
          <div class='col-md-3 col-sm-4 col-xs-12 margenTarjeta'>
            <div class='card tamañoTarjeta'>
              <a href='".site_url("Buscador/Visor/$bus->id/$bus->titulo")."'><img id='$bus->id' name='$ultimaPag' class='card-img-top imgTarjeta'  src='".base_url("assets/libros/".$bus->id."/0.jpg")."' ></a>
					    <div class='card-body'>
					      <h5 class='card-title tituloTarjeta text-center'>$bus->titulo</h5> 
					      <a href='".site_url("Buscador/Visor/$bus->id")."'><h5 class='botonTarjeta text-center'>Ver libro</h5></a>
              </div>
 
				    </div>
          </div>
          <div class='col-md-1 col-sm2 '></div>";
          
        }
          echo "</div>
          </div>";
     
