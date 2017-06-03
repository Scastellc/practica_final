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
							<li class="active">
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
	
	<?php 
		// Le indico que si la session no esta iniciada que la inicie vacia
		if (empty($_SESSION['cliente'])) {	
			$_SESSION['cliente'] = new user();
			$_SESSION['cliente'] -> setnombre("");	
		}

		// Si esta vacia mostrara el invitado
		if ($_SESSION['cliente'] -> getnombre() == "") {	
			header("Location: login.php");
		}
	?>
	<div class="modal fade" id="mostrarmodal" role="dialog">
	   <div class="modal-dialog">
	      <div class="modal-content">
	         <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <h3>Buscando rival</h3>
	     </div>
	         <div class="modal-body">
	            <h4>Estamos buscando un rival...</h4>
	     </div>
	        <div class="modal-footer">
	        <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
	     </div>
	      </div>
	   </div>
	</div>

	<div id="juego" class="container"> 
		<div class="row">
	   		<div class="col-lg-8">
				<div class="col-md-12">
					<div class="tablero">
						<h1>Tablero</h1>
						<h4>Jugador 1: </h4>
						<ul id="casillas"></ul>
						<h4>Jugador 2: </h4>
					</div>
				</div>		
			</div>
			<div class="col-lg-4">
				<div class="col-md-10 col-md-offset-2">
					<div>
						<h1>Anotacion</h1>
						<table>				  	
						  	<thead>						  		
						    	<th>Jugador 1:</th>
						    	<th>Jugador 2:</th>
						  	</thead>
						  	<tbody id="planilla">
						  		<tr>
						  			<td>Blancas</td>
						  			<td>Negras</td>
						  		</tr>
						  	</tbody>
						</table>
					</div>
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

	<!-- 				Latest compiled JavaScript 					-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
