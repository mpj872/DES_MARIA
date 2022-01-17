<HTML>
<HEAD>
<TITLE> FORMULARIO APROVISIONAMIENTO </TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>	
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
		<?php
			require 'funcionesBBDD2.php';
			$conn = abrirConexion();
			$productos= desplegableProducto($conn);
			$almacenes= desplegableAlmacen($conn);
			
		?>

		<h1>APROVISIONAMIENTO</h1>
	
		CANTIDAD:<input type='text' name='cantidad' value=''><br><br>
		PRODUCTO:<select name="id_producto">
		<?php
			foreach ($productos as $producto) {
		?>
				<option value="<?php echo $producto['ID_PRODUCTO']?>"><?php echo $producto['NOMBRE'] ?></option>
		<?php
			}
		?>
		</select>
		ALMACEN:<select name="num_almacen">
		<?php
			foreach ($almacenes as $almacen) {
		?>
				<option value="<?php echo $almacen['NUM_ALMACEN']?>"><?php echo $almacen['LOCALIDAD'] ?></option>
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
//Me doy cuenta de que a pesar de no seleccionar producto ni almacen
//Por defecto el propio select tiene ya un resultado asiq solo 
//controlo que se introduzca la cantidad 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(!empty($_POST["cantidad"]) 
		
	){
		//Recojo variables formulario
		$cantidad=$_POST['cantidad'];
		$id_producto=$_POST['id_producto'];
		$num_almacen=$_POST['num_almacen'];
		
		//Limpio variables
		$cantidad=limpiar($cantidad);
		$id_producto=limpiar($id_producto);
		$num_almacen=limpiar($num_almacen);

		//Abro la abrirConexion
		$conn=abrirConexion();
		//Doy de alta el aprovisionamiento
		
		altaAprovisionamiento($cantidad,$num_almacen,$id_producto,$conn);
	  
	} else {
		echo "Error en datos";
	}
}
?>
