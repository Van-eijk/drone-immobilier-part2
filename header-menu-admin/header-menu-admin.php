

<?php 
    $lienLogo;
    $username ;
    $lienAccueil ;
    $lienDeconnection ;
?>



<header>
        <div class="main-logo">
            <a href="<?php echo $lienAccueil ; ?>"><img src="<?php echo $lienLogo ; ?>" alt="logo"></a>

        </div>

        <div class="menu">
            <ul class="menuderoulant">
                <li> 
                    <a href="<?php echo $lienAccueil ; ?>" title="Accueil">
                        <div class="home">
                            <div class="home-icon">
                                <span><i class="fa-solid fa-house"></i></span>
                            </div>
                            <div class="home-title">
                                <p>Accueil</p>
                            </div>
                        </div>
                    </a>
                </li>

                <li> 
                    <a href="dashboard-admin.php" title="Paramètre">
                        <div class="setting">
                            <div class="setting-icon">
                                <span><i class="fa-solid fa-gear"></i></span>
                            </div>
                            <div class="setting-title">
                                <p>Paramètre</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li> 
                    <a href="<?php echo $lienDeconnection ; ?>" title="Déconnexion">
                        <div class="log-out">
                            <div class="log-out-icon">
                                <span><i class="fa-solid fa-right-from-bracket"></i></span>
                            </div>
                            <div class="log-out-title">
                                <p>Déconnection</p>
                            </div>
                        </div>
                    </a>
                </li>
                
            </ul>

        </div>

        <div class="user">
            <a href="login.php">
                <div class="icon-user">
                    <span><i class="fa-solid fa-user"></i></span>
                </div>
                <div class="name-user">
                    <p><?php echo $username ;?></p>
                </div>
            </a>
        </div>
    </header>