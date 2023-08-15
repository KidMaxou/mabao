<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
		<link href="conversion_topo.css" rel="stylesheet" type="text/css">
		<script src="conversion_topo.js"></script>
		<script async="true" src="https://cdn.jsdelivr.net/npm/mathjax@2/MathJax.js?config=AM_CHTML"> </script>
		
        <title>MA-BAO - Conversions topographiques</title>
    </head>
    
    <body>
        
        <div id="bloc_page">

            <?php include('header.php'); ?>    
            
            <section>

                <article>
				
					<div>
						<h1>Conversion topographique</h1>
						<h3>Convertir RGF93 - Lambert93 vers RGF93 - CC</h3>
					</div>
					
					<div id="global">
					
						<div id="gauche">
						
							<table id="tabConversion">
								<tr>
									<td></td>
									<td><h4>Lambert93</h4></td>
									<td>
										<h4>
											CC
											<select name="coniqueConforme" id="choixCC" size="1" oninput="calcul_L93_CC()">
												<option value="">--</option>
												<option value="1">42</option>
												<option value="2">43</option>
												<option value="3">44</option>
												<option value="4">45</option>
												<option value="5">46</option>
												<option value="6">47</option>
												<option value="7">48</option>
												<option value="8">49</option>
												<option value="9">50</option>
											</select>
										</h4>
									</td>
								</tr>
								<tr>
									<td>X = </td>
									<td><input type="text" id="xL93" size="10" oninput="calcul_L93_CC()" onclick=""></td>
									<td><div id="afficher_xCC"></div></td>
								</tr>
								<tr>
									<td>Y = </td>
									<td><input type="text" id="yL93" size="10" oninput="calcul_L93_CC()" onclick=""></td>
									<td><div id="afficher_yCC"></div></td>
								</tr>
							</table>
						
							<p>Les valeurs qui s'affichent ci-dessous sont les différents paramètres nécessaire au calcul de la conversion.</p>
						
							<div id="afficher_lambda"></div>
							<div id="afficher_phi2"></div>
							<div id="afficher_lambda0"></div>
							<div id="afficher_phi_CC"></div>
							<div id="afficher_phi1_CC"></div>
							<div id="afficher_phi2_CC"></div>
							<div id="afficher_E0_CC"></div>
							<div id="afficher_N0_CC"></div>
							<div id="afficher_L_phi_e_CC"></div>
							<div id="afficher_L_phi1_e_CC"></div>
							<div id="afficher_L_phi2_e_CC"></div>
							<div id="afficher_n_CC"></div>
							<div id="afficher_c_CC"></div>
							<div id="afficher_Xs_CC"></div>
							<div id="afficher_Ys_CC"></div>
							<div id="afficher_gamma_CC"></div>
							<div id="afficher_phi_L93"></div>
							<div id="afficher_phi1_L93"></div>
							<div id="afficher_phi2_L93"></div>
							<div id="afficher_E0_L93"></div>
							<div id="afficher_N0_L93"></div>
							<div id="afficher_L_phi_e_L93"></div>
							<div id="afficher_L_phi1_e_L93"></div>
							<div id="afficher_L_phi2_e_L93"></div>
							<div id="afficher_n_L93"></div>
							<div id="afficher_c_L93"></div>
							<div id="afficher_Xs_L93"></div>
							<div id="afficher_Ys_L93"></div>
							<div id="afficher_gamma_L93"></div>
							<div id="afficher_R_L93"></div>
							<div id="afficher_latitude_iso"></div>
							<div id="afficher_phi_i_L93"></div>
							<div id="afficher_L_phi_i"></div>
							<div id="afficher_R_CC"></div>

						</div>
						
						<div id="droite">
						
							<table id="tabConversion">
								<tr>
									<td></td>
									<td>
										<h4>
											CC
											<select name="coniqueConforme" id="choixCC" size="1" oninput="calcul_CC_L93()">
												<option value="">--</option>
												<option value="1">42</option>
												<option value="2">43</option>
												<option value="3">44</option>
												<option value="4">45</option>
												<option value="5">46</option>
												<option value="6">47</option>
												<option value="7">48</option>
												<option value="8">49</option>
												<option value="9">50</option>
											</select>
										</h4>
									</td>
									<td><h4>Lambert93</h4></td>
								</tr>
								<tr>
									<td>X = </td>
									<td><input type="text" id="xCC" size="10" oninput="calcul_CC_L93()" onclick=""></td>
									<td><div id="afficher_xL93"></div></td>
								</tr>
								<tr>
									<td>Y = </td>
									<td><input type="text" id="yCC" size="10" oninput="calcul_CC_L93()" onclick=""></td>
									<td><div id="afficher_yL93"></div></td>
								</tr>
							</table>
						
							<p>Les valeurs qui s'affichent ci-dessous sont les différents paramètres nécessaire au calcul de la conversion.</p>
						
							<div id="afficher_lambda2"></div>
							<div id="afficher_phi"></div>
							
						
						</div>
					
					</div>

                </article>
                
                <?php include('menu.php'); ?>

            </section>
            
            <?php include('footer.php'); ?>
            
        </div>
    </body>
</html>



<body>

	

</body>

</html>