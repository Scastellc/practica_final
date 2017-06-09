<!DOCTYPE html>
  <html lang="es">
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
		
		if (isset($_POST['finalizar'])) {
			modificar();
		}else{
			perfil();
		}

		function perfil(){

	?>

	<div class="container">
		<div class="row formu"> 		
			<div class='col-sm-10 col-sm-offset-1'>
		        <div class='well well-lg'>
		        	<h1 class="text-center">Modificar datos</h1><br>
					<h3 class="text-center" style="text-decoration: underline">Datos de la cuenta</h3>
		            <form action="" method="POST" enctype="multipart/form-data">
		                <div class='row'>
		                    <div class='col-sm-10 col-sm-offset-1' id="formulario">
		                        <div class='form-group'>
		                            <label>Nick: <span style="color:#3B5998"><?php echo $_SESSION['cliente'] -> getlogin(); ?></span>
		                            </label>
		                        </div>
								
								<label>Fichero: </label>
            					<input type="file" name="archivo"><span>Max 500000 bytes <strong>(500KB)</strong></span><br>
            					<?php 

            						// Si no hay foto muestra la foto estandar
            						if ($_SESSION['cliente'] -> getavatar() == "ico.jpg") {
												
										echo "<img src='usuarios/cliente.png' alt='usuario' style='width: 75px;' ><br><br>";
												
										// Si hay foto mostrara la suya propia
									}else{
										
										echo "<img src=' usuarios/" . $_SESSION['cliente'] -> getavatar() ."' alt='usuario' style='width: 75px;'><br><br>";						
									}
            					?>
			                  	<div class='form-group'>
		                            <label>Nombre:</label>
		                           <input type='text' name="nombre" title="Nombre." class='form-control' pattern="^([A-Z][a-z]{2,})(\s+[A-Z][a-z]*)?$" value="<?php echo $_SESSION['cliente'] -> getnombre(); ?>"/>
		                        </div>
		                  		<div class='form-group'>
		                            <label>Apellido:</label>
		                           <input type='text' name="apellido" title="Apellido." class='form-control' pattern="^([A-Z][a-z]{2,})(\s+[A-Z][a-z]*)?$" value="<?php echo $_SESSION['cliente'] -> getapellido(); ?>"/>
		                        </div>
		                        <div class='form-group'>
		                            <label>Correo Eletronico:</label>
		                           <input type='text' name="email" title="Email." class='form-control' pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$" value="<?php echo $_SESSION['cliente'] -> getemail(); ?>"/>
		                        </div>
								
		                		<h3 class="text-center" style="text-decoration: underline">Cambiar Contraseña</h3>    
		                        <div class='form-group'>
		                            <label>Antigua Contraseña:</label>
		                            <input type='password' name="passA" title="Password." id="passA" class='form-control' placeholder="¿Cambiar contraseña?" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" onblur="passwdA(id);"/>
		                        <div class='form-group'>
		                            <label>Nueva Contraseña:</label>
		                            <input type='password' name="passN" id="passN" title="Password." class='form-control' placeholder="¿Nueva contraseña?" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"/>
		                        </div>
		                        	<div class='form-group'>
		                            <label>Repite Nueva Contraseña:</label>
		                            <input type='password' name="passRN" id="passRN" title="Password." class='form-control' placeholder="Repite la nueva contraseña" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" />
		                        </div>

		                        <div class='text-center'>
		                            <input type='submit' class='btn btn-primary' name="finalizar" value='Modificar'/>
		                        </div>
		                    </div>
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
	<!-- 					jQuery library 							-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- 				Latest compiled JavaScript 					-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
