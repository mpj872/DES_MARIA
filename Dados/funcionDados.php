  <?php

//Segun los dados que me indican en el formulario, empiezo a generar tiradas aleatorias
//y se las añado al array de jugadores por referencia
function generoTiradas(&$jugadores,$numDados){

	$y=1;
	while($y<=4){
		$jugador=array();
		$x=1;
		while($x<=$numDados){
			$ValorRadom = mt_rand(1, 6);
			array_push($jugador, $ValorRadom);
			$x++;
		}
		array_push($jugadores,$jugador);
		$y++;
	}
	
}


  ?>
