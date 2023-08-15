<html>

	<head>
	
		<title> Outils en vrac </title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="style.css" />
		
		<style>
		
			a {
				color : blue;
				text-decoration : none;
			}
			
			a:hover {
				color : #791701;
				text-decoration: underline;
			}
			
			a:visited {
				color : ;
			}
			
			.module {
				margin-top : 0;
				border:1px solid black;
				padding : 15px;
			}
			
			.resultat {
				color : red;
			}
			
			h4 {
				color : blue;
				font-family : arial;
				text-transform : uppercase;
				font-size: 12px;
			}
			
			div.cmath {
				display: block;
				margin: 3px 3px 0px 3px;
				padding-left: 0px; padding-top: 3px; padding-bottom: 3px;
				white-space : pre;
			}
		
		</style>
		
		<script async="true" src="https://cdn.jsdelivr.net/npm/mathjax@2/MathJax.js?config=AM_CHTML"> </script>
	
	</head>
	
	<body>
	
		<h2><u>Boîte à outils : Ingénierie ferroviaire</u></h2><h3>Outils en vrac</h3>
		<a href="index.php">Retour à la page principale</a>
		

			
		
		<table  id="tab">
			
			<tr id="tr_tab">
				
				<td class="module">
					<h4>Conversion flèche - rayon</h4>
					
				 	<div class="cmath">
`f = 50000 / R`     `R = 50000 / f`	
					</div>
					
					<table>
						<tr>
							<td>Flèche</td>
							<td><input type="text" id="fleche" size="5" onclick="this.select();"></td>
				 
							<script>
								document.getElementById('fleche').addEventListener('input', function() {   						
									
									var rayon = 50000 / parseInt(document.getElementById('fleche').value, 10);
									
									document.getElementById('afficher_rayon').innerHTML = '<span>R = '+Math.round(rayon)+' m</span></br>';
								 
								});
							</script>
							
							<td><div id="afficher_rayon" class="resultat"></div></td>
						</tr>
						<tr>
							<td>Rayon</td>
							<td><input type="text" id="rayon" size="5" onclick="this.select();"></td>
				 
							<script>
								document.getElementById('rayon').addEventListener('input', function() {   						
									
									var fleche = 50000 / parseInt(document.getElementById('rayon').value, 10);
									
									document.getElementById('afficher_fleche').innerHTML = '<span>F = '+Math.round( fleche * 10 ) / 10 +' mm</span></br>';
								 
								});
							</script>
							
							<td><div id="afficher_fleche" class="resultat"></div></td>
						</tr>						
					</table>
						
				</td>
				
				<td class="module">
					<h4>Calcul de la constante d'un RP entre un alignement et une courbe</h4>

					<div class="cmath">
`A = L xx R`
					</div>
					
					<table>
						<tr>
							<td>Rayon de la courbe</td>
							<td><input type="text" id="rpalrRayon" size="5" oninput="rpalrLrp()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Longueur RP</td>
							<td><input type="text" id="rpalrLrp" size="5" oninput="rpalrLrp()" onclick="this.select();"></td>
						</tr>
					
						<tr>
							<td>
					
								<script>
						
								function rpalrLrp () {
									var rpalrRayon = parseInt(document.getElementById('rpalrRayon').value, 10);
									var rpalrLrp = parseInt(document.getElementById('rpalrLrp').value, 10);
									var rpalrConstante = rpalrRayon * rpalrLrp;
									document.getElementById('afficher_constante_RP').innerHTML = '<span>A = '+rpalrConstante+' m²</span>';
								}
											
								</script>
						
								<div id="afficher_constante_RP" class="resultat"></div>
							</td>
						</tr>
					</table>
					
				</td>
				
				<td class="module">
					<h4>Calcul du rayon instantané dans un RP entre un alignement et une courbe</h4>
					
					<div class="cmath">
