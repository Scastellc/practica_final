<!DOCTYPE html>
<html>
<head>
	<title>AjedrezBalear</title>
	<meta charset="utf-8">	
	<!--Bootstrap-->

	<!-- 			Latest compiled and minified CSS 			-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href="css/styloBasic.css" type="text/css" rel="stylesheet" media="screen,projection"/>

			<!--	 					Estilos							-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
			<!--	 					Favicon							-->
	<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEAEQARABEAEQARABEAEREAEQARABEAEQARABEAEQAAEQARABEAEQARABEAEQAREQARABEAEQARABEAEQARAAARABEAEQARABEAEQARABERABEAEQARABEAEQARABEAABEAEQARABEAEQARABEAEREAEQARABEAEQARABEAEQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />

	<?php 
		include_once "php/funciones.php";
	?>
</head>
<body>
	    <!--		Menu			-->
	<div class="container-fluid">	
		<div class="row">
			<nav class="navbar navbar-inverse navbar-fixed-top menu">
				<div class="container-fluid">
					<div class="navbar-header">
			    		<button type="button" class="navbar-toggle btn glyphicon glyphicon-list btns" data-toggle="collapse" data-target="#MyMenu">					
						</button>
						<a class="navbar-brand" href="index.php" id="tit">Ajedrez Balear</a>
					</div>
					<div class="collapse navbar-collapse" id="MyMenu">	
						<ul class="nav navbar-nav">
							<li>
								<a href="index.php">Inicio</a>
							</li>
							<li>
								<a href="partida.php">Jugar</a>
							</li>
							<li class="active">
								<a href="noticias.php">Noticias</a>
							</li>
							<li>
								<a href="" data-toggle="modal" data-target="#Cfun">¿Como funciona?</a>
							</li>
							<li>
								<a href="" data-toggle="modal" data-target="#mPartidas">Mis Partidas</a>
							</li>
						</ul>
						<div id=divDer class='nav navbar-nav navbar-right'>	
							
							<?php			
								usuario();
							?>
				    
			    		</div>
					</div>		
		    	</div>
		    </nav>
	    </div>
	</div>

				<!-- 			Modal de como funciona					-->
	<div class="modal fade" id="Cfun" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Funcionamiento</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
			        	<p> 1- Estar registrado en la pagina.</p>
			        	<p> 2- Encontrar ha alguien que quiera jugar!</p>
			        	<p>	3- Una vez logrado los dos pasos anteriores iremos al apartado de jugar, al entrar nos pedira que <strong>introduzcamos los nicks de dos usuarios registrados</strong> </p>
			        	<p>	4- Jugar la partida uno contra el otro a ver quien sabe mas!</p>
			        	<p> 5- Dentro de la partida podremos hacer tablas o abandonar, este juego de ajedrez tiene unas normas mas peculiares, aquí si se gana comiendo el rey, y no hay enroques.</p>
			        	<p> 6- ¡¡Importante a la hora de coronar un peon tener seleccionada antes la pieza que queremos coronar!!</p>
			        	<p> 7- Una vez terminada la partida podremos guardar la partida dandole al boton de pone: "Guardar Partida" que aparecera al finalizar la partida, para en un futuro volver a ver la planilla, en el apartado de mis partidas</p>
			        	<p> Por ultimo <strong>toca disfrutar entre amigos a ver quien es mas bueno!!</strong></p>	
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>

					<!-- 			Modal de mis partidas				-->
	<div class="modal fade" id="mPartidas" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Mis partidas</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
			        	<?php 
			        		misPartidas();			       
			        	?>			       
			        	<p> 1- Mis partidas.</p>			       
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>

	<div id="juego" class="container"> 
		<div class="row">
	   		<div class="col-lg-12">
				<div class="col-md-10 col-md-offset-2">
					<div class="tablero">
						<h1>Ultima Noticia</h1>
						<br><br>
						<div>
							<div class="col-md-6">
								<img src="noticias/magnus.jpg" width="320" height="220" alt="magnus">							
							</div>
							<div class="col-md-6">
								<h3> Magnus Carlsen domina el Blitz del Norway Chess</h3>
								
							</div>
							<p>	
								Magnus Carlsen mandó el primer aviso y ganó el blitz inagural del Norway Chess con dos puntos de ventaja sobre Nakamura y Aronian. Estos tres jugadores, además de Vachier-Lagrave y Kramnik tendrán unas piezas blancas más en el torneo que comienza mañana. Es solo un aperitivo pero también vale como señal.
							</p>
						</div>
						<div class="clearfix"></div>
						<br><br>
						<div>
							<div class="col-md-6">
								<img src="noticias/grischuk.jpg" width="320" height="250" alt="grischuk">							
							</div>
							<div class="col-md-6">
								<h3> Alexander Grischuk: El ajedrez es “solo un juego”</h3>								
							</div>
							<p>	
								Alexander Grischuk no ha estado jugando mucho últimamente, pero está haciendo que sus participaciones cuenten: ganó $54.000 en los Mundiales de Rápidas y Blitz en Doha y se llevó el primer premio en el Grand Prix de la FIDE en Sharjah. En una reciente entrevista habló sobre cómo el ajedrez no es "sagrado" para él, cómo se ha alejado del póker y por qué no acepta un salario anual de la Federación Rusa de Ajedrez.
							</p>
						</div>
					</div>
				</div>		
			</div>
		</div>
		<br><br>
		<div class="col-xs-12 col-lg-12">

		    <div class="page-header">
		        <h2 class="ofer" style="text-align: center">Noticias variadas</h2>
		    </div>
		        
		    <div class="carousel slide carro" id="myCarousel">
		        <div class="carousel-inner">
		        	<!-- /Slide1 --> 
		            <div class="item active">
		                <ul class="thumbnails">
		                	<li class="col-sm-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/europeo.jpg" alt="europeo ajedrez"></a>
									</div>
									<div class="caption">
										<h4>Comienza el campeonato de Europa de ajedrez</h4>
										<p>Con nueve jugadores superando la barrera de los 2700 y 85 los 2600</p>
										<a class="btn btn-mini" data-toggle="modal" data-target="#noticia1" href="#">» Mas info</a>									
									</div>
		                        </div>
		                    </li>
		                    <li class="col-md-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/kasparov.jpg" alt="kasparov"></a>
									</div>
									<div class="caption">
										<h4>Visio de Kasparov contra Deep Blue</h4>
										<p>KASPAROV: Lo que descubrimos en 1997, cuando Deep Blue tuvo un desempeño exitoso en un match contra el actual campeón del mundo.</p>
										<a class="btn btn-mini" data-toggle="modal" data-target="#noticia2" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                    <li class="col-md-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/leyes.jpg" alt="leyes ajedrez"></a>
									</div>
									<div class="caption">
										<h4>Cambios en las leyes del Ajedrez 2017</h4>
										<p>La FIDE aprobó recientemente unos cambios en las leyes que rigen el ajedrez de diversa relevancia.</p>
										<a class="btn btn-mini" data-toggle="modal" data-target="#noticia3" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                </ul>
		            </div>
		            <!-- /Slide2 --> 
		            <div class="item">
		                <ul class="thumbnails">
		                	<li class="col-sm-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/nakamura.jpg" alt="nakamura"></a>
									</div>
									<div class="caption">
										<h4>Nakamura gana el blitz de apertura en Zúrich</h4>
										<p>Hikaru Nakamura demostró que el jetlag no le afectó al ganar el torneo de blitz inaugural del Zurich Chess Challenge sin perder ni una partida.</p>
										<a class="btn btn-mini" data-toggle="modal" data-target="#noticia4" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                    <li class="col-sm-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/Fischer.jpg" alt="Fischer"></a>
									</div>
									<div class="caption">
										<h4>Bobby Fischer: La máquina de aplastar rivales</h4>
										<p>Palma de Mallorca, 1970. Bobby Fischer tiene 27 años y por tercera vez consecutiva ha estado a punto de quedarse fuera de la pugna por la corona mundial. </p>
										<a class="btn btn-mini" data-toggle="modal" data-target="#noticia5" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                    <li class="col-sm-offset-1 col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="noticias/maquina.jpg" width="150" alt="modulo"></a>
									</div>
									<div class="caption">
										<h4>¿Cómo piensan y operan los módulos de análisis?</h4>
										<p>El ajedrez es lo que se denomina un “juego de suma zero”, que no es más que un juego en el que las ganancias de uno de los jugadores equilibran exactamente las pérdidas del otro jugador.</p>
										<a class="btn btn-mini" data-toggle="modal" data-target="#noticia6" href="#">» Mas info</a>
									</div>
		                        </div>
		                    </li>
		                </ul>
		           </div>
		        </div>       
			   <!-- Controles -->   
			   <nav>
					<ul class="control-box pager">
						<li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
						<li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
					</ul>
				</nav>                    
		    </div>
		</div> 		
	</div>

			<!-- 			Todos los modales de noticias				-->
	<div class="modal fade" id="noticia1" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Europeo!</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
			        	<p> Comienza en Minsk, capital de Bielorrusia, el campeonato de Europa individual que se disputa por el sistema suizo a 11 rondas desde el 30 de mayo al 10 de junio, siendo descanso el 4. Además de repartir una bolsa de 100,000 euros, siendo 20,000 para el ganador, se adjudicarán 22 plazas para la copa del mundo que se disputará este año en septiembre aunque, hay que tener en cuenta, que algunos jugadores ya están clasificados para el evento.</p>
			        	<p>Comanda la lista el genial jugador checo David Navara, actual veinte del mundo que merecidamente puede ser considerado uno de los jugadores más combativos de la élite mundial. Le acompañan en el "tridente" de favoritos, los contrastados Grandes Maestros rusos Andreikin y Jakovenko de estilos más refinados ¡bien valdría la pena apostar a que apenas pierden partida en este torneo!</p>
			        	<p>La delegación española es este año más abultada de lo habitual. Con la ausencia del número uno español, Paco Vallejo, ya clasificado para la copa del mundo y casi recién aterrizado del Grand Prix de Moscú, encontramos a los jóvenes pero ya sobradamente experimentados David Antón e Iván Salgado y a Josep Manuel López, quien está jugando un excelente ajedrez en los últimos meses y de ahí su reciente ascenso a los límites de los 2600.</p>
						<a href="https://chess24.com/es/informate/noticias/europeo-norway-chess-y-continental-de-las-americas" target="blank">ver mas en chess24.com</a>
			        	
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>
	<div class="modal fade" id="noticia2" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Visio de Kasparov contra Deep Blue</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
			        	<h3>KASPAROV: Lo que descubrimos en 1997</h3>
			        	<p>
			        	Cuando Deep Blue tuvo un desempeño exitoso en un match contra el actual campeón del mundo —y yo era el campeón del mundo en ese momento— es que el ajedrez podría ser trabajado con base en la fuerza bruta una vez que el hardware se vuelva lo suficientemente rápido, las bases de datos lo suficientemente grandes, y los algoritmos suficientemente inteligentes.
			        	</p>
			        	<p>
			        	Pero a pesar de que Deep Blue salió victorioso, no fue para nada inteligente. Claro, podemos comenzar a discutir la definición de inteligencia, pues, si definimos la palabra por los resultados en el ajedrez a nivel de grandes maestros, Deep Blue sí era inteligente, a una velocidad increíble. En algunos momentos, Deep Blue podía alcanzar una velocidad fenomenal —incluso hoy es fenomenal, pero hace 20 años era simplemente alucinante— de 200 millones de posiciones por segundo. Esto nos reveló realmente muy poco sobre los misterios de la inteligencia humana.
			        	</p>	
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>	
	<div class="modal fade" id="noticia3" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Cambios en las leyes del Ajedrez 2017</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
			        	<h3> REGLAMENTACIÓN POR DEFECTO </h3>

						<p>Un retorno muy necesario al sistema antiguo. En el 2014 las Leyes del Ajedrez suprimieron el margen de tolerancia para ganar una partida por incomparecencia, y establecían que las bases del torneo deberían fijar uno. En la práctica, muchos organizadores-árbitros no fijaban este punto en las bases y se podían generar conflictos o malentendidos. Ahora, se establece un margen nulo por defecto (“Tolerancia cero”) pero el organizador tiene libertad para fijar otro cualquiera en las bases. (La parte en negrita es el añadido de 2017).
						</p>

						<p><strong>6.7.1 Las bases de un evento deberán especificar por adelantado un tiempo de incomparecencia. Si no se especifica ninguno, será cero.</strong></p>

						<p>De igual modo, hasta ahora era imprescindible que las bases de un torneo de Rápidas se indicase si se iba a aplicar o no la reglamentación especial para finales a caída de bandera. ¿Y si el organizador no lo hacía? Volvemos a tener una normativa por defecto. Se aplicarán solo si se anuncia de antemano.
						</p>

						<h3> REINICIO DE PARTIDAS</h3>

						<p> Hasta ahora, si una partida empezaba con colores cambiados y se descubría más adelante, se debería reiniciar con los colores correctos “salvo que el árbitro decida otra cosa”. El árbitro consideraba el tiempo transcurrido, si algún jugador contaba ya con ventaja importante, … Pero era una situación muy subjetiva, y no todos los árbitros son fuertes jugadores. Esto queda resuelto con el nuevo artículo:
						</p>
						<p> 7.3 Si una partida ha comenzado con los colores cambiados, la partida se anulará y se jugará una partida nueva con los colores correctos siempre y cuando se hayan efectuado menos de 10 jugadas por parte de ambos jugadores. Si se han efectuado 10 o más jugadas, la partida continuará.
						</p>
						<h3>TABLAS POR REPETICIÓN "DE OFICIO"</h3>
						<p>
						Desde 2014 el árbitro puede actuar de oficio en posiciones de repetición. Un jugador puede reclamar cuando se producen 3 repeticiones. El árbitro solo podía actuar de oficio cuando se producían 5 repeticiones de forma consecutiva. Ahora esa condición de ser consecutivas desaparece del artículo 9.6.1
						</p>
						<p>	Este artículo es especialmente útil en situaciones donde un jugador no sabe reclamar la triple repetición de modo correcto, y jugando con incremento la partida se podría extender por tiempo ilimitado.</p>	
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>	
	<div class="modal fade" id="noticia4" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Nakamura gana el blitz</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
			        	<p> Hikaru Nakamura demostró que el jetlag no le afectó al ganar el torneo de blitz inaugural del Zurich Chess Challenge sin perder ni una partida. Boris Gelfand, Vladimir Kramnik e Ian Nepomniachtchi, además de Nakamura, tendrán cuatro blancas en la sección Neoclásica que arrancó este jueves. El héroe del día, sin embargo, fue Vishy Anand, quien realizó un exquisito sacrificio de dama en su partida contra el organizador Oleg Skvortsov.</p>
			        	<p> La 6ta edición del Zurich Chess Challenge comenzó en el Hotel Savoy Baur en Ville este viernes con una nómina de ocho jugadores, liderados por Kramnik, Anand y Nakamura, quienes fueron acompañados por una audiencia de lujo. El 12do campeón del mundo, Anatoly Karpov, y su rival Jan Timman estuvieron presentes en un evento dedicado a la memoria de otra leyenda, Viktor Korchnoi. Kirsan Ilyumzhinov también fue a la ceremonia, con lo que hizo su primera aparición como presidente de la FIDE.</p>
			        		
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>	
	<div class="modal fade" id="noticia5" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">Bobby Fischer: La máquina de aplastar rivales</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
	        			<h3>Ficher reaparece en Mallorca con fuerza</h3>
			        	<p> Palma de Mallorca, 1970. <strong>Bobby Fischer</strong> tiene 27 años y por tercera vez consecutiva ha estado a punto de quedarse fuera de la pugna por la corona mundial. Habiendo rechazado la posibilidad de revalidar por novena vez su título de campeón estadounidense, no tenía una plaza para el gran Torneo Interzonal que se iba a celebrar en la isla balear. Solo gracias a la inteligente —y, todo sea dicho, desesperada— intervención de la federación estadounidense que ya narramos en el capítulo anterior, el genio de Brooklyn ha podido finalmente presentarse al Interzonal como todo el mundo esperaba ansiosamente. Ahora bien, se planteaba una inquietante pregunta: ¿Qué hará Fischer esta vez? ¿Volverá a marcharse con el torneo a medias, dejando a todo el mundo en la estacada como ya hizo en el Interzonal de tres años atrás?</p>
			        	<p> Pese a lo que muchos temían no sin motivo, el voluble Bobby no organizó ninguna trifulca en Palma y acudió dispuesto a clasificarse. Es más: estaba decidido a conseguir el primer puesto aunque únicamente necesitase quedar entre los seis primeros. Y no se marchó. Esta iba a ser la primera vez que finalizaba un Interzonal desde que tenía 19 años. Terminó en la primera plaza con una diferencia de puntuación más que considerable respecto del resto de competidores; su desempeño fue brillante. Tras un buen inicio en el que no tardó en ponerse en cabeza del torneo, flojeó ligeramente en el tramo intermedio —probablemente debido a su escaso ritmo de competición— y durante ese pequeño bajón salvó tres empates con algún apuro. Es más, no pudo evitar sufrir la única derrota del evento frente al danés Bent Larsen, uno de los mejores jugadores del momento. Pero la reacción de Bobby fue digna de su talento: cuando se dio cuenta de que estaba rindiendo por debajo de sus posibilidades, volvió a apretar el acelerador y deslumbró a todos con una impresionante racha final de siete victorias en siete partidas (aunque hubo un abandono por parte del argentino Oscar Panno, que protestaba con toda la razón por los privilegios de horario concedidos a Fischer por motivos religiosos). Una gesta que recordaba a lo que había conseguido unos años antes en el campeonato estadounidense y en algunos otros torneos de menor magnitud. Ahora, compitiendo contra la élite mundial, terminaba el Interzonal dando muestras de que se estaba convirtiendo en un jugador bastante más dominante que antaño. Fischer empezaba a dar miedo.</p>
			        	<p>	Aquella racha de siete victorias no solo despertó una gran admiración en los círculos ajedrecísticos sino que provocó que volviesen a crecer las expectativas en torno a sus posibilidades de ser campeón mundial. Cuando Bobby decidió elevar su nivel en las últimas rondas del Interzonal, ninguno de los Maestros con los que se cruzó pudo arrancarle ni medio punto. Bien es cierto que no habían sido los campeones rusos de primera fila, pero incluso los menos propensos a glosar sus hazañas tenían que admitir que finalmente había un jugador occidental dotado de las condiciones necesarias para convertirse como mínimo en una amenaza para la hegemonía soviética. Durante años Fischer había afirmado que él era el mejor jugador del mundo, pese a no ser campeón mundial. Pero sus ausencias en la gran competición y sus derrotas con algunos jugadores, especialmente con Boris Spassky, impedían que esta opinión fuese universalmente compartida. Tras el Interzonal, sin embargo, muchos empezaban a preguntarse si realmente estaba llegando su momento… porque un nuevo Fischer parecía haber emergido en Mallorca.</p>	
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>	
	<div class="modal fade" id="noticia6" role="dialog">
	    <div class="modal-dialog">
			<!-- 					Contenedor del modal 				-->
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h3 class="modal-title">¿Cómo piensan y operan los módulos de análisis?</h3>
	        	</div>
	        	<div class="modal-body">
	        		<div class="text-center">
	        			<h3>Cómo funcionan: Algoritmo Minimax</h3>
			        	<p> El ajedrez es lo que se denomina un “juego de suma zero”, que no es más que un juego en el que las ganancias de uno de los jugadores equilibran exactamente las pérdidas del otro jugador. En consecuencia, las ganancias totales menos las pérdidas totales son iguales a cero, de ahí la nomenclatura “de suma zero”.</p>
			        	<p> <strong>Minimax</strong> es una palabra muy bonita, pero ¿cómo funciona este algoritmo?</p>
			        	<p>	En lo que se denomina una búsqueda one-ply, es decir, donde sólo secuencias de jugadas con longitud 1 son examinadas, el bando que juega (denominado max player) simplemente puede “ver” la evaluación después de todas las posibles jugadas. De esta forma, la jugada con la mejor evaluación es elegida. Pero en una búsqueda two-ply, donde el rival (min player) también mueve, es más complejo. Éste elige también la jugada que le proporciona la mejor evaluación.</p>
			        	<p>	Resumiendo, se trata de elegir el mejor movimiento para uno mismo suponiendo que el rival escogerá el peor para ti.</p>	
	        		</div>
	        	</div>
	        	<div class="modal-footer modal-right">
		        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
	        	</div>
	      	</div>
	    </div>
	</div>


 	<!--		Footer		-->
	<div class="footer">
	    <div class="container">
	        <div class="row">
	    		<div class="col-lg-12">
	      			<div class="col-md-8">
	      				<p> 
	      					<?php
	      						hora();
							?>	
						</p>
	      				<a href="#">Terms of Service</a> | <a href="#">Privacy</a> 
			        	<div class="nav navbar-nav navbar-right icons">
							<a href="https://www.facebook.com" target="blank"><i class="fa fa-facebook-square fa-4x social social-fb"></i></a>
	            			<a href="https://plus.google.com" target="blank"><i class="fa fa-google-plus-square fa-4x social social-gp"></i></a>
	            			<a href="https://twitter.com" target="blank"><i class="fa fa-twitter-square fa-4x social social-tw"></i></a>
						</div> 			   
	      			</div>
	      			<div class="col-md-4">
	        			<p class="muted pull-right">© 2016 Salva Castell. All rights reserved</p>
	      			</div>
                </div>
            </div>    
        </div>
    </div>

</body>
	<!--Bootstrap-->
	<!-- 					jQuery library 							-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- 				Latest compiled JavaScript 					-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>
