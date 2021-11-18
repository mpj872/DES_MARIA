
<?php

	//Descargo el fichero en un array linea a linea
	$alumnos=file("alumnos1.txt");

?>

<html>
	<head>
		<title>Archivos1</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			//Recorro el array por alumno y lo pinto en la tabla
			foreach($alumnos as $alumno) {
				echo "<table style='border: solid;'>".
					"<tr>".
						"<th>"."Nombre"."</th>".
						"<th>"."Apellido1"."</th>".
						"<th>"."Apellido2"."</th>".
						"<th>"."Fecha"."</th>".
						"<th>"."Localidad"."</th>".
					"</tr>".
					"<tr>".
						"<td>".substr($alumno,0,40)."</td>".
						"<td>".substr($alumno,40,40)."</td>".
						"<td>".substr($alumno,80,40)."</td>".
						"<td>".substr($alumno,120,40)."</td>".
						"<td>".substr($alumno,160,40)."</td>".
					"</tr>".
				"</table>";
			};
		?>
	</body>
</html>
