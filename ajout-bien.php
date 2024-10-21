<?php 
    session_start() ;

    // On définit le lien du logo pour cette page

    $lienLogo ="Images/logo2.png" ;
    $username = "Username";
    $lienAccueil = "dashboard-admin.php";
    $lienDeconnection = "log-out-admin.php";




?>


<?php 
    // Debut de la page

    if(isset($_SESSION["idAdmin"]) && isset($_SESSION["emailAdmin"])){ 
        $username = $_SESSION["nomAdmin"] ;
    ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ajouter un bien</title>
            <link rel="stylesheet" href="option-admin-style/ajout-bien.css">
            
            <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">

            <link rel="stylesheet" href="header-menu-admin/header-menu-admin.css">

            <!-- Feuille de style des icones-->
            <link rel="stylesheet" href="Icons/css/all.css">
        </head>
        <body>
            <?php include "header-menu-admin/header-menu-admin.php";?>

            <div class="main-content-bien">
                <h1>Ajout bien</h1>
                <div class="main-form">
                    <form action="ajout-bien-data.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Catégorie</legend>
                            <div class="categorie-bien">

                                <div class="cat-maison">
                                    <input type="radio" name="catBien" id="catMaison" value="maison" onclick="showMaison()">
                                    <label for="catMaison">Maison</label>
                                </div>

                                <div class="cat-chambre">
                                    <input type="radio" name="catBien" id="catChambre" value="chambre" onclick="showChambre()">
                                    <label for="catChambre">Chambre</label>
                                </div>

                                <div class="cat-magasin">
                                    <input type="radio" name="catBien" id="catMagasin" value="magasin" onclick="showMagasin()">
                                    <label for="catMagasin">Magasin</label>
                                </div>

                                <div class="cat-immeuble">
                                    <input type="radio" name="catBien" id="catImmeuble" value="immeuble" onclick="showImmeuble()">
                                    <label for="catImmeuble">Immeuble</label>
                                </div>

                                <div class="cat-terrain">
                                    <input type="radio" name="catBien" id="catTerrain" value="terrain" onclick="showTerrain()">
                                    <label for="catTerrain">Terrain</label>
                                </div>

                            </div>
                        </fieldset>

                        <fieldset class="caract-gen">
                            <legend>Caractéristiques générales</legend>
                            
                            <div class="location-vente">
                                <select name="locationVente" id="locationVente">
                                    <option value="">Type de contrat</option>

                                    <option value="location" >Location</option>
                                    <option value="vente">Vente</option>

                                </select>
                            </div>

                            <div class="titre-bien">
                                <span> <i class="fa-solid fa-pen-to-square"></i></span>
                                <input type="text" placeholder="Ajouter un titre" name="titreBien">
                            </div>
                            <div class="pays-bien">
                                <span><i class="fa-solid fa-earth-americas"></i></span>
                                <input type="text" placeholder="Pays"  name="paysBien">
                            </div>

                            <div class="ville-bien">
                                <span><i class="fa-solid fa-city"></i></span>
                                <input type="text" placeholder="Ville" name="villeBien">
                            </div>

                            <div class="ville-bien">
                                <span><i class="fa-solid fa-tree-city"></i></span>
                                <input type="text" placeholder="Quartier" name="quartierBien">
                            </div>

                            <div class="ville-bien">
                                <span><i class="fa-solid fa-square-parking"></i></span>
                                <input type="number" placeholder="Parking" name="parkingBien">
                            </div>

                            <div class="prix-bien">
                                <span><i class="fa-solid fa-sack-dollar"></i></span>
                                <input type="number" placeholder="Prix" name="prixBien">
                            </div>

                            <div class="ville-bien">
                                <span><i class="fa-solid fa-phone"></i></span>
                                <input type="number" placeholder="Telephone proprietaire" name="telephoneProprietaire">
                            </div>

                            <div class="description-bien">
                                <textarea name="descriptionBien" id="" cols="" rows="" placeholder="Ajouter une description">

                                </textarea>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Caractéristiques spécifiques</legend>
                            <p id="choixCat">Veuillez choisir une catégorie de biens</p>

                            <div id="caractMaison" class="caSpecifique">

                                <div class="type-maison">
                                    <select name="typeMaison" id="">
                                        <option value="">Choisir le type de maison</option>
                                        <option value="Studio">Studio</option>
                                        <option value="Appartement">Appartement</option>
                                        <option value="Maison">Maison</option>
                                        <option value="Villa">Villa</option>

                                    </select>
                                </div>
                                <div class="superficie-terrain-maison">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="superficie du terrain" name="superficieTerrainMaison">

                                </div>
                                <div class="nbre-chambre">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="nombre de chambre" name="nbreChambre">

                                </div>

                                <div class="nbre-cuisine">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="nombre de cuisine" name="nbreCuisine">

                                </div>

                                <div class="nbre-salon">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="nombre de salon" name="nbreSalon">

                                </div>

                                <div class="nbre-douche">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="nombre de douche"  name="nbreDouche">

                                </div>

                                <div class="nbre-autrePiece">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="autres pieces" name="autrePieceMaison">

                                </div>

                            </div>

                            <div id="caractChambre" class="caSpecifique">
                                <div class="moderne-chambre">
                                    <select name="moderneChambre" id="">
                                        <option value="">Moderne on non ?</option>
                                        <option value="Oui">Moderne</option>
                                        <option value="Non">Non moderne</option>
                                    </select>
                                </div>

                                <div class="moderne-chambre">
                                    <select name="cuisineChambre" id="">
                                        <option value="">Cuisine ?</option>
                                        <option value="Oui">Oui</option>
                                        <option value="Non">Non </option>
                                    </select>
                                </div>

                                <div class="superficie-chambre">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="superficie de la chambre" name="superficieChambre">

                                </div>
                                
                            </div>

                            <div id="caractImmeuble" class="caSpecifique">
                                <div class="superficie-immeuble">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="superficie du terrain de l'immeuble" name="superficieTerrainImmeuble">

                                </div>

                                <div class="nbreEtage-immeuble">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="nombre d'étage" name="nbreEtageImmeuble">

                                </div>
                            
                            </div>

                            <div id="caractTerrain" class="caSpecifique">
                                <div class="superficie-terrain">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="superficie du terrain" name="superficieTerrain">

                                </div>
                            
                            </div>

                            <div id="caractMagasin" class="caSpecifique">
                                <div class="superficie-magasin">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="superficie du magasin" name="superficieMagasin">

                                </div>

                                <div class="nbrepiece-magasin">
                                    <span><i class="fa-regular fa-square"></i></span>
                                    <input type="number" placeholder="nombre de piece" name="nbrePieceMagasin">

                                </div>
                            
                            </div>
                        
                        </fieldset>

                        <fieldset >
                            <legend>Photos</legend>
                            <div class="image-bien">
                                
                                <input type="file" name="pictures[]" id="" multiple required>
                                
                                
                            </div>
                        </fieldset>

                        <input type="submit" value="Publier" name="pub">
                    </form>
                </div>
               

            </div>

            <script src="option-admin-js/caracteristiqueSpecifique.js"></script>


            <script>
                //let caractSpecifique = document.getElementsByClassName("caractSpecifique");

                //let catChambre = document.getElementById("catChambre");
                /*catTerrain.addEventListener("click", function(){
                    alert("Terrain");
                })*/

                /*catChambre.checked = function(){
                    //alert("nouveau terrain")
                    document.getElementById("caractChambre").style.display = "block";
                }*/

               // catChambre.onclick = function(){
                   // if(document.getElementById('catChambre').checked == true){
                        //document.getElementById("caractChambre").style.display = "block";
                       // alert("nouveau chambre");
                       /* for(let i = 0 ; i<=caractSpecifique.length ; i++ ){
                            caractSpecifique[i].style.display = "none" ;
                        }

                        if(document.getElementById('catChambre').checked == true){
                            caractChambre.style.display = "block";


                        }*/


                   // }
              // }

            </script>

            
        </body>
        </html>

        
    <?php 
    }


?>
