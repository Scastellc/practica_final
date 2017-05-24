$(document).ready(function(){
		
		tablero();
		piezas();
		//jugada(casillas);
		//mover();

		$("li img").click(function($event){		
			piezaMarcada($event);
			//pieza($event);
		})
	});





// Funcion para crear el tablero
function tablero(){

	// Creamos un array para la anotacion de cada casilla
	//var letras = ["","a", "b", "c", "d", "e", "f", "g", "h"];

		// Hacemos dos for para crear el tablero de 8 x 8
		for(var a = 8; a >= 1; a--){
			for (var i = 1; i <= 8; i++){
				var color = "";
				if(a%2==0){
					if(i%2==0){
						color = "negro";
					}else{
						color = "blanco";
					}
				}else{
					if(i%2==0){
						color = "blanco";	
					}else{
						color = "negro";
					}
				}
				$("#casillas").append("<div class='" + color + "' id='" + i+""+a + "'>");
				// <span class='trash' id='" + letras[i] + a + "'></span></div>
			}
		}
}

// Funcion para colocar las piezas en el tablero
function piezas(){

  		// Piezas blancas
  		$("#11").html('<li title="a1" id="a1"><img class="torre" src="piezas/torreB.png"/></li>');
 		$("#21").html('<li title="b1" id="b1"><img src="piezas/caballoB.png"/></li>');
 		$("#31").html('<li title="c1" id="c1"><img src="piezas/alfilB.png"/></li>');
 		$("#41").html('<li title="d1" id="d1"><img src="piezas/damaB.png"/></li>');
 		$("#51").html('<li title="e1" id="e1"><img src="piezas/reyB.png"/></li>');
 	    $("#61").html('<li title="f1" id="f1"><img src="piezas/alfilB.png"/></li>');
 		$("#71").html('<li title="g1" id="g1"><img src="piezas/caballoB.png"/></li>');
 		$("#81").html('<li title="h1" id="h1"><img src="piezas/torreB.png"/></li>');
 
 			// Peones blancos
 
 		$("#12").html('<li title="a2" id="a2"><img src="piezas/peonesB.png"/></li>');
 		$("#22").html('<li title="b2" id="b2"><img src="piezas/peonesB.png"/></li>');
 		$("#32").html('<li title="c2" id="c2"><img src="piezas/peonesB.png"/></li>');
 		$("#42").html('<li title="d2" id="d2"><img src="piezas/peonesB.png"/></li>');
 		$("#52").html('<li title="e2" id="e2"><img src="piezas/peonesB.png"/></li>');
 	    $("#62").html('<li title="f2" id="f2"><img src="piezas/peonesB.png"/></li>');
 		$("#72").html('<li title="g2" id="g2"><img src="piezas/peonesB.png"/></li>');
 		$("#82").html('<li title="h2" id="h2"><img src="piezas/peonesB.png"/></li>');
 
 		// Piezas Negras
 
 		$("#18").html('<li title="a8" id="a8"><img src="piezas/torreN.png"/></li>');
 		$("#28").html('<li title="b8" id="b8"><img src="piezas/caballoN.png"/></li>');
 		$("#38").html('<li title="c8" id="c8"><img src="piezas/alfilN.png"/></li>');
 		$("#48").html('<li title="d8" id="d8"><img src="piezas/damaN.png"/></li>');
 		$("#58").html('<li title="e8" id="e8"><img src="piezas/reyN.png"/></li>');
 	    $("#68").html('<li title="f8" id="f8"><img src="piezas/alfilN.png"/></li>');
 		$("#78").html('<li title="g8" id="g8"><img src="piezas/caballoN.png"/></li>');
 		$("#88").html('<li title="h8" id="h8"><img src="piezas/torreN.png"/></li>');
 
 			// Peones negros
 
 		$("#17").html('<li title="a7" id="a7"><img src="piezas/peonN.png"/></li>');
 		$("#27").html('<li title="b7" id="b7"><img src="piezas/peonN.png"/></li>');
 		$("#37").html('<li title="c7" id="c7"><img src="piezas/peonN.png"/></li>');
 		$("#47").html('<li title="d7" id="d7"><img src="piezas/peonN.png"/></li>');
 		$("#57").html('<li title="e7" id="e7"><img src="piezas/peonN.png"/></li>');
    	$("#67").html('<li title="f7" id="f7"><img src="piezas/peonN.png"/></li>');
 		$("#77").html('<li title="g7" id="g7"><img src="piezas/peonN.png"/></li>');
 		$("#87").html('<li title="h7" id="h7"><img src="piezas/peonN.png"/></li>');
 
}
// Esta funcion marca o desmarca la pieza que has seleccionado
function piezaMarcada($event){
	
	var liPieza = $event.currentTarget.parentNode;
	var divPieza = liPieza.parentNode;

	// Si no esta pulsado se cambiara de color, si ya lo estaba volvera al color anterior
	
	if ($(divPieza).hasClass("dejarPieza") == true) {
		$(divPieza).removeClass("dejarPieza");	
	}else{
		$("#casillas div").removeClass("dejarPieza")
		$(divPieza).addClass("dejarPieza");
	}

	pieza($event, liPieza);
}

