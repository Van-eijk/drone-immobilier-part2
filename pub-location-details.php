<?php 
    // On définit le lien du logo pour cette page

    $lienLogo ="images/logo2.png" ;
    include("database/config.php");




?>

<?php

    /************* ON RECUPERE LES INFORMATIONS DEPUIS LA BASE DE DONNEES ********** */
    if(isset($_GET["identifiantBien"])){
        $identifiantBien = $_GET["identifiantBien"] ; // on recupère la variable provenant du lien


        $reqDetailsBien = $connexionDataBase ->prepare('SELECT * FROM bien WHERE id_Bien = :identifiantB');
        $reqDetailsBien -> execute(array('identifiantB'=> $identifiantBien));
        $resultatReqDetailsBien = $reqDetailsBien->fetch();

        if(!empty($resultatReqDetailsBien)){
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details de la publication</title>
     <!-- Feuille de style du dossier header-->
     <link rel="stylesheet" href="header/style/header.css">

      <!-- Feuille de style des icones-->
    <link rel="stylesheet" href="Icons/css/all.css">
    
    <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">

    <link rel="stylesheet" href="style/pub-location-details.css">

    <!-- Feuille de style du dossier footer-->
    <link rel="stylesheet" href="footer/style/footer.css">
</head>
<body>
    <?php 
        include('header/header.php') ;
    ?>
        <div class="header-blank-location">
            <!-- VIDE -->

        </div>

        <div class="pub-option">
            <div class="num-pub">
                <p> <?php echo $resultatReqDetailsBien['reference_bien'];?> </p>

                <div class="pub-date-header">
                    <span><i class="fa-solid fa-clock"></i></span>
                    <p><?php echo $resultatReqDetailsBien['date_time_bien'];?></p>
                </div>

            </div>

            <div class="imprimer-fav">
                <div class="imprimer">
                    <span>
                        <i class="fa-solid fa-print"></i>
                    </span>
                    <p>Imprimer</p>
                </div>
                <div class="fav">
                    <span>
                        <i class="fa-regular fa-heart"></i>

                    </span>
                    <p>Favoris</p>
                </div>
            </div>

            <div class="visite-whatsapp">
                <div class="visite">
                    <span>
                        <i class="fa-solid fa-file-signature"></i>
                    </span>
                    <p>Demander une viste</p>
                </div>
                <div class="whatsapp-pub">
                    <a href="https://wa.me/237678879197?text=Besoin de plus de renseignements sur cet article SVP https://drone-immobilier.site/pub-location-details.php?identifiantBien=<?php echo $identifiantBien ; ?>">
                        <span class="share-whatsapp"> 
                                 <i class="fa-brands fa-whatsapp fa-beat"></i>
                        </span>
                    
                    </a>
                </div>
            </div>


        </div>

        <div class="main-details-pub">
            <div class="all-picture-pub">
                <div class="main-picture-pub">
                    <?php
                        $tabPhotoPub = $resultatReqDetailsBien['lien_photo1'];
                        $tabPhotoPub = json_decode($tabPhotoPub);

                        for($i= 0;$i<count($tabPhotoPub);$i++) {
                    ?>

                        <img src="<?php echo $tabPhotoPub[$i] ;?>" class="main-img " alt="">

                    <?php
                        }
                    ?>


                    <div class="bouton-next-prev">
                        <button onclick="prevPicture()" ><i class="fa-solid fa-circle-chevron-left"></i></button>
                        <button onclick="nextPicture()"><i class="fa-solid fa-circle-chevron-right"></i></button>
                    </div>

                </div>


                <div class="picture-pub">

                    <?php

                        for($i= 0;$i<count($tabPhotoPub);$i++) {
                    ?>

                        <div class="picture">
                            <img src="<?php echo $tabPhotoPub[$i] ;?>" class="side-picture" alt="">
                        </div>

                    <?php
                        }
                    ?>

                    
                    
                </div>
            </div>
        </div>

        <div class="description-pub">
            <div class="description-header">

                <div class="titre-caracteristiques">

                    <div class="titre">
                        <h2><?php echo ucfirst($resultatReqDetailsBien['titre_bien']) ;?></h2>

                    </div>

                    <!--  Commencons le tri des donnees  -->

                    <?php

                        // On verifie si le bien se trouve dans la table chambre

                        $reqCaractSpecifique = $connexionDataBase -> prepare('SELECT * FROM chambre WHERE id_bienFK = :idBienFK');
                        $reqCaractSpecifique -> execute(array(
                            'idBienFK'=> $identifiantBien
                        ));

                    

                        $resultatReqCaractChambre = $reqCaractSpecifique -> fetch();

                        if(!empty($resultatReqCaractChambre)) {
                    ?>

                        <!-- Au cas où on a trouvé un resultat, on affiche les caracterisques de la chambre -->

                        <div class="caracteristique">
                            <div class="surface-terrain">
                                <span><i class="fa-solid fa-chart-area"></i></span>
                                <p> <?php echo $resultatReqCaractChambre['superficie_chambre'] . " " . "m²"; ?> </p>
                            </div>

                            
                            <?php
                                if($resultatReqDetailsBien['parking'] > 0){ ?>

                                <div class="nbre-parking">
                                    <span><i class="fa-solid fa-square-parking"></i></span>
                                    <p><?php echo $resultatReqDetailsBien['parking']. " " . "Parking"; ?> </p>
                                </div>



                            <?php
                                }
                            ?>
                           

                            
                            <?php
                                if($resultatReqCaractChambre['cuisine_chambre'] == "OUI"){ ?>

                                <div class="nbre-cuisine">
                                    <span><i class="fa-solid fa-kitchen-set"></i></span>
                                    <p>1 Cuisine</p>
                                </div>



                            <?php
                                }
                            ?>

                            

                            <div class="nbre-chambre">
                                <span><i class="fa-solid fa-bed"></i></span>
                                <p>1 Chambre</p>
                            </div>



                            <?php
                                if($resultatReqCaractChambre['moderne_chambre'] == "OUI"){ ?>

                                <div class="nbre-douche">
                                    <span><i class="fa-solid fa-shower"></i></span>
                                    <p>1 Douche</p>
                                </div>



                            <?php
                                }
                            ?>


                        </div>

                    <?php 

                        }

                        // On verifie si le bien se trouve dans la table maison

                        $reqCaractSpecifique = $connexionDataBase -> prepare('SELECT * FROM maison WHERE id_bienFK = :idBienFK');
                        $reqCaractSpecifique -> execute(array(
                            'idBienFK'=> $identifiantBien
                        ));

                    

                        $resultatReqCaractMaison = $reqCaractSpecifique -> fetch();

                        if(!empty($resultatReqCaractMaison)) {
                       
                        
                    ?>  

                        <!-- Au cas où on a trouvé un resultat, on affiche les caracterisques de la maison -->


                        <div class="caracteristique">
                            <div class="surface-terrain">
                                <span><i class="fa-solid fa-chart-area"></i></span>
                                <p><?php echo $resultatReqCaractMaison['superficie_terrain'] . " " . "m²"; ?></p>
                            </div>

                            <div class="nbre-parking">
                                
                                <?php
                                    if($resultatReqDetailsBien['parking'] > 0){ ?>

                                        <div class="nbre-parking">
                                            <span><i class="fa-solid fa-square-parking"></i></span>
                                            <p><?php echo $resultatReqDetailsBien['parking']. " " . "Parking"; ?> </p>
                                        </div>

                                <?php
                                    }
                                ?>
                            </div>

                            <div class="nbre-salon">
                                <span><i class="fa-solid fa-couch"></i></span>
                                <?php
                                    if($resultatReqCaractMaison['nbre_cuisine'] > 1){
                                        ?>
                                        <p><?php echo $resultatReqCaractMaison['nbre_salon'] . " " . "Salons"; ?></p>
                                    <?php
                                    }else{
                                        ?>
                                        <p><?php echo $resultatReqCaractMaison['nbre_salon'] . " " . "Salon"; ?></p>
                                    <?php
                                    }
                                ?>
                            </div>

                            <div class="nbre-cuisine">
                                <span><i class="fa-solid fa-kitchen-set"></i></span>
                                <?php
                                    if($resultatReqCaractMaison['nbre_cuisine'] > 1){
                                        ?>
                                        <p><?php echo $resultatReqCaractMaison['nbre_cuisine'] . " " . "Cuisines"; ?></p>
                                    <?php
                                    }else{
                                        ?>
                                        <p><?php echo $resultatReqCaractMaison['nbre_cuisine'] . " " . "Cuisine"; ?></p>
                                    <?php
                                    }
                                ?>
                            </div>

                            <div class="nbre-chambre">
                                <span><i class="fa-solid fa-bed"></i></span>
                                <?php
                                    if($resultatReqCaractMaison['nbre_chambre'] > 1){
                                        ?>
                                        <p><?php echo $resultatReqCaractMaison['nbre_chambre'] . " " . "Chambres"; ?></p>
                                    <?php
                                    }else{
                                        ?>
                                        <p><?php echo $resultatReqCaractMaison['nbre_chambre'] . " " . "Chambre"; ?></p>
                                    <?php
                                    }
                                ?>
                            </div>



                            <div class="nbre-douche">
                                <span><i class="fa-solid fa-shower"></i></span>
                                <?php
                                    if($resultatReqCaractMaison['nbre_douche'] > 1){
                                        ?>
                                        <p><?php echo $resultatReqCaractMaison['nbre_douche'] . " " . "Douches"; ?></p>
                                    <?php
                                    }else{
                                        ?>
                                        <p><?php echo $resultatReqCaractMaison['nbre_douche'] . " " . "Douche"; ?></p>
                                    <?php
                                    }
                                ?>
                                
                            </div>

                        

                            <div class="nbre-autre-piece">
                                <span><i class="fa-regular fa-square"></i></span>
                                <?php
                                    if($resultatReqCaractMaison["nbre_piece"] > 0){

                                        if($resultatReqCaractMaison['nbre_piece'] > 1){
                                            ?>
                                            <p><?php echo $resultatReqCaractMaison['nbre_piece'] . " " . "Autres pieces"; ?></p>
                                        <?php
                                        }else{
                                            ?>
                                            <p><?php echo $resultatReqCaractMaison['nbre_piece'] . " " . "Autre piece"; ?></p>
                                        <?php
                                        }

                                    }
                                
                                   
                                ?>
                            </div>

                       

                        </div>




                    <?php 

                        }


                        // On verifie si le bien se trouve dans la table immeuble

                        $reqCaractSpecifique = $connexionDataBase -> prepare('SELECT * FROM immeuble WHERE id_bienFK = :idBienFK');
                        $reqCaractSpecifique -> execute(array(
                            'idBienFK'=> $identifiantBien
                        ));

                    

                        $resultatReqCaractImmeuble = $reqCaractSpecifique -> fetch();

                        if(!empty($resultatReqCaractImmeuble)) {

                    ?>


                        <!-- Au cas où on a trouvé un resultat, on affiche les caracterisques de l' immeuble -->


                        <div class="caracteristique">
                            <div class="surface-terrain">
                                <span><i class="fa-solid fa-chart-area"></i></span>
                                <p><?php echo $resultatReqCaractImmeuble['superficie_terrain_immeuble'] . " " . "m²"; ?></p>
                            </div>

                            <div class="nbre-etage">
                                <span><i class="fa-solid fa-building"></i></span>
                                <p><?php echo $resultatReqCaractImmeuble['nbre_etage'] . " " . "Niveaux"; ?></p>
                            </div>

                            <div class="nbre-parking">
                                

                                <?php
                                    if($resultatReqDetailsBien['parking'] > 0){ ?>

                                        <div class="nbre-parking">
                                            <span><i class="fa-solid fa-square-parking"></i></span>
                                            <p><?php echo $resultatReqDetailsBien['parking']. " " . "Parking"; ?> </p>
                                        </div>

                                <?php
                                    }
                                ?>

                                
                            </div>

                           

                       

                        </div>




                    <?php 

                        }

                        // On verifie si le bien se trouve dans la table magasin

                        $reqCaractSpecifique = $connexionDataBase -> prepare('SELECT * FROM magasin WHERE id_bienFK = :idBienFK');
                        $reqCaractSpecifique -> execute(array(
                            'idBienFK'=> $identifiantBien
                        ));

                    

                        $resultatReqCaractMagasin = $reqCaractSpecifique -> fetch();
                        if(!empty($resultatReqCaractMagasin)) {

                    ?>

                        <!-- Au cas où on a trouvé un resultat, on affiche les caracterisques du magasin -->


                        <div class="caracteristique">
                            <div class="surface-terrain">
                                <span><i class="fa-solid fa-chart-area"></i></span>
                                <p><?php echo $resultatReqCaractMagasin['superficie_magasin']. " " . "m²"; ?> </p>
                            </div>

                            

                            <div class="nbre-parking">

                                <?php
                                    if($resultatReqDetailsBien['parking'] > 0){ ?>

                                        <div class="nbre-parking">
                                            <span><i class="fa-solid fa-square-parking"></i></span>
                                            <p><?php echo $resultatReqDetailsBien['parking']. " " . "Parking"; ?> </p>
                                        </div>

                                <?php
                                    }
                                ?>
                                
                            </div>

                            

                        

                            <div class="nbre-autre-piece">
                                <span><i class="fa-regular fa-square"></i></span>

                                <?php
                                    if($resultatReqCaractMagasin["nombre_piece_magasin"] > 1){
                                ?>
                                    <p><?php echo $resultatReqCaractMagasin['nombre_piece_magasin']. " " . "Pieces"; ?> </p>
                                <?php
                                    }
                                    else{
                                        ?>
                                        <p><?php echo $resultatReqCaractMagasin['nombre_piece_magasin']. " " . "Piece"; ?> </p>

                                    <?php
                                    }
                                ?>
                            </div>

                       

                        </div>



                    <?php 

                        }


                        // On verifie si le bien se trouve dans la table terrain

                        $reqCaractSpecifique = $connexionDataBase -> prepare('SELECT * FROM terrain WHERE id_bienFK = :idBienFK');
                        $reqCaractSpecifique -> execute(array(
                            'idBienFK'=> $identifiantBien
                        ));

                    

                        $resultatReqCaractTerrain = $reqCaractSpecifique -> fetch();
                        if(!empty($resultatReqCaractTerrain)) {

                    ?>


                        <!-- Au cas où on a trouvé un resultat, on affiche les caracterisques du terrain -->


                        <div class="caracteristique">
                            <div class="surface-terrain">
                                <span><i class="fa-solid fa-chart-area"></i></span>
                                <p><?php echo $resultatReqCaractTerrain['superficie_terrain']. " " . "m²"; ?> </p>
                            </div>
                       

                        </div>


                        


                    <?php 

                        }
                    ?>


                        
                    

                    

                </div>
                <div class="pub-prix-localisation">
                    <div class="pub-prix">
                        <?php
                            if($resultatReqDetailsBien['location_vente'] == "location"){  
                            ?>
                                <p>Loyer : <?php echo number_format($resultatReqDetailsBien['prix_bien'],0,",",".");?> fr / mois</p>


                            <?php
                                }
                                else{
                                    ?>
                                    <p>Prix : <?php echo number_format($resultatReqDetailsBien['prix_bien'],0,",",".");?> fr</p>


                                <?php
                                }
                            ?>

                    </div>
                    <div class="pub-local">
                        <p>
                            <?php echo ucfirst($resultatReqDetailsBien['pays_bien']) . "-" . ucfirst($resultatReqDetailsBien['ville_bien']) . "-" . ucfirst($resultatReqDetailsBien['quartier_bien']) ;?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="main-description">
                <p>
                    <?php echo ucfirst($resultatReqDetailsBien['description_bien']) ;?>
                </p>
            </div>
        </div>



    <?php include('footer/footer.php') ; ?>

    <script src="js/pub-location-details-slide.js"></script>
    
</body>
</html>

        


    <?php 
    
    }
    else{
        echo "Une erreur s'est produite : Article innexistant !";
    }
}
else{
    echo "Une erreur s'est produite dans le lien";
}

    
?>