`R_i = ( R xx L_(RP) ) / D_(à l'ORP)`	
					</div>
					
					<table>
						<tr>
							<td>Distance à l'ORP</td>
							<td><input type="text" id="rirpalrDistance" size="5" oninput="rirpalr()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Longueur du RP</td>
							<td><input type="text" id="rirpalrLrp" size="5" oninput="rirpalr()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Rayon de la courbe</td>
							<td><input type="text" id="rirpalrRayon" size="5" oninput="rirpalr()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>
								<script>
						
								function rirpalr() {
									
									var rirpalrDistance = parseInt(document.getElementById('rirpalrDistance').value, 10);
									var rirpalrRayon = parseInt(document.getElementById('rirpalrRayon').value, 10);
									var rirpalrLrp = parseInt(document.getElementById('rirpalrLrp').value, 10);
									 
									var rirpalrConstante = rirpalrRayon * rirpalrLrp;
									var rirpalrRI = rirpalrConstante / rirpalrDistance;

									document.getElementById('afficher_RI').innerHTML = '<span>Le rayon instantané à '+rirpalrDistance+'m de l\'ORP est de '+Math.round(rirpalrRI)+' m</span>';
								}
											
								</script>
								<div id="afficher_RI" class="resultat"></div>
							</td>
						</tr>
					</table>
					
				</td>
				
				<td class="module">
					<h4>Contrôle des tracés sinueux</h4>
					
					<div class="cmath">
`( 50000 ) / R_(1) + ( 50000 ) / R_(2)`	
					</div>
					
					<table>
						<tr>
							<td>Rayon 1</td>
							<td><input type="text" id="ctsRayon1" size="5" oninput="cts()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Rayon 2</td>
							<td><input type="text" id="ctsRayon2" size="5" oninput="cts()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>
								<script>
						
								function cts() {
									
									var ctsRayon1 = parseInt(document.getElementById('ctsRayon1').value, 10);
									var ctsRayon2 = parseInt(document.getElementById('ctsRayon2').value, 10);
									 
									var cts = 50000 / ctsRayon1 + 50000 / ctsRayon2;
									
									if ( cts > 420 ) {						
										document.getElementById('afficher_cts').innerHTML = '<span>Le tracé est sinueux.</span>';
									}
									else {
										document.getElementById('afficher_cts').innerHTML = '<span>Le tracé n\'est pas sinueux.</span>';
									}
								}
											
								</script>
								<div id="afficher_cts" class="resultat"></div>
							</td>
						</tr>
					</table>
					
				</td>
				
			</tr>
			
			<tr id="tr_tab">
				
				<td class="module">
					<h4>Calcul d'une insuffisance</h4>
					
					<div class="cmath">
`I = ( 11,8 xx V^2 ) / R - d`	
					</div>
					
					<table>
						<tr>
							<td>Vitesse</td>
							<td><input type="text" id="insuffisanceVitesse" size="5" oninput="calculerInsuffisance()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Rayon</td>
							<td><input type="text" id="insuffisanceRayon" size="5" oninput="calculerInsuffisance()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Dévers</td>
							<td><input type="text" id="insuffisanceDevers" size="5" oninput="calculerInsuffisance()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>			
								<script>
								function calculerInsuffisance() {
									 
									var insuffisanceRayon = parseInt(document.getElementById('insuffisanceRayon').value, 10);
									var insuffisanceVitesse = parseInt(document.getElementById('insuffisanceVitesse').value, 10);
									var insuffisanceDevers = parseInt(document.getElementById('insuffisanceDevers').value, 10);
									 
									var insuffisance = 11.8 * Math.pow(insuffisanceVitesse, 2) / insuffisanceRayon - insuffisanceDevers;

									document.getElementById('afficher_insuffisance').innerHTML = '<span>I = '+Math.round(insuffisance)+' mm</span>';

									}
								</script>
								<div id="afficher_insuffisance" class="resultat"></div>
							</td>
						</tr>
					</table>
				</td>
				
				<td class="module">
					<h4>Discontinuité et variation d'insuffisance de dévers</h4>
					
					<div class="cmath">
`Delta i = abs(I_1 - I_2)`           ` ( Delta i ) / ( Delta t )  = ( Delta i xx V ) / ( 3,6 xx L_(RP) )`	

` ( Delta i ) / ( Delta t )  = ( Delta i xx V ) / ( 3,6 xx 20 )` si `L_(RP) = 0`

