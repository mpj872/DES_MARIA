<html>
  <head>
    <title>Ficheros 6</title>
    <meta charset="utf-8" />
    </head>
    <body>
    <h1>Operaciones Ficheros</h1>
      <?php



        require 'funciones_bolsa.php';
        $fichero = fopen("ibex35.txt", "r");//Lo abro en modo lectura
        leerFichero($fichero);

      ?>
    </body>

</html>
