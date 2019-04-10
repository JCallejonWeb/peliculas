<?php

?>
<script>
  $("document").ready(function(){
    var now = new Date();
    var aux2 = now.toISOString();
    

    $('#enlaceAMA').attr('href','http://webservices.amazon.com/onca/xml?Service=AWSECommerceService&Operation=ItemSearch&ResponseGroup=Small&SearchIndex=All&Keywords=harry_potter&AWSAccessKeyId=[AWSAccessKeyId=AKIAJT2NRP5VMGDZ2PZQ]&AssociateTag=[jcallejon-21]&Timestamp=['+aux2+']&Signature=[QYMMLK4JVXSPC6CJRGQJGOSKCWDS66DD]');
  });
</script>
   <!--<a id='enlaceAMA' href='#'>aaaaaaaaaaaaaaaa</a>-->
<?php

    echo "<h2 id='tituloBusqueda' class='display-4 text-center'>$tituloBusqueda </h2>";
    
    echo "<div class='container-fluid' >";
    echo "<div class='row justify-content-center ' >";
      if (count($listaBusqueda)==0){
        echo "<h5 id='noResult' >Sin resultados!</h5>";
      } else {

          for ($i = 0; $i < count($listaBusqueda); $i++) {
            $bus = $listaBusqueda[$i];
?>

          <div class="col-lg-3 col-md-4 col-sm-12 col-12  text-center ">
            <div class="card card-cascade tamañoTarjeta d-flex">

              <div class="view view-cascade overlay">
                <img  class="tamañoImagen card-img-top"<?php echo " src='".base_url("$bus->cartel")."'";?> alt="Card image cap">
                <a href="#">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <div class="card-body card-body-cascade text-center">

                <h5 class="blue-text pb-2"><strong><?php echo" $bus->nombre"; ?></strong></h5>

                <button type="button" class="popSinopsis btn" data-trigger='hover' data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo"$bus->sinopsis";?>">
                  +Info
                </button>

              </div>

            </div>
          </div>
          <?php }
        }?>
        </div>
      </div>

   

    