<?php

function generarApuesta(){

  //Genero un array de numeros random
    $arrayApuesta=array();


  //Declaro un iterador
  $x=0;
    while($x<7){
      $ValorRadom = mt_rand(1, 49);

      if(!in_array($ValorRadom,$arrayApuesta)){
        array_push($arrayApuesta,$ValorRadom);

          $x++;
      }

    }
    //Genero el reintegro que es del 1 al 9 y lo añado al array
      $reintegro = mt_rand(1, 9);
    array_push($arrayApuesta,$reintegro);

    return $arrayApuesta;
}

function mostrarPantalla($arrayApuesta){

foreach ($arrayApuesta as $key => $value) {
    echo $value."<br>";
    //echo '<img scr="./r22_bolasprimitiva/'.$value'.png">';
}


}


function comprobarAciertos($arrayApuesta){
//genero un array de acertantes
$arrayAcertantes=[0,0,0,0,0,0,0];
//convierto el fichero a un array
$aciertoComple=0;
$aciertoReintegro=0;
$arrayArchivo=file('r22_primitiva.txt');

//Recorro el array y lo divido por filas

foreach ($arrayArchivo as $key => $value) {
  //Genero un array con los numeros de la apuesta de cada jugador
  $acierto=0;

  $apuesta=explode("-",$value);

  //recorro el array de la apuesta
  foreach ($apuesta as $key => $numero) {
    //comparo cada numero de los ganadores con los de la apuestas


    if(in_array($numero,$arrayApuesta)){

      //si el numero esta en array y estoy en la posicion 7 (complementario)

      if($key==7 && $arrayApuesta[6]==$numero){

      $aciertoComple++;

    }else if($key==8 && $arrayApuesta[7]==$numero){

        $aciertoReintegro++;
    }else{
      $acierto++;
    }
    }

  }


//restar uno porque la primera linea es de datos
    if($acierto==0){
      $arrayAcertantes[0]++;


    }if($acierto==1){
  $arrayAcertantes[1]++;


}if($acierto==2){
  $arrayAcertantes[2]++;


}if($acierto==3){
  $arrayAcertantes[3]++;

}if($acierto==4){
  $arrayAcertantes[4]++;

}if($acierto==5){
  $arrayAcertantes[5]++;

}if($acierto==6){
  $arrayAcertantes[6]++;

}

}


mostrarResultado($arrayAcertantes,$aciertoComple,$aciertoReintegro);

}

function mostrarResultado($arrayAcertantes,$aciertoComple,$aciertoReintegro){

foreach ($arrayAcertantes as $key => $value) {

  if ($key==0){
    $value--;
  }

  echo "los acertantes con ".$key." aciertos son ".$value."<br>";
}
echo "los acertantes de reintegro son ".$aciertoReintegro."<br>";
echo "los acertantes de reintegro son ".$aciertoComple."<br>";

}
?>
