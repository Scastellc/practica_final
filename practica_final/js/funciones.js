

// Variables globales, para saber a quien toca, el color de la pieza y la pieza
var _quienToca = "blancas";
var _colorPieza = "";
var _pieza = "";

// Creamos un array global para la anotacion de cada casilla
var letras = ["","a", "b", "c", "d", "e", "f", "g", "h"];

$(document).ready(function(){

 	$("#mostrarmodal").modal("show");

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
	
	
	var ids = casilla.attr("id");
	var ultima = ids.substr(1,1);


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

		if (_pieza == "peon" && (ultima == 8 || ultima == 1)) {
		/*
			//<img src="piezas/N'+$(negras[i]).selector+'.png"/>
			var tagImgEliminar = casilla.find("img");
			//var tagImgAñadir = casillaInicio[0].firstChild.firstChild;
			var tagImgAñadir = $('<img src=piezas/Bdama.png/>');
			console.log(tagImgAñadir);
			casilla[0].firstChild.removeChild(tagImgEliminar);
			casilla[0].firstChild.append(tagImgAñadir);		
		
			var tagImgE = casilla.find("img");
			casilla[0].firstChild.removeChild(tagImgE);
			console.log(tagImgE);
*/
			peonCorona(casilla);

		}else{

			var tagImgEliminar = casilla[0].firstChild.firstChild;
			var tagImgAñadir = casillaInicio[0].firstChild.firstChild;
			console.log(tagImgEliminar);
			console.log(tagImgAñadir);	
			casilla[0].firstChild.removeChild(tagImgEliminar);
			casilla[0].firstChild.append(tagImgAñadir);
			colorAnotar(pieza, numInicio, pieza2+"x");

			var rey = tagImgEliminar.src.substr(63,3);

			if (rey == "rey") {
				alert(_quienToca + " han perdido");

				if (_quienToca != "blancas") {					
					var res = "1-0";
					anotarFinal(res);
				}else{
					var res = "0-1"
					anotarFinal(res);					
				}				
			}					
		}

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
		$("#casillas div").removeClass("mPieza");

		return false;
	}

	// Si el color de la pieza es el mismo que al jugador que le toca,
	if(_colorPieza == _quienToca){
		// Elimino si hay alguna clase dejarPieza en el tablero
		$("#casillas div").removeClass("dejarPieza");
		$("#casillas div").removeClass("mPieza");

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

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		switch(_colorPieza){				
			case "blancas":
				movePeonB(parseX, parseY);		
				break;			
			default:
				movePeonN(parseX, parseY);
		}
	}	

	// Indico como puede mover el peon blanco
	function movePeonB(parseX, parseY){
		
		pM1 = (parseX + 1) + "" + (parseY + 1);
		pM2 = (parseX - 1) + "" + (parseY + 1);

		// Si el peon esta en segunda fila
		if (parseY == 2) {		

			var p1 = parseX + "" + (parseY + 1);
			var p2 = parseX + "" + (parseY + 2);

			if ($("#"+p1).attr("data-pieza")=="") {
				$("#"+p1).addClass("opt");
				if ($("#"+p2).attr("data-pieza")==""){
					$("#"+p2).addClass("opt");			
				}
			}	

			peonMata(pM1, pM2);

		}else{
			var p1 = parseX + "" + (parseY + 1);

			if ($("#"+p1).attr("data-pieza")=="") {
				$("#"+p1).addClass("opt");				
			}
			peonMata(pM1, pM2);
		}
	}

	// Indico como puede mover el peon negro
	function movePeonN(parseX, parseY){
		
		pM1 = (parseX + 1) + "" + (parseY - 1);
		pM2 = (parseX - 1) + "" + (parseY - 1);

		// Si el peon esta en segunda fila
		if (parseY == 7) {						
			var p1 = parseX + "" + (parseY - 1);
			var p2 = parseX + "" + (parseY - 2);
			
			if ($("#"+p1).attr("data-pieza")=="") {
				$("#"+p1).addClass("opt");
				if ($("#"+p2).attr("data-pieza")==""){
					$("#"+p2).addClass("opt");			
				}
			}	

			peonMata(pM1, pM2);

		}else{
			var p1 = parseX + "" + (parseY - 1);
			if ($("#"+p1).attr("data-pieza")=="") {
				$("#"+p1).addClass("opt");				
			}
			peonMata(pM1, pM2);
		}
	}

	function peonMata (pM1, pM2){
		if ($("#"+pM1).attr("data-color") != "" && $("#"+pM1).attr("data-color") != _quienToca) {				
			$("#"+pM1).addClass("opt");				
		}
		if ($("#"+pM2).attr("data-color") != "" && $("#"+pM2).attr("data-color") != _quienToca) {				
			$("#"+pM2).addClass("opt");				
		}
	}

	function peonCorona(casilla){
		//var piezaCoronar = $("#piezaCoronar");
		

		var tagImgEliminar = casilla[0].firstChild.firstChild;
		console.log(tagImgEliminar);
		casilla[0].firstChild.removeChild(tagImgEliminar);
		
		var img = document.createElement('img');
		$(img).attr("scr","piezas/Btorre.png")
		
		//var element = document.createTextNode('<img src="piezas/Bdama.png"/>');		
		//img.appendChild(element);
		

		//var tagImgAñadir = "<img src=piezas/Bdama.png/>";
		casilla[0].firstChild.append(img);
		/*
		console.log(tagImgAñadir);	
		*/
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
		optRey.push(p1, p2, p3, p4, p5, p6, p7, p8);

		// Recorremos el array de donde puede mover
		for (var i = 0; i < optRey.length; i++) {
			// Le añadimos la clase para que cambie de color
			if ($("#"+optRey[i]).attr("data-color")!=_quienToca) {
				$("#"+optRey[i]).addClass("opt");						
			}	
		}
	}

	function moveDama(xIni, yIni){		
		var optDama = { "arr_0" : [], "arr_1" : [], "arr_2" : [], "arr_3" : [], "arr_4" : [], "arr_5" : [], "arr_6" : [], "arr_7" : []};

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		for (var x = 1; x < 8; x++) {
			
			// Derecha
			var p1 = {
				x: (parseX + x),
				y: (parseY)
			}
			comprobar(optDama.arr_0, p1);

			// Izquierda
			var p2 = {
				x: (parseX - x),
				y: (parseY)
			}
			comprobar(optDama.arr_1, p2);

			// Arriba
			var p3 = {
				x: (parseX),
				y: (parseY + x)
			}
			comprobar(optDama.arr_2, p3);

			// Abajo
			var p4 = {
				x: (parseX),
				y: (parseY - x)
			}
			comprobar(optDama.arr_3, p4);
			
			// Arriba-Derecha
			var p5 = {
				x: (parseX + x),
				y: (parseY + x)
			}
			comprobar(optDama.arr_4, p5);

			// Arriba-Izquierda
			var p6 = {
				x: (parseX - x),
				y: (parseY + x)
			}
			comprobar(optDama.arr_5, p6);

			// Abajo-Derecha
			var p7 = {
				x: (parseX + x),
				y: (parseY - x)
			}
			comprobar(optDama.arr_6, p7);

			// Abajo-Izquierda
			var p8 = {
				x: (parseX - x),
				y: (parseY - x)
			}
			comprobar(optDama.arr_7, p8);

		}
		/*
		for (var i = 0; i < optDama.length; i++) {
			$("#"+optDama[i]).addClass("opt");
		}
		*/
	}

	function moveAlfil(xIni, yIni){		
	
		var optAlfil = { "arr_0" : [], "arr_1" : [], "arr_2" : [], "arr_3" : [] };
		parseX = parseInt(xIni);
		parseY = parseInt(yIni);

		for (var x = 1; x < 8; x++) {

			// Arriba-Derecha
			var p1 = {
				x: (parseX + x),
				y: (parseY + x)
			}
			comprobar(optAlfil.arr_0, p1);

			// Arriba-Izquierda
			var p2 = {
				x: (parseX - x),
				y: (parseY + x)
			}
			comprobar(optAlfil.arr_1, p2);

			// Abajo-Derecha
			var p3 = {
				x: (parseX + x),
				y: (parseY - x)
			}
			comprobar(optAlfil.arr_2, p3);

			// Abajo-Izquierda
			var p4 = {
				x: (parseX - x),
				y: (parseY - x)
			}
			comprobar(optAlfil.arr_3, p4);

		}
/*
		for (var i = 0; i < optAlfil.length; i++) {
			$("#"+optAlfil[i]).addClass("opt");
		}
*/
	}

	function moveCaballo(xIni, yIni){		

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

		optCaballo.push(p1, p2, p3, p4, p5, p6, p7, p8);

		for (var i = 0; i < optCaballo.length; i++) {	
			var descarte0 = optCaballo[i] , substring = "0";
			if(descarte0.indexOf(substring) == -1){
				var descarteNegativos = optCaballo[i] , substring = "-";
				if(descarteNegativos.indexOf(substring) == -1){					
					if ($("#"+optCaballo[i]).attr("data-color")!=_quienToca) {
						$("#"+optCaballo[i]).addClass("opt");						
					}
				}
			}
		}
	}

	function moveTorre(xIni, yIni){

		parseX = parseInt(xIni);
		parseY = parseInt(yIni);
		
		var optTorre = { "arr_0" : [], "arr_1" : [], "arr_2" : [], "arr_3" : [] };

		for (var x = 1; x < 8; x++) {
		
			// Derecha
			var p1 = {
				x: (parseX + x),
				y: (parseY)
			}
			comprobar(optTorre.arr_0, p1);

			// Izquierda
			var p2 = {
				x: (parseX - x),
				y: (parseY)
			}
			comprobar(optTorre.arr_1, p2);

			// Arriba
			var p3 = {
				x: (parseX),
				y: (parseY + x)
			}
			comprobar(optTorre.arr_2, p3);

			// Abajo
			var p4 = {
				x: (parseX),
				y: (parseY - x)
			}
			comprobar(optTorre.arr_3, p4);
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
		var element = document.createTextNode(pieza+letras[ini]+ini2+"-"+pieza2+letras[num1]+num2+" ");			

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
		var element = document.createTextNode(pieza+letras[ini]+ini2+"-"+pieza2+letras[num1]+num2+" ");

		td.appendChild(element);
		tabla.lastChild.appendChild(td);
		
	}

	function anotarFinal(res){

		if (_quienToca != "fin") {
			var tabla = document.getElementById("planilla");
			var tr = document.createElement("TR");
			tabla.appendChild(tr);
			var td = document.createElement("TD");
			var element = document.createTextNode(res);
			td.appendChild(element);
			tabla.lastChild.appendChild(td);
			_quienToca = "fin";

			$("#mandar").removeClass("hide");

		}
	}


	function comprobar(array, p){
		var piezaEnMedio = false;
		var matarPieza = false;
		if(p.x <= 8 && p.x >= 1){

			if (p.y <= 8 && p.y >= 1) {
					
				array.push(p.x+""+p.y);
				var exitFor = false;

				for (var i = 0; i < array.length ; i++) {
					if(!exitFor){
						if ($("#"+array[i]).attr("data-pieza")!="") {
							piezaEnMedio = true;
							if ($("#"+array[i]).attr("data-color")!=_quienToca) {							
								matarPieza = true;
							}
							exitFor = true;		
						}

						if (!piezaEnMedio || (matarPieza && piezaEnMedio)) {
							$("#"+array[i]).addClass("opt");
							if (matarPieza) {
								$("#"+array[i]).addClass("mPieza");

								matarPieza = false;
							}
						}
					}
				}
			}
		}
	}

	function enviarPartida(){		
		
		var tabla = $("#planilla").text();

		var jugadas = tabla.split(" ");

		var blancas = [];
		var negras = [];
		var todo = [];
		for (var i = 10; i < (jugadas.length-1); i++) {
			
			
			if (i % 2 == 0) {
				blancas.push(jugadas[i]);
			}else{
				negras.push(jugadas[i]);
			}				
		}
/*
		$("#aBlancas").attr("value", blancas);
		$("#aNegras").attr("value", negras);
		$("#aRes").attr("value", $(jugadas).last()[0]);	
*/
		todo.push(blancas,negras,$(jugadas).last()[0]);


		var data = $(todo).serializeArray();

		mandar();
	}

	function mandar(){
		
		$.ajax({
			url: 'partida.php',
			type: 'POST',
			data: data,
			dataType: 'json',
			async: true
		})
			.fail(function(data) {
			alert('Error al actualitzar los datos en el servidor');
		});
		
/*
		var data = $("#formAjax :input").serialize();

		var pet = "funciones.php"; 
		$.post(pet, data)
*/
	}
