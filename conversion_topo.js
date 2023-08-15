function calcul_L93_CC() {	
	var xL93 = parseFloat(document.getElementById('xL93').value);
	var yL93 = parseFloat(document.getElementById('yL93').value);

	var a = 6378137;
	var f = 1/298.257222101;
	var b = a*(1-f);
	var e = Math.sqrt((Math.pow(a, 2)-Math.pow(b, 2))/Math.pow(a, 2));
	var lambda0 = 3*(Math.PI/180);
	

	function L_phi_e(phi) {
		return 0.5*Math.log((1+Math.sin(phi))/(1-Math.sin(phi)))-e/2*Math.log((1+e*Math.sin(phi))/(1-e*Math.sin(phi)))
	}

	function n(phi1, phi2, L_phi1, L_phi2) {
		return Math.log(((a/Math.sqrt(1-Math.pow(e, 2)*Math.pow(Math.sin(phi2), 2)))*Math.cos(phi2))/((a/Math.sqrt(1-Math.pow(e, 2)*Math.pow(Math.sin(phi1), 2)))*Math.cos(phi1)))/(L_phi1-L_phi2);
	}

	function c(phi1, L_phi1, n) {
		return (a/Math.sqrt(1-Math.pow(e, 2)*Math.pow(Math.sin(phi1), 2))*Math.cos(phi1))/n*Math.exp(n*L_phi1);
	}

	var zone_CC = 41 + parseInt(document.getElementById("choixCC").value, 10);
	var phi_CC_deg = zone_CC;
	var phi_CC = zone_CC*(Math.PI/180);
	var phi1_CC = (zone_CC - 0.75)*(Math.PI/180);
	var phi2_CC = (zone_CC + 0.75)*(Math.PI/180);
	var E0_CC = 1700000;
	var N0_CC = (parseInt(document.getElementById("choixCC").value, 10) *1000000)+200000;
	
	var L_phi_e_CC = L_phi_e(phi_CC);
	var L_phi1_e_CC = L_phi_e(phi1_CC);
	var L_phi2_e_CC = L_phi_e(phi2_CC);
	var n_CC = n(phi1_CC, phi2_CC, L_phi1_e_CC, L_phi2_e_CC);
	var c_CC = c(phi1_CC, L_phi1_e_CC, n_CC);

	var phi_L93 = 46.5*(Math.PI/180);
	var phi1_L93 = 44*(Math.PI/180);
	var phi2_L93 = 49*(Math.PI/180);
	var E0_L93 = 700000;
	var N0_L93 = 6600000;
	var L_phi_e_L93 = L_phi_e(phi_L93);
	var L_phi1_e_L93 = L_phi_e(phi1_L93);
	var L_phi2_e_L93 = L_phi_e(phi2_L93);
	var n_L93 = n(phi1_L93, phi2_L93, L_phi1_e_L93, L_phi2_e_L93);
	var c_L93 = c(phi1_L93, L_phi1_e_L93, n_L93);
	var Xs_L93 = E0_L93;
	var Ys_L93 = N0_L93+c_L93*Math.exp(-n_L93*L_phi_e_L93);
	var gamma_L93 = Math.atan((xL93-Xs_L93)/(Ys_L93-yL93));
	var R_L93 = Math.sqrt(Math.pow((xL93-Xs_L93),2)+Math.pow((yL93-Ys_L93),2));

	var latitude_iso = -1/n_L93*Math.log(Math.abs(R_L93/c_L93));
	
	var lambda = lambda0+(gamma_L93/n_L93);

	let i=0;
	var phi_i_L93 = 2*Math.atan(Math.exp(latitude_iso))-Math.PI/2;
	do {
		var phi_i_L93 = 2*Math.atan( Math.pow( (1+e*Math.sin(phi_i_L93)) / (1-e*Math.sin(phi_i_L93)),e/2) * Math.exp(latitude_iso) )-Math.PI/2;
		i+=1;
	} while (i<6);

	var L_phi_i = L_phi_e(phi_i_L93);

	var R_CC = c_CC*Math.exp(-n_CC*L_phi_i);
	
	var gamma_CC = n_CC*(lambda-lambda0);

	var Xs_CC = E0_CC;
	var Ys_CC = N0_CC+c_CC*Math.exp(-n_CC*L_phi_e_CC);

	var X_CC = Math.round((Xs_CC+R_CC*Math.sin(gamma_CC))*1000)/1000;
	var Y_CC = Math.round((Ys_CC-R_CC*Math.cos(gamma_CC))*1000)/1000;
	
	document.getElementById('afficher_xCC').innerHTML = X_CC;
	document.getElementById('afficher_yCC').innerHTML = Y_CC;
	
	
	console.log('lambda = ' + lambda);
	document.getElementById('afficher_lambda').innerHTML = '&lambda; = ' + lambda;
	console.log('phi = ' + phi_i_L93);
	document.getElementById('afficher_phi2').innerHTML = '&phi; = ' + phi_i_L93;
	console.log('lambda0 = ' + lambda0);
	document.getElementById('afficher_lambda0').innerHTML = '&lambda;<sub>0</sub> = ' + lambda0;
	console.log('phi_CC = ' + phi_CC);
	document.getElementById('afficher_phi_CC').innerHTML = '&phi;<sub> CC</sub> = ' + phi_CC;
	console.log('phi1_CC = ' + phi1_CC);
	document.getElementById('afficher_phi1_CC').innerHTML = '&phi;<sub>1 CC</sub> = ' + phi1_CC;
	console.log('phi2_CC = ' + phi2_CC);
	document.getElementById('afficher_phi2_CC').innerHTML = '&phi;<sub>2 CC</sub> = ' + phi2_CC;
	console.log('E0_CC = ' + E0_CC);
	document.getElementById('afficher_E0_CC').innerHTML = 'E<sub>0 CC</sub> = ' + E0_CC;
	console.log('N0_CC = ' + N0_CC);
	document.getElementById('afficher_N0_CC').innerHTML = 'N<sub>0 CC</sub> = ' + N0_CC;
	console.log('L_phi_e_CC ' + L_phi_e_CC);
	document.getElementById('afficher_L_phi_e_CC').innerHTML = 'L<sub>&phi;<sub>e CC</sub></sub> = ' + L_phi_e_CC;
	console.log('L_phi1_e_CC ' + L_phi1_e_CC);
	document.getElementById('afficher_L_phi1_e_CC').innerHTML = 'L<sub>&phi;<sub>1, e CC</sub></sub> = ' + L_phi1_e_CC;
	console.log('L_phi2_e_CC ' + L_phi2_e_CC);
	document.getElementById('afficher_L_phi2_e_CC').innerHTML = 'L<sub>&phi;<sub>2, e CC</sub></sub> = ' + L_phi2_e_CC;
	console.log('n_CC ' + n_CC);
	document.getElementById('afficher_n_CC').innerHTML = 'n<sub> CC</sub> = ' + n_CC;
	console.log('c_CC ' + c_CC);
	document.getElementById('afficher_c_CC').innerHTML = 'c<sub> CC</sub> = ' + c_CC;
	console.log('Xs_CC ' + Xs_CC);
	document.getElementById('afficher_Xs_CC').innerHTML = 'X<sub>s CC</sub> = ' + Xs_CC;
	console.log('Ys_CC ' + Ys_CC);
	document.getElementById('afficher_Ys_CC').innerHTML = 'Y<sub>s CC</sub> = ' + Ys_CC;
	console.log('gamma_CC ' + gamma_CC);
	document.getElementById('afficher_gamma_CC').innerHTML = '&gamma;<sub> CC</sub> = ' + gamma_CC;
	console.log('phi_L93 ' + phi_L93);
	document.getElementById('afficher_phi_L93').innerHTML = '&phi;<sub> L93</sub> = ' + phi_L93;
	console.log('phi1_L93 ' + phi1_L93);
	document.getElementById('afficher_phi1_L93').innerHTML = '&phi;<sub>1 L93</sub> = ' + phi1_L93;
	console.log('phi2_L93 ' + phi2_L93);
	document.getElementById('afficher_phi2_L93').innerHTML = '&phi;<sub>2 L93</sub> = ' + phi2_L93;
	console.log('E0_L93 ' + E0_L93);
	document.getElementById('afficher_E0_L93').innerHTML = 'E<sub>0 L93</sub> = ' + E0_L93;
	console.log('N0_L93 ' + N0_L93);
	document.getElementById('afficher_N0_L93').innerHTML = 'N<sub>0 L93</sub> = ' + N0_L93;
	console.log('L_phi_e_L93 ' + L_phi_e_L93);
	document.getElementById('afficher_L_phi_e_L93').innerHTML = 'L<sub>&phi;<sub>e L93</sub></sub> = ' + L_phi_e_L93;
	console.log('L_phi1_e_L93 ' + L_phi1_e_L93);
	document.getElementById('afficher_L_phi1_e_L93').innerHTML = 'L<sub>&phi;<sub>1, e L93</sub></sub> = ' + L_phi1_e_L93;
	console.log('L_phi2_e_L93 ' + L_phi2_e_L93);
	document.getElementById('afficher_L_phi2_e_L93').innerHTML = 'L<sub>&phi;<sub>2, e L93</sub></sub> = ' + L_phi2_e_L93;
	console.log('n_L93 ' + n_L93);
	document.getElementById('afficher_n_L93').innerHTML = 'n<sub> L93</sub> = ' + n_L93;
	console.log('c_L93 ' + c_L93);
	document.getElementById('afficher_c_L93').innerHTML = 'c<sub> L93</sub> = ' + c_L93;
	console.log('Xs_L93 ' + Xs_L93);
	document.getElementById('afficher_Xs_L93').innerHTML = 'X<sub>s L93</sub> = ' + Xs_L93;
	console.log('Ys_L93 ' + Ys_L93);
	document.getElementById('afficher_Ys_L93').innerHTML = 'Y<sub>s L93</sub> = ' + Ys_L93;
	console.log('gamma_L93 ' + gamma_L93);
	document.getElementById('afficher_gamma_L93').innerHTML = '&gamma;<sub> L93</sub> = ' + gamma_L93;
	console.log('R_L93 ' + R_L93);
	document.getElementById('afficher_R_L93').innerHTML = 'R<sub>L93</sub> = ' + R_L93;
	console.log('latitude_iso ' + latitude_iso);
	document.getElementById('afficher_latitude_iso').innerHTML = '£ = ' + latitude_iso;
	console.log('phi_i_L93 ' + phi_i_L93);
	document.getElementById('afficher_phi_i_L93').innerHTML = '&phi;<sub> i L93</sub> = ' + phi_i_L93;
	console.log('L_phi_i ' + L_phi_i);
	document.getElementById('afficher_L_phi_i').innerHTML = 'L<sub>&phi;<sub>i</sub></sub> = ' + L_phi_i;
	console.log('R_CC ' + R_CC);
	document.getElementById('afficher_R_CC').innerHTML = 'R<sub>CC</sub> = ' + R_CC;
	console.log('X_CC ' + X_CC);
	console.log('Y_CC ' + Y_CC);
}

