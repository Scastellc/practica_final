// Variables globales, para saber a quien toca, el color de la pieza y la pieza
var _quienToca = "blancas";
var _colorPieza = "";
var _pieza = "";

// Creamos un array global para la anotacion de cada casilla
var letras = ["","a", "b", "c", "d", "e", "f", "g", "h"];

$(document).ready(function(){

 	//console.log($("#mostrarmodal"));
 	//$("#mostrarmodal").modal("show");
	tablero();
	piezas();

	$("#casillas div").click(function($event){
		var casilla = $($event.currentTarget);
		_pieza = casilla.attr("data-pieza");
		_colorPieza = casilla.attr("data-color");	
		var liPieza = $event.currentTarget.parentNode;

		//movimiento
		if(casilla.hasClass("opt")){
			moverPieza(casilla);			
		}

		if(marcarPieza(casilla)){

			// Elimino todas las clase opt que quedaban
			$("#casillas div").removeClass("opt");

			pieza(casilla);
		};

	})
});

function moverPieza(casilla){
	var casillaInicio = $(".dejarPieza");
	_pieza = casillaInicio.attr("data-pieza");
	_colorPieza = casillaInicio.attr("data-color");
	
	// Anotacion
	var pieza = _pieza.substr(0,1).toUpperCase();
	var pieza2 = _pieza.substr(0,1).toUpperCase();
	var numInicio = casillaInicio.attr("id");

	// Matar pieza
	if (casilla.attr("data-pieza")!="") {		
		casilla.attr("data-color",_colorPieza);
		casilla.attr("data-pieza",_pieza);
		casillaInicio.attr("data-color","");
		casillaInicio.attr("data-pieza","");

		var tagImgEliminar = casilla[0].firstChild.firstChild;
		var tagImgAñadir = casillaInicio[0].firstChild.firstChild;		
		casilla[0].firstChild.removeChild(tagImgEliminar);
		casilla[0].firstChild.append(tagImgAñadir);
		colorAnotar(pieza, numInicio, pieza2+"x");

	}else{
		// Hacer movimiento normal
		casilla.attr("data-color",casillaInicio.attr("data-color"));
		casilla.attr("data-pieza",casillaInicio.attr("data-pieza"));
		casillaInicio.attr("data-color","");
		casillaInicio.attr("data-pieza","");				
						
		var tagImg = casillaInicio[0].firstChild.firstChild;
		casillaInicio[0].firstChild.removeChild(tagImg);
		casilla[0].firstChild.append(tagImg);
		colorAnotar(pieza, numInicio, pieza2);
	}
}

function colorAnotar(pieza, numInicio, pieza2){
	//cambiar turno				
	if( _quienToca == "blancas"){
		if (pieza != "P") {
			anotacionB(pieza, numInicio, pieza2);					
		}else{
			anotacionB("", numInicio, "");
		}
		_quienToca = "negras";					
	}else{
		if (pieza != "P") {
			anotacionN(pieza, numInicio, pieza2);					
		}else{
			anotacionN("",numInicio, "");
		}
		_quienToca = "blancas";
	}	
}


// Funcion para crear el tablero
function tablero(){

	

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
			$("#casillas").append("<div data-pieza=\"\" data-color=\"\" class='" + color + "' id='" + x+""+y + "'><li title='"+letras[x]+""+y+"' id='L"+x+""+y+"'></li>");
		}
	}
}

// Funcion para colocar las piezas en el tablero
function piezas(){

	// Imagenes de piezas blancas y negras
	var blancas = ["peon","torre","caballo","alfil","dama","rey","alfil","caballo","torre"];
	var negras = ["peon","torre","caballo","alfil","dama","rey","alfil","caballo","torre"];

	for (var i = 1; i < 9; i++) {
		$("#"+i+"1").html('<li title="'+letras[i]+1+'" id="'+letras[i]+1+'"><img src="piezas/B'+$(blancas[i]).selector+'.png"/></li>');
		$("#"+i+"2").html('<li title="'+letras[i]+2+'" id="'+letras[i]+2+'"><img src="piezas/B'+$(blancas[0]).selector+'.png"/></li>');

		$("#"+i+"1").attr("data-pieza",blancas[i]);
		$("#"+i+"1").attr("data-color","blancas");
		$("#"+i+"2").attr("data-pieza",blancas[0]);
		$("#"+i+"2").attr("data-color","blancas");
	}

	for (var i = 9; i > 0; i--) {
		$("#"+i+"8").html('<li title="'+letras[i]+8+'" id="'+letras[i]+8+'"><img src="piezas/N'+$(negras[i]).selector+'.png"/></li>');
		$("#"+i+"7").html('<li title="'+letras[i]+7+'" id="'+letras[i]+7+'"><img src="piezas/N'+$(negras[0]).selector+'.png"/></li>');

		$("#"+i+"8").attr("data-pieza",negras[i]);
		$("#"+i+"8").attr("data-color","negras");
		$("#"+i+"7").attr("data-pieza",negras[0]);
		$("#"+i+"7").attr("data-color","negras");
	}
}

