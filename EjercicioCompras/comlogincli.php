<HTML>
<HEAD>
<TITLE> FORMULARIO LOGIN CLIENTE </TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
	
		<h1>LOGIN CLIENTE</h1>

		NOMBRE: <input type='text' name='nombre' value=''><br><br>
		CLONTRASEÑA: <input type='text' name='password' value=''><br><br>
	
		<input type="submit" value="enviar">
		<input type="reset" value="borrar">

	</FORM>
</BODY>
</HTML>
<?php

require 'funcionesBBDD2.php';
$conn = abrirConexion();
//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(!empty($_POST["nombre"])
		&& !empty($_POST['password'])
		
	){
		//Recojo variables formulario
		$nombre=$_POST['nombre'];
		$password=$_POST['password'];
		
		//Limpio variables
		$nombre=limpiar($nombre);
		$password=limpiar($password);
		
		//Abro la abrirConexion
		$conn=abrirConexion();
		//Consulto BBDD
		$passwordCorrecto=consultarPassword($nombre,$password,$conn);
		//Si coincide la contraseña con la de la BBDD le redirijo a la pagina de Menu
		if($passwordCorrecto){
		setcookie('login',$nombre , time() + 365 * 24 * 60 * 60); 
		header('Location: http://localhost:81/EjerciciosMySQL/EjercicioCompras/MenuComprasCliente.php');
			
		}
		
	} else {
		echo "Error en datos";
	}
}
?>
