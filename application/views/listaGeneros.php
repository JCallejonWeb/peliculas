
<div class='row justify-content-center align-items-center'>
<div class=col-12>
<h2 id='tituloBusqueda' class='display-4 text-center'>Géneros </h2></div>";
<?php 



    $n = 1;
    for ($i = 0; $i < count($totalGeneros); $i++) {

        $gen = $totalGeneros[$i];
        
        if($n==10){
            $n=1;
        }
?>  
    <div class='estiloGeneros <?php echo "genero$n"; ?> hvr-rectangle-out col-lg-3 col-md-6 col-xs-12'><a class='enlaceGeneros' href='<?php echo base_url(); ?>index.php/Buscador/consultaGeneros/<?php echo "$gen->id"; ?>'><h2 class='textoGenero text-center'> <?php echo "$gen->nombre" ?>  </h2></a></div>  

<?php
        $n = $n+1 ;
    } 
?>

</div>