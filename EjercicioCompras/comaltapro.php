<HTML>
<HEAD>
<TITLE> FORMULARIO ALTA DEPARTAMENTO </TITLE>
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

		<h1>ALTA PRODUCTO</h1>

		NOMBRE: <input type='text' name='nombre' value=''><br><br>
		PRECIO: <input type='text' name='precio' value=''><br><br>
		CATEGORIA:<select name="id_categoria">
		<?php
			foreach ($categorias as $categoria) {
		?>
				<option value="<?php echo $categoria['ID_CATEGORIA']?>"><?php echo $categoria['NOMBRE'] ?></option>
		<?php
			}
		?>
		</select>

		<input type="submit" value="enviar">
		<input type="reset" value="borrar">

	</FORM>
</BODY>
</HTML>
<?php


//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(!empty($_POST["nombre"])
		&& !empty($_POST['precio'])
		&& !empty($_POST['id_categoria'])

	){
		//Recojo variables formulario
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$id_categoria=$_POST['id_categoria'];

		//Limpio variables
		$nombre=limpiar($nombre);
		$precio=limpiar($precio);
		$id_categoria=limpiar($id_categoria);

		//Abro la abrirConexion
		$conn=abrirConexion();
		//Consulto el ultimo producto
		$ultimoProducto=consultarProducto($conn);
		altaProducto($nombre,$precio,$id_categoria, $ultimoProducto,$conn);

	} else {
		echo "Error en datos";
	}
}
?>
