<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
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
		
		if (isset($_POST['enviar'])) {

			login();
			
		}else{

			form();
		}

		function form(){
	 ?>
		<div class="container">
			<div class="row formu"> 		
				<div class='col-sm-10 col-sm-offset-1'>
			        <div class='well well-lg'>
			        	<h2>Iniciar session!</h2>
						<span>Por favor, introduzca su login de usuario y su contraseña para validar el acceso a la web</span><br><br>
			            <form action="" method="POST">
			                <div class='row'>
			                    <div class='col-sm-10 col-sm-offset-1' id="formulario">
			                        <div class='form-group'>
										<label>Nick: </label><br>
										<div class="input-group">
	                        				<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
	                        				<input type="text" name="usuario" class='form-control'  title="Minimo 5 letras, y dos num opcional" required><br>
	                        			</div>
									</div>								
									<div class='form-group'>
										<label>Password:</label><br>
										<div class="input-group">
	                        				<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="password" name="passw" class='form-control' id="pass1" title="Entre 8 y 16 digitos, minimo una mayuscula y un numero" required><br>
											<!--
												para usu 				pattern="^([a-z]+[0-9]{0,2}){5,12}$"
												para pass 				pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"

											-->
										</div>
									</div>
			                                                         
			                        <div class='text-center'>
			                            <input type='submit' class='btn btn-primary' name="enviar" value='Enviar'/>
			                            <input type='reset' class='btn btn-danger' value='Cancelar' name="cancelar"/>
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