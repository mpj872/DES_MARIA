<HTML>
<HEAD><TITLE> EJ4B – Tabla de multiplicar</TITLE></HEAD>
<BODY>
<p>Maria Perez Jimenez</p>
<?php
$num="8";

for ($i = 1; $i<=10 ; $i++) {
    
    $mult=$num*$i;
    echo ($num. "x". $i. "=". $mult);
    echo "<br>";
}

?>
</BODY>
</HTML>
