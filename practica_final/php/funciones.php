<?php 

	include_once('ClassUser.php');
	include_once('conexionBd.php');	
	session_start();

	// Todas las funciones de php
	function crearTablero(){
		// Creamos un array para la anotacion de cada casilla
		$letras = array(1 => "a", 2 => "b", 3 => "c", 4 => "d", 5 => "e", 6 => "f", 7 => "g", 8 => "h");

		// Hacemos dos for para crear el tablero de 8 x 8
		for($a = 8; $a>=1; $a--){
			for($i = 1; $i<=8; $i++){
				if($a%2==0){
					// Le agregamos la casilla con su identificador y la clase trash para arrastrar y soltar
					if($i%2==0)
					{
						echo '<div class="negro" id="c'.$letras[$i].$a.'"><span class="trash" id="'.$letras[$i].$a.'"></span></div>';
					}else{
						echo '<div class="blanco" id="c'.$letras[$i].$a.'"><span class="trash" id="'.$letras[$i].$a.'"></span></div>';
					}
				}
				else{					
					if($i%2==0){
						echo '<div class="blanco" id="c'.$letras[$i].$a.'"><span class="trash" id="'.$letras[$i].$a.'"></span></div>';
					}else{
						echo '<div class="negro" id="c'.$letras[$i].$a.'"><span class="trash" id="'.$letras[$i].$a.'"></span></div>';
					}
				}
			}
		}
	}

	/*										Con esta funcion compruebo si hay usuario registrado											*/
	function usuario(){		
		
		// Le indico que si la session no esta iniciada que la inicie vacia
		if (empty($_SESSION['cliente'])) {	
			$_SESSION['cliente'] = new user();
			$_SESSION['cliente'] -> setnombre("");	
		}

		// Si esta vacia mostrara el invitado
		if ($_SESSION['cliente'] -> getnombre() == "") {
			
			?>
				
				<a href='formulario.php'><button type='button' class='btn glyphicon glyphicon-user btns'><span> Registrate</span></button></a>
				<a href="login.php"><button type='button' class= 'btn glyphicon glyphicon-log-in btns'><span> Entrar</span></button></a>

			<?php 

			// Y si no, el usuario y el login lo mostraremos			
		}else{
			// Si no hay foto mostrara una por defecto
			if ($_SESSION['cliente'] -> getavatar() == "ico.jpg") {
					
				?>

				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php  echo " Bienvenido " . $_SESSION['cliente'] -> getnombre() . " ( " . $_SESSION['cliente'] -> getlogin() .  " ) ";?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
			                <li><a href="modificarCuenta.php"><i class="icon-cog"></i> Modificar perfil</a></li>
			                <li><a href="modificarCuenta.php"><i class="icon-envelope"></i> <?php echo "<img src='usuarios/cliente.png' alt='cliente' style='width: 25px;' >"; ?></a></li>
			                <li class="divider"></li>
			                <li><a href="#"><i class="icon-cog"></i> <?php  echo " Elo: " . $_SESSION['cliente'] -> getelo(); ?></a></li>
			                <li class="divider"></li>
			                <li><a href="php/quitar.php"><i class="icon-off"></i> Logout</a></li>
			            </ul>
					</li>
				</ul>
			    <?php 

				// Si hay foto mostrara la suya propia
			}else{
				
				?>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php  echo " Bienvenido " . $_SESSION['cliente'] -> getnombre() . " ( " . $_SESSION['cliente'] -> getlogin() .  " ) ";?><b class="caret"></b></a>
						<ul class="dropdown-menu">
		                    <li><a href="modificarCuenta.php"><i class="icon-cog"></i> Modificar perfil</a></li>
		                    <li><a href="modificarCuenta.php"><i class="icon-envelope"></i> <?php echo "<img src='usuarios/" . $_SESSION['cliente'] -> getavatar() ."' alt='cliente' style='width: 25px;' >"; ?></a></li>
		               		<li class="divider"></li>
			                <li><a href="#"><i class="icon-cog"></i> <?php  echo " Elo: " . $_SESSION['cliente'] -> getelo(); ?></a></li>
			                <li class="divider"></li>
		                    <li><a href="php/quitar.php"><i class="icon-off"></i> Logout</a></li>
		                </ul>
					</li>
				</ul>

				<?php	     							
			}
		}	
	}

	/*										Con esta funcion inserto un usuario a la bd												*/

	function formu(){

		// Recuperamos los valores
		$nombre = trim($_POST['nombre']);
		$apellido = $_POST['apellido'];
		$login = $_POST['login'];
		$pass1 = $_POST['password1'];
		$email = trim($_POST['email']);

		// Pasamos la contraseña a md5
		$passEn = md5($pass1);

		// Conexion a la bd
		$bd = conexion();

		// Consulta
		$consu = "SELECT login FROM Usuario WHERE login = '" . $login . "'";

		// Hacemos la consulta
		$result = sentencia($bd, $consu);	
		
		// Contamos el numero de filas que devuelve
		$total = $result -> num_rows;

		// Si el numero es mayor a 0, ya existira ese login, por lo que no sera volcado a la bd
		if ($total > 0) {
			echo "<script type='text/javascript'>alert('El login ya existe');</script>";
			formulario();
			// Si el login no existe se hara el insert
		}else{
			$insertar = "INSERT INTO Usuario(nombre, apellido, login, pass, email, avatar) VALUES ('$nombre', '$apellido', '$login', '$passEn','$email', 'ico.jpg')"; 
			sentencia($bd, $insertar);
			
			echo "<script type='text/javascript'>alert('Gracias por registrarte ". $nombre."');</script>";
			closeBd($bd);
			echo "<script type='text/javascript'>window.location.assign('login.php')</script>";
		}	
	}

	/*								Con esta funcion compruebo que el login se realize correctamente										*/

	function login(){

		$bd = conexion();
		
		// Recuperamos los valores
		$usu = $_POST['usuario'];
		$pass = $_POST['passw'];

		// Pasamos la contraseña a md5
		$passEn = md5($pass);

		// Consultas
		$consUsu = "SELECT * FROM Usuario WHERE login = '" . $usu . "'";
		$consPass = "SELECT * FROM Usuario WHERE pass = '" . $passEn . "'";

		// Hacemos las consultas
		$resultUsu = sentencia($bd, $consUsu);		
		$resultPass = sentencia($bd, $consPass);

		// Contamos el numero de filas que devuelve cada consulta
		$totalUsu = $resultUsu -> num_rows;
		$totalPass = $resultPass -> num_rows;
		
		// Si el numero es mayor a 0, ya existira ese nick, por lo que no sera volcado a la bd
		if ($totalUsu > 0) {

			// Creamos un objeto
			$usu = new user();

			// Recorremos el resultado
			while ($fila = $resultUsu -> fetch_row()) {

				// Le damos valor al objeto
				$usu -> setnombre($fila[0]);
				$usu -> setapellido($fila[1]);
				$usu -> setlogin($fila[2]);
				$usu -> setpass($fila[3]);
				$usu -> setemail($fila[4]);
				$usu -> setavatar($fila[5]);
				$usu -> setelo($fila[6]);
			}

			// Si el nick esta bien, comprobaremos el password
			if ($totalPass > 0) {

				// Creamos un objeto
				$usu2 = new user();
				
				// Recorremos el resultado
				while ($fila1 = $resultPass -> fetch_row()) {

					// Le damos valor al objeto
					$usu2 -> setlogin($fila1[2]);
					$usu2 -> setpass($fila1[3]);

				}

				// Creo la hora
				$hora = new Datetime();
				
				// Comparo el valor de login y pass entre los dos objetos, ya que deberia de ser el mismo
				if ($usu -> getlogin() == $usu2 -> getlogin() && $usu -> getpass() == $usu2 -> getpass()) {

							// Guardo el objeto en una session
							$_SESSION['cliente'] = $usu;

							$_SESSION['hora'] = $hora -> format ("Y-m-d H:i:s");

							// Cierro la conexion con la base de datos 
							closeBd($bd);

							// Mando a otra pagina
							header("Location: index.php");


					// Si el usuario y la contraseña no coinciden
				}else{
					echo "<script type='text/javascript'>alert('Usuario y contraseña no coinciden')</script>";					
					form();
				}
			}else{

				echo "<script type='text/javascript'>alert('Contraseña incorrecta')</script>";
				form();

			}
		}else{

			echo "<script type='text/javascript'>alert('Usuario incorrecta')</script>";
			form();
		}	
	}


	/*								Con esta funcion compruebo que se pueda modificar la session correctamenten										*/

	function modificar(){
		// Recuperamos los valores
			$_SESSION['cliente'] -> setnombre($_POST['nombre']);
			$_SESSION['cliente'] -> setapellido($_POST['apellido']);
			$_SESSION['cliente'] -> setemail($_POST['email']);
			
			$_SESSION['passA'] = md5($_POST['passA']);
			$_SESSION['passN'] = md5($_POST['passN']);
			$_SESSION['passRN'] = md5($_POST['passRN']);

			// Si no esta vacio el campo de file			
			if (!empty($_FILES['archivo']['tmp_name'])) {
					
				// Para controlar el tamaño del archivo subido
				if ($_FILES['archivo']['size'] < 500000) {

					// Solo puedo subir jpeg 
					if ($_FILES['archivo']['type'] == "image/jpeg" || $_FILES['archivo']['type'] == "image/png" || $_FILES['archivo']['type'] == "image/gif") {
							// Para el fichero
						if (is_uploaded_file ($_FILES['archivo']['tmp_name'])){
							$nombreDirectorio = "usuarios/";
							$nombreFichero = $_FILES['archivo']['name'];
							$nombreCompleto = $nombreDirectorio.$nombreFichero;
							
							if (is_dir($nombreDirectorio)) {
								$idUnico = time();
								$nombreFichero = $idUnico."-".$nombreFichero;
								$nombreCompleto = $nombreDirectorio.$nombreFichero;
								move_uploaded_file ($_FILES['archivo']['tmp_name'],$nombreCompleto);
								
								// Guardamos en la session
								$_SESSION['cliente'] -> setavatar($nombreFichero);
								
								
							}
						}else{
							echo "<script type='text/javascript'>alert('No se pudo cambiar la foto de perfil')</script>";
						}
					}else{
						echo "<script type='text/javascript'>alert('No se pudo cambiar la foto, ha de ser jpeg, png o gif ')</script>";
					}
				}else{
					echo "<script type='text/javascript'>alert('Tamaño de imagen demasiado grande')</script>";
				}
			}

			// Llamo a la funcion que manda los datos a la base
			mandaBD();
			
			echo "<script type='text/javascript'>alert('Has modificado la session')</script>";
 			
 			//Para redirigir a la web de inicio y actualizar la variable session
			echo "<script type='text/javascript'>window.location.assign('index.php')</script>";
	}

	/*										Subimos a la base de datos											*/

	function mandaBD(){
		$bd = conexion();

		//							Mandar Contraseña 								

		if ($_SESSION['passA'] == $_SESSION['cliente'] -> getpass()) {
			$_SESSION['cliente'] -> setpass($_SESSION['passN']);

			if ($_SESSION['passN'] == $_SESSION['passRN']) {
				$consu = "UPDATE Usuario SET pass = '".$_SESSION['cliente'] -> getpass()."' WHERE login = '".$_SESSION['cliente']-> getlogin()."'";
				sentencia($bd, $consu);
			}	
		}

		//							Mandar Imagen 									
		if ($_SESSION['cliente']-> getavatar() != null) {
			
			$consuAva = "UPDATE Usuario SET avatar = '".$_SESSION['cliente']-> getavatar()."' WHERE login = '".$_SESSION['cliente']-> getlogin()."'";
			sentencia($bd, $consuAva);
		}

		//							Mandar Resto 								
		$consuNom = "UPDATE Usuario SET email = '".$_SESSION['cliente']-> getemail()."', nombre = '".$_SESSION['cliente']-> getnombre()."', apellido = '".$_SESSION['cliente']-> getapellido()."' WHERE login = '".$_SESSION['cliente']-> getlogin()."'";
		
		sentencia($bd, $consuNom);

		closeBd($bd);

	}

	/*								Con esta funcion detecto a que hora se conecto										*/

	function hora(){
		// Recuperamos la session session de hora y la ponemos vacia sino existe 								
		if (empty($_SESSION['hora'])) {
			$_SESSION['hora'] = "";
					
		}
			// Si existe mostramos la fecha
		if (!$_SESSION['hora'] == "") {
			echo "<p>Ultima session: " . $_SESSION['hora'];
		}
	}

?>