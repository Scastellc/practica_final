
// Funcion para crear el tablero
function tablero(){

	// Creamos un array para la anotacion de cada casilla
	var letras = ["a", "b", "c", "d", "e", "f", "g", "h"];

	$(document).ready(function(){
		// Hacemos dos for para crear el tablero de 8 x 8
		for(var a = 8; a >= 1; a--){
			for (var i = 1; i <= 8; i++){
				if(a%2==0){
					if(a%2==0){
						$("#casillas").html("<div class='blanco' id='c" + letras[i] + a + "'><span class='trash' id='" + letras[i] + a + "'></span></div>");
					}else{
						$("#casillas").html("<div class='negro' id='c" + letras[i] + a + "'><span class='trash' id='" + letras[i] + a + "'></span></div>");
					}
				}else{
					if(i%2==0){
						$("#casillas").html("<div class='negro' id='c" + letras[i] + a + "'><span class='trash' id='" + letras[i] + a + "'></span></div>");
					}else{
						$("#casillas").html("<div class='blanco' id='c" + letras[i] + a + "'><span class='trash' id='" + letras[i] + a + "'></span></div>");
					}
				}
			}
		}
	});
}

// Funcion para colocar las piezas en el tablero
function piezas(){

	$(document).ready(function(){

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
 
	});

}
// Funcion para mover la pieza
function mover(){
	$(function(){
		
		// Creamos dos variables, una todo lo que esta dentro de las casillas, y otra que es la que puede soltar objetos
	    var casilla = $( "#casillas" ), $move = $( ".trash" );
	    
	    // Variable para saber si es posible la jugada
	    var posible = false;

	    $( "li", casilla ).draggable({
 			helper: "clone",
	        cursor: "move",
	    });

	      // Donde se va a soltar
	    $move.droppable({
		   	hoverClass: "dejarPieza",
        	drop: function( event, ui ){				

				// Recuperamos el id de donde se soltara la pieza
	        	
	        	pieza(ui.draggable, id);
				
				var id = $(this).attr("id");

				//Cogemos el id de lo movido	
				var idProviene = ui.draggable.attr("id");
				
				// Modificar id original para que se ponga el nuevo idProviene
				ui.draggable.attr("id", id);
				
				//alert(idProviene + " " + id);
				//if (posible == true) {
					ui.draggable.append().appendTo( "#" + id ).show(); //colocamos la pieza
			//	}

	        }
   		}); 		   
	});
}

// Funcion para reconocer que pieza es
function pieza(ui, posible){

	var img = ui[0].innerHTML;
	var pieza = img.substr(17,1);
	var pIni = $(ui).attr("id");
	//alert(pIni);
	//console.log(ui);
	switch(pieza){
		case "r":
			moveRey(ui, pIni);
			break;
		case "d":
			moveDama(ui, pIni);
			
			break;
		case "a":
			moveAlfil(ui, pIni);
			
			break;
		case "c":
			moveCaballo(ui, pIni);
			
			break;	
		case "t":
			moveTorre(ui, pIni);
			
			break;					
		default:
			movePeon(ui, pIni, posible);
			console.log(movePeon);
			
	}
}

	// Funciones para saber donde pueden mover las piezas
	function moveRey(ui, pIni){
		console.log(ui);
		alert("R" + pIni);
	}
	function moveDama(ui, pIni){
		console.log(ui);
		alert("D" + pIni);
	}
	function moveAlfil(ui, pIni){
		console.log(ui);
		alert("A" + pIni);
	}
	function moveCaballo(ui, pIni){
		console.log(ui);
		alert("C" + pIni);
	}
	function moveTorre(ui, pIni){
		console.log(ui);
		alert("T" + pIni);
	}
	function movePeon(ui, pIni, posible){
		//console.log(ui);
		//alert("Peon " + pIni);

		if (pIni.substr(1,1) == 2) {
			alert("esta en segunda");
			console.log(pIni.substr(1,1));
			
			// Esta deberia ser la variable que se pase por parametro
			posible = true;
			return (true);

		}
		/*else if (pIni.substr(1,1) == 7) {
			alert("esta en septima");
			console.log(pIni.substr(1,1));

		}else{
			alert("ya no esta en segunda");
		}
		*/
		return posible;

	}
