<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Calcul du dégarnissage</title>
    </head>
    
    <body>
        
        <div id="bloc_page">

            <?php include('header.php'); ?>    
            
            <section>

                <article>
                    
                <script>	
		function calculer()
			{		
				var rail_existant = parseInt(document.getElementById('rail_existant').value, 10);
				var rail_projet = parseInt(document.getElementById('rail_projet').value, 10);
				var traverse_existante = parseInt(document.getElementById('traverse_existante').value, 10);
				var traverse_projet = parseInt(document.getElementById('traverse_projet').value, 10);
				var ballast = parseInt(document.getElementById('ballast').value, 10);
				var rel = parseInt(document.getElementById('rel').value, 10);
						
				console.log(rail_existant);
				var calcul = rail_projet + traverse_projet + ballast - rel - rail_existant - traverse_existante;

				document.getElementById('afficher_result').innerHTML = '<p>La valeur de dégarnissage sous NIT est de '+calcul+' mm</p>';	 								 
			}
		</script>
	
		<h2><u>Boîte à outils : Ingénierie ferroviaire</u></h2><h3>Calcul du dégarnissage</h3>
		<a href="index.php">Retour à la page principale</a>
		
		<table>
			<tr>
				<th></th>
				<th>Armement existant</th>
				<th></th>
				<th>Armement projet</th>
				<th></th>
			</tr>
			<tr>
				<td>Rail</td>
				<td>
					<select id="rail_existant" oninput="calculer();">
						<option>Choisir un rail</option>
						<option value="145">46kg</option>
						<option value="153">50kg</option>
						<option value="172">60kg</option>
					</select>
				</td>
				<td></td>
				<td>
					<select id="rail_projet" oninput="calculer();">
						<option>Choisir un rail</option>
						<option value="145">46kg</option>
						<option value="153">50kg</option>
						<option value="172">60kg</option>
					</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Traverse</td>
				<td>
					<select name="traverse_existante" id="traverse_existante" oninput="calculer();">
						<option>Choisir une traverse</option>
						<option value="135">Bois sans selles</option>
						<option value="155">Bois avec selles</option>
						<option value="149">Béton classe 1</option>
						<option value="179">Béton classe 2</option>
						<option value="200">Béton classe 3</option>
						<option value="229">Béton classe 4</option>
						<option value="179">M 240</option>
						<option value="231">S 376 IP</option>
					</select>
				</td>
				<td></td>
				<td>
					<select id="traverse_projet" oninput="calculer();">
						<option>Choisir une traverse</option>
						<option value="135">Bois sans selles</option>
						<option value="155">Bois avec selles</option>
						<option value="149">Béton classe 1</option>
						<option value="179">Béton classe 2</option>
						<option value="200">Béton classe 3</option>
						<option value="229">Béton classe 4</option>
						<option value="179">M 240</option>
						<option value="231">S 376 IP</option>
					</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Hauteur de ballast</td>
				<td></td>
				<td></td>
				<td><input type="text" id="ballast" oninput="calculer();"></td>
				<td></td>
			</tr>
			<tr>
				<td>Relevage / Abaissement</td>
				<td></td>
				<td></td>
				<td><input type="text" id="rel" oninput="calculer();"></td>
				<td></td>
			</tr>
		</table>
		
		<div id="afficher_result"></div>
					
					
                </article>
                
                <?php include('menu.php'); ?>

            </section>
            
            <?php include('footer.php'); ?>
            
        </div>
    </body>
</html>