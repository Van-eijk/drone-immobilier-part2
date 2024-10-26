<?php session_start() ;?>

<?php 
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
                <title>DASHBOARD-ADMIN</title>
                <link rel="stylesheet" href="style-admin/dashboard-admin.css">
                <link rel="stylesheet" href="header-menu-admin/header-menu-admin.css">
                
                <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">

                <!-- Feuille de style des icones-->
                <link rel="stylesheet" href="Icons/css/all.css">
            </head>
            <body>
                <?php include "header-menu-admin/header-menu-admin.php";?>

                <div class="admin-content">
                    <a href="ajout-bien.php" class="content-item" id="addPub" title="Ajouter un bien">
                        <span><i class="fa-solid fa-bullhorn"></i></span>
                        <p>Ajouter bien</p>
                    
                    </a>

                    <a href="" class="content-item" id="addServ" title="Ajouter un service">
                        <span><i class="fa-solid fa-pen-to-square"></i></span>
                        <p>Ajouter serv.</p>
                    
                    </a>

                    <a href="" class="content-item" id="addAdmin" title="Ajouter un administrateur">
                        <span><i class="fa-solid fa-user-tie"></i></span>
                        <p>Ajouter admin</p>
                    
                    </a>

                    <a href="list-bien.php" class="content-item" id="addPub" title="Liste des biens">
                        <span><i class="fa-solid fa-file-invoice"></i></span>
                        <p>Biens</p>
                    
                    </a>

                    <a href="" class="content-item" id="ListeService" title="Liste des services">
                        <span><i class="fa-solid fa-file-lines"></i></span>
                        <p>Services</p>
                    
                    </a>

                    <a href="" class="content-item" id="ListeAdmin" title="Liste des administrateurs">
                        <span><i class="fa-solid fa-id-card-clip"></i></span>
                        <p>Administrateurs</p>
                    
                    </a>

                    <a href="" class="content-item" id="ListeMembre" title="Liste des membres">
                        <span><i class="fa-solid fa-id-card"></i></span>
                        <p>Membres</p>
                    
                    </a>
                    
                </div>


                
            </body>
        </html>




    <?php 
    }


?>


