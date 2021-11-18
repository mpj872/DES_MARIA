<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario sin usar print </TITLE></HEAD>
<BODY>
<?php
#base_convert(string $number, int $frombase, int $tobase): string
	# 11000000.00010010.00010000.11001100

$ip="192.18.16.204";
$i=0;
$pos=0;
$cont=0;
echo'IP',$ip,'en binario es:';
while($cont<3){
	
	$pos=strpos($ip,'.',$i);
	$num=decbin(substr($ip,$i,$pos-$i));
	
	echo $num.".";
	$i=$pos+1;
	$cont++;

}
	$num=decbin(substr($ip,$pos+1));
	echo $num;
?>
</BODY>
</HTML>

