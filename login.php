<?php 
    // On définit le lien du logo pour cette page

    $lienLogo ="images/logo2.png" ;
    $title = "CONNEXION";


    /*echo $_POST["locationVente"];*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drone immobilier - contactez nous</title>
    <link rel="stylesheet" href="style/login.css">


    <link rel="stylesheet" href="header-title/header-title.css">
    
    <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">



        <!-- Feuille de style des icones-->
        <link rel="stylesheet" href="Icons/css/all.css">

        <!-- Feuille de style du dossier header-->
        <link rel="stylesheet" href="header/style/header.css">


        <!-- Feuille de style du dossier footer-->
        <link rel="stylesheet" href="footer/style/footer.css">
</head>
<body>
    <?php 
        include("header/header.php"); 
        include("header-title/header-title.php");

    ?>

    

    <div class="main-content-contact">
        <div class="main-form-contact">
            <form action="" method="post">

                <div class="email-form-contact">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" placeholder="Entrez votre adresse email" name="emilFormContact" autocomplete="none" autofocus>
                </div>

                <div class="password">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <input type="password" placeholder="Entrer votre mot de passe" name="password">
                </div>

                <div class="send-form">
                    <button type="submit">
                        <p>Connexion</p>
                    </button>
                </div>
            </form>
        </div>

        <div class="forgot-password">
            <a href="forgot-password.php">Mot de passe oublié ?</a>
        </div>

        <div class="new-account">
            <a href="signup.php">Créer un nouveau compte</a>
        </div>
    </div>




    <!-- On inclut le pieds de page -->

    <?php include('footer/footer.php') ; ?>



    
</body>
</html>