var _quienToca = "blancas";
var _colorPieza="";

$(document).ready(function(){
 	
 	//console.log($("#mostrarmodal"));
 	//$("#mostrarmodal").modal("show");
		tablero();
		piezas();

		$("li img").click(function($event){				
			var liPieza = $event.currentTarget.parentNode;

			marcarPieza($event);
			var string = $event.currentTarget.parentNode.parentNode.className , substring = "dejarPieza";

			if(string.indexOf(substring) !== -1){
				pieza($event, liPieza);
			}
		})
	});

// Funcion para crear el tablero
function tablero(){

	// Creamos un array para la anotacion de cada casilla
	var letras = ["","a", "b", "c", "d", "e", "f", "g", "h"];

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
				$("#casillas").append("<div data-pieza=\"\" data-color=\"\" class='" + color + "' id='" + x+""+y + "'><li title='"+letras[x]+""+y+"' id='"+x+""+y+"'></li>");
			}
		}
}

// Funcion para colocar las piezas en el tablero
function piezas(){
		
		// Casillas
		var letras = ["","a", "b", "c", "d", "e", "f", "g", "h"];

		// Imagenes de piezas blancas y negras
		var blancas = ["Bpeones.png","Btorre.png","Bcaballo.png","Balfil.png","Bdama.png","Brey.png","Balfil.png","Bcaballo.png","Btorre.png"];
		var negras = ["Npeon.png","Ntorre.png","Ncaballo.png","Nalfil.png","Ndama.png","Nrey.png","Nalfil.png","Ncaballo.png","Ntorre.png"];

		for (var i = 1; i < 9; i++) {
			$("#"+i+"1").html('<li title="'+letras[i]+1+'" id="'+letras[i]+1+'"><img src="piezas/'+$(blancas[i]).selector+'"/></li>');
			//$("#"+letras[i]+"1").html('<img src="piezas/'+$(blancas[i]).selector+'"/>');
			$("#"+i+"2").html('<li title="'+letras[i]+2+'" id="'+letras[i]+2+'"><img src="piezas/'+$(blancas[0]).selector+'"/></li>');

			$("#"+i+"1").attr("data-pieza",blancas[i]);
  			$("#"+i+"1").attr("data-color","Blancas");
  			$("#"+i+"2").attr("data-pieza",blancas[0]);
  			$("#"+i+"2").attr("data-color","Blancas");
		}

		for (var i = 9; i > 0; i--) {
			$("#"+i+"8").html('<li title="'+letras[i]+8+'" id="'+letras[i]+8+'"><img src="piezas/'+$(negras[i]).selector+'"/></li>');
			//$("#"+letras[i]+"1").html('<img src="piezas/'+$(blancas[i]).selector+'"/>');
			$("#"+i+"7").html('<li title="'+letras[i]+7+'" id="'+letras[i]+7+'"><img src="piezas/'+$(negras[0]).selector+'"/></li>');

			$("#"+i+"8").attr("data-pieza",negras[i]);
  			$("#"+i+"8").attr("data-color","Negras");
  			$("#"+i+"7").attr("data-pieza",negras[0]);
  			$("#"+i+"7").attr("data-color","Negras");
		}

/*
  		// Piezas blancas
  		$("#11").html('<li title="a1" id="a1"><img src="piezas/Btorre.png"/></li>');
 		$("#21").html('<li title="b1" id="b1"><img src="piezas/Bcaballo.png"/></li>');
 		$("#31").html('<li title="c1" id="c1"><img src="piezas/Balfil.png"/></li>');
 		$("#41").html('<li title="d1" id="d1"><img src="piezas/Bdama.png"/></li>');
 		$("#51").html('<li title="e1" id="e1"><img src="piezas/Brey.png"/></li>');
 	    $("#61").html('<li title="f1" id="f1"><img src="piezas/Balfil.png"/></li>');
 		$("#71").html('<li title="g1" id="g1"><img src="piezas/Bcaballo.png"/></li>');
 		$("#81").html('<li title="h1" id="h1"><img src="piezas/Btorre.png"/></li>');
*/
 			// Peones blancos
 /*
 		$("#12").html('<li title="a2" id="a2"><img src="piezas/'+$(blancas[0]).selector+'"/></li>');
 		//$("#12").html('<li title="b2" id="b2"><img src="piezas/Bpeones.png"/></li>');
 		$("#22").html('<li title="b2" id="b2"><img src="piezas/Bpeones.png"/></li>');
 		$("#32").html('<li title="c2" id="c2"><img src="piezas/Bpeones.png"/></li>');
 		$("#42").html('<li title="d2" id="d2"><img src="piezas/Bpeones.png"/></li>');
 		$("#52").html('<li title="e2" id="e2"><img src="piezas/Bpeones.png"/></li>');
 	    $("#62").html('<li title="f2" id="f2"><img src="piezas/Bpeones.png"/></li>');
 		$("#72").html('<li title="g2" id="g2"><img src="piezas/Bpeones.png"/></li>');
 		$("#82").html('<li title="h2" id="h2"><img src="piezas/Bpeones.png"/></li>');
 */
 		// Piezas Negras
 /*
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
 */
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
	// Elimino todas las clase opt
	$("#casillas div").removeClass("opt");
}

