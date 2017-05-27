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
 
 		$("#44").html('<li title="d4" id="d4"><img src="piezas/Btorre.png"/></li>');
 		$("#46").html('<li title="d4" id="d4"><img src="piezas/Balfil.png"/></li>');
 		$("#45").html('<li title="d4" id="d4"><img src="piezas/Bcaballo.png"/></li>');
 		$("#65").html('<li title="d4" id="d4"><img src="piezas/Bdama.png"/></li>');
 		$("#25").html('<li title="d4" id="d4"><img src="piezas/Brey.png"/></li>');


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
	
		var img = $event.currentTarget.currentSrc;
		var pieza = img.substr(77,1);

		switch(pieza){				
			case "B":
				movePeonB($event, x, y, xIni, yIni);		
				break;			
			default:
				movePeonN($event, x, y, xIni, yIni);
		}
	}	

	function movePeonB($event, x, y, xIni, yIni){
		var pIniXY = $(event.currentTarget.parentNode.parentNode).attr("id");

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

	function movePeonN($event, x, y, xIni, yIni){
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);
			// Si el peon esta en segunda fila
		if (yIni == 7) {						
			var p2 =   xIni + "" +(parseInt(yIni) - 2);
			$("#"+p2).addClass("opt");		
		}
		var p1 = xIni + "" +  (parseInt(yIni) - 1);
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
		
		//console.log("x: " + x + " y: " + y);
		console.log("La pieza es Rey y esta en: x= " + xIni + " y= " + yIni);

		// Recuperamos la imagen
		var img = $event.currentTarget.currentSrc;

		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var optRey = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		// Arriba-Abajo
		var p1 = parseX + "" + (parseY + 1);
		var p2 = parseX + "" + (parseY - 1);
		
		// Derecha-Izquierda
		var p3 = (parseX + 1) + "" + parseY;
		var p4 = (parseX + 1) + "" + (parseY + 1);
		var p5 = (parseX + 1) + "" + (parseY - 1);
		var p6 = (parseX - 1) + "" + parseY;
		var p7 = (parseX - 1) + "" + (parseY + 1);
		var p8 = (parseX - 1) + "" + (parseY - 1);

		optRey.push(p1);
		optRey.push(p2);
		optRey.push(p3);
		optRey.push(p4);
		optRey.push(p5);
		optRey.push(p6);
		optRey.push(p7);
		optRey.push(p8);

		for (var i = 0; i < optRey.length; i++) {
			$("#"+optRey[i]).addClass("opt");

			var hayPiezas = $("#"+optRey[i].firstChild);
			console.log(hayPiezas);

			//if ($("#"+optRey[i])) {}
			$("#"+optRey[i]).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
// El problema es que falta el li para que funcione correctamente						
				$($event.currentTarget).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				for (var i = 0; i < optRey.length; i++) {
// Si pulsas el caballo y luego un peon, y quieres hacer un movimiento de caballo te deja hacerlo
					$("#"+optRey[i]).unbind("click");
				}
			})	
		}

	}
	function moveDama($event, x, y, xIni, yIni){		
		
		//console.log("x: " + x + " y: " + y);
		console.log("La pieza es Dama y esta en: x= " + xIni + " y= " + yIni);

		var img = $event.currentTarget.currentSrc;

		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var optDama = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		for (var x = 1; x < 8; x++) {
			// Como el Alfil, en diagonal 
			// Arriba-Derecha
			var p1 = (parseX + x)+ "" +(parseY + x);
			var desc0Opt1 = p1 , substring = "0";

			if(desc0Opt1.indexOf(substring) == -1){
				var desc9Op1 = p1 , substring = "9";
				if (desc9Op1.indexOf(substring) == -1) {
					if (p1.length <= 2) {					
						optDama.push(p1);
					}
				}
			}
			
			// Arriba-Izquierda
			var p2 = (parseX - x)+ "" +(parseY + x);
			var desc0Op2 = p2 , substring = "0";

			if(desc0Op2.indexOf(substring) == -1){
				var desc9Op2 = p2 , substring = "9";
				if (desc9Op2.indexOf(substring) == -1) {
					var descarteNegativos = p2 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p2.length <= 2) {					
							optDama.push(p2);
						}	
					}
				}
			}

			// Abajo-Derecha
			var p3 = (parseX + x)+ "" +(parseY - x);
			var desc0Op3 = p3 , substring = "0";

			if(desc0Op3.indexOf(substring) == -1){
				var desc9Op3 = p3 , substring = "9";
				if (desc9Op3.indexOf(substring) == -1) {
					var descarteNegativos = p3 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p3.length <= 2) {					
							optDama.push(p3);					
						}
					}
				}
			}

			// Abajo-Izquierda
			var p4 = (parseX - x)+ "" +(parseY - x);
			var desc0Op4 = p4 , substring = "0";

			if(desc0Op4.indexOf(substring) == -1){
				var desc9Op4 = p4 , substring = "9";
				if (desc9Op4.indexOf(substring) == -1) {
					var descarteNegativos = p4 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p4.length <= 2) {					
							optDama.push(p4);							
						}
					}
				}
			}
			
			// Torre, filas y columnas
			// Derecha
			var p5 = (parseX + x)+ "" +(parseY);
			var desc0Opt1 = p5 , substring = "0";

			if(desc0Opt1.indexOf(substring) == -1){
				var desc9Op5 = p5 , substring = "9";
				if (desc9Op5.indexOf(substring) == -1) {
					if (p5.length <= 2) {					
						optDama.push(p5);
					}
				}
			}
			
			// Izquierda
			var p6 = (parseX - x)+ "" +(parseY);
			var desc0Op6 = p6 , substring = "0";

			if(desc0Op6.indexOf(substring) == -1){
				var desc9Op6 = p6 , substring = "9";
				if (desc9Op6.indexOf(substring) == -1) {
					var descarteNegativos = p6 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p6.length <= 2) {											
							optDama.push(p6);
						}
					}
				}
			}

			// Abajo
			var p7 = (parseX)+ "" +(parseY - x);
			var desc0Op7 = p7 , substring = "0";

			if(desc0Op7.indexOf(substring) == -1){
				var desc9Op7 = p7 , substring = "9";
				if (desc9Op7.indexOf(substring) == -1) {
					var descarteNegativos = p7 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p7.length <= 2) {					
							optDama.push(p7);						
						}
					}
				}
			}

			// Abajo-Izquierda
			var p8 = (parseX)+ "" +(parseY + x);
			var desc0Op8 = p8 , substring = "0";

			if(desc0Op8.indexOf(substring) == -1){
				var desc9Op8 = p8 , substring = "9";
				if (desc9Op8.indexOf(substring) == -1) {
					var descarteNegativos = p8 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p8.length <= 2) {					
							optDama.push(p8);
						}
					}
				}
			}

		}
		for (var i = 0; i < optDama.length; i++) {
			$("#"+optDama[i]).addClass("opt");
			$("#"+optDama[i]).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
// El problema es que falta el li para que funcione correctamente						
				$($event.currentTarget).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				for (var x = 0; x < optDama.length; x++) {
// Si pulsas el caballo y luego un peon, y quieres hacer un movimiento de caballo te deja hacerlo
					$("#"+optDama[x]).unbind("click");
				}
			})
		}	
		console.log(optDama);

	}
	function moveAlfil($event, x, y, xIni, yIni){		
		
		//console.log("x: " + x + " y: " + y);
		console.log("La pieza es Alfil y esta en: x= " + xIni + " y= " + yIni);

		var img = $event.currentTarget.currentSrc;

		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var optAlfil = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		for (var x = 1; x < 8; x++) {
			
			// Arriba-Derecha
			var p1 = (parseX + x)+ "" +(parseY + x);
			var desc0Opt1 = p1 , substring = "0";

			if(desc0Opt1.indexOf(substring) == -1){
				var desc9Op1 = p1 , substring = "9";
				if (desc9Op1.indexOf(substring) == -1) {
					if (p1.length <= 2) {					
						optAlfil.push(p1);
					}
				}
			}
			
			// Arriba-Izquierda
			var p2 = (parseX - x)+ "" +(parseY + x);
			var desc0Op2 = p2 , substring = "0";

			if(desc0Op2.indexOf(substring) == -1){
				var desc9Op2 = p2 , substring = "9";
				if (desc9Op2.indexOf(substring) == -1) {
					var descarteNegativos = p2 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p2.length <= 2) {					
							optAlfil.push(p2);
						}
					}
				}
			}

			// Abajo-Derecha
			var p3 = (parseX + x)+ "" +(parseY - x);
			var desc0Op3 = p3 , substring = "0";

			if(desc0Op3.indexOf(substring) == -1){
				var desc9Op3 = p3 , substring = "9";
				if (desc9Op3.indexOf(substring) == -1) {
					var descarteNegativos = p3 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p3.length <= 2) {					
							optAlfil.push(p3);
						}
					}
				}
			}

			// Abajo-Izquierda
			var p4 = (parseX - x)+ "" +(parseY - x);
			var desc0Op4 = p4 , substring = "0";

			if(desc0Op4.indexOf(substring) == -1){
				var desc9Op4 = p4 , substring = "9";
				if (desc9Op4.indexOf(substring) == -1) {
					var descarteNegativos = p4 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						if (p4.length <= 2) {					
							optAlfil.push(p4);
						}
					}
				}
			}

		}
		for (var i = 0; i < optAlfil.length; i++) {
			$("#"+optAlfil[i]).addClass("opt");
			$("#"+optAlfil[i]).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
// El problema es que falta el li para que funcione correctamente						
				$($event.currentTarget).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				for (var x = 0; x < optAlfil.length; x++) {
// Si pulsas el caballo y luego un peon, y quieres hacer un movimiento de caballo te deja hacerlo
					$("#"+optAlfil[x]).unbind("click");
				}
			})
		}	
		console.log(optAlfil);

	}
	function moveCaballo($event, x, y, xIni, yIni){		
		
		//console.log("x: " + x + " y: " + y);
		console.log("La pieza es Caballo y esta en: x= " + xIni + " y= " + yIni);

		// Recuperamos la imagen
		var img = $event.currentTarget.currentSrc;

		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var optCaballo = []; 

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

		optCaballo.push(p1);
		optCaballo.push(p2);
		optCaballo.push(p3);
		optCaballo.push(p4);
		optCaballo.push(p5);
		optCaballo.push(p6);
		optCaballo.push(p7);
		optCaballo.push(p8);

		console.log(optCaballo);

		for (var i = 0; i < optCaballo.length; i++) {	
			var descarte0 = optCaballo[i] , substring = "0";
			if(descarte0.indexOf(substring) == -1){
				var descarteNegativos = optCaballo[i] , substring = "-";
				if(descarteNegativos.indexOf(substring) == -1){
					console.log(optCaballo[i]);
					$("#"+optCaballo[i]).addClass("opt");
					$("#"+optCaballo[i]).click(function($event){			
						piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
// El problema es que falta el li para que funcione correctamente						
						$($event.currentTarget).append(piezaSelec[0]);
						marcarPieza(eventPieza);
						for (var x = 0; x < optCaballo.length; x++) {
// Si pulsas el caballo y luego un peon, y quieres hacer un movimiento de caballo te deja hacerlo
							$("#"+optCaballo[x]).unbind("click");
						}
					})
				}
			}
		}
	}

	function moveTorre($event, x, y, xIni, yIni){
		
		//console.log("x: " + x + " y: " + y);
		console.log("La pieza es Torre y esta en: x= " + xIni + " y= " + yIni);

		// Recuperamos la imagen
		var img = $event.currentTarget.currentSrc;

		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var optTorre = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		for (var x = 1; x < 8; x++) {
			
			// Derecha
			var p1 = (parseX + x)+ "" +(parseY);
			var desc0Opt1 = p1 , substring = "0";

			if(desc0Opt1.indexOf(substring) == -1){
				var desc9Op1 = p1 , substring = "9";
				if (desc9Op1.indexOf(substring) == -1) {
					if (p1.length <= 2) {					
						optTorre.push(p1);
					}
				}
			}
			
			// Izquierda
			var p2 = (parseX - x)+ "" +(parseY);
			var desc0Op2 = p2 , substring = "0";

			if(desc0Op2.indexOf(substring) == -1){
				var desc9Op2 = p2 , substring = "9";
				if (desc9Op2.indexOf(substring) == -1) {
					var descarteNegativos = p2 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						optTorre.push(p2);
					}
				}
			}

			// Abajo
			var p3 = (parseX)+ "" +(parseY - x);
			var desc0Op3 = p3 , substring = "0";

			if(desc0Op3.indexOf(substring) == -1){
				var desc9Op3 = p3 , substring = "9";
				if (desc9Op3.indexOf(substring) == -1) {
					var descarteNegativos = p3 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						optTorre.push(p3);
					}
				}
			}

			// Abajo-Izquierda
			var p4 = (parseX)+ "" +(parseY + x);
			var desc0Op4 = p4 , substring = "0";

			if(desc0Op4.indexOf(substring) == -1){
				var desc9Op4 = p4 , substring = "9";
				if (desc9Op4.indexOf(substring) == -1) {
					var descarteNegativos = p4 , substring = "-";
					if(descarteNegativos.indexOf(substring) == -1){
						optTorre.push(p4);
					}
				}
			}

		}
		for (var i = 0; i < optTorre.length; i++) {
			$("#"+optTorre[i]).addClass("opt");
			$("#"+optTorre[i]).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
// El problema es que falta el li para que funcione correctamente						
				$($event.currentTarget).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				for (var x = 0; x < optTorre.length; x++) {
// Si pulsas el caballo y luego un peon, y quieres hacer un movimiento de caballo te deja hacerlo
					$("#"+optTorre[x]).unbind("click");
				}
			})
		}	
		console.log(optTorre);


	}
