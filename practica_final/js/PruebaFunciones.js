$(document).ready(function(){
		
		tablero();
		piezas();
		//jugada(casillas);
		//mover();

		$("li img").click(function($event){		
			
			//$("li img").bind("click", function($e){
				//console.log($e);
				var liPieza = $event.currentTarget.parentNode;

				marcarPieza($event);
				var string = $event.currentTarget.parentNode.parentNode.className , substring = "dejarPieza";

				if(string.indexOf(substring) !== -1){
					pieza($event, liPieza);
				}
				
		//	});
		})
	});





// Funcion para crear el tablero
function tablero(){

	// Creamos un array para la anotacion de cada casilla
	//var letras = ["","a", "b", "c", "d", "e", "f", "g", "h"];

		// Hacemos dos for para crear el tablero de 8 x 8
		for(var y = 8; y >= 1; y--){
			for (var x = 1; x <= 8; x++){
				var color = "";
				if(y%2==0){
					if(x%2==0){
						color = "negro";
					}else{
						color = "blanco";
					}
				}else{
					if(x%2==0){
						color = "blanco";	
					}else{
						color = "negro";
					}
				}
				$("#casillas").append("<div class='" + color + "' id='" + x+""+y + "'>");
				// <span class='trash' id='" + letras[i] + a + "'></span></div>
			}
		}
}

// Funcion para colocar las piezas en el tablero
function piezas(){

  		// Piezas blancas
  		$("#11").html('<li title="a1" id="a1"><img src="piezas/Btorre.png"/></li>');
 		$("#21").html('<li title="b1" id="b1"><img src="piezas/Bcaballo.png"/></li>');
 		$("#31").html('<li title="c1" id="c1"><img src="piezas/Balfil.png"/></li>');
 		$("#41").html('<li title="d1" id="d1"><img src="piezas/Bdama.png"/></li>');
 		$("#51").html('<li title="e1" id="e1"><img src="piezas/Brey.png"/></li>');
 	    $("#61").html('<li title="f1" id="f1"><img src="piezas/Balfil.png"/></li>');
 		$("#71").html('<li title="g1" id="g1"><img src="piezas/Bcaballo.png"/></li>');
 		$("#81").html('<li title="h1" id="h1"><img src="piezas/Btorre.png"/></li>');
 
 			// Peones blancos
 
 		$("#12").html('<li title="a2" id="a2"><img src="piezas/Bpeones.png"/></li>');
 		$("#22").html('<li title="b2" id="b2"><img src="piezas/Bpeones.png"/></li>');
 		$("#32").html('<li title="c2" id="c2"><img src="piezas/Bpeones.png"/></li>');
 		$("#42").html('<li title="d2" id="d2"><img src="piezas/Bpeones.png"/></li>');
 		$("#52").html('<li title="e2" id="e2"><img src="piezas/Bpeones.png"/></li>');
 	    $("#62").html('<li title="f2" id="f2"><img src="piezas/Bpeones.png"/></li>');
 		$("#72").html('<li title="g2" id="g2"><img src="piezas/Bpeones.png"/></li>');
 		$("#82").html('<li title="h2" id="h2"><img src="piezas/Bpeones.png"/></li>');
 
 		// Piezas Negras
 
 		$("#18").html('<li title="a8" id="a8"><img src="piezas/Ntorre.png"/></li>');
 		$("#28").html('<li title="b8" id="b8"><img src="piezas/Ncaballo.png"/></li>');
 		$("#38").html('<li title="c8" id="c8"><img src="piezas/Nalfil.png"/></li>');
 		$("#48").html('<li title="d8" id="d8"><img src="piezas/Ndama.png"/></li>');
 		$("#58").html('<li title="e8" id="e8"><img src="piezas/Nrey.png"/></li>');
 	    $("#68").html('<li title="f8" id="f8"><img src="piezas/Nalfil.png"/></li>');
 		$("#78").html('<li title="g8" id="g8"><img src="piezas/Ncaballo.png"/></li>');
 		$("#88").html('<li title="h8" id="h8"><img src="piezas/Ntorre.png"/></li>');
 
 			// Peones negros
 
 		$("#17").html('<li title="a7" id="a7"><img src="piezas/Npeon.png"/></li>');
 		$("#27").html('<li title="b7" id="b7"><img src="piezas/Npeon.png"/></li>');
 		$("#37").html('<li title="c7" id="c7"><img src="piezas/Npeon.png"/></li>');
 		$("#47").html('<li title="d7" id="d7"><img src="piezas/Npeon.png"/></li>');
 		$("#57").html('<li title="e7" id="e7"><img src="piezas/Npeon.png"/></li>');
    	$("#67").html('<li title="f7" id="f7"><img src="piezas/Npeon.png"/></li>');
 		$("#77").html('<li title="g7" id="g7"><img src="piezas/Npeon.png"/></li>');
 		$("#87").html('<li title="h7" id="h7"><img src="piezas/Npeon.png"/></li>');
 
}
// Esta funcion marca o desmarca la pieza que has seleccionado
function marcarPieza($event){
	
	var divPieza = $event.currentTarget.parentNode.parentNode;

	// Si no esta pulsado se cambiara de color, si ya lo estaba volvera al color anterior
	if ($(divPieza).hasClass("dejarPieza") == true) {
		$(divPieza).removeClass("dejarPieza");
	}else{
		$("#casillas div").removeClass("dejarPieza");
		$(divPieza).addClass("dejarPieza");
	}
	$("#casillas div").removeClass("opt");
	

	
}

