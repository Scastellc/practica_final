<!DOCTYPE html>
<html>
<head>
	<title>Noticias</title>
	<meta charset="utf-8">	
	<!--Bootstrap-->

	<!-- 			Latest compiled and minified CSS 			-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href="css/styloBasic.css" type="text/css" rel="stylesheet" media="screen,projection"/>

			<!--	 					Estilos							-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
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
							<li>
								<a href="index.php">Inicio</a>
							</li>
							<li>
								<a href="partida.php">Jugar</a>
							</li>
							<li class="active">
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

				<!-- 				Modal de carta							-->
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
			        	<p> "Como funciona y eso..." </p>
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>


	<div id="juego" class="container"> 
		<div class="row">
	   		<div class="col-lg-12">
				<div class="col-md-10 col-md-offset-2">
					<div class="tablero">
						<h1>Ultima Noticia</h1>
						<br><br>
						<div>
							<div class="col-md-6">
								<img src="noticias/maquina.jpg" alt="maquina">							
							</div>
							<div class="col-md-6">
								<h3> <a href="" style="text-decoration:none"> Como piensan las maquinas</a></h3>
								
							</div>
							<p>	
								Escasos son los ajedrecistas que no portan sus computadoras
								con módulo de ajedrez instalado en las mismas durante los torneos o durante las
								sesiones de entrenamiento en casa. Atrás quedó la época en la que para analizar
								una posición compleja, varios Grandes Maestros necesitaban horas e incluso días
								para sacarle todo el jugo, y en numerosas ocasiones, sin acierto. Este problema hoy en día es resuelto en
								cuestión de segundos por una “máquina” que nos dice la mejor jugada en
								cualquier posición a un nivel más elevado que el del campeón del Mundo Magnus
								Carlsen.
							</p>
						</div>
						<div class="clearfix"></div>
						<br><br>
						<div>
							<div class="col-md-6">
								<img src="noticias/maquina.jpg" alt="maquina">							
							</div>
							<div class="col-md-6">
								<h3> <a href="" style="text-decoration:none"> Como piensan las maquinas</a></h3>
								
							</div>
							<p>	
								Escasos son los ajedrecistas que no portan sus computadoras
								con módulo de ajedrez instalado en las mismas durante los torneos o durante las
								sesiones de entrenamiento en casa. Atrás quedó la época en la que para analizar
								una posición compleja, varios Grandes Maestros necesitaban horas e incluso días
								para sacarle todo el jugo, y en numerosas ocasiones, sin acierto. Este problema hoy en día es resuelto en
								cuestión de segundos por una “máquina” que nos dice la mejor jugada en
								cualquier posición a un nivel más elevado que el del campeón del Mundo Magnus
								Carlsen.
							</p>
						</div>
					</div>
				</div>		
			</div>
		</div>
		<br><br>
		<div class="col-xs-12 col-lg-12">

		    <div class="page-header">
		        <h2 class="ofer" style="text-align: center">Noticias variadas</h2>
		    </div>
		        
		    <div class="carousel slide carro" id="myCarousel">
		        <div class="carousel-inner">
		        	<!-- /Slide1 --> 
		            <div class="item active">
		                <ul class="thumbnails">
		                	<li class="col-sm-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/maquina.jpg" alt="wok"></a>
									</div>
									<div class="caption">
										<h4>¿Cómo entrenar ajedrez? Entrenamiento Integral 2.0</h4>
										<p>Este wok tiene la base que quieras y todos los ingredientes</p>
										<a class="btn btn-mini" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                    <li class="col-md-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/maquina.jpg" alt="wok"></a>
									</div>
									<div class="caption">
										<h4>Como piensa una maquina</h4>
										<p>Vamos a aprender el comportamiento de las maquinas a la hora de valorar una posicion</p>
										<a class="btn btn-mini" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                    <li class="col-md-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/maquina.jpg" alt="wok"></a>
									</div>
									<div class="caption">
										<h4>Que es el ajedrez para ti</h4>
										<p>Ajedrez, ¿qué es el ajedrez? Cada uno tenemos nuestra propia respuesta.</p>
										<a class="btn btn-mini" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                </ul>
		            </div>
		            <!-- /Slide2 --> 
		            <div class="item">
		                <ul class="thumbnails">
		                	<li class="col-sm-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/maquina.jpg" alt="wok"></a>
									</div>
									<div class="caption">
										<h4>¿Cómo entrenar ajedrez? Entrenamiento Integral 2.0</h4>
										<p>Este wok tiene la base que quieras y todos los ingredientes</p>
										<a class="btn btn-mini" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                    <li class="col-sm-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/maquina.jpg" alt="wok"></a>
									</div>
									<div class="caption">
										<h4>Los patrones: La memoria al servicio del proceso</h4>
										<p>En este artículo comenzamos la explicación sobre los patrones señalando los más útiles: Los patrones procedimentales. </p>
										<a class="btn btn-mini" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                    <li class="col-sm-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/maquina.jpg" alt="wok"></a>
									</div>
									<div class="caption">
										<h4>¿Cómo entrenar ajedrez? Entrenamiento Integral 2.0</h4>
										<p>Este wok tiene la base que quieras y todos los ingredientes</p>
										<a class="btn btn-mini" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                </ul>
		           </div>
		        </div>       
			   <!-- Controles -->   
			   <nav>
					<ul class="control-box pager">
						<li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
						<li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
					</ul>
				</nav>                    
		    </div>
		</div> 		
	</div>

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


</body>
</html>