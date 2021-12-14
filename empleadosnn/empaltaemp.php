<HTML>
<HEAD>
<TITLE> FORMULARIO ALTA DEPARTAMENTO </TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>	
	<!--LLamar al formulario a si mismo   -->
	<form name='mi_formulario' action="./empaltaempguardar.php" method='post'>
		<?php
			require 'funcionesBBDD2.php';
			$conn = abrirConexion();
			$departamentos= desplegableDepartamentos($conn);
		?>

		<h1>ALTA EMPLEADO</h1>
		DNI: <input type='text' name='dni' value=''><br><br>
		NOMBRE: <input type='text' name='nombre' value=''><br><br>
		APELLIDOS: <input type='text' name='apellidos' value=''><br><br>
		FECHA_NACIMIENTO: <input type='text' name='fecha_nac' value=''><br><br>
		SALARIO: <input type='text' name='salario' value=''><br><br>
		
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
