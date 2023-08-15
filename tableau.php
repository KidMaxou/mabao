<!DOCTYPE html>
<html>
<head>
    <title>Tableau</title>
	
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
		
		</style>
	
</head>

<body>
	
	<h2><u>Boîte à outils : Ingénierie ferroviaire</u></h2><h3>Outil de génération des diagrammes</h3>
	<a href="index.php">Retour à la page principale</a>

	<form method="post" action="diagramme.php" name="form">
	<table>
		<tr>
		<td>Vitesse =</td><td><input type="text" name="Vitesse"></td>
		</tr>
	</table>
	<table id="elts">
		<tr>
			<th>Nature</th>
			<th>Longueur</th>
			<th>Rayon</th>
			<th>Dévers</th>
		</tr>
		
	</table>
	
	<script>
	var n = 1;
	
	function desactiverRA () 
		{
			var d = 1;
			while (d < (n + 1)) {
				if(document.forms["form"].elements["Nature_"+d].value == "AL")
				{
					document.forms["form"].elements["Rayon_"+d].disabled = true;
					document.forms["form"].elements["Devers_"+d].disabled = true;
				}
				else if (document.forms["form"].elements["Nature_"+d].value == "RP")
				{
					document.forms["form"].elements["Rayon_"+d].disabled = true;
					document.forms["form"].elements["Devers_"+d].disabled = true;
				}
				else
				{
					document.forms["form"].elements["Rayon_"+d].disabled = false;
					document.forms["form"].elements["Devers_"+d].disabled = false;
				}
				d++;
				console.log(d);
			}	
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
							
            }
			
        }
 
    function removeElt(element)
        {
            document.getElementById('elts').removeChild(element.parentNode);
            n--;
        }
		
	</script> 


		<input type="button" id="add_elt()" onClick="addElt()" value="+" /></br></br></br>
		<?php echo '<input type="hidden" name="nbElt" id="nbElt" value="" />'; ?>
		<script>document.getElementById("nbElt").value=n;</script>
		<input type="submit" name="Submit" value="Soumettre"/>

	</form>
	

	
</body>
</html>