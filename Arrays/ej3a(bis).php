<html>
  <head>
    <title> EJ3-Array </title></head>
  <body>
    <?php

        $arrayNum=array(array());


           for ($y=0; $y < 10; $y++) {
             $arrayNum[$y][0]=sprintf("%b",$y);
             $arrayNum[$y][1]=sprintf("%o",$y);
           }

         echo "<table>

                  <tr>
                    <th>Indice</th>
                    <th>Binario</th>
                    <th>Octal</th>

                  </tr>";
          foreach ($arrayNum as $indice => $detalles) {
              echo '<tr>';
               echo "<td> $indice </td>";
            foreach ($detalles as $valor)
            {

              echo "<td> $valor </td>";
            }
            	echo '</tr>';
          }
        echo '</table>';
      ?>
  </body>
</html>
