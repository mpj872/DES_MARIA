

<?php

function leerFichero($fichero){

    while (!feof($fichero)){ //Recorro el fichero hasta que termine
      $linea = fgets($fichero);//cargo las lineas de una en una
      echo $linea."<br/>";//Muestro las lineas

  }
     fclose($fichero);//Cierro el fichero
}

function valorBursatil($arrayArchivo,$nombre){

  $coincidencia=false;
  $iterador=1;
  $longitudArray=count($arrayArchivo);
  while (($coincidencia==false) && ($iterador!=$longitudArray)) {

    $valor=substr($arrayArchivo[$iterador],0,23);
    $valor=trim($valor);

    if($nombre==$valor){
        $coincidencia=true;
        echo $arrayArchivo[$iterador];
    }
    $iterador++;

  }
  if($coincidencia==false){

    echo"El valor introducido no es correcto";

  }

}
?>
