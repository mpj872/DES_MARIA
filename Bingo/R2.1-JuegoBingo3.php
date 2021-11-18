<HTML>
<HEAD> <TITLE> R2.1-Juego BINGO </TITLE>
    <meta charset="utf-8" />
    <meta name="author" content="Maria Perez" />
</HEAD>

<BODY>
<?php

/*Utilizamos un array unidimensional porque necesitamos saber quien gana cuando completa bingo
no existen las lineas, con lo cual no es necesario hacerlo multidimensional.
Le asigno valores aleatorios del 1 al 60 de quince posiciones */
include "R2.1-FuncionesBingo.php";
$jugadores = array ();


$jugadorCompleto=0;
//Creo 4 jugadores y les añado 3 cartones a cada uno con 15 números cada cartón
while($jugadorCompleto<4){
    $jugador=array();
    $cartonesCreados=0;
    //Le añado 3 cartones a cada jugador
	echo "<h2> jugador: ".($jugadorCompleto+1)."</h2>";
    while($cartonesCreados<3){

        $carton=array();
		//llamo a las funciones de llenar cartón y mostrar
		
		llenarCartonRandom($carton);
        mostrarCarton($carton);
       
        //añado carton
        array_push($jugador,$carton);

        $cartonesCreados++;
    }
    //Le añado un jugador (con tres cartones) al array de jugadores hasta que se completan 4
    //jugadorCompleto==4
    $jugadores[]=$jugador;
    $jugadorCompleto++;

}
//Creo 4 arrays para contar los aciertos por cartón de cada jugador
$aciertosJugador1 = [0,0,0];
$aciertosJugador2 = [0,0,0];
$aciertosJugador3 = [0,0,0];
$aciertosJugador4 = [0,0,0];

$arrayProvisional=array();
$jugadorGana = false;
//Mientras no gane ningún jugador sigo sacando bolas
while(!$jugadorGana){

    //creo un array provisional, saco un numero random y lo meto en el array provisional
    //comprobando primero que no este repetido (in_array)
    $valorRandom = mt_rand(1,60);

    if(!(in_array($valorRandom, $arrayProvisional))) {
        echo '<img src="./DWES_Reto1_Bingo_ImagesBolas/'.$valorRandom.'.PNG">'."<br>";
        array_push($arrayProvisional,$valorRandom);
        //Recorremos jugadores y guardamos cada jugador de la posición i del array
        // $jugadores en el array $jugador.
        foreach ($jugadores as $i=>$jugador){
            // Recorremos el array $jugador(3 cartones)  y guardamos en $carton la posicion $j de $jugador
            foreach ($jugador as $j=>$carton){
               // Recorremos cada numero del cartos
                foreach ($carton as $valor){
                     // Si la bola valorRandom coincide con el numero del carton $valor"
                    // incrementamos el contador correspondiente al cartón
                    if ($valor === $valorRandom) {
						//llamo a la función actualiza contador que es la que comprueba
						//que jugador tiene el numero, de que carton lo tacha y aumenta el contador
						//hasta que llega a 15.
						actualizaContador(
							$i,
							$valorRandom,
							$j,
							$aciertosJugador1,
							$jugadorGana,
							$aciertosJugador2,
							$aciertosJugador3,
							$aciertosJugador4
						);
               
                    }
                }
            }
        }
    }
}

?>
</BODY>
</HTML>
