<head>
    <link rel="stylesheet" href="style/header.css">
</head>

<?php 
    $lienLogo;
?>



<header>
        <div class="main-logo">
            <a href="index.php"><img src="<?php echo $lienLogo ; ?>" alt=""></a>

        </div>

        <div class="menu">
            <ul class="menuderoulant">
                <li> 
                    <a href="#" id="serviceImmo">Services immobilier
                        <i class="fa-solid fa-caret-down"></i>  
                    </a>
                    

                    <ul class="sousmenu" >
                        <li><a href="location.php?locavente=location" style="border-top-left-radius: 5px; border-top-right-radius: 5px; " >Location</a></li>
                        <li><a href="location.php?locavente=vente">Vente</a></li>
                        <li><a href="gestion-immobiliere.php" style="border-radius: 5px;" >Gestion immobilière</a></li>
                    </ul>
                </li>

                <li><a href="construction-preservation.php">Construction & préservation</a></li>
                <li><a href="recrutement-etranger-tourisme.php">Recrutement étranger et tourisme</a></li>
                <li><a href="guidebesoin.php">Guide Besoin</a></li>
                <li><a href="commerce-gen.php">Commerce generale</a></li>
                <li><a href="aboutus.php">A propos de nous</a></li>
                
            </ul>


            <div class="whatsapp" title="Contactez-nous">
                <a href="contactus.php">
                    <span><i class="fa-solid fa-envelope"></i></span>
                </a>
            </div>
            <div class="user">
               <a href="login.php">
                    <div class="icon-user">
                        <span><i class="fa-solid fa-user"></i></span>
                    </div>
                    <div class="name-user">
                        <p>Connexion</p>
                    </div>
               </a>
            </div>
        </div>
    </header>