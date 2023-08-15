<!DOCTYPE html>
<html>

 <head>
 
  <title>Simulation immobilier</title>
  <script src="simulation_immo.js"></script>
  
 </head>
 
 <body>
  
  <h1>Simulation immobilier</h1><a href="index.php">Retour à la page principale</a>
  
  <h2>Calculer les mensualités</h2>
  
  <table> <!-- Calcul des mensualités -->
	<tr>
		<td>Montant</td>
		<td>Taux du prêt</td>
		<td>Taux de l'assurance</td>
		<td>Durée en années</td>
		<td>Durée en mois</td>
	</tr>
	<tr>
	    <td><input type="text" id="montantEmprunte" size="7" onclick="this.select();" oninput="mensualites()" value="111396"/></td>
	    <td><input type="text" id="tauxAnnee" size="7" onclick="this.select();" oninput="mensualites()" value="1.35"/></td>
		<td><input type="text" id="tauxAss" size="7" onclick="this.select();" oninput="mensualites()" value="0.38"/></td>
	    <td><input type="text" id="dureeAnnee" size="7" onclick="this.select();" oninput="mensualites()"/></td>
		<td><input type="text" id="dureeMois" size="7" onclick="this.select();" oninput="mensualites()"/></td>
	</tr>
  </table>
  <div id="afficher_mensualites"></div>
  
  <h2>Calculer le nombre de mois entre deux dates</h2>
  
  <table> <!-- Calcul du nombre d'échéances -->
	<tr>
		<td>Début</td>
		<td>Fin</td>
		<td>Nombre de mois</td>
	</tr>
	<tr>
	    <td><input type="date" id="dateDebut" oninput="nbOfMonthsBtw2Dates()"/></td>
	    <td><input type="date" id="dateFin" oninput="nbOfMonthsBtw2Dates()"/></td>
		<td><div id="afficher_duree"></div></td>
	</tr>
  </table>
  
 </body>
 
</html>