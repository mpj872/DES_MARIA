<HTML>
<HEAD>
<TITLE>MODIFICAR SALARIO EMPLEADO</TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>	
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="./empsalarioempguardar.php" method='post'>
		<?php
			require 'funcionesBBDD2.php';
			$conn = abrirConexion();
			$empleados= desplegableDni($conn);
		?>

		<h1>MODIFICAR SALARIO EMPLEADO</h1>
		DNI:<select name="dni">
		<?php
			foreach ($empleados as $empleado) {
		?>
				<option value="<?php echo $empleado['dni']?>"><?php echo $empleado['dni'] ?></option>
		<?php
			}
		?>
		</select>
		Porcentaje Cambio: <input type='number' name='cambio' value=''><br>

		<input type="submit" value="enviar">
		<input type="reset" value="borrar">

	</FORM>
</BODY>
</HTML>
