<HTML>
<HEAD><TITLE> EJ1-Array </TITLE></HEAD>
<BODY>
<?php
$valores=array(1,3,5,7,9,11,13,15,17,19);
echo '<table>
        <tr>
            <td>Indice</td>
            <td>Valor</td>
            <td>Suma</td>
        </tr>';
        

$sumaI=0;
$sumaP=0;
$contI=0;
$contP=0;
foreach ($valores as $indice => $valor) {
    if ($indice%2!=0) {
        $contI++;
        $sumaI=$sumaI+$valor;
    }
     if ($indice%2==0) {
        $contP++;
        $sumaP=$sumaP+$valor;
    }
}
echo'media impares: '.($sumaI/$contI).'<br>';
echo'media pares: '.($sumaP/$contP);



$suma = 0;
foreach ($valores as $indice => $valor) {
    $suma = $suma + $valor;
    echo '<tr>';
    echo '<td>'.$indice.'</td>';
    echo '<td>'.$valor.'</td>';
    echo '<td>'.$suma.'</td>';
    echo '</tr>';
}

echo '</table>';



?>
</BODY>
</HTML>