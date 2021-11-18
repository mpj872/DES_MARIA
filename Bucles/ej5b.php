<HTML>
<HEAD><TITLE> EJ5B – Tabla de multiplicar con HTML</TITLE></HEAD>
<BODY>
<p>Maria Perez Jimenez</p>
<?php
$num="8";

for ($i = 1; $i<=10 ; $i++) {
    
    $mult=$num*$i;
    echo "<table>
            <tr> $num. "x". $i. "=". $mult </tr>
         </table>";
}

?>
</BODY>
</HTML>
