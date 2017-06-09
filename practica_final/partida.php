<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>AjedrezBalear</title>

	<!-- 					jQuery library 							-->
	<link href="css/estiloTablero.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
	<!-- 					Jquery						 			
	
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<!-- 				Latest compiled and minified CSS 			-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

	<!--	 					Estilos								-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="css/styloBasic.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	
	<!--	 					Favicon							-->
	<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEAEQARABEAEQARABEAEREAEQARABEAEQARABEAEQAAEQARABEAEQARABEAEQAREQARABEAEQARABEAEQARAAARABEAEQARABEAEQARABERABEAEQARABEAEQARABEAABEAEQARABEAEQARABEAEREAEQARABEAEQARABEAEQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />

	<?php 
		include_once "php/funciones.php";
	?>
</head>
<body>
 	
 	<!--						Menu								-->
	
	<div class="container-fluid juego">	
		<div class="row">
			<nav class="navbar navbar-inverse navbar-fixed-top menu">
				<div class="container-fluid">
					<div class="navbar-header">
			    		<button type="button" class="navbar-toggle btn glyphicon glyphicon-list btns" data-toggle="collapse" data-target="#MyMenu">					
						</button>
						<a class="navbar-brand" href="index.php" id="tit">Ajedrez Balear</a>
					</div>
					<div class="collapse navbar-collapse" id="MyMenu">	
						<ul class="nav navbar-nav">
							<li>
								<a href="index.php">Inicio</a>
							</li>
							<li>
								<a href="partida.php">Jugar</a>
							</li>
							<li>
								<a href="noticias.php">Noticias</a>
							</li>
							<li>
								<a href="" data-toggle="modal" data-target="#Cfun">¿Como funciona?</a>
							</li>
						</ul>
						<div id=divDer class='nav navbar-nav navbar-right'>	
							
							<?php			
								usuario();
							?>
				    
			    		</div>
					</div>		
		    	</div>
		    </nav>
	    </div>
	</div>

				<!-- 			Modal de como funciona					-->
	<div class="modal fade" id="Cfun" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Funcionamiento</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
			        	<p> 1- Estar registrado en la página.</p>
			        	<p> 2- Encontrar a algun amigo que quiera jugar, también podriamos jugar contra nosotros mismos!</p>
			        	<p>	3- Una vez logrado los dos pasos anteriores iremos al apartado de jugar, al entrar nos pedirá que <strong>introduzcamos los nicks de dos usuarios registrados.</strong> En caso de jugar contra nosotros mismos pondremos nuestro nick en ambos campos! </p>
			        	<p>	4- Jugar la partida</p>
			        	<p> 5- Dentro de la partida podremos hacer tablas o abandonar, este juego de ajedrez tiene unas normas más peculiares, aquí si se gana comiendo el rey, y no hay enroques.</p>
			        	<p> 6- ¡¡Importante a la hora de coronar un peon tener seleccionada antes la pieza que queremos coronar!!</p>
			        	<p> 7- Una vez terminada la partida podremos guardarla dandole al boton de pone: "Guardar Partida" que aparecerá al finalizar la partida, para en un futuro volver a ver la planilla, en el apartado de mis partidas</p>
			        	<p> Por último <strong>toca disfrutar entre amigos a ver quien és más bueno!!</strong></p>	
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>

					<!-- 			Modal de mis partidas				-->
	<div class="modal fade" id="mPartidas" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Mis partidas</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
			        	<?php 
			        		misPartidas();			       
			        	?>			       
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>
	<?php 
		// Le indico que si la session no esta iniciada que la inicie vacia
		if (empty($_SESSION['cliente'])) {	
			$_SESSION['cliente'] = new user();
			$_SESSION['cliente'] -> setnombre("");	
		}

		// Si esta vacia mostrara el invitado
		if ($_SESSION['cliente'] -> getnombre() == "") {	
			echo "<script type='text/javascript'>window.location.assign('login.php')</script>";
		}
	?>
	<?php
		if (isset($_POST['enviarJugadores'])) {
		
			$player1 = ($_POST['login1']);
			$player2 = ($_POST['login2']);

			// Conexion a la bd
			$bd = conexion();

			// Consulta
			$consu = "SELECT login FROM Usuario WHERE login = '" . $player1 . "'";
			$consu2 = "SELECT login FROM Usuario WHERE login = '" . $player2 . "'";

			// Hacemos la consulta
			$result = sentencia($bd, $consu);	
			$result2 = sentencia($bd, $consu2);

			// Contamos el numero de filas que devuelve
			$total = $result -> num_rows;
			$total2 = $result2 -> num_rows;

			if ($total > 0 && $total2 > 0 ) {
				
				?>
				<div id="juego" class="container">
					<div class="row">
						<div class="col-lg-12 btn-group" id="piezaCoronar" data-toggle="buttons">
							<h4>Elige pieza</h4>
							<p>Cuando un peon vaya a coronar se podrá cambiar por la pieza que tengamos seleccionada.</p>		
							<label class="btn btn-default active">
								<input type="radio" name="pieza" title="Dama" value="dama" id="rDama" autocomplete="off" checked>
								<span class="glyphicon glyphicon-queen col-lg-3"></span>
							</label>
							<label class="btn btn-default">
								<input type="radio" name="pieza" title="Torre" value="torre" id="rTorre" autocomplete="off">
								<span class="glyphicon glyphicon-tower col-lg-3"></span>
							</label>

							<label class="btn btn-default">
								<input type="radio" name="pieza" title="Caballo" value="caballo" id="rCaballo" autocomplete="off">
								<span class="glyphicon glyphicon-knight col-lg-3"></span>
							</label>

							<label class="btn btn-default">
								<input type="radio" name="pieza" title="Alfil" value="alfil" id="rAlfil" autocomplete="off">
								<span class="glyphicon glyphicon-bishop col-lg-3"></span>
							</label>
						</div>
					</div>
					<div class="row">
						<div>&nbsp;</div>
				   		<div class="col-lg-8">
							<div class="col-md-12">
								<div class="tablero">
									<h1>¡Partida!</h1>
									<ul id="casillas"></ul>
								</div>
							</div>
							<div>&nbsp;</div>
							<div>&nbsp;</div>
							<div id="resultados" style="margin-left: 15%;">
								<input type='button' class='btn btn-lg btn-danger col-lg-3 col-lg-push-1' value='1-0' onclick="anotarFinal('1-0');"/>	
								<input type='button' class='btn btn-lg btn-success col-lg-3 col-lg-push-1' value='Tablas' onclick="anotarFinal('0,5-0,5');"/>
								<input type='button' class='btn btn-lg btn-danger col-lg-3 col-lg-push-1' value='0-1' onclick="anotarFinal('0-1');" />								
							</div>
							
						</div>
						<div class="col-lg-4">
							<div class="col-md-10 col-md-offset-2">
								<form action="" method="POST" id="formAjax">
									<div>
										<h1>Anotación</h1>
										<table>				  	
										  	<thead id="jugadores">				
										  		<th>Nº Jugadas</th>		  		
										    	<th><?php echo $player1; ?></th>
										    	<th><?php echo $player2; ?></th>
										  	</thead>
										  	<tbody id="planilla">										  		
										  	</tbody>
										</table><br>
										<input type='hidden' id="jBlancas" name="jBlancas"/>
										<input type='hidden' id="jNegras" name="jNegras"/>
										<input type='hidden' id="aBlancas" name="aBlancas"/>
										<input type='hidden' id="aNegras" name="aNegras"/>
										<input type='hidden' id="aRes" name="aRes"/>
										<input type='submit' value="Guardar Partida" class='btn btn-lg btn-info hide' id="mandar" name="mandarPartida"/>
									</div>
								</form>
							</div>
						</div>
					</div>		
				</div>

		<?php
				}else{
					apuntarJugadores();
				}
				
			}else if (isset($_POST['mandarPartida'])) {
				$bd = conexion();

				$player1 = $_POST['jBlancas'];
				$player2 = $_POST['jNegras'];
				$blancas = $_POST['aBlancas'];
				$negras = $_POST['aNegras'];
				$res = $_POST['aRes'];

				$sql = 'INSERT INTO Partida(nick_blancas, nick_negras, resultado, move_blancas, move_negras) VALUES ("'.$player1.'","'.$player2.'","'.$res.'","'.$blancas.'","'.$negras.'")';

				$result3 = sentencia($bd, $sql);
				echo "<script type='text/javascript'>alert('La partida se guardo correctamente, puede volver a jugar otra!')</script>";
				echo "<script type='text/javascript'>window.location.assign('partida.php')</script>";

			}else{
				apuntarJugadores();
			}
		
		?>

	<?php
		function apuntarJugadores(){
	?>
		<div class="container">
		<div class="row formu"> 		
			<div class='col-sm-10 col-sm-offset-1'>
		        <div class='well well-lg'>
					<h2>¿Jugadores?</h2>
					<form action="" method="POST">
		            	<span>Jugador 1 (blancas):</span>
	                	<input type="text" name="login1" class='form-control' pattern="^([a-z]+[0-9]{0,2}){5,12}$" title="Minimo 5 letras, y dos num opcional" required><br>
	               		<span>Jugador 2 (negras):</span>
	                	<input type="text" name="login2" class='form-control' pattern="^([a-z]+[0-9]{0,2}){5,12}$" title="Minimo 5 letras, y dos num opcional" required>
	                	<br>
						<div class='text-center'>
							<span style="color: red;">¡Recuerda, si introduces el login de los dos jugadores registrados se guardan en la base de datos para poder acceder después a ver la planilla!</span><br><br>				   
                        	<input type='submit' class='btn btn-primary' title="Se activara cuando este el formulario completado y aceptado las condicones." name="enviarJugadores" id="enviarJugadores" value='Enviar'/>
                        	<input type='reset' class='btn btn-danger' value='Cancelar' />		
						</div>
					</form>
		        </div>
			</div>
		</div>
	</div>
	<?php 
		}
	?>
			<!-- 			Con este div separamos el footer				-->
	<div class="clearfix"></div>

 	<!--		Footer		-->
	<div class="footer">
	    <div class="container">
	        <div class="row">
	    		<div class="col-lg-12">
	      			<div class="col-md-8">
	      				<p> 
	      					<?php
	      						hora();
							?>	
						</p>
	      				<a href="#">Terms of Service</a> | <a href="#">Privacy</a> 
			        	<div class="nav navbar-nav navbar-right icons">
							<a href="https://www.facebook.com" target="blank"><i class="fa fa-facebook-square fa-4x social social-fb"></i></a>
	            			<a href="https://plus.google.com" target="blank"><i class="fa fa-google-plus-square fa-4x social social-gp"></i></a>
	            			<a href="https://twitter.com" target="blank"><i class="fa fa-twitter-square fa-4x social social-tw"></i></a>
						</div> 			   
	      			</div>
	      			<div class="col-md-4">
	        			<p class="muted pull-right">© 2016 Salva Castell. All rights reserved</p>
	      			</div>
                </div>
            </div>    
        </div>
    </div>

</body>
	<!--Bootstrap-->

	<!-- 				Latest compiled JavaScript 					-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
