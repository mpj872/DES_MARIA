<html>
  <head>
    <title> EJ3-Array </title></head>
  <body>
      <?php
          $array0=array("Bases Datos","Entornos Desarrollo","Programación");
          $array1=array("Sistemas Informaticos","FOL","Mecanizado");
          $array2=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");
          $array4=array();


          //a) unir los arrays sin usar funciones de arrays

          $array4=$array0;
          $dimension=count($array4);

          echo "<h3> a) unir sin usar funciones de arrays</h3>";
          foreach ($array1 as $valor){

              $array4[$dimension]=$valor;
              $dimension++;
          }

         foreach ($array2 as $valor){
             $array4[$dimension]=$valor;
             $dimension++;

         }
         foreach ($array4 as $valor){
             echo $valor."</br>";
         }

         //b)Unir los arrays usando array_merge
         $array5 = array_merge($array0, $array1,$array2);

         echo "<h3> b) unir con array_merge</h3>";
          foreach ($array5 as $valor){
             echo $valor."</br>";
         }
         //c) Unir los arrays con array_push, no se concatenan, se une el array completo en una posición
         $array6=array();
         array_push($array6,$array0,$array1,$array2);



         echo "<h3> b) unir con array_push</h3>";


         //para mostrarlo por pantalla hay que usar foreach anidados
         //porque el $array6 tiene dentro 3 arrays;
         foreach ($array6 as $arrays){

             foreach ($arrays as $asignaturas){
                 echo $asignaturas."</br>";
             }
         }




     ?>
  </body>
</html>
