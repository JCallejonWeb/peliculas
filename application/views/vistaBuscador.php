
   
<?php

      echo "<h2 id='tituloBusqueda' class='display-4 text-center'>$tituloBusqueda </h2>";
    
    echo "<div class='container-fluid' >";
    echo "<div class='row justify-content-center ' >";
      
      for ($i = 0; $i < count($listaBusqueda); $i++) {
        $bus = $listaBusqueda[$i];
?>

      <div class="col-lg-3 col-md-4 col-sm-12 col-12  text-center ">
        <div class="card card-cascade tamañoTarjeta d-flex">

          <div class="view view-cascade overlay">
            <img  class=" card-img-top"<?php echo " src='".base_url("$bus->cartel")."'";?> alt="Card image cap">
            <a href="#">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <div class="card-body card-body-cascade text-center">


            <h5 class="blue-text pb-2"><strong><?php echo" $bus->nombre"; ?></strong></h5>

            <p class="card-text"><?php echo " $bus->sinopsis"; ?></p>

          </div>

        </div>
      </div>
      <?php }?>
     </div>
    </div>

   

    