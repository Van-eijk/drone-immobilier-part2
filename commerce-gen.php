<?php 
    // On définit le lien du logo pour cette page

    $lienLogo ="images/logo2.png" ;

    $title = "COMMERCE GENERAL";


    /*echo $_POST["locationVente"];*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMMERCE GENERAL</title>
    
    <link rel="shortcur icon" type="image/png" href="images/favicon/favicon.png">


    <link rel="stylesheet" href="style/commerce-gen.css">
    <link rel="stylesheet" href="header-title/header-title.css">



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






    <!-- On inclut le pieds de page -->

    <?php include('footer/footer.php') ; ?>
    
</body>
</html>