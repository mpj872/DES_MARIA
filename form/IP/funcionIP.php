<?php

function validarIP($IP)
{

  $arrayIP = explode(".", $IP);
     $ArrayLongitud = count($arrayIP);
    $IPValida = true;

    if ($ArrayLongitud != 4) {
        $IPValida = false;

    } else if ($IP == "255.255.255.255"){
        $IPValida = false;

      }
    else if ($IP == "0.0.0.0"){

        $IPValida = false;

}

    else if ((strlen($arrayIP[0]) > 4) or (strlen($arrayIP[1]) > 4) or (strlen($arrayIP[2]) > 4) or (strlen($arrayIP[3]) > 4)){
      $IPValida = false;
    }
    else {
        for ($i = 0; $i < $ArrayLongitud; $i++) {
            if ($arrayIP[$i] > 255) {
              $IPValida = false;

                break;
            }
        }
    }
    return $IPValida;
}

function convertirIP($ipValida){
  echo $ipValida;
    $arrayIP = explode(".", $ipValida);

    printf(" El binario es %b.%b.%b.%b",$arrayIP[0],$arrayIP[1],$arrayIP[2],$arrayIP[3]);

}
?>
