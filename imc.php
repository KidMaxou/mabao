<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>MA-BAO - Calcul de l'IMC</title>
    </head>
    
    <body>
        
        <div id="bloc_page">

            <?php include('header.php'); ?>    
            
            <section>

                <article>
                    <script>
		
		function calculer()
			{
			 
				var taille = document.getElementById('taille').value;
				var masse = document.getElementById('masse').value;
				 
				var calcul = masse / Math.pow(taille, 2);
				
				if ( calcul < 16 )
				{
					document.getElementById('afficher_result').innerHTML = '<p>Votre IMC est de '+calcul.toFixed(1)+' kg/m².</p>';
				}
				else if ( calcul >= 16 && calcul < 18.5	)
				{
					document.getElementById('afficher_result').innerHTML = '<p>Votre IMC est de '+calcul.toFixed(1)+' kg/m².</p>';				
				}
				else if ( calcul >= 18.5 && calcul < 25	)
				{
					document.getElementById('afficher_result').innerHTML = '<p>Votre IMC est de '+calcul.toFixed(1)+' kg/m².</p>';								
				}
				else if ( calcul >= 25 && calcul < 30 )
				{
					document.getElementById('afficher_result').innerHTML = '<p>Votre IMC est de '+calcul.toFixed(1)+' kg/m².</p>';				
				}
				else if ( calcul >= 30 && calcul < 35	)
				{
					document.getElementById('afficher_result').innerHTML = '<p>Votre IMC est de '+calcul.toFixed(1)+' kg/m².</p>';								
				}
				else if ( calcul >= 35 && calcul < 40	)
				{
					document.getElementById('afficher_result').innerHTML = '<p>Votre IMC est de '+calcul.toFixed(1)+' kg/m².</p>';								
				}
				else
				{
					document.getElementById('afficher_result').innerHTML = '<p>Votre IMC est de '+calcul.toFixed(1)+' kg/m².</p>';								
				}
			}
		</script>
		
		<table>
			<tr>
				<td>< 16</td>
				<td>Dénutrition</td>
			</tr>
			<tr>
				<td>16 à 18.5</td>
				<td>Maigreur</td>
			</tr>
			<tr>
				<td>18.5 à 25</td>
				<td>Normal</td>
			</tr>
			<tr>
				<td>25 à 30</td>
				<td>Surpoids</td>
			</tr>
			<tr>
				<td>30 à 35</td>
				<td>Obésité modérée</td>
			</tr>
			<tr>
				<td>35 à 40</td>
				<td>Obésité élevée</td>
			</tr>
			<tr>
				<td>> 40</td>
				<td>Obésité morbide</td>
			</tr>
		</table>
		
		<p>
		
			Votre taille en m : <input type="text" id="taille"/></br>
			Votre poids en kg : <input type="text" id="masse"/></br>
			<input type="button" onClick="calculer();" value="Valider"/>
			
		</p>
		
		<div id="afficher_result"></div>
                    
                </article>
                
                <?php include('menu.php'); ?>

            </section>
            
            <?php include('footer.php'); ?>
            
        </div>
    </body>
</html>