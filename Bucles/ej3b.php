<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a hexadecimal</TITLE></HEAD>
<BODY>
<p>Maria Perez Jimenez</p>
<?php
$num="1515";
$resto="";
$cadena="";
while($num>0){
		
		$resultado=$num/16; #resultado 
		$resto=$num%16;
		
		if ($resto>=10) {
		   if ($resto==10) {
		      $resto="A";
		   }
		     if ($resto==11) {
		      $resto="B";
		   }
		     if ($resto==12) {
		      $resto="C";
		   }
		     if ($resto==13) {
		      $resto="D";
		   }
		     if ($resto==14) {
		      $resto="E";
		   }
		     if ($resto==15) {
		      $resto="F";
		   }
		   
		   
		}
		$cadena=$cadena.$resto; 	#concatenamos
		$num=intval($resultado);	#asignamos al num el resultado 
	
}

#invertimos la cadena
$invertida=strrev($cadena);

#mostramos la cadena
echo ($invertida);

?>
</BODY>
</HTML>
