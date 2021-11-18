<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario</TITLE></HEAD>
<BODY>
<?php
#declaro las variables no estan tipadas con lo que php las reconoce como string

$ip="192.18.16.204";
$i=0;
$pos=0;
$cont=0;
echo'IP ',$ip,' en binario es: ';
while($cont<3){
	
	$pos=strpos($ip,'.',$i);
	printf("%08b",substr($ip,$i,$pos-$i));
	echo".";
	$i=$pos+1;
	$cont++;

}
printf("%08b\n",substr($ip,$pos+1));
?>
</BODY>
</HTML>