<?php 
	
	// Funcion para conectar a la base de datos
	function conexion(){
		// Conexion a la bd
		/*
			Para la base de datos de hostinger
			La contraseña es la de siempre : alu...
			$bd = new mysqli("mysql.hostinger.es", "u214754205_salva", "", "u214754205_chess");
		*/
		$bd = new mysqli("localhost", "root", "", "ajedrez");

		// Establecemos el conjunto de caracteres uft8
		$bd -> set_charset("utf8");
		
		// En caso de que la conexion no funcione. 
		if (!$bd) {
			echo "Error al conectarse con la BD";
			exit();
		}
		return $bd;
	}

	// Funcion para mandar la query a la base de datos
	function sentencia($conex, $sent){
		// Hacemos la consulta
		$result = $conex -> query($sent);

		if (!$result) {
			echo "Error en al ejecutar la consulta";
		}

		return $result;
	}

	// Funcion para cerrar la conexion
	function closeBd($bd){
		$bd -> close();
	}

?>