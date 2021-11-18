<HTML>
<HEAD><TITLE> EJ3-Direccion Red – Broadcast y Rango</TITLE></HEAD>
<BODY>
<?php
$ip="192.168.16.100/16";
$i=0;
$mas = substr($ip, -2); 

echo'IP '.$ip.'<br>';
echo'Mascara '.$mas.'<br>' ;
echo 'Direccion Red: '.substr_replace($ip, '0.0',8,16) . "<br />";
echo 'Direccion Broadcast: '.substr_replace($ip, '255.255',8,16) . "<br />";
echo 'Rango: '.substr_replace($ip, '255.254',8,16) . "<br />";
?>
</BODY>
</HTML>