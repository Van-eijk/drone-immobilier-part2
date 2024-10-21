<?php 

    setlocale(LC_MONETARY,"en_US");
    // On définit le lien du logo pour cette page


    $lienLogo ="images/logo2.png" ;

    // on importe la base de données
    include("database/config.php");

    $reqResultatRecherche;
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultats de la recherche</title>
     <!-- Feuille de style du dossier header-->
     <link rel="stylesheet" href="header/style/header.css">
     
     <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">

      <!-- Feuille de style des icones-->
    <link rel="stylesheet" href="Icons/css/all.css">

    <link rel="stylesheet" href="style/resultsearch.css">
    <link rel="stylesheet" href="header-search/header-search.css">


    <!-- Feuille de style du dossier footer-->
    <link rel="stylesheet" href="footer/style/footer.css">
</head>
<body>
    <?php 
        include('header/header.php');
    ?>
    <div class="header-blank">
        <!-- VIDE -->

    </div>

    <?php include('header-search/header-search.php') ;?>



    <div class="location-main-content">

        <!-- c'est ici que tout commence -->
        <?php


            // Recensement des variables du formulaire de recherche

            if(isset($_POST['searchSend'])){
                if(isset($_POST['locationVente'])){
                    if(isset($_POST['searchPays'])){
                        if(isset($_POST['searchVille'])){
                            if(isset($_POST['searchTypeBien'])){

                                $locationVente = $_POST['locationVente'] ;
                                $searchPays = $_POST['searchPays'];
                                $searchVille = $_POST['searchVille'] ;
                                $searchTypeBien = $_POST['searchTypeBien'];


                                if($searchTypeBien == "Terrain"){
                                    $reqResultatRecherche = $connexionDataBase ->prepare('SELECT * FROM bien INNER JOIN terrain ON bien.id_Bien = terrain.id_bienFK WHERE pays_bien = :paysRecherche AND ville_bien = :villeRecherche AND bien.location_vente = :locavente' );

                                    $reqResultatRecherche -> execute(array(
                                        'paysRecherche'=> $searchPays,
                                        'villeRecherche'=> $searchVille,
                                        'locavente' => $locationVente
                                    ));

                                    if($reqResultatRecherche -> rowCount() >= 1 ){

                                        
                                        while($donneesResultatRecherche =  $reqResultatRecherche ->fetch()) {

                                            ?>
        
                                                <div class="pub-location">
                                                    <a href="pub-location-details.php?identifiantBien=<?php
                                                        echo $donneesResultatRecherche['id_Bien'] ;
                                                    ?>">
                                                        <!-- photo de couverture -->
                                                        <?php 
                                                            $tabPhotoPu = $donneesResultatRecherche['lien_photo1'] ;
                                                            //echo strlen($tabPhotoPu);
                                                            $tabPhotoPub = json_decode($tabPhotoPu) ;
                                                            //echo $tabPhotoPub[0];
        
                                                        ?>
                                                            <img src="<?php echo $tabPhotoPub[0]; ?>" alt="location_villa1">
                                                            <div class="pub-location-information">
                                                                <div class="pub-titre-localite">
        
                                                                    <h2><?php echo ucfirst($donneesResultatRecherche['titre_bien']) ; ?></h2>
                                                                    
                                                                    <div class="pub-localite-date">
                                                                        <div class="pub-localite">
                                                                            <span><i class="fa-solid fa-location-dot"></i></span>
                                                                            <p><?php echo ucfirst($donneesResultatRecherche['pays_bien']) ; ?> - <?php echo ucfirst($donneesResultatRecherche['ville_bien']) ; ?></p>
                                                                        </div>
        
                                                                        <div class="pub-date">
                                                                            <span><i class="fa-solid fa-clock"></i></span>
                                                                            <p class="date_pub"><?php echo $donneesResultatRecherche['date_time_bien']; ?></p>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="loyer-prix">
                                                                    <?php 
                                                                        if($donneesResultatRecherche['location_vente'] == "location"){ 
                                                                    ?>
                                                                        <p>Loyer : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",",".") ; ?> Fcfa/ mois</p>
        
                                                                        <?php 
        
                                                                            }
                                                                            else{ 
                                                                        ?>
                                                                        
                                                                        <p>Prix : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",","."); ?> Fcfa</p>
        
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    
                                                                </div>
        
                                                            </div>
                                                    </a>
                                                </div>
        
                                            <?php
                                        }
                                            
                                    }else{ 
                                        ?>
                                        <h1>Aucun resultat</h1>
                                        
                                    <?php 
                                    }
    


                                }


                                /* *********************************** */

                                if($searchTypeBien == "Appartement"){

                                    $reqResultatRecherche = $connexionDataBase ->prepare('SELECT * FROM bien INNER JOIN maison ON bien.id_Bien = maison.id_bienFK WHERE pays_bien = :paysRecherche AND ville_bien = :villeRecherche AND bien.location_vente = :locavente AND maison.nbre_chambre = 2');

                                    $reqResultatRecherche -> execute(array(
                                        'paysRecherche'=> $searchPays,
                                        'villeRecherche'=> $searchVille,
                                        'locavente' => $locationVente
                                    ));

                                    if($reqResultatRecherche -> rowCount() >= 1 ){

                                        
                                        while($donneesResultatRecherche =  $reqResultatRecherche ->fetch()) {

                                            ?>
        
                                                <div class="pub-location">
                                                    <a href="pub-location-details.php?identifiantBien=<?php
                                                        echo $donneesResultatRecherche['id_Bien'] ;
                                                    ?>">
                                                        <!-- photo de couverture -->
                                                        <?php 
                                                            $tabPhotoPu = $donneesResultatRecherche['lien_photo1'] ;
                                                            //echo strlen($tabPhotoPu);
                                                            $tabPhotoPub = json_decode($tabPhotoPu) ;
                                                            //echo $tabPhotoPub[0];
        
                                                        ?>
                                                            <img src="<?php echo $tabPhotoPub[0]; ?>" alt="location_villa1">
                                                            <div class="pub-location-information">
                                                                <div class="pub-titre-localite">
        
                                                                    <h2><?php echo ucfirst($donneesResultatRecherche['titre_bien']) ; ?></h2>
                                                                    
                                                                    <div class="pub-localite-date">
                                                                        <div class="pub-localite">
                                                                            <span><i class="fa-solid fa-location-dot"></i></span>
                                                                            <p><?php echo ucfirst($donneesResultatRecherche['pays_bien']) ; ?> - <?php echo ucfirst($donneesResultatRecherche['ville_bien']) ; ?></p>
                                                                        </div>
        
                                                                        <div class="pub-date">
                                                                            <span><i class="fa-solid fa-clock"></i></span>
                                                                            <p class="date_pub"><?php echo $donneesResultatRecherche['date_time_bien']; ?></p>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="loyer-prix">
                                                                    <?php 
                                                                        if($donneesResultatRecherche['location_vente'] == "location"){ 
                                                                    ?>
                                                                        <p>Loyer : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",",".") ; ?> Fcfa/ mois</p>
        
                                                                        <?php 
        
                                                                            }
                                                                            else{ 
                                                                        ?>
                                                                        
                                                                        <p>Prix : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",","."); ?> Fcfa</p>
        
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    
                                                                </div>
        
                                                            </div>
                                                    </a>
                                                </div>
        
                                            <?php
                                        }
                                            
                                    }else{ 
                                        ?>
                                        <h1>Aucun resultat</h1>
                                        
                                    <?php 
                                    }
    


                                    
                                }




                                if($searchTypeBien == "Studio"){

                                    $reqResultatRecherche = $connexionDataBase ->prepare('SELECT * FROM bien INNER JOIN maison ON bien.id_Bien = maison.id_bienFK WHERE pays_bien = :paysRecherche AND ville_bien = :villeRecherche AND bien.location_vente = :locavente AND maison.nbre_chambre = 1');

                                    $reqResultatRecherche -> execute(array(
                                        'paysRecherche'=> $searchPays,
                                        'villeRecherche'=> $searchVille,
                                        'locavente' => $locationVente
                                    ));

                                    if($reqResultatRecherche -> rowCount() >= 1 ){

                                        
                                        while($donneesResultatRecherche =  $reqResultatRecherche ->fetch()) {

                                            ?>
        
                                                <div class="pub-location">
                                                    <a href="pub-location-details.php?identifiantBien=<?php
                                                        echo $donneesResultatRecherche['id_Bien'] ;
                                                    ?>">
                                                        <!-- photo de couverture -->
                                                        <?php 
                                                            $tabPhotoPu = $donneesResultatRecherche['lien_photo1'] ;
                                                            //echo strlen($tabPhotoPu);
                                                            $tabPhotoPub = json_decode($tabPhotoPu) ;
                                                            //echo $tabPhotoPub[0];
        
                                                        ?>
                                                            <img src="<?php echo $tabPhotoPub[0]; ?>" alt="location_villa1">
                                                            <div class="pub-location-information">
                                                                <div class="pub-titre-localite">
        
                                                                    <h2><?php echo ucfirst($donneesResultatRecherche['titre_bien']) ; ?></h2>
                                                                    
                                                                    <div class="pub-localite-date">
                                                                        <div class="pub-localite">
                                                                            <span><i class="fa-solid fa-location-dot"></i></span>
                                                                            <p><?php echo ucfirst($donneesResultatRecherche['pays_bien']) ; ?> - <?php echo ucfirst($donneesResultatRecherche['ville_bien']) ; ?></p>
                                                                        </div>
        
                                                                        <div class="pub-date">
                                                                            <span><i class="fa-solid fa-clock"></i></span>
                                                                            <p class="date_pub"><?php echo $donneesResultatRecherche['date_time_bien']; ?></p>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="loyer-prix">
                                                                    <?php 
                                                                        if($donneesResultatRecherche['location_vente'] == "location"){ 
                                                                    ?>
                                                                        <p>Loyer : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",",".") ; ?> Fcfa/ mois</p>
        
                                                                        <?php 
        
                                                                            }
                                                                            else{ 
                                                                        ?>
                                                                        
                                                                        <p>Prix : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",","."); ?> Fcfa</p>
        
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    
                                                                </div>
        
                                                            </div>
                                                    </a>
                                                </div>
        
                                            <?php
                                        }
                                            
                                    }else{ 
                                        ?>
                                        <h1>Aucun resultat</h1>
                                        
                                    <?php 
                                    }
    


                                    
                                }




                                if($searchTypeBien == "Maison"){

                                    $reqResultatRecherche = $connexionDataBase ->prepare('SELECT * FROM bien INNER JOIN maison ON bien.id_Bien = maison.id_bienFK WHERE pays_bien = :paysRecherche AND ville_bien = :villeRecherche AND bien.location_vente = :locavente AND maison.nbre_chambre >= 2');

                                    $reqResultatRecherche -> execute(array(
                                        'paysRecherche'=> $searchPays,
                                        'villeRecherche'=> $searchVille,
                                        'locavente' => $locationVente
                                    ));

                                    if($reqResultatRecherche -> rowCount() >= 1 ){

                                        
                                        while($donneesResultatRecherche =  $reqResultatRecherche ->fetch()) {

                                            ?>
        
                                                <div class="pub-location">
                                                    <a href="pub-location-details.php?identifiantBien=<?php
                                                        echo $donneesResultatRecherche['id_Bien'] ;
                                                    ?>">
                                                        <!-- photo de couverture -->
                                                        <?php 
                                                            $tabPhotoPu = $donneesResultatRecherche['lien_photo1'] ;
                                                            //echo strlen($tabPhotoPu);
                                                            $tabPhotoPub = json_decode($tabPhotoPu) ;
                                                            //echo $tabPhotoPub[0];
        
                                                        ?>
                                                            <img src="<?php echo $tabPhotoPub[0]; ?>" alt="location_villa1">
                                                            <div class="pub-location-information">
                                                                <div class="pub-titre-localite">
        
                                                                    <h2><?php echo ucfirst($donneesResultatRecherche['titre_bien']) ; ?></h2>
                                                                    
                                                                    <div class="pub-localite-date">
                                                                        <div class="pub-localite">
                                                                            <span><i class="fa-solid fa-location-dot"></i></span>
                                                                            <p><?php echo ucfirst($donneesResultatRecherche['pays_bien']) ; ?> - <?php echo ucfirst($donneesResultatRecherche['ville_bien']) ; ?></p>
                                                                        </div>
        
                                                                        <div class="pub-date">
                                                                            <span><i class="fa-solid fa-clock"></i></span>
                                                                            <p class="date_pub"><?php echo $donneesResultatRecherche['date_time_bien']; ?></p>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="loyer-prix">
                                                                    <?php 
                                                                        if($donneesResultatRecherche['location_vente'] == "location"){ 
                                                                    ?>
                                                                        <p>Loyer : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",",".") ; ?> Fcfa/ mois</p>
        
                                                                        <?php 
        
                                                                            }
                                                                            else{ 
                                                                        ?>
                                                                        
                                                                        <p>Prix : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",","."); ?> Fcfa</p>
        
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    
                                                                </div>
        
                                                            </div>
                                                    </a>
                                                </div>
        
                                            <?php
                                        }
                                            
                                    }else{ 
                                        ?>
                                        <h1>Aucun resultat</h1>
                                        
                                    <?php 
                                    }
    


                                    
                                }



                                if($searchTypeBien == "Chambre"){

                                    $reqResultatRecherche = $connexionDataBase ->prepare('SELECT * FROM bien INNER JOIN chambre ON bien.id_Bien = chambre.id_bienFK WHERE bien.pays_bien = :paysRecherche AND bien.ville_bien = :villeRecherche AND bien.location_vente = :locavente');

                                    $reqResultatRecherche -> execute(array(
                                        'paysRecherche'=> $searchPays,
                                        'villeRecherche'=> $searchVille,
                                        'locavente' => $locationVente
                                    ));

                                    if($reqResultatRecherche -> rowCount() >= 1 ){

                                        
                                        while($donneesResultatRecherche =  $reqResultatRecherche ->fetch()) {

                                            ?>
        
                                                <div class="pub-location">
                                                    <a href="pub-location-details.php?identifiantBien=<?php
                                                        echo $donneesResultatRecherche['id_Bien'] ;
                                                    ?>">
                                                        <!-- photo de couverture -->
                                                        <?php 
                                                            $tabPhotoPu = $donneesResultatRecherche['lien_photo1'] ;
                                                            //echo strlen($tabPhotoPu);
                                                            $tabPhotoPub = json_decode($tabPhotoPu) ;
                                                            //echo $tabPhotoPub[0];
        
                                                        ?>
                                                            <img src="<?php echo $tabPhotoPub[0]; ?>" alt="location_villa1">
                                                            <div class="pub-location-information">
                                                                <div class="pub-titre-localite">
        
                                                                    <h2><?php echo ucfirst($donneesResultatRecherche['titre_bien']) ; ?></h2>
                                                                    
                                                                    <div class="pub-localite-date">
                                                                        <div class="pub-localite">
                                                                            <span><i class="fa-solid fa-location-dot"></i></span>
                                                                            <p><?php echo ucfirst($donneesResultatRecherche['pays_bien']) ; ?> - <?php echo ucfirst($donneesResultatRecherche['ville_bien']) ; ?></p>
                                                                        </div>
        
                                                                        <div class="pub-date">
                                                                            <span><i class="fa-solid fa-clock"></i></span>
                                                                            <p class="date_pub"><?php echo $donneesResultatRecherche['date_time_bien']; ?></p>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="loyer-prix">
                                                                    <?php 
                                                                        if($donneesResultatRecherche['location_vente'] == "location"){ 
                                                                    ?>
                                                                        <p>Loyer : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",",".") ; ?> Fcfa/ mois</p>
        
                                                                        <?php 
        
                                                                            }
                                                                            else{ 
                                                                        ?>
                                                                        
                                                                        <p>Prix : <?php echo number_format($donneesResultatRecherche['prix_bien'],0,",","."); ?> Fcfa</p>
        
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    
                                                                </div>
        
                                                            </div>
                                                    </a>
                                                </div>
        
                                            <?php
                                        }
                                            
                                    }else{ 
                                        ?>
                                        <h1>Aucun resultat</h1>
                                        
                                    <?php 
                                    }
    


                                    
                                }
                                


                                
                                

                        
                            }
                        }
                    }

                }
            }
        


        ?>

       


       



        
        

    </div>


    <?php include('footer/footer.php') ; ?>

    
    
</body>
</html>