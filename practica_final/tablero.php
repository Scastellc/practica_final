<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Ajedrez</title>
		
	
	
	<!-- 				Latest compiled and minified CSS 			-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

	<!--	 					Estilos								-->
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<link href="css/styloBasic.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/estiloTablero.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<!-- 					Jquery						 			-->
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
		<script src="js/jquery.ui.touch-punch.js"></script>

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
								<a href="tablero.php">Jugar</a>
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
								echo "Usuario registrado y eso...";
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
	        			        			
			        	<?php 
			        		echo "Como funciona y eso...";
						?>
	        		
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
						<h1>Tablero</h1>
						<ul id="casillas">

						<?php 
							// Creamos un array para la anotacion de cada casilla
							$letras = array(1 => "a", 2 => "b", 3 => "c", 4 => "d", 5 => "e", 6 => "f", 7 => "g", 8 => "h");

							// Hacemos dos for para crear el tablero de 8 x 8
							for($a = 8; $a>=1; $a--){
								for($i = 1; $i<=8; $i++){
									if($a%2==0){
										// Le agregamos la casilla con su identificador y la clase trash para arrastrar y soltar
										if($i%2==0)
										{
											echo '<div class="blanco" id="c'.$letras[$i].$a.'"><span class="trash" id="'.$letras[$i].$a.'"></span></div>';
										}else{
											echo '<div class="negro" id="c'.$letras[$i].$a.'"><span class="trash" id="'.$letras[$i].$a.'"></span></div>';
										}
									}
									else{					
										if($i%2==0){
											echo '<div class="negro" id="c'.$letras[$i].$a.'"><span class="trash" id="'.$letras[$i].$a.'"></span></div>';
										}else{
											echo '<div class="blanco" id="c'.$letras[$i].$a.'"><span class="trash" id="'.$letras[$i].$a.'"></span></div>';
										}
									}
								}
							}
						?>
						</ul><hr/>
					</div>
				</div>		
			</div>
		</div>		
	</div>
	
    <script>
    
		// Piezas blancas

		$("#a1").html('<li title="a1" id="a1"><img src="piezas/torreB.png"/></li>');
		$("#b1").html('<li title="b1" id="b1"><img src="piezas/caballoB.png"/></li>');
		$("#c1").html('<li title="c1" id="c1"><img src="piezas/alfilB.png"/></li>');
		$("#d1").html('<li title="d1" id="d1"><img src="piezas/damaB.png"/></li>');
		$("#e1").html('<li title="e1" id="e1"><img src="piezas/reyB.png"/></li>');
	    $("#f1").html('<li title="f1" id="f1"><img src="piezas/alfilB.png"/></li>');
		$("#g1").html('<li title="g1" id="g1"><img src="piezas/caballoB.png"/></li>');
		$("#h1").html('<li title="h1" id="h1"><img src="piezas/torreB.png"/></li>');

			// Peones blancos

		$("#a2").html('<li title="a2" id="a2"><img src="piezas/peonesB.png"/></li>');
		$("#b2").html('<li title="b2" id="b2"><img src="piezas/peonesB.png"/></li>');
		$("#c2").html('<li title="c2" id="c2"><img src="piezas/peonesB.png"/></li>');
		$("#d2").html('<li title="d2" id="d2"><img src="piezas/peonesB.png"/></li>');
		$("#e2").html('<li title="e2" id="e2"><img src="piezas/peonesB.png"/></li>');
	    $("#f2").html('<li title="f2" id="f2"><img src="piezas/peonesB.png"/></li>');
		$("#g2").html('<li title="g2" id="g2"><img src="piezas/peonesB.png"/></li>');
		$("#h2").html('<li title="h2" id="h2"><img src="piezas/peonesB.png"/></li>');

		// Piezas Negras

		$("#a8").html('<li title="a8" id="a8"><img src="piezas/torreN.png"/></li>');
		$("#b8").html('<li title="b8" id="b8"><img src="piezas/caballoN.png"/></li>');
		$("#c8").html('<li title="c8" id="c8"><img src="piezas/alfilN.png"/></li>');
		$("#d8").html('<li title="d8" id="d8"><img src="piezas/damaN.png"/></li>');
		$("#e8").html('<li title="e8" id="e8"><img src="piezas/reyN.png"/></li>');
	    $("#f8").html('<li title="f8" id="f8"><img src="piezas/alfilN.png"/></li>');
		$("#g8").html('<li title="g8" id="g8"><img src="piezas/caballoN.png"/></li>');
		$("#h8").html('<li title="h8" id="h8"><img src="piezas/torreN.png"/></li>');

			// Peones negros

		$("#a7").html('<li title="a7" id="a7"><img src="piezas/peonN.png"/></li>');
		$("#b7").html('<li title="b7" id="b7"><img src="piezas/peonN.png"/></li>');
		$("#c7").html('<li title="c7" id="c7"><img src="piezas/peonN.png"/></li>');
		$("#d7").html('<li title="d7" id="d7"><img src="piezas/peonN.png"/></li>');
		$("#e7").html('<li title="e7" id="e7"><img src="piezas/peonN.png"/></li>');
	    $("#f7").html('<li title="f7" id="f7"><img src="piezas/peonN.png"/></li>');
		$("#g7").html('<li title="g7" id="g7"><img src="piezas/peonN.png"/></li>');
		$("#h7").html('<li title="h7" id="h7"><img src="piezas/peonN.png"/></li>');
		
	    $(function(){
			// Creamos dos variables, una todo lo que esta dentro de las casillas, y otra que es la que puede soltar objetos
	      var $casillas = $( "#casillas" ),
	          $move = $( ".trash" );

	      $( "li", $casillas ).draggable({
	        helper: "clone",
	        cursor: "move",
	      });

	      // Donde se va a soltar
	      $move.droppable({
			   	hoverClass: "dejarPieza",
	        	drop: function(event, ui ){
				
				var id = $(this).attr("id");//recuperamos el id de donde se soltara la pieza
				var idprovene = ui.draggable.attr("id");//cogemos el titilo de lo movido	
				alert(idprovene + " ->va a:-> " + id);		
				
				var nuevoid = $(this).prop("id", id);
				var nuevoT = $(this).attr("title", id);
				alert(nuevoid.parentNode + " " + nuevoT.parentNode);
				ui.draggable.append().appendTo( "#"+id ).show();//colocamos la pieza
	        }
	      }); 		   
	    });


    </script>

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
	      						echo "Hola";
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