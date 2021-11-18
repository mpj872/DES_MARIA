<?php

  require 'funciones_bolsa.php';
  //compruebo que el usuario me ha introducido un valor bursatil
  if($_POST['nombre']!=null){
    //Le quito los espacios y lo convierto a mayusculas
    $nombre=strtoupper(trim($_POST['nombre']));
    //Compruebo que el fichero existe
    $existe=file_exists('ibex35.txt');
    //Si existe
    if($existe){
      //convierto el fichero en un array
      $arrayArchivo=file('ibex35.txt');
      //Le paso el fichero y el nombre del valor bursatil a la funcion
      valorBursatil($arrayArchivo,$nombre);

    }
  }else{

    echo "Tienes que introducir algun valor";

 }
?>
