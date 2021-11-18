<HTML>
<HEAD><TITLE> EJ3-Array </TITLE></HEAD>
<BODY>
<?php
$valores=array(0,1,10,11,100,101,110,111,1000,1001,1010,1011,1100,1101,1110,1111,10000,10001,10010,10011);
echo '<table>
        <tr>
            <td>Indice</td>
            <td>Binario</td>
            <td>Octal</td>
        </tr>';
        

foreach ($valores as $indice => $valor) {
    
    echo '<tr>';
    echo '<td>'.$indice.'</td>';
    echo '<td>'.$valor.'</td>';
    printf("<td>%o<td>",$indice);
    
    echo '</tr>';
}

echo '</table>';



?>
</BODY>
</HTML>