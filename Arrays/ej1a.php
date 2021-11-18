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