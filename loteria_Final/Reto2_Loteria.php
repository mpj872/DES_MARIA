<?php

require 'Reto2_FuncionesLoteria.php';

$fecha =  $_POST['fechasorteo'];

$recaudacion =  $_POST['recaudacion'];



if (!empty($fecha)  && !empty($recaudacion)) {

    //Recojo el array de la apuesta generado
    $arrayApuesta = generarApuesta();

    //lo muestro por pantalla
    mostrarPantalla($arrayApuesta);

    //comparo el array de la loteria con las apuestas del fichero
    $arrayAcertantes = comprobarAciertos($arrayApuesta);

    // Muestro los resultados de mi lotería
    mostrarResultado($arrayAcertantes);

    // Creo el fichero de ganadores
    $fecha = $_POST['fechasorteo'] ;

    $recaudacion = $_POST['recaudacion'];

    crearFicheroPremiados($arrayAcertantes, $fecha, $recaudacion);

} else {
    echo "Error en datos";
}

?>
