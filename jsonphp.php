<?php
    $nom = array("Van","Bobo","Junior","Junior","Junior","Junior","Junior","Junior","Junior","Junior") ;
    //echo $nom ;
    $nomCovert = json_encode($nom) ;
    $nomDecode = json_decode($nomCovert) ;

    //echo"".$nomDecode."";

    for ($i = 0; $i < count($nomDecode); $i++) {
        echo"". $nomDecode[$i] ." ";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>