function calcul_CC_L93() {	
	var xCC = parseFloat(document.getElementById('xCC').value);
	var yCC = parseFloat(document.getElementById('yCC').value);

	var a = 6378137;
	var f = 1/298.257222101;
	var b = a*(1-f);
	var e = Math.sqrt((Math.pow(a, 2)-Math.pow(b, 2))/Math.pow(a, 2));
	var lambda0 = 3*(Math.PI/180);

	function L_phi_e(phi) {
		return 0.5*Math.log((1+Math.sin(phi))/(1-Math.sin(phi)))-e/2*Math.log((1+e*Math.sin(phi))/(1-e*Math.sin(phi)))
	}

	function n(phi1, phi2, L_phi1, L_phi2) {
		return Math.log(((a/Math.sqrt(1-Math.pow(e, 2)*Math.pow(Math.sin(phi2), 2)))*Math.cos(phi2))/((a/Math.sqrt(1-Math.pow(e, 2)*Math.pow(Math.sin(phi1), 2)))*Math.cos(phi1)))/(L_phi1-L_phi2);
	}

	function c(phi1, L_phi1, n) {
		return (a/Math.sqrt(1-Math.pow(e, 2)*Math.pow(Math.sin(phi1), 2))*Math.cos(phi1))/n*Math.exp(n*L_phi1);
	}

	var zone_CC = 41 + parseInt(document.getElementById("choixCC").value, 10);
	var phi_CC_deg = zone_CC;
	var phi_CC = zone_CC*(Math.PI/180);
	var phi1_CC = (zone_CC - 0.75)*(Math.PI/180);
	var phi2_CC = (zone_CC + 0.75)*(Math.PI/180);
	var E0_CC = 1700000;
	var N0_CC = (parseInt(document.getElementById("choixCC").value, 10) *1000000)+200000;
	
	var L_phi_e_CC = L_phi_e(phi_CC);
	var L_phi1_e_CC = L_phi_e(phi1_CC);
	var L_phi2_e_CC = L_phi_e(phi2_CC);
	var n_CC = n(phi1_CC, phi2_CC, L_phi1_e_CC, L_phi2_e_CC);
	var c_CC = c(phi1_CC, L_phi1_e_CC, n_CC);
	
	var Xs_CC = E0_CC;
	var Ys_CC = N0_CC+c_CC*Math.exp(-n_CC*L_phi_e_CC);
	var R_CC = Math.sqrt(Math.pow((xCC-Xs_CC),2)+Math.pow((yCC-Ys_CC),2));
	var gamma_CC = Math.atan((xCC-Xs_CC)/(Ys_CC-yCC));
	var latitude_iso = -1/n_CC*Math.log(Math.abs(R_CC/c_CC));
	
	var lambda = lambda0+(gamma_CC/n_CC);
	var lambda_deg = lambda*(180/Math.PI);
	
	let i=0;
	var phi = 2*Math.atan(Math.exp(latitude_iso))-Math.PI/2;
	do {
		var phi1 = phi
		var phi = 2*Math.atan( Math.pow( (1+e*Math.sin(phi1)) / (1-e*Math.sin(phi1)),e/2) * Math.exp(latitude_iso) )-Math.PI/2;
		i+=1;
	} while (i<6);
	var phi_deg = phi*(180/Math.PI);
	
	var E0_L93 = 700000;
	var N0_L93 = 6600000;
	
	var phi_L93 = 46.5*(Math.PI/180);
	var phi1_L93 = 44*(Math.PI/180);
	var phi2_L93 = 49*(Math.PI/180);
	
	var L_phi_e_L93 = L_phi_e(phi_L93);
	var L_phi1_e_L93 = L_phi_e(phi1_L93);
	var L_phi2_e_L93 = L_phi_e(phi2_L93);
	
	var n_L93 = n(phi1_L93, phi2_L93, L_phi1_e_L93, L_phi2_e_L93);
	var c_L93 = c(phi1_L93, L_phi1_e_L93, n_L93);
	
	var Xs_L93 = E0_L93;
	var Ys_L93 = N0_L93+c_L93*Math.exp(-n_L93*L_phi_e_L93);
	
	var gamma_L93 = n_L93*(lambda-lambda0);
	var R_L93 = c_L93*Math.exp(-n_L93*L_phi_e(phi));

	var X_L93 = Math.round((Xs_L93+R_L93*Math.sin(gamma_L93))*1000)/1000;
	var Y_L93 = Math.round((Ys_L93-R_L93*Math.cos(gamma_L93))*1000)/1000;
	
	document.getElementById('afficher_xL93').innerHTML = X_L93;
	document.getElementById('afficher_yL93').innerHTML = Y_L93;
	
	console.log('lambda = ' + lambda);
	document.getElementById('afficher_lambda2').innerHTML = '&lambda; = ' + lambda + ' soit ' + lambda_deg + '°' ;
	console.log('phi = ' + phi);
	document.getElementById('afficher_phi').innerHTML = '&phi; = ' + phi + ' soit ' + phi_deg + '°';
	
}




