<html>
  <head>
    <title> EJ3-Array </title></head>
  <body>
    <?php
        $array0=array("Bases Datos","Entornos Desarrollo","Programación");
        $array1=array("Sistemas Informaticos","FOL","Mecanizado");
        $array2=array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");

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
      //Si inviertes solo el $array6 se invierten los arrays que tiene dentro pero no los valores
       //Tengo que invertir los arrays de manera independiente
       //Y con el array_push añadirselos al array7
       $array7=array();
       $arrayInvertido=array_reverse($array2);
       array_push($array7,$arrayInvertido);
       $arrayInvertido=array_reverse($array1);
       array_push($array7,$arrayInvertido);
       $arrayInvertido=array_reverse($array0);
       array_push($array7,$arrayInvertido);
       //Elimina la posición que le indicas pero no deja hueco vacio
       unset($array7[1][0]);

        echo "<h3> c) Array invertido sin mecanizado</h3>";


       //para mostrarlo por pantalla hay que usar foreach anidados
       //porque el $array6 tiene dentro 3 arrays;
       foreach ($array7 as $arrays){

           foreach ($arrays as $asignaturas){
               echo $asignaturas."</br>";
           }
       }


   ?>
  </body>
</html>
