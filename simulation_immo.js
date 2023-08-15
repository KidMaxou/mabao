function mensualites () {
	var c = parseInt(document.getElementById("montantEmprunte").value, 10);
	
	var tPercent = parseFloat(Math.round(document.getElementById("tauxAnnee").value*100,2)/100); 
	var t = Math.round(tPercent/100*10000, 3)/10000;
	
	var tPercentAss = parseFloat(Math.round(document.getElementById("tauxAss").value*100,2)/100); 
	var tAss = Math.round(tPercent/100*10000, 3)/10000;
	
	var tGlobal = t + tAss;
	
	var nYears = parseInt(document.getElementById("dureeAnnee").value, 10);
	
	var nMonths = parseInt(document.getElementById("dureeMois").value, 10);
	if (nYears) {
		dureeMois.disabled = true;
	} else {
		dureeMois.disabled = false;
	}
	if (nMonths) {
		dureeAnnee.disabled = true;
	} else {
		dureeAnnee.disabled = false;
	}
	
	if (isNaN(nYears) === true) {
		var n = nMonths;
	} else {
		var n = nYears*12;
	}
	
	var m = Math.round((c*tGlobal/12)/(1-Math.pow((1+tGlobal/12),-n)), 0);
	
	if (isNaN(m) === true) {
		document.getElementById("afficher_mensualites").innerHTML = "<span>Remplir les champs correctement.</span>";
	} else {
		document.getElementById("afficher_mensualites").innerHTML = "<span>Mensualités = "+m+"€</span>";
	}
}

function nbOfMonthsBtw2Dates () {
	var dateDebut = new Date(document.getElementById("dateDebut").value);
	
	var dateDebutJour = dateDebut.getDate();
    var dateDebutMois = dateDebut.getMonth() + 1; // Les mois sont indexés à partir de 0
    var dateDebutAnnee = dateDebut.getFullYear();
	
	var dateFin = new Date(document.getElementById("dateFin").value);
	
	var dateFinJour = dateFin.getDate();
    var dateFinMois = dateFin.getMonth() + 1; // Les mois sont indexés à partir de 0
    var dateFinAnnee = dateFin.getFullYear();
	
	var nbMoisAnneeDebut = 12 - dateDebutMois;
	
	var nbMoisAnneeFin = dateFinMois;
	
	var nbMoisInter = 0;
	if (dateFinAnnee - dateDebutAnnee < 2) {
		nbMoisInter = 0;
	} else {
		nbMoisInter = (dateFinAnnee - dateDebutAnnee - 1)*12;
	}
	
	var duree = 0;
	if (dateDebutAnnee == dateFinAnnee) {
		duree = dateFinMois - dateDebutMois;
	} else {
		duree = nbMoisAnneeDebut + nbMoisAnneeFin + nbMoisInter;
	}
	
	if (isNaN(duree) === true) {
		document.getElementById("afficher_duree").innerHTML = "<span>Remplir les champs correctement.</span>";
	} else if (dateDebut > dateFin) {
		document.getElementById("afficher_duree").innerHTML = "<span>La date de début est plus récente que la date de fin.</span>";
	} else {
		document.getElementById("afficher_duree").innerHTML = duree;
	}

}




	
