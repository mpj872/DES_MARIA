<html>
  <head>
    <title> PRACTICA EVALUABLE </title>
  <meta charset="utf-8" />
  </head>
  <body>
      <?php
            require 'funcionDados.php';
            echo "<h1>Resultado Juego Dados</h1>";

			$numDados= $_POST['numdados'];
			
			//Compruebo que los dados elegidos para la partida esta entre 1 y 10
			  
			if($numDados>=1 && $numDados<10){
				
				

				$jugadores=array();
				//Le paso el numero de dados y el array de jugadores
				//a la función generar tirada. 
				
				generoTiradas($jugadores,$numDados);

				//Una vez que tengo los jugadores con las tiradas.
				//pinto la tabla 

				$iterador=1;
				$maximaPunt = 0;
				$ganadores = [];
				echo "<table border='1'>";
				//pinto la tabla con el foreach
				foreach ($jugadores as $numJugador => $jugador) {
					echo "<tr>";
					//concateno el nombre del jugador para añadirlo a la celda 
					echo "<td>Jugador; ".$_POST['nombre'.(string)$iterador]."</td>";
					$iterador++;
					//sopeso la pposibilidad de que sean todas las tiradas iguales
					$todosIguales =1;
					$ultimoDado = null;
					$sumaDados=0;
					foreach ($jugador as $key => $dado) {
						//Si juego con mas de un dado compruebo que no sean todos iguales 	
						if($numDados>1){	
						  if ($ultimoDado != null && $dado == $ultimoDado ) {
							$todosIguales++;
						  }
						
						  $ultimoDado = $dado;
						}
						$sumaDados=$sumaDados+$dado;
						echo '<td><img src="./images/'.$dado.'.PNG" width="40" height="40"/></td>';

					}
					//Si coincide que todos los dados son iguales lo pongo a 100
					if ($todosIguales==$numDados) {
					  $sumaDados = 100;
					}
					//Si la suma de dados del jugador es igual al máximo le añado al array 
					//de ganadores
					if ($sumaDados == $maximaPunt) {
					  $maximaPunt = $sumaDados;
					  $ganadores[] = $numJugador;
					}
					//Si la suma de dados del jugador supera al anterior inicio el array a vacio
					//y añado al jugador que gana en ese moemento.
					if ($sumaDados > $maximaPunt) {
					  $ganadores=array();
					  $maximaPunt = $sumaDados;
					  $ganadores[] = $numJugador;
					}

					echo "La suma de los dados del jugador: ".$numJugador." es: ". $sumaDados."</br>";
					echo "</tr>";
				  }
					echo "</table>";

				foreach($ganadores as $ganador) {
					echo "Ha ganado el jugador: ". $_POST['nombre'.(string)($ganador+1)]."</br>";
					
				}
				$numeroGanadores=count($ganadores);
					
						
				echo "NUMERO DE GANADORES: ". $numeroGanadores;						
						
					
			}else{
				echo "Elige un número de dados entre 1 y 10";
			
			}

      ?>
  </body>
</html>