function pieza($event, liPieza){
	var img = $event.currentTarget.currentSrc;
	var pieza = img.substr(49,1);

	var pIni = $(liPieza).attr("id");
	//console.log(pIni);
	
	switch(pieza){
		case "r":
			moveRey($event);
			break;
		case "d":
			moveDama($event);
			
			break;
		case "a":
			moveAlfil($event);
			
			break;
		case "c":
			moveCaballo($event);
			
			break;	
		case "t":
			moveTorre($event);		
			break;					
		default:
			movePeon($event);
	}
		
}
/*
// Funcion para mover la pieza
function mover(){
	$(function(){
		// Creamos dos variables, una todo lo que esta dentro de las casillas, y otra que es la que puede soltar objetos
	    var casilla = $( "#casillas" ), $move = $( ".trash" );
	    $( "li", casilla ).draggable({
 			helper: "clone",
	        cursor: "move",
	    });
	      // Donde se va a soltar
	    $move.droppable({
		   	hoverClass: "dejarPieza",
        	drop: function( event, ui ){				
	        	
	        	pieza(ui.draggable);
				
				// Recuperamos el id de donde se soltara la pieza
				var id = $(this).attr("id");
				//Cogemos el id de lo movido	
				var idProviene = ui.draggable.attr("id");
				
				// Modificar id original para que se ponga el nuevo idProviene
				ui.draggable.attr("id", id);
				
				alert(idProviene + " " + id);
				ui.draggable.append().appendTo( "#" + id ).show(); //colocamos la pieza
	        }
   		}); 		   
	});
}
// Funcion para reconocer que pieza es
function pieza(ui){
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
			movePeon(ui, pIni);
			
	}
}
	*/
	
	function movePeon($event){		
		
		var pIni = $(event.currentTarget.parentNode.parentNode).attr("id");
		var columna = pIni.substr(0,1);
		var fila = pIni.substr(1,1);
		console.log(columna);
		console.log(fila);
		var divPosibles = $(event.currentTarget.parentNode.parentNode).siblings();
		
		var col = "";
		for (var i = 0; i < divPosibles.length; i++) {
			console.log($(divPosibles[i]));
			/*
			if ($(hermanos[i]).attr("id") == "18") {
				alert("ASdfasd");
				col = hermanos[i].substr(0,1);
				console.log(col);
			}
*/
		}
			

		/*
		var casilla = columna + "3";
		var uniCasilla = $("#casilla").attr("id");
		console.log(uniCasilla);
		
		if (casilla == "d3") {
			
			$(divPosibles).addClass("posibles");
		}
		*/
	}
/*
	function peon(x){
		switch(){
			case "first":
				return [[1,2],[1,3]];
				break;
			case "normal":
				return [[1,1]]
				break;
			case "matar":
				return [[-2,2],[2,2]]
				break;
		}
	}
*/