// Esta funcion marca o desmarca la pieza que has seleccionado
function marcarPieza(casilla){
	
	if(_pieza=="" || casilla.hasClass("opt") || casilla.hasClass("dejarPieza") == true){
		$("#casillas div").removeClass("dejarPieza");
		$("#casillas div").removeClass("opt");
		return false;
	}

	// Si el color de la pieza es el mismo que al jugador que le toca,
	if(_colorPieza == _quienToca){
		// Elimino si hay alguna clase dejarPieza en el tablero
		$("#casillas div").removeClass("dejarPieza");
		// Añado la clase dejar pieza sobre la ultima casilla que marco 
		casilla.addClass("dejarPieza");
		return true
	}
}

function pieza(casilla){

	var xIni = casilla.attr("id")[0];
	var yIni = casilla.attr("id")[1];

	switch(_pieza){
		case "rey":
			moveRey(xIni, yIni);
			break;
		case "dama":
			moveDama(xIni, yIni);
			break;		
		case "alfil":
			moveAlfil(xIni, yIni);
			break;			
		case "caballo":
			moveCaballo(xIni, yIni);
			break;				
		case "torre":
			moveTorre(xIni, yIni);		
			break;			
		default:
			colorPeon(xIni, yIni);
	}
}

	// Esta funcion es para saber si es peon blanco o negro
	function colorPeon(xIni, yIni){		

		switch(_colorPieza){				
			case "blancas":
				movePeonB(xIni, yIni);		
				break;			
			default:
				movePeonN(xIni, yIni);
		}
	}	

	// Indico como puede mover el peon blanco
	function movePeonB(xIni, yIni){
		// Si el peon esta en segunda fila
		if (yIni == 2) {						
			var p1 = xIni + "" +  (parseInt(yIni) + 1);
			$("#"+p1).addClass("opt");
			var p2 =   xIni + "" +(parseInt(yIni) + 2);
			$("#"+p2).addClass("opt");		
		}else{
			var p1 = xIni + "" +  (parseInt(yIni) + 1);
			$("#"+p1).addClass("opt");
		}
	}

	// Indico como puede mover el peon negro
	function movePeonN(xIni, yIni){
		// Si el peon esta en segunda fila
		if (yIni == 7) {						
			var p2 =   xIni + "" +(parseInt(yIni) - 2);
			$("#"+p2).addClass("opt");		
			var p1 = xIni + "" +  (parseInt(yIni) - 1);
			$("#"+p1).addClass("opt");
		}else{
			var p1 = xIni + "" +  (parseInt(yIni) - 1);
			$("#"+p1).addClass("opt");
		}
	}

	// Funcion para poder mover el rey
	function moveRey(xIni, yIni){		

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
		}

	}
	function moveDama(xIni, yIni){		

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
		}
	}

	function moveAlfil(xIni, yIni){		
		var optAlfil = []; 

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		for (var x = 1; x < 8; x++) {
			
			// Arriba-Derecha
			var p1 = (parseX + x)+ "" +(parseY + x);
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
		}
	}

	function moveCaballo(xIni, yIni){		

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
				}
			}
		}
	}

	function moveTorre(xIni, yIni){

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
		}
	}

	function anotacionB(pieza, numInicio, pieza2){
		var tabla = document.getElementById("planilla");
		var tr = document.createElement("TR");
		tabla.appendChild(tr);
		var td = document.createElement("TD");

		var num = $(event.currentTarget).attr("id");
		var num1 = num.substr(0,1);
		var num2 = num.substr(1,1);
		
		var ini = numInicio.substr(0,1);
		var ini2 = numInicio.substr(1,1);
		var element = document.createTextNode(pieza+letras[ini]+ini2+"-"+pieza2+letras[num1]+num2);			

		td.appendChild(element);
		tr.appendChild(td);
	}

	function anotacionN(pieza, numInicio, pieza2){
		var tabla = document.getElementById("planilla");
		var td = document.createElement("TD");

		var num = $(event.currentTarget).attr("id");
		var num1 = num.substr(0,1);
		var num2 = num.substr(1,1);

		var ini = numInicio.substr(0,1);
		var ini2 = numInicio.substr(1,1);
		var element = document.createTextNode(pieza+letras[ini]+ini2+"-"+pieza2+letras[num1]+num2);

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