// Con esta funcio se la pieza que marco y le mando a la funcion de la pieza que es para que se pueda mover
function pieza($event, liPieza){

	// Recupero el nombre de la pieza
	var img = $event.currentTarget.currentSrc;
	//var pieza = img.substr(78,1);
	var pieza = img.substr(28,1);
	console.log(img);
	console.log(pieza);
	//var pieza = img.substr(78,1);

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
*/
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
	// Esta funcion es para saber si es peon blanco o negro
	function movePeon($event, x, y, xIni, yIni){		
	
		var img = $event.currentTarget.currentSrc;
		var pieza = img.substr(27,1);
		//var pieza = img.substr(62,1);
		switch(pieza){				
			case "B":
				movePeonB($event, x, y, xIni, yIni);		
				break;			
			default:
				movePeonN($event, x, y, xIni, yIni);
		}
	}	

	// Indico como puede mover el peon blanco
	function movePeonB($event, x, y, xIni, yIni){
		var pIniXY = $(event.currentTarget.parentNode.parentNode).attr("id");

		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);
			// Si el peon esta en segunda fila
		if (yIni == 2) {						
			var p2 =   xIni + "" +(parseInt(yIni) + 2);
			$("#"+p2).addClass("opt");		
			var p1 = xIni + "" +  (parseInt(yIni) + 1);
			$("#"+p1).addClass("opt");
			$("#"+p1).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).html('<li></li>');
				// Colocamos el rey en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				var num = $(event.currentTarget).attr("id");
				anotacionB("",num);
				$("#"+p1).unbind("click");
				$("#"+p2).unbind("click");
			})
			$("#"+p2).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).html('<li></li>');
				// Colocamos el rey en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				var num = $(event.currentTarget).attr("id");
				anotacionB("",num);
				$("#"+p1).unbind("click");
				$("#"+p2).unbind("click");
			})
		}else{
			var p1 = xIni + "" +  (parseInt(yIni) + 1);
			$("#"+p1).addClass("opt");
			$("#"+p1).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).html('<li></li>');
				// Colocamos el rey en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				var num = $(event.currentTarget).attr("id");
				anotacionB("",num);
				$("#"+p1).unbind("click");
			})
		}
	}

	// Indico como puede mover el peon negro
	function movePeonN($event, x, y, xIni, yIni){
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);
			// Si el peon esta en segunda fila
		if (yIni == 7) {						
			var p2 =   xIni + "" +(parseInt(yIni) - 2);
			$("#"+p2).addClass("opt");		
			var p1 = xIni + "" +  (parseInt(yIni) - 1);
			$("#"+p1).addClass("opt");
			$("#"+p1).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).html('<li></li>');
				// Colocamos el rey en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				var num = $(event.currentTarget).attr("id");
				anotacionN("",num);
				$("#"+p1).unbind("click");
				$("#"+p2).unbind("click");
			})
			$("#"+p2).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).html('<li></li>');
				// Colocamos el rey en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				var num = $(event.currentTarget).attr("id");
				anotacionN("",num);
				$("#"+p1).unbind("click");
				$("#"+p2).unbind("click");
			})
		}else{
			var p1 = xIni + "" +  (parseInt(yIni) - 1);
			$("#"+p1).addClass("opt");
			$("#"+p1).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).html('<li></li>');
				// Colocamos el rey en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				var num = $(event.currentTarget).attr("id");
				anotacionN("",num);
				$("#"+p1).unbind("click");
			})
		}
	}

	// Funcion para poder mover el rey
	function moveRey($event, x, y, xIni, yIni){		

		// Recuperamos la imagen
		var img = $event.currentTarget.currentSrc;
		var color = img.substr(27,1);

		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		// Creamos un array vacio, para luego añadir las opciones que tiene el rey de mover
		var optRey = []; 

		// Parseamos a integer las coordenadas 
		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		// Jugamos con las coordenadas para indicarle a donde puede mover
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

		// Agregamos al arrya
		optRey.push(p1);
		optRey.push(p2);
		optRey.push(p3);
		optRey.push(p4);
		optRey.push(p5);
		optRey.push(p6);
		optRey.push(p7);
		optRey.push(p8);

		// Recorremos el array de donde puede mover
		for (var i = 0; i < optRey.length; i++) {
			// Le añadimos la clase para que cambie de color
			$("#"+optRey[i]).addClass("opt");

			// Creamos el evento click sobre la casilla donde puede ir el rey
			$("#"+optRey[i]).click(function($event){			
				// Eliminamos el rey de donde esta
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
// El problema es que falta el li para que funcione correctamente
				$($event.currentTarget).html('<li></li>');
				// Colocamos el rey en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				// Volvemos a llamar a la funcion para que desmarque todo
				var num = $(event.currentTarget).attr("id");

				if (color == "B") {
					$("#"+$event.currentTarget.id).attr("data-pieza","Brey.png");  				
					$("#"+$event.currentTarget.id).attr("data-color","Blancas");
					anotacionB("R",num);
				}else{
					$("#"+$event.currentTarget.id).attr("data-pieza","Nrey.png"); 
					$("#"+$event.currentTarget.id).attr("data-color","Negras");
					anotacionN("R",num);
				}
				marcarPieza(eventPieza);
				// Con este for eliminamos el evento
				for (var i = 0; i < optRey.length; i++) {
					$("#"+optRey[i]).unbind("click");
				}
			})	
		}

	}
	function moveDama($event, x, y, xIni, yIni){		
			
		var img = $event.currentTarget.currentSrc;
		var color = img.substr(27,1);

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
			comprobar(optDama, p1);
			
			// Arriba-Izquierda
			var p2 = (parseX - x)+ "" +(parseY + x);
			comprobar(optDama, p2);

			// Abajo-Derecha
			var p3 = (parseX + x)+ "" +(parseY - x);
			comprobar(optDama, p3);

			// Abajo-Izquierda
			var p4 = (parseX - x)+ "" +(parseY - x);
			comprobar(optDama, p4);
			
			// Torre, filas y columnas
			// Derecha
			var p5 = (parseX + x)+ "" +(parseY);
			comprobar(optDama, p5);
			
			// Izquierda
			var p6 = (parseX - x)+ "" +(parseY);
			comprobar(optDama, p6);

			// Abajo
			var p7 = (parseX)+ "" +(parseY - x);
			comprobar(optDama, p7);

			// Abajo-Izquierda
			var p8 = (parseX)+ "" +(parseY + x);
			comprobar(optDama, p8);

		}
		for (var i = 0; i < optDama.length; i++) {
			$("#"+optDama[i]).addClass("opt");
			$("#"+optDama[i]).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
					
				//$($event.currentTarget).html('<li></li>');
				// Colocamos la dama en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				var num = $(event.currentTarget).attr("id");

				if (color == "B") {
					$("#"+$event.currentTarget.id).attr("data-pieza","Bdama.png");  				
					$("#"+$event.currentTarget.id).attr("data-color","Blancas");
					anotacionB("D",num);
				}else{
					$("#"+$event.currentTarget.id).attr("data-pieza","Ndama.png"); 
					$("#"+$event.currentTarget.id).attr("data-color","Negras");
					anotacionN("D",num);
				}

				marcarPieza(eventPieza);
				for (var x = 0; x < optDama.length; x++) {
					/*$("#"+$event.currentTarget.id).attr("data-pieza","");  				
					$("#"+$event.currentTarget.id).attr("data-color","");
					*/
					$("#"+optDama[x]).unbind("click");
				}
			})
		}
	}

	function moveAlfil($event, x, y, xIni, yIni){		

		var img = $event.currentTarget.currentSrc;
		var color = img.substr(27,1);
		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var optAlfil = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		for (var x = 1; x < 8; x++) {
			
			// Arriba-Derecha
			var p1 = (parseX + x)+ "" +(parseY + x);
/*			var desc0Opt1 = p1 , substring = "0";

			if(desc0Opt1.indexOf(substring) == -1){
				var desc9Op1 = p1 , substring = "9";
				if (desc9Op1.indexOf(substring) == -1) {
					if (p1.length <= 2) {	
						//console.log($("#"+p1)[0].firstChild.firstChild);
						//if ($("#"+p1)[0].firstChild.firstChild) {
							optAlfil.push(p1);
						//}								
					}
				}
			}
*/
			comprobar(optAlfil, p1);

			// Arriba-Izquierda
			var p2 = (parseX - x)+ "" +(parseY + x);
			comprobar(optAlfil, p2);

			// Abajo-Derecha
			var p3 = (parseX + x)+ "" +(parseY - x);
			comprobar(optAlfil, p3);

			// Abajo-Izquierda
			var p4 = (parseX - x)+ "" +(parseY - x);
			comprobar(optAlfil, p4);
		}

		for (var i = 0; i < optAlfil.length; i++) {
			$("#"+optAlfil[i]).addClass("opt");
			$("#"+optAlfil[i]).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
				$($event.currentTarget).html('<li></li>');
				// Colocamos el alfil en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				var num = $(event.currentTarget).attr("id");

				if (color == "B") {
					$("#"+$event.currentTarget.id).attr("data-pieza","Balfil.png");  				
					$("#"+$event.currentTarget.id).attr("data-color","Blancas");
					anotacionB("A",num);
				}else{
					$("#"+$event.currentTarget.id).attr("data-pieza","Nalfil.png"); 
					$("#"+$event.currentTarget.id).attr("data-color","Negras");
					anotacionN("A",num);
				}

				marcarPieza(eventPieza);
				for (var x = 0; x < optAlfil.length; x++) {
					$("#"+optAlfil[x]).unbind("click");
				}
			})
		}
	}

	function moveCaballo($event, x, y, xIni, yIni){		

		// Recuperamos la imagen
		var img = $event.currentTarget.currentSrc;
		var color = img.substr(27,1);
		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var optCaballo = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		// Arriba-Abajo
		var p1 = (parseX - 1)+ "" +(parseY + 2);
//		comprobar(optCaballo, p1);
		var p2 = (parseX + 1)+ "" +(parseY + 2);
//		comprobar(optCaballo, p2);
		var p3 = (parseX - 1)+ "" +(parseY - 2);
//		comprobar(optCaballo, p3);
		var p4 = (parseX + 1)+ "" +(parseY - 2);
//		comprobar(optCaballo, p4);

		// Derecha-Izquierda
		var p5 = (parseX + 2)+ "" +(parseY + 1);
//		comprobar(optCaballo, p5);
		var p6 = (parseX + 2)+ "" +(parseY - 1);
//		comprobar(optCaballo, p6);
		var p7 = (parseX - 2)+ "" +(parseY + 1);
//		comprobar(optCaballo, p7); 
		var p8 = (parseX - 2)+ "" +(parseY - 1);
//		comprobar(optCaballo, p8);

		optCaballo.push(p1);
		optCaballo.push(p2);
		optCaballo.push(p3);
		optCaballo.push(p4);
		optCaballo.push(p5);
		optCaballo.push(p6);
		optCaballo.push(p7);
		optCaballo.push(p8);

		for (var i = 0; i < optCaballo.length; i++) {	
			var descarte0 = optCaballo[i] , substring = "0";
			if(descarte0.indexOf(substring) == -1){
				var descarteNegativos = optCaballo[i] , substring = "-";
				if(descarteNegativos.indexOf(substring) == -1){
					$("#"+optCaballo[i]).addClass("opt");
					$("#"+optCaballo[i]).click(function($event){			
						piezaSelec[0].parentNode.removeChild(piezaSelec[0]);
						$($event.currentTarget).html('<li></li>');
						// Colocamos la dama en su nueva casilla				
						$($event.currentTarget.firstChild).append(piezaSelec[0]);

						var num = $(event.currentTarget).attr("id");

						if (color == "B") {
							$("#"+$event.currentTarget.id).attr("data-pieza","Bcaballo.png");  				
							$("#"+$event.currentTarget.id).attr("data-color","Blancas");
							anotacionB("C",num);
						}else{
							$("#"+$event.currentTarget.id).attr("data-pieza","Ncaballo.png"); 
							$("#"+$event.currentTarget.id).attr("data-color","Negras");
							anotacionN("C",num);
						}

						marcarPieza(eventPieza);
						var num = $(event.currentTarget).attr("id");
						anotacion("C",num);
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

		// Recuperamos la imagen
		var img = $event.currentTarget.currentSrc;
		var color = img.substr(27,1);
		// Creamos un evento nuevo
		var eventPieza = $event;
		var piezaSelec = $($event.currentTarget);

		var optTorre = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		for (var x = 1; x < 8; x++) {
			
			// Derecha
			var p1 = (parseX + x)+ "" +(parseY);
			comprobar(optTorre, p1);
			
			// Izquierda
			var p2 = (parseX - x)+ "" +(parseY);
			comprobar(optTorre, p2);

			// Abajo
			var p3 = (parseX)+ "" +(parseY - x);
			comprobar(optTorre, p3);

			// Abajo-Izquierda
			var p4 = (parseX)+ "" +(parseY + x);
			comprobar(optTorre, p4);

		}

		for (var i = 0; i < optTorre.length; i++) {
			$("#"+optTorre[i]).addClass("opt");
			$("#"+optTorre[i]).click(function($event){			
				piezaSelec[0].parentNode.removeChild(piezaSelec[0]);						
				$($event.currentTarget).html('<li></li>');
				// Colocamos la dama en su nueva casilla				
				$($event.currentTarget.firstChild).append(piezaSelec[0]);
				marcarPieza(eventPieza);
				
				var num = $(event.currentTarget).attr("id");

				if (color == "B") {
					$("#"+$event.currentTarget.id).attr("data-pieza","Btorre.png");  				
					$("#"+$event.currentTarget.id).attr("data-color","Blancas");
					anotacionB("T",num);
				}else{
					$("#"+$event.currentTarget.id).attr("data-pieza","Ntorre.png"); 
					$("#"+$event.currentTarget.id).attr("data-color","Negras");
					anotacionN("T",num);
				}
				for (var x = 0; x < optTorre.length; x++) {
					$("#"+optTorre[x]).unbind("click");
				}
			})
		}
	}

	function anotacionB(pieza, num){
		var tabla = document.getElementById("planilla");
		var tr = document.createElement("TR");
		tabla.appendChild(tr);
		var td = document.createElement("TD");
		var letras = ["", "a", "b", "c", "d", "e", "f", "g", "h"];
		var num = $(event.currentTarget).attr("id");
		var num1 = num.substr(0,1);
		var num2 = num.substr(1,1);

		var element = document.createTextNode(pieza+letras[num1]+num2);
		td.appendChild(element);
		tr.appendChild(td);
	}

	function anotacionN(pieza, num){
		var tabla = document.getElementById("planilla");
		var td = document.createElement("TD");
		var letras = ["", "a", "b", "c", "d", "e", "f", "g", "h"];
		var num = $(event.currentTarget).attr("id");
		var num1 = num.substr(0,1);
		var num2 = num.substr(1,1);

		var element = document.createTextNode(pieza+letras[num1]+num2);
		td.appendChild(element);
		tabla.lastChild.appendChild(td);
		
	}


	function comprobar(array, p){
		var desc0Op = p , substring = "0";

		if(desc0Op.indexOf(substring) == -1){
			var desc9Op = p , substring = "9";
			if (desc9Op.indexOf(substring) == -1) {
				var descarteNegativos = p , substring = "-";
				if(descarteNegativos.indexOf(substring) == -1){
					array.push(p);
					
				}
			}
		}
	}
