<?php 
    function uploadImages($listPicture, $cheminSauvegarde, $titreBien){
        $dateDuJour = date("dmyhis");
        $cheminDefinitif = "";
        $nomFichier="";
        $photo = array();
        $i = 1 ; // entier permettant de definir le nom de chaque fichier


        
        foreach($listPicture['tmp_name'] as $key => $tmp_name){

            $name = $listPicture['name'][$key];  // On récupère le nom de chaque fichier
            $type = $listPicture['type'][$key]; // on recupere le type de chaque fichier
            $size = $listPicture['size'][$key]; // on recupère la taille de chaque fichier
            $error = $listPicture['error'][$key]; // permet de verifier si l'importation des fichiers s'est deroulé sans erreur
            $cheminTemporaire = $listPicture['tmp_name'][$key]; // récupération de l'emplacement temporaire de chaque fichier


            if($error == 0){
                $infoFichier = pathinfo($name);
                $extension_upload = $infoFichier['extension']; // On recupère l'extension de chaque fichier

                $extension_autorisees = ['jpg','jpeg','png']; // la liste des extensions autorisées

                // verification de l'extension du fichier

                if(in_array($extension_upload,$extension_autorisees )){
                    $nomFichier = basename($name); // on recupère le nom d'origine du fichier
                    $nomFichier = $titreBien . $dateDuJour ."_".$i ;
                    $cheminDefinitif = $cheminSauvegarde . $nomFichier ; // on definit l'emplacement definitif du fichier
                    move_uploaded_file($cheminTemporaire,$cheminDefinitif); // on stocke le fichier dans le serveur
    
                    array_push($photo, $cheminDefinitif); // on inserre chaque emplacement de fichier dans ce tableau
                   
                }
                else{
                    return "Veuillez choisir uniquement des images";
                }
               
            }else{
                return "une erreur s'est produite lors du transfert des fichiers";
            }
            $i++ ;
        
        }

        return $photo ;
    }
?>






<?php 
   
    
    $dossierSauv = "../sauv/";
    $titre = "toff";
    $toff="";
   
        
        //echo $photo[0];
    if(isset($_POST['send'])){
        if(isset($_FILES['picture'])){

            $toff = uploadImages($_FILES['picture'],$dossierSauv,$titre) ;

            if(gettype($toff)  == "array"){
                foreach($toff as $val){
                    echo $val . '<br>';
                }
        
                
                /*for($i = 0 ; $i < count($photo) ; $i++){
                        echo $photo[$i] . '<br>';
                }*/

            }
            else{
                echo $toff;
            }
      
          
           
            
        }

       
    }

    /*$nom = array("bobo", "van", "massa");

    $ser = serialize($nom);
    echo $ser . '<br>';

    $unser = unserialize($ser);
    foreach($unser as $val){
        echo $val . '<br>';
    }*/
    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="for.php" method="post" enctype="multipart/form-data">
        <input type="file" name="picture[]" id="" multiple>
        <input type="submit" value="send" name="send">

    </form>
    <img src="<?php 
        if(gettype($toff)  == "array"){
            echo $toff[0]; 
        }
    ?>" alt="">
</body>
</html>