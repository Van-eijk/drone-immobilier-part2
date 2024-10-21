<?php 

    setlocale(LC_MONETARY,"en_US");
    // On définit le lien du logo pour cette page


    $lienLogo ="images/logo2.png" ;

    // on importe la base de données
    include("database/config.php");
    $locaVente = "";

    if(isset($_GET["locavente"])){

        $locaVente = $_GET["locavente"];

    }else{
        $locaVente = "location";
    }


    




   
    /*echo $_POST["locationVente"];*/
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drone immobilier location</title>
     <!-- Feuille de style du dossier header-->
     <link rel="stylesheet" href="header/style/header.css">
     
     <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">

      <!-- Feuille de style des icones-->
    <link rel="stylesheet" href="Icons/css/all.css">

    <link rel="stylesheet" href="style/location.css">
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
            $reqSelectBienLocation = $connexionDataBase ->prepare('SELECT * FROM bien WHERE location_vente = :locaVente ORDER BY id_Bien DESC');

            $reqSelectBienLocation -> execute(array(
                'locaVente'=> $locaVente
            ));

        ?>

        <?php 
            while($donneesBienLocation =  $reqSelectBienLocation ->fetch()) {
        ?>

            <!-- c'est ici que tout commence -->
            
            


            <div class="pub-location">
                <a href="pub-location-details.php?identifiantBien=<?php
                    echo $donneesBienLocation['id_Bien'] ;
                ?>">
                    <!-- photo de couverture -->
                    <?php 
                        $tabPhotoPu = $donneesBienLocation['lien_photo1'] ;
                        //echo strlen($tabPhotoPu);
                        $tabPhotoPub = json_decode($tabPhotoPu) ;
                        //echo $tabPhotoPub[0];

                    ?>
                        <img src="<?php echo $tabPhotoPub[0]; ?>" alt="location_villa1">
                        <div class="pub-location-information">
                            <div class="pub-titre-localite">

                                <h2><?php echo ucfirst($donneesBienLocation['titre_bien']) ; ?></h2>
                                
                                <div class="pub-localite-date">
                                    <div class="pub-localite">
                                        <span><i class="fa-solid fa-location-dot"></i></span>
                                        <p><?php echo ucfirst($donneesBienLocation['pays_bien']) ; ?> - <?php echo ucfirst($donneesBienLocation['ville_bien']) ; ?></p>
                                    </div>

                                    <div class="pub-date">
                                        <span><i class="fa-solid fa-clock"></i></span>
                                        <p class="date_pub"><?php echo $donneesBienLocation['date_time_bien']; ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="loyer-prix">
                                <?php 
                                    if($locaVente == "location"){ 
                                ?>
                                    <p>Loyer : <?php echo number_format($donneesBienLocation['prix_bien'],0,",",".") ; ?> Fcfa/ mois</p>

                                    <?php 

                                        }
                                        else{ 
                                    ?>
                                       
                                       <p>Prix : <?php echo number_format($donneesBienLocation['prix_bien'],0,",","."); ?> Fcfa</p>

                                    <?php 
                                        }
                                    ?>
                                
                            </div>

                        </div>
                </a>
            </div>
                 
                

        <?php 
            }
        ?>


       



        
        

    </div>


    <?php include('footer/footer.php') ; ?>

    
    
</body>
</html>