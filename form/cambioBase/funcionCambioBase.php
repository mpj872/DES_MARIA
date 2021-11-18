
<?php

function convertirBinario($num){

  $binario=decbin($num);
  return $binario;
}

function convertirOctal($num){

	$octal=octdec($num);
	return $octal;


}
function convertirHexa($num){

	$hexadecimal=dechex($num);
	return $hexadecimal;


}
function convertirTodo($num){

	$binario=decbin($num);
	$octal=octdec($num);
	$hexadecimal=dechex($num);
	return array($binario,$octal,$hexadecimal);

}
?>
