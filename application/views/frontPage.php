
    <div class='container-fluid' >
        <div class='row justify-content-center ' >

<?php
    for ($i = 0; $i < count($ultimasPeliculas); $i++) {
        $pelicula = $ultimasPeliculas[$i];
?>

      <div class="col-lg-4 col-md-5 col-sm-12 col-12  text-center ">
        <div class="card card-cascade tamañoTarjeta d-flex">

          <div class="view view-cascade overlay">
            <img  class="tamañoImagen card-img-top"<?php echo " src='".base_url("$pelicula->cartel")."'";?> alt="Card image cap">
            <a href="#">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <div class="card-body card-body-cascade text-center">


            <h5 class="blue-text pb-2"><strong><?php echo" $pelicula->nombre"; ?></strong></h5>

            <button type="button" class="popSinopsis btn " data-trigger='hover' data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo"$pelicula->sinopsis";?>">
              +Info
            </button>

          </div>

        </div>
      </div>
<?php }?>
        </div>
    </div>