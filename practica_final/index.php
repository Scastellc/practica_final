<!DOCTYPE html>
<html>
<head>
	<title>AjedrezBalear</title>
	<meta charset="utf-8">
   	<!--Bootstrap-->

	<!-- 			Latest compiled and minified CSS 			-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href="css/styloBasic.css" type="text/css" rel="stylesheet" media="screen,projection"/>

			<!--	 					Estilos							-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	
			<!--	 					Favicon							-->
	<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEAEQARABEAEQARABEAEREAEQARABEAEQARABEAEQAAEQARABEAEQARABEAEQAREQARABEAEQARABEAEQARAAARABEAEQARABEAEQARABERABEAEQARABEAEQARABEAABEAEQARABEAEQARABEAEREAEQARABEAEQARABEAEQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />

	<?php 
		include_once "php/funciones.php";
	?>
</head>
<body>

	    <!--		Menu			-->
	<div class="container-fluid">	
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
							<li class="active">
								<a href="index.php">Inicio</a>
							</li>
							<li>
								<a href="partida.php">Jugar</a>
							</li>
							<li>
								<a href="noticias.php">Noticias</a>
							</li>
							<li>
								<a href="" data-toggle="modal" data-target="#Cfun">¿Cómo funciona?</a>
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
	<div class="panel-body">
	    <div class="panel2">
	        <div class="row"> 
				<h1 class="col-md-12" style="margin-left: 20%;">Bienvenidos</h1>
				<p style="margin-left: 20%;"> Os voy a relatar 4 normas basicas del juego</p>
				<div class="col-md-4">
					<ul class="galeria">
						<li><a href="intro/sinLogin.png" target="_blanck"><img src="intro/sinLogin.png" alt=""></a><span>No podremos jugar hasta que estemos logueados, por eso nos mandará a iniciar sesión.</span></li>
						<li><a href="intro/anotacion.png" target="_blanck"><img src="intro/anotacion.png" alt=""></a><span>Cada vez una pieza se mueva se anotará en nuestra planilla. Al finalizar la partida aparecerá el boton para guardar la partida</span></li>
						<li><a href="intro/movimientoC.png" target="_blanck"><img src="intro/movimientoC.png" alt=""></a><span>Cuando una pieza tenga distintas casillas donde mover, se marcarán con una opacidad y bordeo en la casilla. El caballo como podemos apreciar se mueve en "L" y es la única pieza que puede saltar.</span></li>
						<li><a href="intro/movimientoT.png" target="_blanck"><img src="intro/movimientoT.png" alt=""></a><span>La torre se mueve por columnas o filas.</span></li>
						<li><a href="intro/peonInicioCaptura.png" target="_blanck"><img src="intro/peonInicioCaptura.png" alt=""></a><span>Como captura el peon cuando esta en su casilla inicial.</span></li>
					</ul>					
				</div>
				<div class="col-md-4">
					<ul class="galeria">
						<li><a href="intro/2user.png" target="_blanck"><img src="intro/2user.png" alt=""></a><span>Una vez logeuados. Al pulsar a jugar nos pedira que introduzcamso el nick de ambos jugadores.</span></li>
						<li><a href="intro/resultados.png" target="_blanck"><img src="intro/resultados.png" alt=""></a><span>Los posibles resultados antes de que la partida acabe, tambien acabara la partida si ha un jugador le captura el rey. </span></li>
						<li><a href="intro/movimientoR.png" target="_blanck"><img src="intro/movimientoR.png" alt=""></a><span>El rey solo va de una casilla en una, cuando una pieza enemiga podramso matar, nos aparecera en rojo, al igual que nos aparece en rojo nuestra pieza seleccionada.</span></li>
						<li><a href="intro/movimientoD.png" target="_blanck"><img src="intro/movimientoD.png" alt=""></a><span>La dama es como el alfil y la torre, en diagonal, en columnas y filas.</span></li>
						<li><a href="intro/movimientoP.png" target="_blanck"><img src="intro/movimientoP.png" alt=""></a><span>Como se mueve el peon despues de haberse movido una vez.</span></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="galeria">
						<li><a href="intro/elegirPieza.png" target="_blanck"><img src="intro/elegirPieza.png" alt=""></a><span>Antes de coronar un peon debemos seleccionar que pieza queremos cambiar por el peón.</span></li>
						<li><a href="intro/tablero.png" target="_blanck"><img src="intro/tablero.png" alt=""></a><span>Este es nuestro tablero para poder jugar nuestra partida, empiezan las blancas y después juegan negras, es una jugada por cada color.</span></li>
						<li><a href="intro/movimientoA.png" target="_blanck"><img src="intro/movimientoA.png" alt=""></a><span>El alfil se mueve en diagonal y siempre por su color.</span></li>
						<li><a href="intro/peonInicio.png" target="_blanck"><img src="intro/peonInicio.png" alt=""></a><span>El peón si esta en su casilla de inicio se podra mover de uno o dos pasos.</span></li>
						<li><a href="intro/peonCap.png" target="_blanck"><img src="intro/peonCap.png" alt=""></a><span>El peón solo puede capturar en diagonal.</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


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
	<!-- 					jQuery library 							-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- 				Latest compiled JavaScript 					-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
