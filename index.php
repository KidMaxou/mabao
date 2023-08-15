<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>BAO - Page d'accueil</title>
    </head>
    
    <body>
        
        <div id="bloc_page">

            <?php include('header.php'); ?>    
            
            <section>

                <article>
                    <h1>Page d'accueil</h1>

                    
                    <p>15/08/2023 : Ajout du module pour simuler un prêt immobilier.</p>
					<p>01/02/2023 : Bienvenue sur BAO v2. J'espère avoir un peu plus de temps pour me consacrer au développement de cette version.</p>
                    <p>18/01/2021 : Ajout du calcul des tracés sinueux dans le module "Outils en vrac".</p>
                    <p>21/12/2020 : Ajout du module "Diagnostic du risque d'un quai" et Mise à jour du module "Calcul du dégarnissage".</p>
                    <p>29/11/2020 : Mise à jour du module "Outils en vrac". Les calculs se font en temps réel et il n'est plus nécessaire de cliquer pour lancer un calcul.</p>
                    <p>09/11/2020 : Mise à jour du module "Appareil de voie". La CC 0,13 dans un entraxe de 3,62m a été ajoutée. Une méthode d'entrée utilisateur différente est testée.</p>
                    <p>05/11/2020 : Mise à jour du module "Outils en vrac". Ajout du calcul de la longueur d'un RC et du rayon d'un RC.</p>
                    <p>04/11/2020 : Ajout du module de conversion.</p>
                    <p>25/10/2020 : Publication du site sur internet.</p>
                    <p>19/10/2020 : Ajout des modules "Fiche de vérification d'un levé topographique" et "Etude de courbe".</p>
                    <p>18/10/2020 : Ajout du module appareil de voie qui calcule seulement le cintrage CIN d'un 0.11L modèle 88. Le calcul n'est pas tout à fait juste. Ne pas utiliser le module pour cintrer un appareil.</p>
                    <p>17/10/2020 : Ajout du module "Outils en vrac"</p>
                    <p>27/09/2020 : Ajout du module "Calcul du dégarnissage"</p>
                    <p>02/09/2020 : Ajout du module "Calcul de l'IMC"</p>
                    <p>01/09/2020 : Création du site "La boîte à outils", hébergé en local</p>
                    <p>01/07/2020 : Création de l'outil "Génération d'un diagramme des flèches" </p>
                    
                </article>
                
                <?php include('menu.php'); ?>

            </section>
            
            <?php include('footer.php'); ?>
            
        </div>
    </body>
</html>
