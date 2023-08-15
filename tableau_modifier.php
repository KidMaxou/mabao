<!DOCTYPE html>
<html>

<head>

    <title>Tableau à modifier</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
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
		
		</style>
	
</head>

<body>

	<h2><u>Boîte à outils : Ingénierie ferroviaire</u></h2><h3>Outil de génération des diagrammes</h3>
	<a href="index.php">Retour à la page principale</a>

		
	<form method="post" action="diagramme.php" name="form">
	
		<table>
			<tr>
			<?php
				echo '<td>Vitesse =</td><td><input type="text" name="Vitesse" value="' . $_POST['Vitesse'] . '"></td>';
			?>
			</tr>
		</table>
	
		<table id="elts">
		<tr>
			<th>Nature</th>
			<th>Longueur</th>
			<th>Rayon</th>
			<th>Dévers</th>
		</tr>
		<?php	
			$p = 1;
			$pi = 1;
			while (isset($_POST['Nature_' . $p]))
			{
				while (!isset($_POST['Nature_' . ($p+$pi)]) AND $p+$pi <= $_POST['nbElt'])
				{	
					$pi++;
				}
					
				echo '<script>var newRow2 = document.createElement(\'tr\');</script>';
				
				if ($_POST['Nature_' . $p] =="AL")
				{
					echo '<script>newRow2.innerHTML =\'<td><select name="Nature_' . $p .'"><option value="D">Choisir un type</option><option value="AL" selected>Alignement</option><option value="C">Courbe</option><option value="RP">Raccordement progressif</option></select></td>\';</script>';
				}
				elseif ($_POST['Nature_' . $p] =="C")
				{
					echo '<script>newRow2.innerHTML =\'<tr><td><select name="Nature_' . $p .'"><option value="D">Choisir un type</option><option value="AL">Alignement</option><option value="C" selected>Courbe</option><option value="RP">Raccordement progressif</option></select></td>\';</script>';				
				}
				else
				{
					echo '<script>newRow2.innerHTML =\'<tr><td><select name="Nature_' . $p .'"><option value="D">Choisir un type</option><option value="AL">Alignement</option><option value="C">Courbe</option><option value="RP" selected>Raccordement progressif</option></select></td>\';</script>';
				}
				echo '<script>newRow2.innerHTML +=\'<td><input type="text" name="Longueur_' . $p .'" value="' . $_POST['Longueur_' . $p] . '"></td>\';</script>';
				echo '<script>newRow2.innerHTML +=\'<td><input type="text" name="Rayon_' . $p .'" value="' . $_POST['Rayon_' . $p] . '"></td>\';</script>';
				echo '<script>newRow2.innerHTML +=\'<td><input type="text" name="Devers_' . $p .'" value="' . $_POST['Devers_' . $p] . '"></td>\';</script>';
				echo '<script>newRow2.innerHTML +=\'<td><input type="button" id="add_elt()" onClick="addElt()" value="+" /><input type="button" value="-" onclick="removeElt(this.parentNode)"/></td>\';</script>';
				
				echo '<script>document.getElementById(\'elts\').appendChild(newRow2);</script>';
				
				$p++;
			}		
		?>		
	</table>
	
		<?php
	
		echo '<script>var n =' . $p . ';</script>'; 
		$q = $p - 1;
		echo '<script>var d =' . $q . ';</script>'; 
	
	?>
	
		<script>
	
	function desactiverRA () 
		{
			document.forms["form"].elements["Nature_"+d] = "AL";
			if(document.forms["form"].elements["Nature_"+d].value != "C")
			{
				document.forms["form"].elements["Rayon_"+d].disabled=true;
			}
			else
			{
				document.forms["form"].elements["Rayon_"+d].disabled=false;
			}	
			
			console.log('var d de desactiverRA = ' +d);
		} 
				
    function addElt()
        {
					
            if (n != -1)
            {
								
                var newRow = document.createElement('tr');
				
                newRow.innerHTML = '<td><select name="Nature_'+n+'" id="nature" onchange="desactiverRA()"><option value="D">Choisir un type</option><option value="AL">Alignement</option><option value="C">Courbe</option><option value="RP">Raccordement progressif</option></select></td>'								
				newRow.innerHTML += '<td><input type="text" name="Longueur_'+n+'" autocomplete="off"></td>'
                newRow.innerHTML += '<td><input type="text" name="Rayon_'+n+'" autocomplete="off"></td>'
				newRow.innerHTML += '<td><input type="text" name="Devers_'+n+'" autocomplete="off"></td>'
                newRow.innerHTML += '<td><input type="button" id="add_elt()" onClick="addElt()" value="+" /><input type="button" value="-" onclick="removeElt(this.parentNode)"/></td>'
				
                document.getElementById('elts').appendChild(newRow);
                n++;
				d++;
				console.log('var n de addElt = ' +n);
							
            }
			
        }
 
    function removeElt(element)
        {
            document.getElementById('elts').removeChild(element.parentNode);
            n--;
			d--;
        }
		

		
	</script> 

		<input type="button" id="add_elt()" onClick="addElt()" value="+" /></br></br></br>
		<?php echo '<input type="hidden" name="nbElt" id="nbElt" value="" />'; ?>
		<script>document.getElementById("nbElt").value=n;</script>
		
		<?php echo '<input type="submit" name="Submit" value="Soumettre"/>'; ?>	

	</form>
	
</body>
</html>