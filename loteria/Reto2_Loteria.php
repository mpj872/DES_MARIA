<?php

  require 'Reto2_FuncionesLoteria.php';

//Recojo el array de la apuesta generado

$arrayApuesta=generarApuesta();

//lo muestro por pantalla
mostrarPantalla($arrayApuesta);


//comparo el array de la loteria con las apuestas del fichero
comprobarAciertos($arrayApuesta);


?>