function pieza($event, liPieza){

	// Recupero el nombre de la pieza
	var img = $event.currentTarget.currentSrc;
	//var pieza = img.substr(49,1);
	var pieza = img.substr(78,1);

	// Cogo el id de donde esta la pieza (sin x,y) sino con la notacion normal de ajedrez
	var pIni = $(liPieza).attr("id");

	// Cogo el id de donde esta la pieza pero esta vez si x,y
	var pIniXY = $(event.currentTarget.parentNode.parentNode).attr("id");
	var xIni = pIniXY.substr(0,1);
	var yIni = pIniXY.substr(1,1);

	// Recupero todas las casillas
	var divPosibles = $(event.currentTarget.parentNode.parentNode).siblings();
	
	// Creo dos arrays para la posicion x-y
	
	var x = [];
	var y = [];
/*
	// Recupero el id de x-y 
	for (var i = 0; i < divPosibles.length; i++) {
		var list = [];
		list.push(divPosibles[i]);
		x.push($(list[0]).attr("id").substr(0,1));
		y.push($(list[0]).attr("id").substr(1,1));
	}
*/	console.log(img);
	console.log(pieza);

	//console.log(" x: " + x + " y: " + y);
	switch(pieza){
		case "r":
			moveRey($event, x, y, xIni, yIni);
			break;
		case "d":
			moveDama($event, x, y, xIni, yIni);
			break;		
		case "a":
			moveAlfil($event, x, y, xIni, yIni);
			break;			
		case "c":
			moveCaballo($event, x, y, xIni, yIni);
			break;				
		case "t":
			moveTorre($event, x, y, xIni, yIni);		
			break;			
		default:
			movePeon($event, x, y, xIni, yIni);
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

/*		switch(){
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
*/		
	
	function movePeon($event, x, y, xIni, yIni){		
		
		console.log("x: " + x + " y: " + y);
		console.log("La pieza es Peon y esta en: x= " + xIni + " y= " + yIni);
		
		var img = $event.currentTarget.currentSrc;

		var pIniXY = $(event.currentTarget.parentNode.parentNode).attr("id");
		console.log(pIniXY);

		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);
			// Si el peon esta en segunda fila
		if (yIni == 2) {						
			var p2 =   xIni + "" +(parseInt(yIni) + 2);
			$("#"+p2).addClass("opt");		
		}
			var p1 = xIni + "" +  (parseInt(yIni) + 1);
			$("#"+p1).addClass("opt");
			$("#"+p1).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				$("#"+p1).unbind("click");
				$("#"+p2).unbind("click");
			})
			$("#"+p2).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				$("#"+p1).unbind("click");
				$("#"+p2).unbind("click");
			})


	}

	function moveRey($event, x, y, xIni, yIni){		
		
		console.log("x: " + x + " y: " + y);
		console.log("La pieza es Rey y esta en: x= " + xIni + " y= " + yIni);
	}
	function moveDama($event, x, y, xIni, yIni){		
		
		console.log("x: " + x + " y: " + y);
		console.log("La pieza es Dama y esta en: x= " + xIni + " y= " + yIni);
	}
	function moveAlfil($event, x, y, xIni, yIni){		
		
		console.log("x: " + x + " y: " + y);
		console.log("La pieza es Alfil y esta en: x= " + xIni + " y= " + yIni);
	}
	function moveCaballo($event, x, y, xIni, yIni){		
		
		console.log("x: " + x + " y: " + y);
		console.log("La pieza es Caballo y esta en: x= " + xIni + " y= " + yIni);

		// Recuperamos la imagen
		var img = $event.currentTarget.currentSrc;

		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var opt = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		// Arriba-Abajo
		var p1 = (parseX - 1)+ "" +(parseY + 2);
		var p2 = (parseX + 1)+ "" +(parseY + 2);
		var p3 = (parseX - 1)+ "" +(parseY - 2);
		var p4 = (parseX + 1)+ "" +(parseY - 2);

		// Derecha-Izquierda
		var p5 = (parseX + 2)+ "" +(parseY + 1);
		var p6 = (parseX + 2)+ "" +(parseY - 1);
		var p7 = (parseX - 2)+ "" +(parseY + 1); 
		var p8 = (parseX - 2)+ "" +(parseY - 1);
		
		opt.push(p1);
		opt.push(p2);
		opt.push(p3);
		opt.push(p4);
		opt.push(p5);
		opt.push(p6);
		opt.push(p7);
		opt.push(p8);

		for (var i = 0; i < opt.length; i++) {	
			
			var descarte0 = opt[i] , substring = "0";
			if(descarte0.indexOf(substring) == -1){
				var descarteNegativos = opt[i] , substring = "-";
				if(descarteNegativos.indexOf(substring) == -1){
					console.log(opt[i]);
					$("#"+opt[i]).addClass("opt");
					$("#"+opt[i]).click(function($event){			
						piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
// El problema es que falta el li para que funcione correctamente						
						$($event.currentTarget).append(piezaSelec[0]);
						marcarPieza(eventPieza);
						for (var i = 0; i < opt.length; i++) {
// Si pulsas el caballo y luego un peon, y quieres hacer un movimiento de caballo te deja hacerlo
							$("#"+opt[i]).unbind("click");
						}
					})
				}
			}
			
			//console.log( i + ": " + opt[i]);
			if (opt[i] != 0) {}
		}
			//console.log(opt.length);

	}
	function moveTorre($event, x, y, xIni, yIni){		
		
		console.log("x: " + x + " y: " + y);
		console.log("La pieza es Torre y esta en: x= " + xIni + " y= " + yIni);
	}