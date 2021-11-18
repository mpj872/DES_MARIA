<?php

function generarApuesta()
{
    //Genero un array de numeros random
    $arrayApuesta=array();

    //Declaro un iterador
    $x=0;
    while($x<7) {
      $ValorRadom = mt_rand(1, 49);

      if(!in_array($ValorRadom,$arrayApuesta)){
        array_push($arrayApuesta,$ValorRadom);

        $x++;
      }
    }
    //Genero el reintegro que es del 1 al 9 y lo añado al array
    $reintegro = mt_rand(0, 9);
    array_push($arrayApuesta,$reintegro);

    return $arrayApuesta;
}

function mostrarPantalla($arrayApuesta)
{
  foreach ($arrayApuesta as $key => $value) {
      if ($key<6) {
          echo '<img src="./r22_bolasprimitiva/'.$value.'.png"/>';
      }
  }
  echo "<br>Complementario: ".$arrayApuesta[6]."<br>";
  echo "Reintegro: ".$arrayApuesta[7]."<br>";
}

function comprobarAciertos($arrayApuesta)
{
  //genero un array de acertantes
  $arrayAcertantes=[0,0,0,0,0,0,0,0,0];
  //convierto el fichero a un array

  $arrayArchivo=file('r22_primitiva.txt');
  //Recorro el array y lo divido por filas

  foreach ($arrayArchivo as $key => $value)
  {
      //Genero un array con los numeros de la apuesta de cada jugador
      $acierto=0;
      $aciertoComple=0;
      $aciertoReintegro=0;

      $apuesta=explode("-",(trim($value)));  //Importante, si no te mete un salto de linea en la
	  //ultima posición del array y nunca te encuentra el reintegro acertado.
    
      //recorro el array de la apuesta
      foreach ($apuesta as $key => $numero) {
        //comparo cada numero de los ganadores con los de la apuestas

        if(in_array($numero,$arrayApuesta)){
          //si el numero esta en array y estoy en la posicion 7 (complementario)

          if($key==7 && $arrayApuesta[6]==$numero) {

            $aciertoComple++;

          }
          if($key==8 && $arrayApuesta[7]==$numero) {
              $aciertoReintegro++;
          }
          if($key>0 && $key<7){
            $acierto++;
          }
       }

    }


    if($acierto==0){
      $arrayAcertantes[0]++;
    }

    if($acierto==1){
      $arrayAcertantes[1]++;
    }

    if($acierto==2){
      $arrayAcertantes[2]++;
    }

    if($acierto==3){
      $arrayAcertantes[3]++;
    }

    if($acierto==4){
      $arrayAcertantes[4]++;
    }

    if($acierto==5){
      if ($aciertoComple) {
        $arrayAcertantes[7]++;
      } else {
        $arrayAcertantes[5]++;
      }
    }

    if($acierto==6){
      $arrayAcertantes[6]++;
    }

    if ($aciertoReintegro) {
      $arrayAcertantes[8]++;
    }

  }
  //borro una persona con 0 aciertos porque la primera linea no sirve

  return $arrayAcertantes;
}

function mostrarResultado($arrayAcertantes)
{
  foreach ($arrayAcertantes as $key => $value) {
      if ($key <= 6) {
          echo "los acertantes con ".$key." aciertos son ".$value."<br>";
      }
      if($key==7){
          echo "los acertantes con 5 aciertos mas complementaria son ".$value."<br>";

      }
      if($key==8){
          echo "los acertantes de reintegro son son ".$value."<br>";

      }

  }


}

function crearFicheroPremiados($arrayAcertantes, $fecha, $recaudacion)
{
    $recaudacionTotal = ($recaudacion*80)/100;

    $primerPremio = ($recaudacionTotal*40)/100;
    $segundoPremio = ($recaudacionTotal*30)/100;
    $tercerPremio = ($recaudacionTotal*15)/100;
    $cuartoPremio = ($recaudacionTotal*5)/100;
    $quintoPremio = ($recaudacionTotal*8)/100;
    $sextoPremio = ($recaudacionTotal*2)/100;

    $fichero = fopen("premiosorteo_".$fecha.".txt", "w");

    if ($arrayAcertantes[6] !== 0) {
        $valor = $primerPremio / $arrayAcertantes[6];
        fwrite($fichero, "C6 ".$valor." Euros premio a percibir cada acertante 6 aciertos\n");
    }

    if ($arrayAcertantes[7] !== 0) {
        $valor = $segundoPremio / $arrayAcertantes[7];
        fwrite($fichero, "C5+ ".$valor." Euros premio a percibir cada acertante 5 aciertos + complementario\n");
    }

    if ($arrayAcertantes[5] !== 0) {
        $valor = $tercerPremio / $arrayAcertantes[5];
        fwrite($fichero, "C5 ".$valor." Euros premio a percibir cada acertante 5 aciertos\n");
    }

    if ($arrayAcertantes[4] !== 0) {
        $valor = $cuartoPremio / $arrayAcertantes[4];
        fwrite($fichero, "C4 ".$valor." Euros premio a percibir cada acertante 4 aciertos\n");
    }

    if ($arrayAcertantes[3] !== 0) {
        $valor = $quintoPremio / $arrayAcertantes[3];
        fwrite($fichero, "C3 ".$valor." Euros premio a percibir cada acertante 3 aciertos\n");
    }

    if ($arrayAcertantes[8] !== 0) {
        $valor = $sextoPremio / $arrayAcertantes[8];
        fwrite($fichero, "CR ".$valor." Euros premio a percibir cada acertante reintegro\n");
    }

    fclose($fichero);

}

?>
