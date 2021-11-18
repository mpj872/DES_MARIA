<?php

require 'Funciones.php';

// Compruebo los valores que vengan en $_POST del formulario
$valor =  $_POST['valor'];



// Si el valor es válido y se puede trabajar llamamos a las funciones necesarias
if (!empty($valor)) {

  // LLamadas a funciones
  mostrarValor($valor);

} else {

  // Si los datos no son válidos mostramos mensaje de error
  echo "Error en datos";

}

?>
