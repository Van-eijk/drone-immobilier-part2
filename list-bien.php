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
                <link rel="stylesheet" href="style-admin/list-bien.css">
                <link rel="stylesheet" href="header-menu-admin/header-menu-admin.css">
                
                <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">

                <!-- Feuille de style des icones-->
                <link rel="stylesheet" href="Icons/css/all.css">
            </head>
            <body>
                <?php include "header-menu-admin/header-menu-admin.php";?>

                <div class="admin-content">
                    <div class="search-bar">
                        <div>
                            <form action="" method="post">
                                <input type="text" placeholder="Rechercher une publication">
                                <input type="submit" value="search">
                            </form>

                        </div>
                    </div>

                    <div class="list-pub">
                        <div class="main-item">
                            <div class="picture-item">
                                <p>photo</p>
                                
                            </div>

                            <div class="right-side-item">
                                <div class="header-item">
                                    <div class="title-item">
                                        <p>TITRE publication</p>
                                        <p>Date</p>

                                    </div>
                                    <div class="reference-item">
                                        <p>REFERENCE PUBLICATION</p>

                                    </div>

                                </div>
                                <div class="description-item">
                                    <P>La description de cette publication n'est pas mal nor chou</P>
                                    <P>La description de cette publication n'est pas mal nor chou</P>
                                    <P>La description de cette publication n'est pas mal nor chou</P>
                                    <P>La description de cette publication n'est pas mal nor chou</P>
                                    <P>La description de cette publication n'est pas mal nor chou</P>


                                </div>
                                <div class="footer-item">
                                    <div class="delete-item">
                                        <button>Modifier</button>

                                    </div>
                                    <div class="edit-item">
                                        <button>Supprimer</button>

                                    </div>

                                </div>
                            </div>

                        </div>



                        <div class="main-item">
                            <div class="picture-item">
                                <p>photo</p>
                                
                            </div>

                            <div class="right-side-item">
                                <div class="header-item">
                                    <div class="title-item">
                                        <p>TITRE publication</p>
                                        <p>Date</p>

                                    </div>
                                    <div class="reference-item">
                                        <p>REFERENCE PUBLICATION</p>

                                    </div>

                                </div>
                                <div class="description-item">
                                    <P>La description de cette publication n'est pas mal nor chou</P>
                                    <P>La description de cette publication n'est pas mal nor chou</P>
                                    <P>La description de cette publication n'est pas mal nor chou</P>
                                    <P>La description de cette publication n'est pas mal nor chou</P>
                                    <P>La description de cette publication n'est pas mal nor chou</P>


                                </div>
                                <div class="footer-item">
                                    <div class="delete-item">
                                        <button>Modifier</button>

                                    </div>
                                    <div class="edit-item">
                                        <button>Supprimer</button>

                                    </div>

                                </div>
                            </div>

                        </div>

                        
                    </div>
                    
                    
                    
                </div>


                
            </body>
        </html>




    <?php 
    }


?>


