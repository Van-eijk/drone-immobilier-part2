<?php 
    //session_start();
    // On définit le lien du logo pour cette page

    $lienLogo ="Images/logo2.png" ;
    $title = "ADMINISTRATEUR";


?>


<?php 
    // Traitement des données du formulaire

    // On inclut le fichier qui contient les informations de connexion à la base de données

    $lienFichierBDD = "database/config.php" ;
     include($lienFichierBDD);
 
    // On inclut la classe la classe Admin
 
    include("class/Admin.php");


    $erreurPassword;


    if(isset($_POST["logAdmin"])){
        //echo"bjr les zeros";

        if(!empty($_POST["emailFormContact"])){

            if(!empty($_POST["password"])){

                /*echo $_SERVER['REMOTE_ADDR'];*/

                $conAdmin = new Admin(); // On instencie la classe Admin                

                $redirectionPageMembre = "Location:index.php";
                $redirectionPageAdmin = "Location:dashboard-admin.php" ;
                $lienPageConnexion = "index.php";


                $email = $_POST["emailFormContact"];

                $passwordHache = sha1($_POST["password"]); // On hache le mot de passe afin de le comparer avec celui qui se trouve dans la BDD

                $conAdmin->connexionEspaceMembre($lienFichierBDD, $lienPageConnexion, $redirectionPageAdmin, $redirectionPageMembre, $email, $passwordHache) ;

                if(!empty($conAdmin->connexionEspaceMembre($lienFichierBDD, $lienPageConnexion, $redirectionPageAdmin, $redirectionPageMembre, $email, $passwordHache))){

                    $erreurPassword = $conAdmin->connexionEspaceMembre($lienFichierBDD, $lienPageConnexion, $redirectionPageAdmin, $redirectionPageMembre, $email, $passwordHache) ;

                }

            }
        }
    }
?>


















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRONE IMMOBILIER - ADMIN</title>
    <link rel="stylesheet" href="style-admin/index-admin.css">


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

        //include("loginAdmin.php");

    ?>

    

    <div class="main-content-contact">
        <div class="main-form-contact">

            <form action="logadmin.php" method="post">

                <div class="email-form-contact">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" placeholder="Entrez votre adresse email" name="emailFormContact" autocomplete="none" autofocus>
                </div>

                <div class="password">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <input type="password" placeholder="Entrer votre mot de passe" name="password">
                </div>
                <?php 
                    if(!empty($erreurPassword)){
                        echo"".$erreurPassword."";
                    }
                ?>

                <div class="send-form">
                    <button type="submit" name="logAdmin">
                        <p>Connexion</p>
                    </button>
                </div>
            </form>
        </div>

        <div class="forgot-password">
            <a href="forgot-password-admin.php">Mot de passe oublié ?</a>
        </div>

        <a href="dashboard-admin.php">test</a>

    </div>




    <!-- On inclut le pieds de page -->

    <?php include('footer/footer.php') ; ?>



    
</body>
</html>