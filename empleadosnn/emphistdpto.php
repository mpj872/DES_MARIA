<HTML>
<HEAD>
<TITLE> MOSTRAR HISTORICO DE EMPLEADOS</TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>	
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="./emphistdptomostrar.php" method='post'>
		<?php
			require 'funcionesBBDD2.php';
			$conn = abrirConexion();
			$departamentos= desplegableDepartamentos($conn);
			
		?>

		<h1>MOSTRAR HISTORICO DE EMPLEADOS</h1>
	
		NOMBRE_D:<select name="cod_dpto">
		<?php
			foreach ($departamentos as $departamento) {
		?>
				<option value="<?php echo $departamento['cod_dpto']?>"><?php echo $departamento['nombre_dpto'] ?></option>
		<?php
			}
		?>
		</select>

		<input type="submit" value="enviar">
		<input type="reset" value="borrar">

	</FORM>
</BODY>
</HTML>
