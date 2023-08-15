<!DOCTYPE html>
<html>
	<head>
	
		<title>Diagramme</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="style.css" />
		
		<style>
		
			.deltaI
			{
				background-color : #C0DEC7;
			}
		
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
	
		<h3><u>Outil de génération des diagrammes</u></h3>
		<a href="tableau.php">Démarrer un nouveau diagramme</br></br></a>
			  
		<?php
		
		$p = 1;
		//GESTION ECHELLE EN X				
		echo '<form method="post" action="tableau_modifier.php">';	
		echo '<input type="hidden" name="Vitesse" value="' . $_POST['Vitesse'] . '" />';
		
		// initialisation des variables echx et echy
		if (isset($_POST['echx']))
		{
			$echx = $_POST['echx'];
		}
		else
		{
			$echx = 1;
		}
		
		if (isset($_POST['echy']))
		{
			$echy = $_POST['echy'];
		}
		else
		{
			$echy = 1;
		}
		
		//étendre axe x
		if (isset($_POST['Submit_etendre_x']))
		{
			$echx = $_POST['echx'] + 1;
		}
		
		//étendre axe y
		if (isset($_POST['Submit_etendre_y']))
		{
			$echy = $_POST['echy'] + 1;
		}
		
		//réduire axe x
		if (isset($_POST['Submit_reduire_x']))
		{
			if ($echx == 1)
			{
				$echx = 1;
			}
			else
			{
				$echx = $_POST['echx'] - 1;
			}
		}
		
		//réduire axe y
		if (isset($_POST['Submit_reduire_y']))
		{
			if ($echy == 1)
			{
				$echy = 1;
			}
			else
			{
				$echy = $_POST['echy'] - 1;
			}
		}
		
		//axe x normal
		if (isset($_POST['Submit_axe_x_normal']))
		{
			$echx = 1;
		}
		
		//axe y normal
		if (isset($_POST['Submit_axe_y_normal']))
		{
			$echy = 1;
		}
		
		while (isset($_POST['Nature_' . $p])) 
		{
			echo '<input type="hidden" name="Nature_' . $p .'" value="' . $_POST['Nature_' . $p] . '" />';
			echo '<input type="hidden" name="Longueur_' . $p .'" value="' . $_POST['Longueur_' . $p] . '" />';
				
			if (isset($_POST['Rayon_' . $p]))
			{
				echo '<input type="hidden" name="Rayon_' . $p .'" value="' . $_POST['Rayon_' . $p] . '" />';
			}
			else
			{
				echo '<input type="hidden" name="Rayon_' . $p .'" value="" />';
			}
				
			if (isset($_POST['Devers_' . $p]))
			{
				echo '<input type="hidden" name="Devers_' . $p .'" value="' . $_POST['Devers_' . $p] . '" />';
			}
			else
			{
				echo '<input type="hidden" name="Devers_' . $p .'" value="" />';
			}		
			
			$mi = 1;
			$pi = 1;
			
			while (!isset($_POST['Nature_' . ($p+$pi)]) AND $pi < 10)
			{	
				$pi++;
			}
			$p = $p + $pi;
			
			echo '<input type="hidden" name="nbElt" value="' .$p .'" />';
				
		}
		
		echo '<input type="hidden" name="echx" value="' .$echx .'" />';
		echo '<input type="submit" name="Submit" value="Modifier les valeurs"/>';
		echo '</form>';	
		
		// GESTION DE LA PRESENTATION DES DIAGRAMMES PAR L'UTILISATEUR
		echo '<form method="post" action="diagramme.php">';	
		echo '<input type="hidden" name="Vitesse" value="' . $_POST['Vitesse'] . '" />';
		$k = 1;
		
		while (isset($_POST['Nature_' . $k])) 
		{
			echo '<input type="hidden" name="Nature_' . $k .'" value="' . $_POST['Nature_' . $k] . '" />';
			echo '<input type="hidden" name="Longueur_' . $k .'" value="' . $_POST['Longueur_' . $k] . '" />';
				
			if (isset($_POST['Rayon_' . $k]))
			{
				echo '<input type="hidden" name="Rayon_' . $k .'" value="' . $_POST['Rayon_' . $k] . '" />';
			}
			else
			{
				echo '<input type="hidden" name="Rayon_' . $k .'" value="" />';
			}
				
			if (isset($_POST['Devers_' . $k]))
			{
				echo '<input type="hidden" name="Devers_' . $k .'" value="' . $_POST['Devers_' . $k] . '" />';
			}
			else
			{
				echo '<input type="hidden" name="Devers_' . $k .'" value="" />';
			}		
			
			$kmi = 1;
			$kpi = 1;
			
			while (!isset($_POST['Nature_' . ($k+$kpi)]) AND $kpi < 10)
			{	
				$kpi++;
			}
			$k = $k + $kpi;
			
			echo '<input type="hidden" name="nbElt" value="' .$k .'" />';		
		}
		
		echo '<input type="hidden" name="echx" value="' .$echx .'" />';
		echo '<input type="hidden" name="echy" value="' .$echy .'" />';
		echo '<input type="submit" name="Submit_axe_x_normal" value="Axe X normal"/>';
		echo '<input type="submit" name="Submit_etendre_x" value="Etendre en X"/>';
		echo '<input type="submit" name="Submit_reduire_x" value="Réduire en X"/></br>';
		echo '<input type="submit" name="Submit_axe_y_normal" value="Axe Y normal"/>';
		echo '<input type="submit" name="Submit_etendre_y" value="Etendre en Y"/>';	
		echo '<input type="submit" name="Submit_reduire_y" value="Réduire en Y"/>';
		
		
		if(isset($_POST['echx']))
		{
			echo '<script>document.getElementById("Submit_etendre_x").value=' . $_POST["echx"] . ';</script>'; 
			echo '<script>document.getElementById("Submit_reduire_x").value=' . $_POST["echx"] . ';</script>'; 
			echo '<script>document.getElementById("Submit_axe_x_normal").value=1;</script>'; 
		}
		else
		{
			echo '<script>document.getElementById("Submit_etendre_x").value=1;</script>';
			echo '<script>document.getElementById("Submit_reduire_x").value=1;</script>'; 			
			echo '<script>document.getElementById("Submit_axe_x_normal").value=1;</script>'; 
		}
		
		if(isset($_POST['echy']))
		{
			echo '<script>document.getElementById("Submit_etendre_y").value=' . $_POST["echy"] . ';</script>'; 
			echo '<script>document.getElementById("Submit_reduire_y").value=' . $_POST["echy"] . ';</script>'; 
			echo '<script>document.getElementById("Submit_axe_y_normal").value=1;</script>'; 
		}
		else
		{
			echo '<script>document.getElementById("Submit_etendre_y").value=1;</script>'; 
			echo '<script>document.getElementById("Submit_reduire_x").value=1;</script>'; 
			echo '<script>document.getElementById("Submit_axe_y_normal").value=1;</script>'; 
		}
		echo '</form>';	
		
		?>
				
		<canvas id="canvas" width="1100" height="600">		

			<?php
			
				//Calcul des points pour modélisation du diagramme	
				$positionAxeX = 20;
				$positionAxeY = 300;
				$departAxeX = 10;
				$departAxeY = 20;			
				$longueurAxeX = 1100;
				$longueurAxeY = 600;
				$finAxeY = $departAxeY + $longueurAxeY;
				
				
				
				//Déclaration de la variable canvas
				echo '<script>var canvas  = document.querySelector(\'#canvas\');</script>';	
				
				//Définition de la couleur des axes
				echo '<script>var base = canvas.getContext(\'2d\');</script>';
				echo '<script>base.strokeStyle = "rgb(23, 145, 167)";</script>';
				
				//Modélisation de l'axe X horizontal
				echo '<script>base.beginPath();</script>';							
				echo '<script>base.moveTo(0, ' . $positionAxeY . ');  </script>';
				echo '<script>base.lineTo( ' . $longueurAxeX . ' , ' . $positionAxeY . ' ); </script>';
				echo '<script>base.stroke();</script>';
				
				//Modélisation de l'axe Y vertical
				echo '<script>base.beginPath();</script>';				
				echo '<script>base.moveTo( ' . $departAxeX . ' , ' . $departAxeY . '); </script>'; 
				echo '<script>base.lineTo( ' . $departAxeX . ' , ' . $finAxeY . ' ); </script>';
				echo '<script>base.stroke();</script>';
				
				//Création des canvas divers								
				echo '<script>var rayon = canvas.getContext(\'2d\');</script>';
				echo '<script>var devers = canvas.getContext(\'2d\');</script>';
				echo '<script>var insuffisance = canvas.getContext(\'2d\');</script>';
				echo '<script>var cot = canvas.getContext(\'2d\');</script>';
				
				

				//Déclaration des éléments
				//"nElt" AL pour alignement, C pour une courbe et RP pour raccordement progressif
				//"rElt" vide pour un alignement et un RP, indiquer la valeur signée pour un rayon

				// E0 INITIALISATION
				$nElt0 = "AL";
				$rElt0 = "";
				$lElt0 = 0;

				// E0 INITIALISATION DIAGRAMME DES FLECHES
				if ($rElt0 == "")
				{
					$fElt0 = 0;
				}
				else
				{
					$fElt0 = 50000 / $rElt0;
				}
				$xElt01_f = $positionAxeX;
				$yElt01_f = $positionAxeY-$fElt0;
				$xElt02_f = $xElt01_f;
				$yElt02_f = $yElt01_f+$fElt0;
				$xElt03_f = $positionAxeX+$lElt0;
				$yElt03_f = $positionAxeY-$fElt0;
				$xEltd_f = $xElt03_f;
				$yEltd_f = $yElt03_f;
				
				// E0 INITIALISATION DIAGRAMME DES DEVERS
				if ($rElt0 == "")
				{
					$fElt0 = 0;
				}
				else
				{
					$fElt0 = 50000 / $rElt0;
				}
				$xElt01_d = $positionAxeX;
				$yElt01_d = $positionAxeY-$fElt0;
				$xElt02_d = $xElt01_d;
				$yElt02_d = $yElt01_d+$fElt0;
				$xElt03_d = $positionAxeX+$lElt0;
				$yElt03_d = $positionAxeY-$fElt0;
				$xEltd_d = $xElt03_d;
				$yEltd_d = $yElt03_d;
				
				// E0 INITIALISATION DIAGRAMME DES INSUFFISANCES
				if ($rElt0 == "")
				{
					$fElt0 = 0;
				}
				else
				{
					$fElt0 = 50000 / $rElt0;
				}
				$xElt01_i = $positionAxeX;
				$yElt01_i = $positionAxeY-$fElt0;
				$xElt02_i = $xElt01_d;
				$yElt02_i = $yElt01_d+$fElt0;
				$xElt03_i = $positionAxeX+$lElt0;
				$yElt03_i = $positionAxeY-$fElt0;
				$xEltd_i = $xElt03_i;
				$yEltd_i = $yElt03_i;
				
				// INITIALISATION DES VARIABLES
					// variables générales
				$nEltx = 1; 
				$rEltx = 1;
				$raEltx = 1;
				$lEltx = 1;
				$fEltx = 1;
					// variables flèches
				$xEltx1_f = 1;
				$xEltx2_f = 1;
				$xEltx3_f = 1;
				$yEltx1_f = 1;
				$yEltx2_f = 1;
				$yEltx3_f = 1;
					// variables dévers
				$xEltx1_d = 1;
				$xEltx2_d = 1;
				$xEltx3_d = 1;
				$yEltx1_d = 1;
				$yEltx2_d = 1;
				$yEltx3_d = 1;	
					// variables insuffisances
				$xEltx1_i = 1;
				$xEltx2_i = 1;
				$xEltx3_i = 1;
				$yEltx1_i = 1;
				$yEltx2_i = 1;
				$yEltx3_i = 1;	
				
				//Calcul des points pour modélisation des diagrammes
				// Les lignes sont définies par 3 couples de points (x1, y1), (x2, y2) et (x3, y3)
				$i=1;
				$mi = 1;
				$pi = 1;
				while ( $i < $p)
				{
					/* while ( !isset($_POST['Nature_' . $i] ) AND $i < $p)
					{
						$i++;
					}
					
					while ( !isset($_POST['Nature_' . ($i + $pi)] ) AND $i + $pi < $p)
					{
						$pi++;
					} */
					
					while (!isset($_POST['Nature_' . ($i+$pi)]) AND $i+$pi < $p)
					{	
						$pi++;
					}
					
					while (!isset($_POST['Nature_' . ($i-$mi)]) AND $i-$mi > 0)
					{	
						$mi++;
					}

										
					$nEltx = $_POST['Nature_' . $i]; 
					$namEltx = $_POST['Nature_' . ($i-$mi)]; //elt amont	
					$naEltx = $_POST['Nature_' . ($i+$pi)]; //elt aval	
					$rEltx = $_POST['Rayon_' . $i];
					$ramEltx = $_POST['Rayon_' . ($i-$mi)]; //rayon elt amont
					$raEltx = $_POST['Rayon_' . ($i+$pi)]; //rayon elt aval	
					$dEltx = $_POST['Devers_' . $i]; 						
					$daEltx = $_POST['Devers_' . ($i+$pi)]; //dévers elt aval
					$damEltx = $_POST['Devers_' . ($i-$mi)]; //dévers elt amont
					$lEltx = $_POST['Longueur_' . $i]; 
					$laEltx = $_POST['Longueur_' . ($i+$pi)]; //longueur elt aval
						
					if ($rEltx == "")
					{
						$fEltx = 0;
						$dEltx = 0;
					}
					else
					{
						$fEltx = 50000 / $rEltx;
						$dEltx = $_POST['Devers_' . $i]; 	
					}
					
					// Calcul des insuffisances
					if ( $nEltx == "C" )
					{
						$iEltx = 11.8 * pow($_POST['Vitesse'], 2) / $rEltx - $dEltx;
					}
					else
					{
						$iEltx = 0;
					}
					
					if ( $naEltx == "C" )
					{
						$iavEltx = 11.8 * pow($_POST['Vitesse'], 2) / $raEltx - $daEltx;
					}
					else
					{
						$iavEltx = 0;
					}
					
					if ( $namEltx =="C" )
					{
						$iamEltx = 11.8 * pow($_POST['Vitesse'], 2) / $ramEltx - $damEltx;
					}
					else
					{
						$iamEltx = 0;
					}
										
					// Calcul variation d'insuffisance et discontinuité d'insuffisance
					$diEltx = abs($iavEltx - $iamEltx);
					$didtEltx = round(($diEltx * $_POST['Vitesse']) / (3.6 * $lEltx),1);
					
					//Calcul variation de dévers
					$dddlEltx = round( abs ( $daEltx - $damEltx ) / $lEltx, 1);
					
					
					
					//Définition du couple (x1, y1)
					$xEltx1_f = $xEltd_f;
					$xEltx1_d = $xEltd_d;
					$yEltx1_f = $yEltd_f; 
					$yEltx1_d = $yEltd_d;
					$xEltx1_i = $xEltd_i;
					$yEltx1_i = $yEltd_i;
					
					//Définition des couples (x2, y2) et (x3, y3)
					
					$xEltx2_f = $xEltx1_f;
					$xEltx2_d = $xEltx1_d;
					$xEltx2_i = $xEltx1_i;
					if ($nEltx == "RP") //si c'est un RP
					{
						$yEltx2_f = $yEltx1_f; 
						$yEltx2_d = $yEltx1_d; 
						$yEltx2_i = $yEltx1_i;
							
						if ($raEltx == "") // si l'élément suivant le RP n'est pas une courbe
						{
							$yEltx3_f = $positionAxeY; 
							$yEltx3_d = $positionAxeY; // donc d=0
							$yEltx3_i = $positionAxeY; // donc I=0
						}
						else // si l'élément suivant est une courbe
						{
							$yEltx3_f = $positionAxeY - ( 50000 / $raEltx ) * $echy; 	
							$yEltx3_d = $positionAxeY - $daEltx * $echy;
							$yEltx3_i = $positionAxeY - $iavEltx * $echy;
						}
					}
					else // si c'est un alignement ou une courbe
					{
						$yEltx2_f = $positionAxeY - $fEltx * $echy; 
						$yEltx2_d = $positionAxeY - $dEltx * $echy;
						
						if ( $nEltx == "AL" )
						{
							$yEltx2_i = $positionAxeY;
						}
						else
						{
							$yEltx2_i = $positionAxeY - $iEltx * $echy;
						}
						
						$yEltx3_f = $yEltx2_f;
						$yEltx3_d = $yEltx2_d;
						$yEltx3_i = $yEltx2_i;
					}
					
					// Définition de x x3
					$xEltx3_f = $xEltx2_f + $lEltx * $echx;
					$xEltx3_d = $xEltx2_d + $lEltx * $echx;
					$xEltx3_i = $xEltx2_i + $lEltx * $echx;
						
					$xEltd_f = $xEltx3_f; 
					$xEltd_d = $xEltx3_d;
					$xEltd_i = $xEltx3_i;
					$yEltd_f = $yEltx3_f;
					$yEltd_d = $yEltx3_d;
					$yEltd_i = $yEltx3_i;
					
					// Position texte rayons				
					$xElttxt_f = ($xEltx2_f + $xEltx3_f) / 2;
					if ( $fEltx < 0 )
					{
						$yElttxt_f = $yEltx2_f + 15;
					}
					else
					{
						$yElttxt_f = $yEltx2_f - 5;
					}
					
					// Position texte dévers
					$xElttxt_d = ($xEltx2_d + $xEltx3_d) / 2;
					if ( $dEltx < 0 )
					{
						$yElttxt_d = $yEltx2_d + 15;
					}
					else
					{
						$yElttxt_d = $yEltx2_d - 5;
					}
					
					// Position texte insuffisance
					$xElttxt_i = ($xEltx2_i + $xEltx3_i) / 2;
					if ( $iEltx < 0 )
					{
						$yElttxt_i = $yEltx2_i + 15;
					}
					else
					{
						$yElttxt_i = $yEltx2_i - 5;
					}
					
					// Position texte discontinuité d'insuffisance
					$xElttxt_didt = ($xEltx2_i + $xEltx3_i) / 2;	
					
					if ($yEltx2_i == $positionAxeY AND $yEltx3_i < $positionAxeY)
					{
						$yElttxt_didt = ($yEltx3_i + $positionAxeY) / 2;
					}
					elseif ($yEltx2_i < $positionAxeY AND $yEltx3_i > $positionAxeY)
					{
						$yElttxt_didt = ($yEltx2_i + $yEltx3_i) / 2;
					}
					elseif ($yEltx2_i > $positionAxeY AND $yEltx3_i == $positionAxeY)
					{
						$yElttxt_didt = $positionAxeY + ($yEltx2_i - $yEltx3_i) / 2;
					}	
					elseif ($yEltx2_i > $positionAxeY AND $yEltx3_i < $positionAxeY)
					{
						$yElttxt_didt = ($yEltx2_i + $yEltx3_i) / 2;
					}
					elseif ($yEltx2_i < $positionAxeY AND $yEltx3_i < $positionAxeY)
					{
						$yElttxt_didt = abs($yEltx3_i + $yEltx2_i) / 2;
					}		
					
					// Position texte variation de dévers
					$xElttxt_dddl = ($xEltx2_d + $xEltx3_d) / 2;
					
					if ($yEltx2_d == $positionAxeY AND $yEltx3_d < $positionAxeY)
					{
						$yElttxt_dddl = ($yEltx3_d + $positionAxeY) / 2;
					}
					elseif ($yEltx2_d < $positionAxeY AND $yEltx3_d > $positionAxeY)
					{
						$yElttxt_dddl = ($yEltx2_d + $yEltx3_d) / 2;
					}
					elseif ($yEltx2_d > $positionAxeY AND $yEltx3_d == $positionAxeY)
					{
						$yElttxt_dddl = $positionAxeY + ($yEltx2_d - $yEltx3_d) / 2;
					}	
					elseif ($yEltx2_d > $positionAxeY AND $yEltx3_d < $positionAxeY)
					{
						$yElttxt_dddl = abs($yEltx3_d + $yEltx2_d) / 2;
					}	
					elseif ($yEltx2_d < $positionAxeY AND $yEltx3_d < $positionAxeY)
					{
						$yElttxt_dddl = abs($yEltx3_d + $yEltx2_d) / 2;
					}	
					
					//Gestion des superpositions de texte
					//rayon et insuffisance
					if (abs($fEltx) > (abs($iEltx) - 10) AND abs($fEltx) < (abs($iEltx) + 10))
					{
						$yElttxt_i = $yElttxt_f - 15;
					}
					elseif (abs($iEltx) > (abs($fEltx) - 10) AND abs($iEltx) < (abs($fEltx) + 10))
					{
						$yElttxt_f = $yElttxt_i - 15;
					}
					
					//variation de dévers et variation d'insuffisance
					if (abs($yElttxt_dddl) > (abs($yElttxt_didt) - 10) AND abs($yElttxt_dddl) < (abs($yElttxt_didt) + 10))
					{
						$yElttxt_dddl = $yElttxt_didt - 15;
					}
										
					// Diagramme des dévers	
					echo '<script>devers.strokeStyle = "rgb(45, 167, 73)";</script>';
					echo '<script>devers.beginPath();</script>';
					echo '<script>devers.moveTo(' . $xEltx1_d . ' , ' . $yEltx1_d . ');  </script>';
					echo '<script>devers.lineTo( ' . $xEltx2_d .' , '. $yEltx2_d . ');</script>';
					echo '<script>devers.lineTo( ' . $xEltx3_d . ' , ' . $yEltx3_d . '); </script>';	
					echo '<script>devers.stroke();	</script>';	
					
					// Diagramme des insuffisances
					echo '<script>insuffisance.strokeStyle =  "#1675e4" ;</script>';
					echo '<script>insuffisance.beginPath();</script>';
					echo '<script>insuffisance.moveTo(' . $xEltx1_i . ' , ' . $yEltx1_i .');  </script>';
					echo '<script>insuffisance.lineTo( ' . $xEltx2_i .' , '. $yEltx2_i .');</script>';
					echo '<script>insuffisance.lineTo( ' . $xEltx3_i . ' , ' . $yEltx3_i . '); </script>';	
					echo '<script>insuffisance.stroke();	</script>';	

					// Diagramme des flèches		
					echo '<script>rayon.strokeStyle = "#e43416" ;</script>';					
					echo '<script>rayon.beginPath();</script>';
					echo '<script>rayon.moveTo(' . $xEltx1_f . ' , ' . $yEltx1_f . ' );</script>';
					echo '<script>rayon.lineTo( ' . $xEltx2_f . ' , ' . $yEltx2_f . ' );</script>';
					echo '<script>rayon.lineTo( ' . $xEltx3_f . ' , ' . $yEltx3_f . ' ); </script>';	
					echo '<script>rayon.stroke();</script>';
					
					//TEXTE DES DIAGRAMMES					
						//Texte des dévers
					echo '<script>devers.font = "12px Arial";</script>';
					echo '<script>devers.fillStyle = "rgb(45, 167, 73)";</script>';
					echo '<script>devers.textAlign = "center";</script>';
					if ( $nEltx == "C")
					{
						echo '<script>devers.fillText( \'d = \'+ ' . $dEltx . ' , '. $xElttxt_d .','. $yElttxt_d .');</script>';
					}		
					elseif 	( $nEltx == "RP")
					{
						echo '<script>devers.fillText( \'Δd/Δl = \'+ ' . $dddlEltx . ' , '. $xElttxt_dddl .','. $yElttxt_dddl .');</script>';
					}						
						//Texte des insuffisances
					echo '<script>insuffisance.font = "bold 13px arial";</script>';
					echo '<script>insuffisance.fillStyle = "rgb(17, 52, 202)";</script>';
					echo '<script>insuffisance.textAlign = "center";</script>';
					if ( $nEltx == "C")
					{
						echo '<script>insuffisance.fillText( \'I = \'+ ' . round($iEltx,1) . ' , '. $xElttxt_i .','. $yElttxt_i .');</script>';
					}
					elseif ( $nEltx == "RP")
					{
						echo '<script>insuffisance.fillText( \'ΔI/Δt = \'+ ' . $didtEltx . ' , '. $xElttxt_didt .','. $yElttxt_didt .');</script>';
					}				
						//Texte des rayons
					echo '<script>rayon.font = "14px Arial";</script>';
					echo '<script>rayon.fillStyle = "rgb(197, 50, 19)";</script>';
					echo '<script>rayon.textAlign = "center";</script>';
					if ( $nEltx == "AL")
					{
						echo '<script>rayon.fillText( "AL" , '. $xElttxt_f .','. $yElttxt_f .');</script>';
					}
					elseif ( $nEltx == "RP")
					{
						echo '<script>rayon.fillText( \'\'  , '. $xElttxt_f .','. $yElttxt_f .');</script>';
					}
					else
					{
						echo '<script>rayon.fillText( \'R\'+' . $rEltx . ' , '. $xElttxt_f .','. $yElttxt_f .');</script>';
					}						
					$i++;					
				}					
				?>
					
		</canvas>
		

				
		<?php
			$p = 1;
			echo '<table width="1000"><tr style="text-align:center"><td><b>Nature</b></td><td><b>L</b></td><td><b>R</b></td><td><b>D</b></td><td><b>Δd/Δl</b></td><td><b>I</b></td><td><b>ΔI</b></td><td><b>ΔI/Δt</b></td><td><b>ΔI<sub>1</sub>/Δt</b></td><td><b>ΔI<sub>2</sub>/Δt</b></td><td><b>ΔI<sub>3</sub>/Δt</b></td></tr>';
			echo '<tr style="text-align:center"><td></td><td><i>m</i></td><td><i>m</i></td><td><i>mm</i></td><td><i>mm/m</i></td><td><i>mm</i></td><td><i>mm</i></td><td><i>mm/s</i></td><td><i>mm/s</i></td><td><i>mm/s</i></td><td><i>mm/s</i></td></tr>';			
			$vitesse = $_POST['Vitesse'];
			

			while (isset($_POST['Nature_' . $p])) 
			{	
				$longueur = $_POST['Longueur_' . $p];
				// génération des natures
				if (isset($_POST['Nature_' . $p]) AND $_POST['Nature_' . $p] != '')
				{
					$nature = $_POST['Nature_' . $p];
				}
				else
				{
					$nature = 0;
				}
				
				if (isset($_POST['Nature_' . ($p-1)]) AND $_POST['Nature_' . ($p-1)] != '')
				{
					$nature_amont = $_POST['Nature_' . ($p - 1)];
				}
				else
				{
					$nature_amont = 0;
				}
				
				if (isset($_POST['Nature_' . ($p+1)]) AND $_POST['Nature_' . ($p+1)] != '')
				{
					$nature_aval = $_POST['Nature_' . ($p + 1)];
				}
				else
				{
					$nature_aval = 0;
				}
				
				// génération des dévers
				if (isset($_POST['Devers_' . $p]) AND $_POST['Devers_' . $p] != '')
				{
					$devers = $_POST['Devers_' . $p];
				}
				else
				{
					$devers = 0;
				}
				
				if (isset($_POST['Devers_' . ($p-1)]) AND $_POST['Devers_' . ($p-1)] != '')
				{
					$devers_amont = $_POST['Devers_' . ($p - 1)];
				}
				else
				{
					$devers_amont = 0;
				}
				
				if (isset($_POST['Devers_' . ($p+1)]) AND $_POST['Devers_' . ($p+1)] != '')
				{
					$devers_aval = $_POST['Devers_' . ($p + 1)];
				}
				else
				{
					$devers_aval = 0;
				}
				
				// génération des rayon
				if (isset($_POST['Rayon_' . $p]))
				{
					$rayon = $_POST['Rayon_' . $p];
				}
				else
				{
					$rayon = 0;
				}
				
				if (isset($_POST['Rayon_' . ($p - 1)]))
				{
					$rayon_amont = $_POST['Rayon_' . ($p - 1)];
				}
				else
				{
					$rayon_amont = 0;
				}
				
				if (isset($_POST['Rayon_' . ($p + 1)]))
				{
					$rayon_aval = $_POST['Rayon_' . ($p + 1)];
				}
				else
				{
					$rayon_aval = 0;
				}
				
				if ( $nature !="C")
				{
					$insuffisance = 0;
				}
				else
				{
					$insuffisance = 11.8 * pow($vitesse, 2) / $rayon - $devers;
				}
					
				if (isset($nature_amont) AND $rayon_amont != 0)
				{
					$insuffisance_amont = 11.8 * pow($vitesse, 2) /  $rayon_amont - $devers_amont;
				}
				else
				{
					$insuffisance_amont = 0;
				}
				
				echo '<script>console.log('. $rayon_amont .');</script>';
				
				if (isset($nature_aval) AND $rayon_aval != 0)
				{
					$insuffisance_aval = 11.8 * pow($vitesse, 2) /  $rayon_aval - $devers_aval;
				}
				else
				{
					$insuffisance_aval = 0;
				}
				
				//nature de l'élément
				if ($nature == "AL")
					{
						echo '<tr style="text-align:center"><td>AL</td>';
					}
				elseif ($nature == "RP")
					{
							
							$dd = abs( $devers_aval - $devers_amont);
							$dddl = $dd / $longueur;
							if ( $vitesse >= 60 AND $dddl > 60 / $vitesse )
							{
								echo '<tr style="text-align:center"><td>RP</br>(avec doucines)</td>';	
							}
							else 
							{
								echo '<tr style="text-align:center"><td>RP</br>(sans doucines)</td>';	
							}
					}
				else
					{
						if ($rayon > 0)
						{
							echo '<tr style="text-align:center"><td>CD</td>';
						}
						else
						{
							echo '<tr style="text-align:center"><td>CG</td>';
						}
					}
				
				//longueur, rayon et dévers
				echo '<td>' . $longueur . '</td>';	
				
				if (isset($rayon))
				{
					echo '<td>' . $rayon . '</td>';	
				}
				else
				{
					echo '<td></td>';	
				}					
				echo '<td>' . $devers . '</td>';	
				
				//variation de dévers
				$dd = abs( $devers_aval - $devers_amont);
				$dddl = $dd / $longueur;
				
				if ($dd !=0)
				{
					echo '<td>' . round($dddl, 2) . '</td>';
				}
				else
				{
					echo '<td></td>';
				}
				
				//insuffisance
				if ( $nature != "RP" )
				{
					echo '<td>'. round($insuffisance,1) .'</td>';
				}
				else
				{
					echo '<td></td>';
				}				
				
				//variation d'insuffisance				
				if ($nature == "RP" AND isset($nature_amont))
				{
					if ( $nature_amont =="AL")
					{
						$vi = abs($insuffisance_aval * $vitesse / ( 3.6 * $longueur));						
					}
					elseif ( $nature_aval =="AL")
					{
						$vi = abs($insuffisance_amont * $vitesse / ( 3.6 * $longueur));						
					}
					else
					{
						$vi = abs($insuffisance_amont - $insuffisance_aval) * $vitesse / ( 3.6 * $longueur);
					}
					echo '<td></td><td>'. round($vi, 1)  .'</td>';
				}
				else
				{
					echo '<td></td><td></td>';
				}
				
				//ΔI1/Δt, ΔI2/Δt et ΔI3/Δt
				if ($longueur < 20 AND $nature_aval != "RP" AND $nature_amont != "RP")
				{
					if ( $nature_amont == "AL")
					{
						$i1 = 0;
					}
					else
					{
						$i1 = 11.8 * pow($vitesse, 2) / $rayon_amont - $devers_amont;
					}
					
					if ($nature_aval == "AL")
					{
						$i2 = 0;
					}
					else
					{
						$i2 = 11.8 * pow($vitesse, 2) / $rayon_aval - $devers_aval;
					}
					
					$i3 = abs($i2 - $i1);
					$deltaI1 = abs($insuffisance -  $i1);
					$deltaI2 = abs($i2 - $insuffisance);
					
					if ($nature == "AL")
					{
						$di1 = $i1 * $vitesse / 72;
						$di2 = $i2 * $vitesse / 72;
						$di3 = $i3 * $vitesse / (3.6 * ( 20 + $longueur));
						echo '<td>'. abs(round($di1,1)) .'</td><td>'. abs(round($di2,1)) .'</td><td>'. abs(round($di3,1)) .'</td>';
					}
					
					elseif ($nature == "C")
					{
						$di1 = $deltaI1 * $vitesse / 72;
						$di2 = $deltaI2 * $vitesse / 72;
						$di3 = $i3 * $vitesse / (3.6 * ( 20 + $longueur));
						echo '<td>'. abs(round($di1,1)) .'</td><td>'. abs(round($di2,1)) .'</td><td>'. abs(round($di3,1)) .'</td>';
					}
					else
					{
						echo '<td></td><td></td><td></td>';
					}
				}
				else
					{
						echo '<td></td><td></td><td></td>';
					}
				echo '</tr>';
				
				//discontinuité d'insuffisance et variation d'insuffisance
				if (isset($nature) AND isset($nature_aval) AND $nature_aval != "")
				{
					if($nature == "AL" AND $nature_aval == "C")
					{
						$deltaI = abs($insuffisance_aval);
						$vi = $deltaI * $vitesse / 72 ;	 
						echo '<tr style="text-align:center" class="deltaI"><td></td><td></td><td></td><td></td><td></td><td></td><td>'. round($deltaI,1) .'</td><td>'. round($vi,1) .'</td><td></td><td></td><td></td></tr>';
					}
					elseif ($nature == "C" AND $nature_aval == "C")
					{
						$deltaI = abs($insuffisance_aval - $insuffisance);
						$vi = $deltaI * $vitesse / 72 ;
						echo '<tr style="text-align:center" class="deltaI"><td></td><td></td><td></td><td></td><td></td><td></td><td>'. round($deltaI,1) .'</td><td>'. round($vi,1) .'</td><td></td><td></td><td></td></tr>';
					}
					elseif ($nature == "C" AND $nature_aval == "AL")
					{
						$deltaI = abs($insuffisance);
						$vi = $deltaI * $vitesse / 72 ;
						echo '<tr style="text-align:center" class="deltaI"><td></td><td></td><td></td><td></td><td></td><td></td><td>'. round($deltaI,1) .'</td><td>'. round($vi,1) .'</td><td></td><td></td><td></td></tr>';
					}
				}	
			
				$p++;
								
			}
			echo '</table></br>';
			$eltrace = $p - 1;
			echo 'Vous avez entré ' . $eltrace . ' éléments de tracé.';

		?>
	</body>
</html>