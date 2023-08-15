<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>MA-BAO - Diagnostic risque quai</title>
		
		<style>		
			.rfo {
				background-color : red;
				color : white;
				font-weight : bold;
				font-size : 20px;
			}
			
			.rfa {
				background-color : yellow;
				color : black;
				font-weight : bold;
				font-size : 20px;
			}
			
			.rtf {
				background-color : blue;
				color : white;
				font-weight : bold;
				font-size : 20px;
			}
			
			.rn {
				background-color : grey;
				color : white;
				font-weight : bold;
				font-size : 20px;
			}
		
		</style>
		
    </head>
    
    <body>
        
        <div id="bloc_page">

            <?php include('header.php'); ?>    
            
            <section>

                <article>
                    
					<h2><u>Boîte à outils : Ingénierie ferroviaire</u></h2><h3>Diagnostic du risque d'un quai</h3>
		<a href="index.php">Retour à la page principale</a>
		
		<p>
		Cette feuille de calcul a pour objectif de définir la classification du risque en fonction du niveau de non-conformité du quai selon l'IN 07431 version 1 du 4 février 2013.
		</p>
		
		<table>
			<tr>
				<td>
					<select id="hauteurNominale" oninput="conformite()">
						<option>Choisir une hauteur de quai nominale</option>
						<option value="300">Bas 300</option>
						<option value="385">Bas 385</option>
						<option value="500">Mi-Haut 500</option>
						<option value="550">Mi-Haut 550</option>
						<option value="760">Haut 760</option>
						<option value="920">Haut 920</option>
						<option value="1150">Haut 1150</option>
					</select>
				</td>
				<td>Non conformité en l</td>
				<td>Non conformité en h</td>
			</tr>
			<tr>
				<td>
					Hauteur de quai exacte (mm)					
				</td>
				<td>
					<input type="radio" id="conforme_l" name="conformite_l" value="C_l" onchange="conformite()">
					<label for="conforme_l">C</label>
				</td>
				<td>
					<input type="radio" id="conforme_h" name="conformite_h" value="C_h" onchange="conformite()">
					<label for="conforme_h">C</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="hauteurExacte" oninput="conformite()">
				</td>
				<td>
					<input type="radio" id="n1_l" name="conformite_l" value="N1_l" onchange="conformite()">
					<label for="n1_l">N1</label>
				</td>
				<td>
					<input type="radio" id="n1_h" name="conformite_h" value="N1_h" onchange="conformite()">
					<label for="n1_h">N1</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<input type="radio" id="n2_l" name="conformite_l" value="N2_l" onchange="conformite()">
					<label for="n2_l">N2</label>
				</td>
				<td>
					<input type="radio" id="n2_h" name="conformite_h" value="N2_h" onchange="conformite()">
					<label for="n2_h">N2</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<input type="radio" id="n3_l" name="conformite_l" value="N3_l" onchange="conformite()">
					<label for="n3_l">N3</label>
				</td>
				<td>
					<input type="radio" id="n3_h" name="conformite_h" value="N3_h" onchange="conformite()">
					<label for="n3_h">N3</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<input type="radio" id="n4_l" name="conformite_l" value="N4_l" onchange="conformite()">
					<label for="n4_l">N4</label>
				</td>
				<td>
					<input type="radio" id="n4_h" name="conformite_h" value="N4_h" onchange="conformite()">
					<label for="n4_h">N4</label>
				</td>
			</tr>
			<tr>
				<td>
					<script>
						
						function conformite() {
							
							var hauteurNominale = parseInt(document.getElementById('hauteurNominale').value, 10);
							var hauteurExacte = parseInt(document.getElementById('hauteurExacte').value, 10);
												
							var bouton_l = document.getElementsByName('conformite_l');
							var valeur_l;
							for ( var i = 0; i < bouton_l.length; i++ ){
								if(bouton_l[i].checked){
								valeur_l = bouton_l[i].value;
								}
							}
							
							var bouton_h = document.getElementsByName('conformite_h');
							var valeur_h;
							for ( var i = 0; i < bouton_h.length; i++ ){
								if(bouton_h[i].checked){
								valeur_h = bouton_h[i].value;
								}
							}															
							
							if ( hauteurNominale == 300 || hauteurNominale == 385 ) {
								if ( valeur_l == "N4_l" || valeur_h == "N4_h" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_l == "N3_l" && valeur_h == "N3_h" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_h == "N3_h" && hauteurNominale == 300 ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_h == "N3_h" && hauteurNominale == 385 ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_l == "N3_l" && hauteurExacte > 400 ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_l == "N3_l" && ( hauteurExacte >= 375 && hauteurExacte <= 400 ) ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_l == "N3_l" && ( hauteurExacte >= 265 && hauteurExacte < 375 ) ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_l == "N3_l" && hauteurExacte <= 265 ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rtf">Risque très faible</span>';
								}
								else if ( valeur_l == "N2_l" && valeur_h == "N2_h" && hauteurExacte <= 400 ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_l == "N2_l" && valeur_h == "N2_h" && hauteurExacte > 400 ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_l == "N2_l" && ( valeur_h == "C_h" || valeur_h == "N1_h" ) ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_h == "N2_h" && ( valeur_l == "C_l" || valeur_l == "N1_l" ) &&  hauteurExacte <= 400 ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_h == "N2_h" && ( valeur_l == "C_l" || valeur_l == "N1_l" ) &&  hauteurExacte > 400 ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_l == "N1_l" && valeur_h == "N1_h" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rn">Risque nul</span>';
								}
								else if ( valeur_h == "N1_h" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_l == "N1_l" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rn">Risque nul</span>';
								}
								else if ( valeur_l == "C_l" && valeur_h == "C_h" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rn">Risque nul</span>';
								}
								else {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rn">Risque nul</span>';
								}
							}
							else if ( hauteurNominale == 500 || hauteurNominale == 550 ) {
								if ( valeur_l == "N4_l" || valeur_l == "N3_l" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_l == "N2_l" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_l == "N1_l" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rn">Risque nul</span>';
								}	
								else if ( valeur_h == "N4_h" || valeur_h == "N3_h" || valeur_h == "N2_h" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rn">Risque nul</span>';
								}
							}
							else if ( hauteurNominale == 760 || hauteurNominale == 920 || hauteurNominale == 1150 ) {
								if ( valeur_l == "N4_l" || valeur_l == "N3_l" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfo">Risque fort</span>';
								}
								else if ( valeur_l == "N2_l" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_l == "N1_l" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rn">Risque nul</span>';
								}	
								else if ( valeur_h == "N4_h" || valeur_h == "N3_h" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rfa">Risque faible</span>';
								}
								else if ( valeur_h == "N2_h" ) {
									document.getElementById('afficher_resultat').innerHTML = '<span class="rtf">Risque très faible</span>';
								}								
								else {
								document.getElementById('afficher_resultat').innerHTML = '<span class="rn">Risque nul</span>';
								}				
							}
							else {
								document.getElementById('afficher_resultat').innerHTML = '<p>Erreur</p>';
							}
							
						}
											
					</script>
						
					<div id="afficher_resultat"></div>
					
				</td>
			</tr>
		
		</table>
                    
                </article>
                
                <?php include('menu.php'); ?>

            </section>
            
            <?php include('footer.php'); ?>
            
        </div>
    </body>
</html>



	
		
	
	</body>

</html>