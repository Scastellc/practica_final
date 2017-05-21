<?php 

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









?>