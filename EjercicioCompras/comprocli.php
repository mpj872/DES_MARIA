<HTML>
<HEAD>
<TITLE> FORMULARIO COMPRA PRODUCTO</TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
		<?php
			require 'funcionesBBDD2.php';
			$conn = abrirConexion();
			$productos= desplegableProducto($conn);


		?>

		<h1>COMPRA PRODUCTO</h1>

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
	
		<!--Tengo que meter un boton de añadir a la cesta otro de borrar, que me borrara toda la cesta y otro de comprar que pasara a la BBDD a meter en la tabla  compra el registro de las compras y en la tabla almacena disminuira la cantidad de producto almacenada -->
		<input type="submit" name="anyadir" value="añadir a la cesta">
		<input type="submit" name="borrar" value="borrar cesta">
		<input type="submit" name="comprar" value="comprar">

	</FORM>
</BODY>
</HTML>
<?php

//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí
//Me doy cuenta de que a pesar de no seleccionar producto ni almacen
//Por defecto el propio select tiene ya un resultado asiq solo
//controlo que se introduzca la cantidad o añado un selecciona producto solo 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['comprar'])){
		//Entro en compra Recuperar mi cesta 
		
		//Si exite la recupero 
		if(isset($_COOKIE['cesta'])){
			$cesta=unserialize($_COOKIE['cesta']);
			
			foreach($cesta as $id_producto=>$cantidad){
				//Tengo que averiguar si tengo suficiente cantidad 
				$numAlmacenDisponible=comprobarCantidadPorAlmacen($conn,$id_producto,$cantidad);
				if($numAlmacenDisponible!=0){
					comprarProducto($conn,$id_producto,$cantidad,$numAlmacenDisponible);
					
				}else{
					echo "no tenemos existencias del producto: ".$id_producto;
				}
				
				var_dump($numAlmacenDisponible);
			}
					
		}
	
		//$existeCantidad=comprobarCantidadPorAlmacen($conn);
		
	}else if(isset($_POST['anyadir'])){
		//Compruebo que esten introducidos los datos 
			
		if(!empty($_POST["cantidad"])

		){
	
			//Recojo variables formulario
			$cantidad=$_POST['cantidad'];
			$id_producto=$_POST['id_producto'];


			//Limpio variables
			$cantidad=limpiar($cantidad);
			$id_producto=limpiar($id_producto);
	

			//Abro la abrirConexion
			$conn=abrirConexion();
			
			//Si la cesta ya existe la recupero y sino la creo 
			$cesta=array();
			$cantidadCesta=0;
			if(isset($_COOKIE['cesta'])){
				//Si existe la cesta la recupero y lo descodifico
				//para poder usarlo como array 
				$cesta=unserialize($_COOKIE['cesta']);
				//si tengo la cesta busco el producto 
				if(isset($cesta[$id_producto])){
					//si tengo el producto descargo la cantidad 
					$cantidadCesta=(int)$cesta[$id_producto];
				}
			}
			//le meto a la cesta el producto y la cantidad
			//En caso de no entrar en el otro if se quedaría a 0 
			$cesta[$id_producto]=$cantidad+$cantidadCesta;
			//serializo la cesta para convertirla en string y poder setearla
			setcookie('cesta',serialize($cesta) , time() + 365 * 24 * 60 * 60);
			
		} else {
			echo "Error en datos para añadir";
		}
		
		//Recojo el producto y la cantidad y se lo meto a la cookie
		
	}else if(isset($_POST['borrar'])){
		//Borro la cookie o la session 
		
	}
	
	

}
?>
