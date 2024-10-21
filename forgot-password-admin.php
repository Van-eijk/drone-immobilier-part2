<?php 
    // On définit le lien du logo pour cette page

    $lienLogo ="Images/logo2.png" ;
    $title = "MOT DE PASSE ADMINISTRATEUR OUBLIE ?";


    /*echo $_POST["locationVente"];*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drone immobilier - contactez nous</title>
    <link rel="stylesheet" href="style-admin/forgot-password-admin.css">


    <link rel="stylesheet" href="header-title/header-title.css">
    
    <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">



        <!-- Feuille de style des icones-->
        <link rel="stylesheet" href="Icons/css/all.css">

       


        <!-- Feuille de style du dossier footer-->
        <link rel="stylesheet" href="footer/style/footer.css">
</head>
<body>
    <?php 
        include("header-title/header-title.php");

    ?>

    

    <div class="main-content-contact">
        <p>Entrez votre adresse email à laquelle nous allons envoyer un code de vérification</p>
        <div class="main-form-contact">
            <form action="" method="post">

                <div class="email-form-contact">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" placeholder="Entrez votre adresse email" name="emilFormContact" autocomplete="none" autofocus>
                </div>

                <div class="send-form">
                    <button type="submit">
                        <p>Envoyer</p>
                    </button>
                </div>
            </form>
        </div>

        <div class="already-account">
            <p>Vous avez déjà un compte ? <a href="index.php">Connectez-vous !</a></p>
            
        </div>
    </div>




    <!-- On inclut le pieds de page -->

    <?php include('footer/footer.php') ; ?>



    
</body>
</html>