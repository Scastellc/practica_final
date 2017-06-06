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
			        	<p> 1- Estar registrado en la pagina.</p>
			        	<p> 2- Encontrar ha alguien que quiera jugar!</p>
			        	<p>	3- Una vez logrado los dos pasos anteriores iremos al apartado de jugar, al entrar nos pedira que <strong>introduzcamos los nicks de dos usuarios registrados</strong> </p>
			        	<p>	4- Jugar la partida uno contra el otro a ver quien sabe mas!</p>
			        	<p> 5- Dentro de la partida podremos hacer tablas o abandonar, este juego de ajedrez tiene unas normas mas peculiares, aquí si se gana comiendo el rey, y no hay enroques.</p>
			        	<p> 6- ¡¡Importante a la hora de coronar un peon tener seleccionada antes la pieza que queremos coronar!!</p>
			        	<p> 7- Una vez terminada la partida podremos guardar la partida dandole al boton de pone: "Guardar Partida" que aparecera al finalizar la partida, para en un futuro volver a ver la planilla, en el apartado de mis partidas</p>
			        	<p> Por ultimo <strong>toca disfrutar entre amigos a ver quien es mas bueno!!</strong></p>	
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
				<div class="col-md-6" style="margin-left: 20%;">
					<h1 class="col-md-12">Bienvenidos</h1>
					<p> Esta pagina esta creada por Salva Castell, alumno de FPGS de Desarrollo de aplicaciones web.</p>
					<p>Por el momento, en la pagina se puede jugar una partida de ajedrez en el mismo pc.</p>
					<p>Poco a poco integrando mas propiedades a la pagina, como por ejemplo que se pueda jugar online, que se pueda añadir un modulo y incluso jugar contra el modulo, ejercicios de tactica para mejorar nuestro nivel.</p>
					<p> Actualizare las noticias para estar teneros lo informados posible</p>
					<p>Y recordar esta pagina es para pasarlo bien y encima es gratiuta!</p>
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
