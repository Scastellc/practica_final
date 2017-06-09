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

	<!-- 	body		-->

		<!-- 					Formulario						-->
	<?php 
			
		if (isset($_POST['enviar'])) {
		
			formu();
		}else{
			
			formulario();
		}
		
		function formulario(){
		
	?>
	
	<div class="container">
		<div class="row formu"> 		
			<div class='col-sm-10 col-sm-offset-1'>
		        <div class='well well-lg'>
					<h2>¡Registrate!</h2>
					<form action="" method="POST">
						<div class='row'>
						 	<div class='col-sm-10 col-sm-offset-1'>
	                        	<div class='form-group'>
									<label>Login: <span>*</span></label><br>
									<div class="input-group">
                        				<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        				<input type="text" name="login" class='form-control' pattern="^([a-z]+[0-9]{0,2}){5,12}$" title="Minimo 5 letras, y dos num opcional" required><br>
                        			</div>
								</div>
								<div class='form-group'>
									<label>Password:<span>*</span></label><br>
									<div class="input-group">
                        				<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<input type="password" name="password1" class='form-control' id="pass1" title="Entre 8 y 16 digitos, minimo una mayuscula y un numero" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required><br>
									</div>
								</div>
								<div class='form-group'>
									<label>Repite password:<span>*</span></label><br>
									<div class="input-group">
                        				<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        				<input type="password" name="password2" class='form-control' title="Entre 8 y 16 digitos, minimo una mayuscula y un numero" id="pass2" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required onblur="pass()"><br>
                        			</div>
								</div>
								<div class='form-group'>
									<label>Nombre:<span>*</span></label><br>
									<div class="input-group">
                        				<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        				<input type="text" name="nombre" class='form-control' title="Empezar por mayuscula, sin espacios" pattern="^([A-Z][a-z]{2,})(\s+[A-Z][a-z]*)?$" required><br>
                        			</div>
								</div>
								<div class='form-group'>
									<label>Apellido:<span>*</span></label><br>
									<div class="input-group">
                        				<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        				<input type="text" name="apellido" class='form-control' title="Empezar por mayuscula, sin espacios" pattern="^([A-Z][a-z]{2,})(\s+[A-Z][a-z]*)?$" required><br>
                        			</div>
								</div>
								<div class='form-group'>
									<label>Email:<span>*</span></label><br>
									<div class="input-group">
                        				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        				<input type="text" name="email" class='form-control' title="Tiene que contener @" pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$" required><br>
                        			</div>
								</div>
								<div class='text-center'>
									<span>Todos los * son obligatorios</span><br>
									<input type="checkbox" name="acep" id="check" onchange="mandar(this)"><label>Acepto los <span style="color:blue">Terminos y condiciones</span> de esta pagina web</label><br>
							   
	                            	<input type='submit' class='btn btn-primary' title="Se activara cuando este el formulario completado y aceptado las condicones." name="enviar" id="enviar" value='Enviar' disabled="true"/>
	                            	<input type='reset' class='btn btn-danger' value='Cancelar' />		
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
	<script type="text/javascript">

		function pass() {
			
			var pass1 = document.getElementById('pass1');
			var pass2 = document.getElementById('pass2');

			var pass1_1 = pass1.value;
			var pass2_1 = pass2.value;

			// Comparamos el pass1 con el pass2
			if (pass1_1 != pass2_1){
				alert("Las contraseñas han de ser iguales");
				pass1.value = "";
				pass2.value = "";	
			}
		}

		function mandar(checkbox) {
	                 
	        if(checkbox.checked){
	            enviar.disabled = false;
	        }
	    }

	</script>

	<!--Bootstrap-->
	<!-- 					jQuery library 							-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- 				Latest compiled JavaScript 					-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>

