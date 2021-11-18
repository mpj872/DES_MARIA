<html>
  <head>
    <title> EJ3-Array </title></head>
  <body>
      <?php
          $valores=array();

          for ($y=0; $y < 20; $y++) {

              $valores[$y]=sprintf("%b",$y);

          }
          $valoresInverso=array_reverse($valores);

          echo '<table>
                  <tr>
                      <td>BinarioInverso</td>
                  </tr>';


          foreach ($valoresInverso as $valor) {

              echo '<tr>';
                  echo '<td>'.$valor.'</td>';
              echo '</tr>';
          }

          echo '</table>';
      ?>
  </body>
</html>
