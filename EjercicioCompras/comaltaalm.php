<HTML>
<HEAD>
<TITLE> FORMULARIO ALTA ALMACÉN </TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>	
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
		<?php
			require 'funcionesBBDD2.php';
		?>

		<h1>ALTA ALMACÉN</h1>
	
		LOCALIDAD: <input type='text' name='localidad' value=''>

		<input type="submit" value="enviar">
		<input type="reset" value="borrar">

	</FORM>
</BODY>
</HTML>
<?php



//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(!empty($_POST['localidad'])) {
		//Recojo variables formulario
		$localidad=$_POST['localidad'];
		
		//Limpio variables
		$localidad=limpiar($localidad);

		//Abro la abrirConexion
		$conn=abrirConexion();
		//Consulto el ultimo producto
		$ultimoAlmacen=consultarAlmacen($conn);
		altaAlmacen($localidad,$ultimoAlmacen,$conn);
	  
	} else {
		echo "Error en datos";
	}
}
?>