` ( Delta i ) / ( Delta t )  = ( Delta i xx V ) / ( 3,6 xx ( 20 + L_(RP) ) )` si `L_(RP) < 30`
					</div>
					
					<table>
						<tr>
							<td>I1 (signé)</td>
							<td><input type="text" id="discontinuiteI1" size="5" oninput="calculerDiscontinuite()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>I2 (signé)</td>
							<td><input type="text" id="discontinuiteI2" size="5" oninput="calculerDiscontinuite()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Vitesse</td>
							<td><input type="text" id="discontinuiteVitesse" size="5" oninput="calculerDiscontinuite()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Longueur du RP</td>
							<td><input type="text" id="discontinuiteRP" size="5" oninput="calculerDiscontinuite()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>
								<script>
								function calculerDiscontinuite() {
									var discontinuiteI1 = parseInt(document.getElementById('discontinuiteI1').value, 10);
									var discontinuiteI2 = parseInt(document.getElementById('discontinuiteI2').value, 10);
									var discontinuiteVitesse = parseInt(document.getElementById('discontinuiteVitesse').value, 10);
									var discontinuiteRP = parseInt(document.getElementById('discontinuiteRP').value, 10);
									 
									var variation = Math.abs(discontinuiteI2 - discontinuiteI1);
									if ( discontinuiteRP > 0 || discontinuiteRP < 30)
									{
										var discontinuite = discontinuite = variation * discontinuiteVitesse / ( 3.6 * ( 20 + discontinuiteRP ) );
									}
									else if ( discontinuiteRP == 0 || typeof discontinuiteRP !== "undefined" )
									{
										var discontinuite = discontinuite = variation * discontinuiteVitesse / ( 3.6 * 20 );
									}
									else
									{
										var discontinuite = variation * discontinuiteVitesse / (3.6 * discontinuiteRP);
									}

									document.getElementById('afficher_variation').innerHTML = '<span>ΔI = '+Math.round(variation)+' mm</span>';
									document.getElementById('afficher_discontinuite').innerHTML = '<span>ΔI / Δt = '+Math.round(discontinuite)+' mm/s</span>';
							
									}	
								</script>
								<div id="afficher_variation" class="resultat"></div>
								<div id="afficher_discontinuite" class="resultat"></div>
							</td>
						</tr>
					</table>									
				</td>
				
				<td class="module">
					<h4>Calcul de la longueur d'un RC</h4>
					
					<div class="cmath">
`L_(RC) =  R / 1000  xx abs(P_1 - P_2)`     
					</div>
					
					<table>
						<tr>
							<td>Rayon du RC (m)</td>
							<td><input type="text" id="rcRayon" size="5" oninput="calculerRC()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Pente amont (mm/m)</td>
							<td><input type="text" id="rcPenteAmont" size="5" oninput="calculerRC()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Pente aval (mm/m)</td>
							<td><input type="text" id="rcPenteAval" size="5" oninput="calculerRC()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>
								<script>
								function calculerRC(){
			 
									var rcRayon = parseInt(document.getElementById('rcRayon').value, 10);
									var rcPenteAmont = parseInt(document.getElementById('rcPenteAmont').value, 10);
									var rcPenteAval = parseInt(document.getElementById('rcPenteAval').value, 10);
									 
									var rcLongueur = rcRayon / 1000 * Math.abs(rcPenteAval - rcPenteAmont);

									document.getElementById('afficher_longueur_rc').innerHTML = '<span>La longueur du RC est de '+Math.round(rcLongueur)+' m</span>';
							
									}
								</script>
								<div id="afficher_longueur_rc" class="resultat"></div>
							</td>
						</tr>
					</table>	
				</td>
				
				<td class="module">
					<h4>Calcul du rayon d'un RC</h4>
					
					<div class="cmath">
`R = ( 2000 xx L_(tan) ) / abs(P_1 - P_2)` 	
					</div>
					
					<table>
						<tr>
							<td>Longueur tangente du RC</td>
							<td><input type="text" id="rayonrcLongueurTangente" size="5" oninput="calculerRayonRC()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Pente amont (mm/m)</td>
							<td><input type="text" id="rayonrcPenteAmont" size="5" oninput="calculerRayonRC()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>Pente aval (mm/m)</td>
							<td><input type="text" id="rayonrcPenteAval" size="5" oninput="calculerRayonRC()" onclick="this.select();"></td>
						</tr>
						<tr>
							<td>
								<script>
								function calculerRayonRC(){
			 
									var rayonrcLongueurTangente = parseInt(document.getElementById('rayonrcLongueurTangente').value, 10);
									var rayonrcPenteAmont = parseInt(document.getElementById('rayonrcPenteAmont').value, 10);
									var rayonrcPenteAval = parseInt(document.getElementById('rayonrcPenteAval').value, 10);
									 
									var rayonrc = 2000 * rayonrcLongueurTangente / Math.abs(rayonrcPenteAval - rayonrcPenteAmont);

									document.getElementById('afficher_rayon_rc').innerHTML = '<span>Le rayon du RC est de '+Math.round(rayonrc)+' m</span>';
							
									}
								</script>
								<div id="afficher_rayon_rc" class="resultat"></div>
							</td>
						</tr>
					</table>
				</td>
				
			</tr>
		
		</table>
		
		
	
	</body>

</html>