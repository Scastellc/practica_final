/*
function tablero(){
	// Creamos un array para la anotacion de cada casilla
	var letras = ["a", "b", "c", "d", "e", "f", "g", "h"];
	
	$(document).ready(function(){
		// Hacemos dos for para crear el tablero de 8 x 8
		for(var a = 8; a>=1; a--){
			for(var i = 1; i<=8; i++){
				if(a%2==0){
					// Le agregamos la casilla con su identificador y la clase trash para arrastrar y soltar
					if(i%2==0){
						$("#casillas").html('<div class="blanco" id="c'.letras[i].a.'"><span class="trash" id="'.letras[i].a.'"></span></div>');
					}else{
						$("#casillas").html('<div class="negro" id="c'.letras[i].a.'"><span class="trash" id="'.letras[i].a.'"></span></div>');
					}
				}
				else{					
					if(i%2==0){		
						$("#casillas").html('<div class="negro" id="c'.letras[i].a.'"><span class="trash" id="'.letras[i].a.'"></span></div>');						
					}else{						
						$("#casillas").html('<div class="blanco" id="c'.letras[i].a.'"><span class="trash" id="'.letras[i].a.'"></span></div>');						
					}
				}
			}
		}
	});
}
*/

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
	        	
				var id = $(this).attr("id");//recuperamos el id de donde se soltara la pieza
				var idprovene = ui.draggable.attr("id");//cogemos el titilo de lo movido	
				alert(idprovene + " " + id);		
				ui.draggable.append().appendTo( "#"+id ).show();//colocamos la pieza
	        }
   		}); 		   
	});
}

function jugada(casillas){
	alert(casillas);
}