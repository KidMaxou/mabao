<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>MA-BAO - Module de conversion</title>
		
		<style>
			
			.module {
				width : 400px;
				height : 300px;
				margin-top : 0;
				border:1px solid black;
				padding : 15px;
				float : left;
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
			
			#input1 {
				float : left;
			}
			#unite1 {
				float : left;
			}
			#input2 {
				float : left;
			}
			#unite2 {
				float : left;
			}
			
			.input_conversion {
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;

				border-radius: 20%;
				width: 16px;
				height: 16px;

				border: 1px solid grey;
				transition: 0.1s all linear;
				margin-right: 5px;

				position: relative;
				top: 4px;
			}

			.input_conversion:checked {
				border: 8px solid blue;
			}
		
		</style>
    </head>
    
    <body>
        
        <div id="bloc_page">

            <?php include('header.php'); ?>    
            
            <section>

                <article>
                    
					<div>
			<h2><u>Boîte à outils : Divers</u></h2><h3>Module de conversion</h3>
			<a href="index.php">Retour à la page principale</a>
		</div>
		
		<script>
		
		function convertir_distance()
			{
			 
				var d_input = parseInt(document.getElementById('d_input').value, 10);
				
				var k_mm_mm = 1;
				var k_mm_cm = 0.1;
				var k_mm_m = 0.001; 
				var k_mm_km = 0.000001;
				var k_mm_px = 3.779527559055;
				
				var k_cm_cm = 1;
				var k_cm_mm = 10;
				var k_cm_m = 0.01;
				var k_cm_km = 0.00001;
				var k_cm_px = 37.79527559055;
				
				var k_m_m = 1;
				var k_m_mm = 1000;
				var k_m_cm = 0.01;
				var k_m_km = 0.001;
				var k_m_px = 3779.527559055;
				
				var k_km_m = 1000;
				var k_km_mm = 1000000;
				var k_km_cm = 100000;
				var k_km_km = 1;
				var k_km_px = 3779527.559055;
				
				var k_px_px = 1;
				var k_px_mm = 0.2645833333333;
				var k_px_cm = 0.02645833333333;
				var k_px_m = 0.0002645833333333;
				var k_px_km = 0.0000002645833333333;
				 
				var uniteAConvertir;
				if (document.getElementById('d_uc_mm').checked) {
					uniteAConvertir = document.getElementById('d_uc_mm').value;
				}
				else if (document.getElementById('d_uc_cm').checked) {
					uniteAConvertir = document.getElementById('d_uc_cm').value;
				}
				else if (document.getElementById('d_uc_m').checked) {
					uniteAConvertir = document.getElementById('d_uc_m').value;
				}
				else if (document.getElementById('d_uc_km').checked) {
					uniteAConvertir = document.getElementById('d_uc_km').value;
				}
				else if (document.getElementById('d_uc_px').checked) {
					uniteAConvertir = document.getElementById('d_uc_px').value;
				}
				
				var uniteDesire;
				if (document.getElementById('d_ud_mm').checked) {
					uniteDesire = document.getElementById('d_ud_mm').value;
				}
				else if (document.getElementById('d_ud_cm').checked) {
					uniteDesire = document.getElementById('d_ud_cm').value;
				}
				else if (document.getElementById('d_ud_m').checked) {
					uniteDesire = document.getElementById('d_ud_m').value;
				}
				else if (document.getElementById('d_ud_km').checked) {
					uniteDesire = document.getElementById('d_ud_km').value;
				}
				else if (document.getElementById('d_ud_px').checked) {
					uniteDesire = document.getElementById('d_ud_px').value;
				}
				
				var kd;
				if (uniteAConvertir == "mm" && uniteDesire == "mm") {
					kd = k_mm_mm;
				}
				else if (uniteAConvertir == "mm" && uniteDesire == "cm") {
					kd = k_mm_cm;
				}
				else if (uniteAConvertir == "mm" && uniteDesire == "m") {
					kd = k_mm_m;
				}
				else if (uniteAConvertir == "mm" && uniteDesire == "km") {
					kd = k_mm_km;
				}
				else if (uniteAConvertir == "mm" && uniteDesire == "px") {
					kd = k_mm_px;
				}
				else if (uniteAConvertir == "cm" && uniteDesire == "mm") {
					kd = k_cm_mm;
				}
				else if (uniteAConvertir == "cm" && uniteDesire == "cm") {
					kd = k_cm_cm;
				}
				else if (uniteAConvertir == "cm" && uniteDesire == "m") {
					kd = k_cm_m;
				}
				else if (uniteAConvertir == "cm" && uniteDesire == "km") {
					kd = k_cm_km;
				}
				else if (uniteAConvertir == "cm" && uniteDesire == "px") {
					kd = k_cm_px;
				}
				else if (uniteAConvertir == "m" && uniteDesire == "mm") {
					kd = k_m_mm;
				}
				else if (uniteAConvertir == "m" && uniteDesire == "cm") {
					kd = k_m_cm;
				}
				else if (uniteAConvertir == "m" && uniteDesire == "m") {
					kd = k_m_m;
				}
				else if (uniteAConvertir == "m" && uniteDesire == "km") {
					kd = k_m_km;
				}
				else if (uniteAConvertir == "m" && uniteDesire == "px") {
					kd = k_m_px;
				}
				else if (uniteAConvertir == "km" && uniteDesire == "mm") {
					kd = k_km_mm;
				}
				else if (uniteAConvertir == "km" && uniteDesire == "cm") {
					kd = k_km_cm;
				}
				else if (uniteAConvertir == "km" && uniteDesire == "m") {
					kd = k_km_m;
				}
				else if (uniteAConvertir == "km" && uniteDesire == "km") {
					kd = k_km_km;
				}
				else if (uniteAConvertir == "km" && uniteDesire == "px") {
					kd = k_km_px;
				}
				else if (uniteAConvertir == "px" && uniteDesire == "mm") {
					kd = k_px_mm;
				}
				else if (uniteAConvertir == "px" && uniteDesire == "cm") {
					kd = k_px_cm;
				}
				else if (uniteAConvertir == "px" && uniteDesire == "m") {
					kd = k_px_m;
				}
				else if (uniteAConvertir == "px" && uniteDesire == "km") {
					kd = k_px_km;
				}
				else if (uniteAConvertir == "px" && uniteDesire == "px") {
					kd = k_px_px;
				}
				
				var conversion_distance = d_input * kd;
				 
				document.getElementById('input1').innerHTML = conversion_distance;
				document.getElementById('unite1').innerHTML = uniteDesire;

			}
		</script>
		
		
			<div class="module">
				<h4>Distance</h4>
				
					<input type="number" id="d_input">
					<table>
						<tr>
							<td><i>Unité à convertir</i></td>
							<td><i>Unité désiré</i></td>
						</tr>
						<tr>
							<td>
								<input type="radio" id="d_uc_mm" name="d_uc" value="mm" class="input_conversion">
								<label for="d_uc_mm">[mm] Millimètres</label>
							</td>
							<td>
								<input type="radio" id="d_ud_mm" name="d_ud" value="mm" class="input_conversion">
								<label for="d_ud_mm">[mm] Millimètres</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" id="d_uc_cm" name="d_uc" value="cm" class="input_conversion">
								<label for="d_uc_cm">[cm] Centimètres</label>
							</td>
							<td>
								<input type="radio" id="d_ud_cm" name="d_ud" value="cm" class="input_conversion">
								<label for="d_ud_cm">[cm] Centimètres</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" id="d_uc_m" name="d_uc" value="m" class="input_conversion">
								<label for="d_uc_m">[m] Mètres</label>
							</td>
							<td>
								<input type="radio" id="d_ud_m" name="d_ud" value="m" class="input_conversion">
								<label for="d_ud_m">[m] Mètres</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" id="d_uc_km" name="d_uc" value="km" class="input_conversion">
								<label for="d_uc_km">[km] Kilomètres</label>
							</td>
							<td>
								<input type="radio" id="d_ud_km" name="d_ud" value="km" class="input_conversion">
								<label for="d_ud_km">[km] Kilomètres</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" id="d_uc_px" name="d_uc" value="px" class="input_conversion">
								<label for="d_uc_px">[px] Pixels</label>
							</td>
							<td>
								<input type="radio" id="d_ud_px" name="d_ud" value="px" class="input_conversion">
								<label for="d_ud_px">[px] Pixels</label>
							</td>
						</tr>
					</table>
					
					<div><input type="button" onClick="convertir_distance();" value="Convertir"/></div>
					<div id="input1"></div><div id="unite1"></div>
					
			</div>
                    
                </article>
                
                <?php include('menu.php'); ?>

            </section>
            
            <?php include('footer.php'); ?>
            
        </div>
    </body>
</html>