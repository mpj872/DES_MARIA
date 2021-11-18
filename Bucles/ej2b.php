<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a octal</TITLE></HEAD>
<BODY>
<p>Maria Perez Jimenez</p>
<?php
$num="168";
$resto="";
while($num>0){
		
		$resultado=$num/8; #resultado 
		$resto=$resto.$num%8; 	#resto division
		$num=intval($resultado);	#asignamos al num el resultado 
	
}
#invertimos la cadena
$invertida=strrev($resto);

#mostramos la cadena
echo ($invertida);

?>
</BODY>
</HTML>
