<?php
    session_start();

    // suppression des variables de session et de la session

    $_SESSION = array();
    session_destroy();

    // suppression des cookies

    header("location:logadmin.php");