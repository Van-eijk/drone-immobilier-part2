<?php 
    session_start(); // on démarre le système de session

    include('database/config.php'); // on inclut la base de données
    include('class/Admin.php');


    // on instencie la class Admin afin d'uploader les fichiers

    $userAdmin = new Admin() ;
    

    $cheminPhotoDefaut="images/logo.jpg";
    $categorieBien = "";
    
   
    $dossierSauvegarde = "imagesSauv/";


?>



<?php 

    if(isset($_SESSION["idAdmin"]) && isset($_SESSION["emailAdmin"])){
        $idAdmin = $_SESSION["idAdmin"] ;  // on récupère l'identifiant de l'administrateur qui est connecté

        // fichier pour traiter l'envoi de données du fichier ajout-bien.php    
        $date = date('dmyhis');
        $referenceBien = 'maison' . $date ;
        //echo $referenceBien ;







        if(isset($_POST['pub'])){



            if(isset($_POST['catBien'])){
                $categorieBien = $_POST['catBien'] ;
                if(isset($_POST['locationVente'])){
                    if(isset($_POST['titreBien'])){
                        if(isset($_POST['paysBien'])){
                            if(isset($_POST['villeBien'])){
                                if(isset($_POST['quartierBien'])){
                                    if(isset($_POST['parkingBien'])){
                                        if(isset($_POST['telephoneProprietaire'])){
                                            if(isset($_POST['prixBien'])){
                                                if(isset($_POST['descriptionBien'])){
            
            
                                                    $locationVente = $_POST['locationVente'];
            
                                                    $titreBien = $_POST['titreBien'];
                                                    $paysBien = $_POST['paysBien'];
                                                    $villeBien = $_POST['villeBien'];
            
                                                    $quartierBien = $_POST['quartierBien'] ;
                                                    $parkingBien = $_POST['parkingBien'] ;
                                                    $telephoneProprietaire = $_POST['telephoneProprietaire'] ;
                                                    
                                                    $prixBien = $_POST['prixBien'] ;
                                                    $descriptionBien = $_POST['descriptionBien'] ;
            
            
                                                    if(isset($_FILES['pictures'])){
                                                        $listPictures = $_FILES['pictures'] ;
                                                        /* nous allons uploader les images sous forme de tableau
                                                        ensuite nous allons les serialiser dans une seule variable
                                                        afin de l'inserer dans la base de données */
            
                                                        $uploadImagePub = $userAdmin -> uploadPicture($listPictures,$dossierSauvegarde,$titreBien);
            
                                                        if(gettype($uploadImagePub) == "array"){
            
                                                            $serialImage = json_encode($uploadImagePub);
            
            
                                                            
                                                            if($categorieBien == "maison"){
                                                                if(isset($_POST['typeMaison'])){
                                                                    if(isset($_POST['superficieTerrainMaison'])){
                                                                        if(isset($_POST['nbreChambre'])){
                                                                            if(isset($_POST['nbreCuisine'])){
                                                                                if(isset($_POST['nbreSalon'])){
                                                                                    if(isset($_POST['nbreDouche'])){
                                                                                        if(isset($_POST['autrePieceMaison'])){
            
                                                                    
            
            
                                                                                            $typeMaison = $_POST['typeMaison'] ;
            
                                                                                            $referenceBien = $typeMaison . $date ;
            
            
                                                                                            $superficieTerrainMaison = $_POST['superficieTerrainMaison'];
                                                                                            $nbreChambre = $_POST['nbreChambre'] ;
                                                                                            $nbreCuisine = $_POST['nbreCuisine'] ;
                                                                                            $nbreSalon = $_POST['nbreSalon'] ;
                                                                                            $nbreDouche = $_POST['nbreDouche'] ;
                                                                                            $autrePieceMaison = $_POST['autrePieceMaison'] ;
            
            
                                                                                            $reqMaison1 = $connexionDataBase -> prepare('INSERT INTO bien(id_AdminFK,reference_bien,titre_bien,description_bien,parking,location_vente,prix_bien,pays_bien,ville_bien,quartier_bien,telephone_proprietaire,lien_photo1) VALUES(:idAdminFK, :referenceBien, :titreBien, :descriptionBien, :parking, :locationVente, :prixBien, :paysBien, :villeBien, :quartierBien, :telephoneProprietaire, :lienPhoto)');
                                                                                            $reqMaison1 -> execute(array(
                                                                                                'idAdminFK' =>  $idAdmin, 
                                                                                                'referenceBien' =>  $referenceBien, 
                                                                                                'titreBien' =>  $titreBien, 
                                                                                                'descriptionBien' =>  $descriptionBien,
                                                                                                'parking' =>  $parkingBien, 
                                                                                                'locationVente' =>  $locationVente, 
                                                                                                'prixBien' =>  $prixBien, 
                                                                                                'paysBien' =>  $paysBien, 
                                                                                                'villeBien' =>  $villeBien,
                                                                                                'quartierBien' =>  $quartierBien, 
                                                                                                'telephoneProprietaire' =>  $telephoneProprietaire,
                                                                                                'lienPhoto' =>  $serialImage
            
                                                                                            ));
            
            
                                                                                            $reqSelectIdBien = $connexionDataBase -> prepare('SELECT id_Bien FROM bien WHERE reference_bien = :refBien');
            
                                                                                            $reqSelectIdBien -> execute(array(
                                                                                                'refBien' => $referenceBien
                                                                                            ));
            
                                                                                            $requeteresultatIdBien = $reqSelectIdBien -> fetch();
            
                                                                                            $resultatIdBien = $requeteresultatIdBien['id_Bien'];
            
                                                                                            //$resultatIdBien = 102 ;
            
            
                                                                                            $reqMaison2 = $connexionDataBase -> prepare('INSERT INTO maison(id_bienFK, nbre_piece, nbre_chambre, nbre_cuisine, nbre_salon, nbre_douche, type_maison, superficie_terrain) VALUES(:idBienFK, :nbrePiece, :nbreChambre, :nbreCuisine, :nbreSalon, :nbreDouche, :typeMaison, :superficieTerrain)');
                                                                                            $reqMaison2 -> execute(array(
                                                                                                'idBienFK' =>  $resultatIdBien, 
                                                                                                'nbrePiece' =>  $autrePieceMaison, 
                                                                                                'nbreChambre' =>  $nbreChambre, 
                                                                                                'nbreCuisine' =>  $nbreCuisine, 
                                                                                                'nbreSalon' =>  $nbreSalon, 
                                                                                                'nbreDouche' =>  $nbreDouche, 
                                                                                                'typeMaison' =>  $typeMaison, 
                                                                                                'superficieTerrain' =>  $superficieTerrainMaison
                                                                                        
            
                                                                                            ));
            
            
                                                                                            header("Location:dashboard-admin.php");
    
                                                                    
                                                                                        }
                                                                    
                                                                                    }
                                                                    
                                                                                }
                                                                    
                                                                            }
                                                                    
                                                                        }
                                                                    
                                                                    }
                    
                                                                }
                                                            }
                    
                    
                    
                                                            if($categorieBien == "chambre"){
                                                                if(isset($_POST['moderneChambre'])){
                                                                    if(isset($_POST['superficieChambre'])){
                                                                        if(isset($_POST['cuisineChambre'])){

                                                                            $referenceBien = "Chambre" . $date ;
                                                                        $modChambre = $_POST['moderneChambre'];
                                                                        $cuisineChambre = $_POST['cuisineChambre'];
                                                                        $superChambre = $_POST['superficieChambre'];
            
            
            
            
                                                                        /****************        debut  */
            
            
                                                                        $reqChambre1 = $connexionDataBase -> prepare('INSERT INTO bien(id_AdminFK,reference_bien,titre_bien,description_bien,parking,location_vente,prix_bien,pays_bien,ville_bien,quartier_bien,telephone_proprietaire,lien_photo1) VALUES(:idAdminFK, :referenceBien, :titreBien, :descriptionBien, :parking, :locationVente, :prixBien, :paysBien, :villeBien, :quartierBien, :telephoneProprietaire, :lienPhoto)');
                                                                        $reqChambre1 -> execute(array(
                                                                            'idAdminFK' =>  $idAdmin, 
                                                                            'referenceBien' =>  $referenceBien, 
                                                                            'titreBien' =>  $titreBien, 
                                                                            'descriptionBien' =>  $descriptionBien, 
                                                                            'parking' =>  $parkingBien,
                                                                            'locationVente' =>  $locationVente, 
                                                                            'prixBien' =>  $prixBien, 
                                                                            'paysBien' =>  $paysBien, 
                                                                            'villeBien' =>  $villeBien, 
                                                                            'quartierBien' =>  $quartierBien,
                                                                            'telephoneProprietaire' =>  $telephoneProprietaire,
                                                                            'lienPhoto' =>  $serialImage
            
                                                                        ));
            
                                                                        $reqChambre1 -> closeCursor();
            
            
            
                                                                        $reqSelectIdBienChambre = $connexionDataBase -> prepare('SELECT id_Bien FROM bien WHERE reference_bien = :refBien');
            
                                                                        $reqSelectIdBienChambre -> execute(array(
                                                                            'refBien' => $referenceBien
                                                                        ));
            
                                                                        $requeteResultatIdBienChambre = $reqSelectIdBienChambre -> fetch();
            
                                                                        $resultatIdBienChambre = $requeteResultatIdBienChambre['id_Bien'];
            
                                                                        
            
            
                                                                        $reqChambre2 = $connexionDataBase -> prepare('INSERT INTO chambre(id_bienFK, superficie_chambre, moderne_chambre, cuisine_chambre) VALUES(:idBienFK, :superficieChambre, :moderneChambre, :cuisineChambre)');
                                                                        $reqChambre2 -> execute(array(
                                                                            'idBienFK' =>  $resultatIdBienChambre, 
                                                                            'superficieChambre' => $superChambre , 
                                                                            'moderneChambre' =>   $modChambre,
                                                                            'cuisineChambre' =>   $cuisineChambre
                                                                        ));
                                                                        $reqChambre2 -> closeCursor();
            
            
                                                                        header("Location:dashboard-admin.php");
            
                                                                    
            
            
                                                                        /**************** fin */    

                                                                        }
            
            
                                                                                                                                
                                                                    
                                                                    }
                    
                                                                }
                                                            }
                    
                    
                    
                    
                                                            if($categorieBien == "magasin"){
                                                                if(isset($_POST['superficieMagasin'])){
                                                                    if(isset($_POST['nbrePieceMagasin'])){
            
                                                                        $referenceBien = "Magasin" . $date ;
                                                                        $superficieMagasin = $_POST['superficieMagasin'];
                                                                        $nbrePieceMagasin = $_POST['nbrePieceMagasin'] ;
            
            
            
            
                                                                        /****************        debut  */
            
            
                                                                        $reqMagasin1 = $connexionDataBase -> prepare('INSERT INTO bien(id_AdminFK,reference_bien,titre_bien,description_bien,parking,location_vente,prix_bien,pays_bien,ville_bien,quartier_bien,telephone_proprietaire,lien_photo1) VALUES(:idAdminFK, :referenceBien, :titreBien, :descriptionBien, :parking, :locationVente, :prixBien, :paysBien, :villeBien, :quartierBien, :telephoneProprietaire, :lienPhoto)');
                                                                        $reqMagasin1 -> execute(array(
                                                                            'idAdminFK' =>  $idAdmin, 
                                                                            'referenceBien' =>  $referenceBien, 
                                                                            'titreBien' =>  $titreBien, 
                                                                            'descriptionBien' =>  $descriptionBien, 
                                                                            'parking' =>  $parkingBien, 
                                                                            'locationVente' =>  $locationVente, 
                                                                            'prixBien' =>  $prixBien, 
                                                                            'paysBien' =>  $paysBien, 
                                                                            'villeBien' =>  $villeBien, 
                                                                            'quartierBien' =>  $quartierBien, 
                                                                            'telephoneProprietaire' =>  $telephoneProprietaire, 
                                                                            'lienPhoto' =>  $serialImage
            
                                                                        ));
            
                                                                        $reqMagasin1 -> closeCursor();
            
            
            
                                                                        $reqSelectIdBienMagasin = $connexionDataBase -> prepare('SELECT id_Bien FROM bien WHERE reference_bien = :refBien');
            
                                                                        $reqSelectIdBienMagasin -> execute(array(
                                                                            'refBien' => $referenceBien
                                                                        ));
            
                                                                        $requeteResultatIdBienMagasin = $reqSelectIdBienMagasin -> fetch();
            
                                                                        $resultatIdBienMagasin = $requeteResultatIdBienMagasin['id_Bien'];
            
                                                                        
            
            
                                                                        $reqMagasin2 = $connexionDataBase -> prepare('INSERT INTO magasin(id_bienFK, superficie_magasin, nombre_piece_magasin) VALUES(:idBienFK, :superficieMagasin, :nbrePieceMagasin)');
                                                                        $reqMagasin2 -> execute(array(
                                                                            'idBienFK' =>  $resultatIdBienMagasin, 
                                                                            'superficieMagasin' => $superficieMagasin , 
                                                                            'nbrePieceMagasin' =>   $nbrePieceMagasin
                                                                        ));
                                                                        $reqMagasin2 -> closeCursor();
            
            
                                                                        header("Location:dashboard-admin.php");
            
                                                                    
            
            
            
                                                                        /**************** fin */      
                                                                        
                                                                    
                                                                    }
                    
                                                                }
                                                            }
                    
                    
                    
                                                            if($categorieBien == "immeuble"){
                                                                if(isset($_POST['superficieTerrainImmeuble'])){
                                                                    if(isset($_POST['nbreEtageImmeuble'])){
            
            
            
                                                                        $referenceBien = "Immeuble" . $date ;
                                                                        $superficieTerrainImmeuble = $_POST['superficieTerrainImmeuble'];
                                                                        $nbreEtageImmeuble = $_POST['nbreEtageImmeuble'] ;
            
            
            
            
                                                                        /****************        debut  */
            
            
                                                                        $reqImmeuble1 = $connexionDataBase -> prepare('INSERT INTO bien(id_AdminFK,reference_bien,titre_bien,description_bien,parking,location_vente,prix_bien,pays_bien,ville_bien,quartier_bien,telephone_proprietaire,lien_photo1) VALUES(:idAdminFK, :referenceBien, :titreBien, :descriptionBien, :parking, :locationVente, :prixBien, :paysBien, :villeBien, :quartierBien, :telephoneProprietaire, :lienPhoto)');
                                                                        $reqImmeuble1 -> execute(array(
                                                                            'idAdminFK' =>  $idAdmin, 
                                                                            'referenceBien' =>  $referenceBien, 
                                                                            'titreBien' =>  $titreBien, 
                                                                            'descriptionBien' =>  $descriptionBien, 
                                                                            'parking' =>  $parkingBien,
                                                                            'locationVente' =>  $locationVente, 
                                                                            'prixBien' =>  $prixBien, 
                                                                            'paysBien' =>  $paysBien, 
                                                                            'villeBien' =>  $villeBien,
                                                                            'quartierBien' =>  $quartierBien, 
                                                                            'telephoneProprietaire' =>  $telephoneProprietaire,
                                                                            'lienPhoto' =>  $serialImage
            
                                                                        ));
            
                                                                        $reqImmeuble1 -> closeCursor();
            
            
            
                                                                        $reqSelectIdBienImmeuble = $connexionDataBase -> prepare('SELECT id_Bien FROM bien WHERE reference_bien = :refBien');
            
                                                                        $reqSelectIdBienImmeuble -> execute(array(
                                                                            'refBien' => $referenceBien
                                                                        ));
            
                                                                        $requeteResultatIdBienImmeuble = $reqSelectIdBienImmeuble -> fetch();
            
                                                                        $resultatIdBienImmeuble = $requeteResultatIdBienImmeuble['id_Bien'];
            
                                                                        
            
            
                                                                        $reqImmeuble2 = $connexionDataBase -> prepare('INSERT INTO immeuble(id_bienFK, superficie_terrain_immeuble, nbre_etage) VALUES(:idBienFK, :superficieTerrain, :nbreEtage)');
                                                                        $reqImmeuble2 -> execute(array(
                                                                            'idBienFK' =>  $resultatIdBienImmeuble, 
                                                                            'superficieTerrain' => $superficieTerrainImmeuble , 
                                                                            'nbreEtage' =>   $nbreEtageImmeuble
                                                                        ));
                                                                        $reqImmeuble2 -> closeCursor();
            
            
                                                                        header("Location:dashboard-admin.php");
            
                                                                    
            
            
            
                                                                        /**************** fin */      
                                                                        
                                                                    
                                                                    }
                    
                                                                }
                                                            }
                    
                    
                    
                    
                                                            if($categorieBien == "terrain"){
                                                                if(isset($_POST['superficieTerrain'])){
            
                                                                    $referenceBien = "Terrain" . $date ;
                                                                    $superficieTerrain = $_POST['superficieTerrain'];
            
            
            
            
                                                                    /****************        debut  */
            
            
                                                                    $reqTerrain1 = $connexionDataBase -> prepare('INSERT INTO bien(id_AdminFK,reference_bien,titre_bien,description_bien,parking,location_vente,prix_bien,pays_bien,ville_bien,quartier_bien,telephone_proprietaire,lien_photo1) VALUES(:idAdminFK, :referenceBien, :titreBien, :descriptionBien, :parking, :locationVente, :prixBien, :paysBien, :villeBien, :quartierBien, :telephoneProprietaire, :lienPhoto)');
                                                                    $reqTerrain1 -> execute(array(
                                                                        'idAdminFK' =>  $idAdmin, 
                                                                        'referenceBien' =>  $referenceBien, 
                                                                        'titreBien' =>  $titreBien, 
                                                                        'descriptionBien' =>  $descriptionBien, 
                                                                        'parking' =>  $parkingBien, 
                                                                        'locationVente' =>  $locationVente, 
                                                                        'prixBien' =>  $prixBien, 
                                                                        'paysBien' =>  $paysBien, 
                                                                        'villeBien' =>  $villeBien, 
                                                                        'quartierBien' =>  $quartierBien, 
                                                                        'telephoneProprietaire' =>  $telephoneProprietaire, 
                                                                        'lienPhoto' =>  $serialImage
            
                                                                    ));
            
                                                                    $reqTerrain1 -> closeCursor();
            
            
            
                                                                    $reqSelectIdBienTerrain = $connexionDataBase -> prepare('SELECT id_Bien FROM bien WHERE reference_bien = :refBien');
            
                                                                    $reqSelectIdBienTerrain -> execute(array(
                                                                        'refBien' => $referenceBien
                                                                    ));
            
                                                                    $requeteResultatIdBienTerrain = $reqSelectIdBienTerrain -> fetch();
            
                                                                    $resultatIdBienTerrain = $requeteResultatIdBienTerrain['id_Bien'];
            
                                                                    
            
            
                                                                    $reqTerrain2 = $connexionDataBase -> prepare('INSERT INTO terrain(id_bienFK, superficie_terrain) VALUES(:idBienFK, :superficieTerrain)');
                                                                    $reqTerrain2 -> execute(array(
                                                                        'idBienFK' =>  $resultatIdBienTerrain, 
                                                                        'superficieTerrain' => $superficieTerrain , 
                                                                    ));
                                                                    $reqTerrain2 -> closeCursor();
            
            
                                                                    header("Location:dashboard-admin.php");
            
                                                                    
            
            
            
                                                                        /**************** fin **********************/   
                                                                
                    
                                                                }
                                                            }
            
                                                        }
            
            
            
                                                    }
              
                        
                                                }
                        
                                            }
                                    
                                        }
                                    
                                    }

                                }
                                
            
                            }
            
                        }
            
                    }
            
                }
            
            }
        }

    }


    
?>