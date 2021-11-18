<?php

//Le paso el array por referencia para que se modifique el array
//directamente en la memoria.
/*Relleno el carton con numeros aleatrorios que no re repiten */
//Primero creo un numero aleatorio del 1 al 60;

function llenarCartonRandom (array &$carton){

    $x = 1;
    while ($x <= 15) {
        $ValorRadom = mt_rand(1, 60);
		//Pregunto si el número random esta en el cartón
		//y si no esta lo añado
        if(!in_array($ValorRadom, $carton)){
            array_push($carton, $ValorRadom);
            $x++;
        }
    }
}

function mostrarCarton (array $carton){
	echo "EL CARTON: ";
	//Muestro el carton por pantalla
	foreach($carton as $numero){
		echo $numero;
		echo " / ";
		
	}
	echo "<br>";
}

function actualizaContador (
	$i,
	$valorRandom,
	$j,
	&$aciertosJugador1,
	&$jugadorGana,
	&$aciertosJugador2,							
	&$aciertosJugador3,
	&$aciertosJugador4
){
		//Si estamos en el jugador 1
	if ($i === 0){
		echo "tacha el ".$valorRandom." el jugador 1</br>";
		$aciertosJugador1[$j]++;
		//Si el jugador completa los 15 aciertos del cartón
		//canta bingo y ponemos jugadorGana a true
		if ($aciertosJugador1[$j] == 15) {
			echo "<h2> BINGO !!</h2>";
			echo "Jugador 1 gana con el cartón :".$j."</br>";
			$jugadorGana = true;
		}
	} else if ($i === 1) {
		echo "tacha el ".$valorRandom." el jugador 2</br>";
		$aciertosJugador2[$j]++;
		if ($aciertosJugador2[$j] == 15) {
			echo "<h2> BINGO !!</h2>";
			echo "Jugador 2 gana con el cartón :".$j."</br>";
			$jugadorGana = true;
		}
	} else if ($i === 2){
		echo "tacha el ".$valorRandom." el jugador 3</br>";
		$aciertosJugador3[$j]++;
		if ($aciertosJugador3[$j] == 15) {
			echo "<h2> BINGO !!</h2>";
			echo "Jugador 3 gana con el cartón :".$j."</br>";
			$jugadorGana = true;
		}
	}else if($i === 3){
		echo "tacha el ".$valorRandom." el jugador 4</br>";
		$aciertosJugador4[$j]++;
		if ($aciertosJugador4[$j] == 15) {
			echo "<h2> BINGO !!</h2>";
			echo "Jugador 4 gana con el cartón :".$j."</br>";
			$jugadorGana = true;
		}
	}
}

