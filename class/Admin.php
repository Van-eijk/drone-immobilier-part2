<?php
    include_once("Membre.php");
    class Admin extends Membre {
        // Les attributs
        private $idAdmin;
        private $idMembreFK;
        private $poste;
        /* la variable "POSTE" peut prendre 2 valeurs : "admin" ou "adjoint" */


        // les accesseurs & mutateurs

        public function getPoste(){
            return $this->poste;
        }
        public function setPoste($idAdmin, $idMembreFK, $poste){
            $this->poste = $poste;
            $this->idMembreFK = $idMembreFK;
            $this->$idAdmin = $idAdmin ;

        }

        public function getIdMembreFK(){
            return $this->idMembreFK;
        }
        public function setIdMembreFK($idMembreFK){
            $this->idMembreFK = $idMembreFK;
        }
        public function getIdAdmin(){
            return $this->idAdmin;
        }
        public function setIdAdmin($idAdmin){
            $this->idAdmin = $idAdmin;
        }

        // constructeur

        /*public function __construct($poste){
            $this->poste = $poste;
        }*/

        // les methodes

        public function ajouterPub(){

        }

        public function modifierPub(){

        }

        public function supprimerPub(){

        }
        public function ajouterCompte(){

        }
        public function supprimerCompte(){

        }

        public function afficherListeMembre(){

        }



        public function uploadPicture($listPicture,$cheminSauvegarde,$titreBien){

            /* ****   DECLARATION DES VARIABLES ******* */
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


                if($error == 0){ // s'il n'ya aucune erreur lors du transfert de fichier
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



    }
?>