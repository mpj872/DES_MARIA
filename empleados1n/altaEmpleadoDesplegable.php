<HTML>
<HEAD>
<TITLE> FORMULARIO ALTA DEPARTAMENTO </TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>

<form name='mi_formulario' action='altaEmpleado.php' method='post'>
<?php
require 'funcionesBBDD.php';
$departamentos= descargarDepartamentos();


?>
<h1>ALTA EMPLEADO</h1>


DNI: <input type='text' name='dni' value=''><br><br>
NOMBRE: <input type='text' name='nombre_e' value=''><br><br>
FECHA_NACIMIENTO: <input type='text' name='fnac' value=''><br><br>
NOMBRE_D:<select name="nombre_d">
 <?php
  foreach ($departamentos as $departamento) {
    foreach ( $departamento as $key => $value) {
      ?><option value="<?php$value?>"><?php echo $value ?></option>
  <?php
    }

  }

  ?>

</select>

<input type="submit" value="enviar">
<input type="reset" value="borrar">

</FORM>
</BODY>
</HTML>
