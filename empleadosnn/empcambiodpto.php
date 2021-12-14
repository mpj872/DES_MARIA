<HTML>
<HEAD>
<TITLE> FORMULARIO CAMBIO DEPARTAMENTO EMPLEADO</TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>	
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="./empcambiodptoguardar.php" method='post'>
		<?php
			require 'funcionesBBDD2.php';
			$conn = abrirConexion();
			$departamentos= desplegableDepartamentos($conn);
			$empleados= desplegableDni($conn);
		?>

		<h1>CAMBIO DEPARTAMENTO EMPLEADO</h1>
		DNI:<select name="dni">
		<?php
			foreach ($empleados as $empleado) {
		?>
				<option value="<?php echo $empleado['dni']?>"><?php echo $empleado['dni'] ?></option>
		<?php
			}
		?>
		</select>
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
