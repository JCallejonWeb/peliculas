<script>
    $(document).ready(function(){

        var option = {
	        speed : 30,
	        duration : 2,
	        stopImageNumber : -1,
	        startCallback : function() {
		        console.log('start');
	        },
	        slowDownCallback : function() {
		        console.log('slowDown');
	        },
	        stopCallback : function($stopElm) {
		        console.log('stop');
	        }
        }

        $('div.roulette').roulette(option);	
            
        $(function(){
	        var p = {
		        startCallback : function() {
			        appendLogMsg('start');
			        $('#speed, #duration').slider('disable');
			        $('#stopImageNumber').spinner('disable');
			        $('.start').attr('disabled', 'true');
			        $('.stop').removeAttr('disabled');
		        },
		        slowDownCallback : function() {
			        appendLogMsg('slowdown');
			        $('.stop').attr('disabled', 'true');
		        },
		        stopCallback : function($stopElm) {
			        appendLogMsg('stop');
			        $('#speed, #duration').slider('enable');
			        $('#stopImageNumber').spinner('enable');
			        $('.start').removeAttr('disabled');
			        $('.stop').attr('disabled', 'true');
		        }

	        }
	        var rouletter = $('div.roulette');
	        rouletter.roulette(p);	
	
	        $('.stop').attr('disabled', 'true');
	        $('.start').click(function(){
		        rouletter.roulette('start');	
	        });

        });
    });

</script>
    <div class='row'>
        <div class="col-12"><h4 class="text-center textoSpin">¿No sabes qué película ver? Haz click en el botón y saldrá una pelicula aleatoria!</h4></div>
    </div>
    
	    <div class="roulette" style="display:none;">
<?php

    for ($i = 0; $i < count($pelList); $i++) {
        $pelicula = $pelList[$i];

?>

        <img class='tamañoImagenSpin rounded mx-auto d-block' <?php echo " src='".base_url("$pelicula->cartel")."'";?> >
           
<?php
    
    }

?>

      
    </div>

    <div class="btn_container">
        <p class='botonSpin text-center'>
            <button class="btn btn-large btn-primary start"> Spin !! </button>
            <button hidden class="stop btn-large btn btn-warning"></button>
        </p>
    </div>      


	