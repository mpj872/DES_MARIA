<HTML>
<HEAD>
<TITLE> FORMULARIO REGISTRO CLIENTE </TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
		<?php
			require 'funcionesBBDD2.php';
			$conn = abrirConexion();
			$categorias= desplegableCategoria($conn);

		?>

		<h1>REGISTRO CLIENTE</h1>

		NIF: <input type='text' name='nif' value=''><br><br>
		NOMBRE: <input type='text' name='nombre' value=''><br><br>
		APELLIDO: <input type='text' name='apellido' value=''><br><br>
		CP: <input type='text' name='cp' value=''><br><br>
		DIRECCION: <input type='text' name='direccion' value=''><br><br>
		CIUDAD: <input type='text' name='ciudad' value=''><br><br>
		CONTRASEÑA: <input type='text' name='password' value=''><br><br>

		<input type="submit" value="enviar">
		<input type="reset" value="borrar">

	</FORM>
</BODY>
</HTML>
<?php


//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí
//En caso de tener los campos rellenos
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(!empty($_POST["nif"])
	&& !empty($_POST['nombre'])
	&& !empty($_POST['apellido'])
	&& !empty($_POST['cp'])
	&& !empty($_POST['direccion'])
	&& !empty($_POST['ciudad'])
	&& !empty($_POST['password'])
	){
		//Recojo variables formulario
		$nif=$_POST['nif'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$cp=$_POST['cp'];
		$direccion=$_POST['direccion'];
		$ciudad=$_POST['ciudad'];
		$password=$_POST['password'];

		//Limpio variables
		$nif=limpiar($nif);
		$nombre=limpiar($nombre);
		$apellido=limpiar($apellido);
		$cp=limpiar($cp);
		$direccion=limpiar($direccion);
		$ciudad=limpiar($ciudad);
		$password=limpiar($password);

		//Abro la abrirConexion
		$conn=abrirConexion();
		altaRegistro($nif,$nombre,$apellido,$cp,$direccion,$ciudad,$password,$conn);

	} else {
		echo "Faltan datos por introducir";
	}
}
?>
