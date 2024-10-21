<?php session_start();?>


<?php 
    // On définit le lien du logo pour cette page

    $lienLogo ="images/logo2.png" ;

    /*echo $_POST["locationVente"];*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drone-immobilier</title>
    
    <!-- Favicon du site -->
    
    <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">


    <!-- Feuille de style principale-->
        <link rel="stylesheet" href="style/index.css">

        <!-- Feuille de style des icones-->
    <link rel="stylesheet" href="Icons/css/all.css">

        <!-- Feuille de style du dossier header-->
    <link rel="stylesheet" href="header/style/header.css">


     <!-- Feuille de style du dossier footer-->
     <link rel="stylesheet" href="footer/style/footer.css">
</head>
<body>
    <?php include("header/header.php"); ?>

    <div class="backgroung-presentation">
        <div class="search-box">




            <form action="resultsearch.php" method="POST">

                <div class="location-vente">


                    <div class="btn-radio">
                        <input type="radio" class="btn-louer-vente" name="locationVente" value="location" id="radioLouer" checked="checked"  >
                        <input type="radio" class="btn-louer-vente" name="locationVente" value="vente" id="radioVendre">
                    </div>



                    <label class="location" onmouseover="locationOver()" onmouseleave="locationLeave()" for= "radioLouer" >
                        <div class="location-icon" id="locationIcon">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <p id="locationTitle" >Louer</p>
                    </label>

                    <label class="vente" onmouseover="venteOver()" onmouseleave="venteLeave()" for="radioVendre" >
                        <div class="vente-icon" id="venteIcon" >
                            <i class="fa-solid fa-house-chimney"></i>
                        </div>
                        <p id="venteTitle" >Acheter</p>
                    </label>

                </div>

                <div class="search-option">
                    <div class="search-pays">
                        <select name="searchPays" id="">
                            <option value="Cameroun" selected = "selected" >Cameroun</option>
                            

                        </select>
                    </div>


                    <div class="search-ville">
                        <select name="searchVille" id="">
                            <option value="Yaounde" selected = "selected" >Yaounde</option>
                            <option value="Douala">Douala</option>
                            

                        </select>
                    </div>


                    <div class="search-bien">
                        <select name="searchTypeBien" id="">
                            <option value="Studio" selected = "selected" >Studio</option>
                            <option value="Chambre">Chambre</option>
                            <option value="Appartement">Appartement</option>
                            <option value="Maison">Maison</option>
                            <option value="Terrain">Terrain</option>

                        </select>
                    </div>

                    <div class="search-send">
                        <button type="submit" name="searchSend"><i class="fa-solid fa-magnifying-glass fa-beat-fade"></i></button>

                    </div>
                </div>

            </form>

        </div>

    </div>

    <div class="second-part">
        <div class="bloc-gauche"></div>
        <h2>NOS DOMAINES D'EXPERTISES</h2>
        <div class="bloc-droit"></div>
    </div>

    <div class="services-slide">
        <img src="images/slider/bureau.jpg" alt="" class="serviceslide active">
        <img src="images/slider/maison.jpg" alt="" class="serviceslide ">
        <img src="images/slider/maison2.jpg" alt=""class="serviceslide ">
        <img src="images/slider/salon.jpg" alt="" class="serviceslide ">
        <img src="images/slider/salon2.jpg" alt="" class="serviceslide">


        
        <div class="suivant">
            <i class="fa-solid fa-circle-arrow-right"></i>

        </div>
        <div class="precedent">
            <i class="fa-solid fa-circle-arrow-left"></i>

        </div>

        <div class="step-slide">
            <div class="step" style = "opacity:1;"></div>
            <div class="step"></div>
            <div class="step" ></div>
            <div class="step"></div>
            <div class="step"></div>

        </div>
    

        
    </div>

    <div class="min-presentation">
        <p>
            <strong>Drone immobilier</strong> est une entreprise immobilère et de service à la personne basée au Cameroun.

        </p>

        <p>
            Notre priorité est de vous accompagner dans tous vos projets immobiliers, qu'il s'agisse de vente, d'achat, d'investissement immobilier, de gestion locative ou de location d'un bien au Cameroun et dans le monde. Cette complémentarité d'activités nous permet de mieux vous orienter sur l'ensemble de vos choix.

        </p>

        <p>
            Chacun de nos clients est unique et à ce titre, nos collaborateurs font du conseil, de l'information et de la recherche une priorité afin de vous aider, faciliter et sécuriser vos démarches.

        </p>
    </div>


    <div class="main-service-img">
        <div class="img-service">
            <div class="img">
                <img src="images/services/ServiceImmobilier.png" alt="">
                <div class="action">
                    <a href="">Location</a>
                    <a href="">Vente</a>
                    <a href="">Gest. Imo.</a>


                </div>
            </div>

            <div class="img">
                <img src="images/services/CONSTRUCTION.png" alt="">
                <div class="action">
                    <a href="">Nos offres</a>

                </div>
            </div>

            <div class="img">
                <img src="images/services/RECRUTEMENT.png" alt="">
                <div class="action">
                    <a href="">Nos offres</a>


                </div>
            </div>

            <div class="img">
                <img src="images/services/guide.png" alt="">
                <div class="action">
                    <a href="">Nos offres</a>


                </div>
            </div>

            <div class="img">
                <img src="images/services/commerce.png" alt="">
                <div class="action">
                    <a href="">Nos offres</a>


                </div>
            </div>
        </div>
    </div>

    <div class="second-presentation">
        <div class="main-second-presentation">
            <p>       
                Votre agence immobilière <strong>DRONE IMMOBILIER</strong> vous accompagne dans tous vos projets immobiliers, qu’ils soient grands ou petits, qu’ils concernent la location ou la vente, qu’ils soient dans l’ancien ou le neuf.                
            </p>
            <p>
                Ayant plus de demandes que d’offres pariculièrement au Cameroun et dans le monde entier, il est important de rester à l’affut de la moindre nouveauté mise sur le marché. C’est pour cela qu’il est primordiale de faire confiance à un expert du secteur. <strong>DRONE IMMOBILIER</strong> vous propose de nombreuses offres immobilières, mais aussi ses services tels que l’accompagnement juridique et la gestion administrative.

            </p>

            <p>
                Faire appel à notre agence immobilière <strong>DRONE IMMOBILIER</strong>, c’est bénéficier d’un accompagnement personnalisé et sans faille. Nous vous aidons à déterminer votre budget, clarifier vos attentes, et réaliser votre projet immobilier. Faites-nous part de vos envies, et nous ferons notre maximum pour vous trouver le bien qui vous correspond.

            </p>

            <p>
                Chez <strong>DRONE IMMOBILIER</strong>, nous vous proposons un large choix de biens à la vente, mais aussi à la location. Vous êtes à la recherche d’un appartement à louer ? Ou vous souhaitez faire gérer votre bien ? N'hésitez plus, <strong>DRONE IMMOBILIER</strong> est là pour vous !
            </p>
        </div>

       

    </div>


    <!-- On inclut le pieds de page -->


    <?php include('footer/footer.php') ; ?>


    <script src="js/effetLocationVente.js"></script>
    <script src="js/serviceSliderAuto.js"></script>
</body>
</html>