<?php 
    include_once("Visiteur.php");
    class Membre extends Visteur {
        private $idMembre ;
        private $idVisteurFK;
        private $nomMembre;
        private $prenomMembre;
        private $phoneMembre;
        private $emailMembre;
        private $paysMembre;
        private $villeMembre;
        private $mdpMembre;
        

        // Accesseurs et mutateurs

        public function getIdMembre() {
            return $this->idMembre;
        }
        public function setIdMembre($idMembre) {
            $this->idMembre = $idMembre;
        }
        public function getIdVisteurFK() {
            return $this->idVisteurFK;
        }
        public function setIdVisteurFK($idVisteurFK) {
            $this->idVisteurFK = $idVisteurFK;
        }
        public function getNomMembre() {
            return $this->nomMembre;
        }
        public function setNomMembre($nomMembre) {
            $this->nomMembre = $nomMembre;
        }
        public function getPrenomMembre() {
            return $this->prenomMembre;
        }
        public function setPrenomMembre($prenomMembre) {
            $this->prenomMembre = $prenomMembre;
        }
        public function getPhoneMembre() {
            return $this->phoneMembre;
        }
        public function setPhoneMembre($phoneMembre) {
            $this->phoneMembre = $phoneMembre;
        }
        public function getEmailMembre() {
            return $this->emailMembre;
        }
        public function setEmailMembre($emailMembre) {
            $this->emailMembre = $emailMembre;
        }
        public function getPaysMembre() {
            return $this->paysMembre;
        }
        public function setPaysMembre($paysMembre) {
            $this->paysMembre = $paysMembre;
        }
        public function getVilleMembre() {
            return $this->villeMembre;
        }
        public function setVilleMembre($villeMembre) {
            $this->villeMembre = $villeMembre;
        }
        public function getMdpMembre() {
            return $this->mdpMembre;
        }
        public function setMdpMembre($mdpMembre) {
            $this->mdpMembre = $mdpMembre;
        }


        // Constructeur

        /*public function __construct($idMembre, $idVisiteurFK, $nomMembre, $prenomMembre, $phoneMembre, $emailMembre, $paysMembre, $villeMembre, $mdpMembre) {
            $this->idMembre = $idMembre;
            $this->$idVisiteurFK = $idVisiteurFK;
            $this->nomMembre = $nomMembre;
            $this->prenomMembre = $prenomMembre;
            $this->phoneMembre = $phoneMembre;
            $this->emailMembre = $emailMembre;
            $this->paysMembre = $paysMembre;
            $this->villeMembre = $villeMembre;
            $this->mdpMembre = $mdpMembre;

        }*/

        // Les méthodes

        public function mettreFavoris() {

        }

        public function imprimerPublication(){

        }

        public function connexionEspaceMembre($lienFichierBDD, $lienPageConnexion, $redirectionPageAdmin, $redirectionPageMembre, $email, $passwordHache) {
            echo" bjr les zero";

            include($lienFichierBDD); // On inclut le lien du fichier de la base de données

            // On vérifie d'abord si l'utilisateur se trouve dans la table membre

            $reqConnexionMembre = $connexionDataBase ->prepare("SELECT membre.id_membre, membre.nom_membre, prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre FROM membre WHERE email_membre = :mail_membre AND mdp_membre = :mdp");
            $reqConnexionMembre -> execute(array(
                "mail_membre" => $email,
                "mdp"=> $passwordHache));

            $resultatConnexionMembre = $reqConnexionMembre -> fetch(); // On récupère les informations depuis la base de données

            if(!$resultatConnexionMembre){

                return "Adresse email ou mot de passe incorrect !";

            }
            else{

                // comme le visiteur existe dans la table membre, on verifie maintenant s'il existe dans la table admin

                $identifiantMembre =  $resultatConnexionMembre["id_membre"]; // On récupère l'identifiant du membre

                $reqConnexionAdmin = $connexionDataBase -> prepare("SELECT visiteur.adresse_ip, visiteur.datevisiteur, membre.id_membre, membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre, admin.id_admin, admin.poste FROM visiteur
                INNER JOIN membre
                ON visiteur.id_visiteur = membre.id_visiteur_FK 
                INNER JOIN admin
                ON membre.id_membre = admin.id_membreFK 
                WHERE id_membreFK = :idMembre");

                $reqConnexionAdmin -> execute(array(
                    "idMembre"=> $identifiantMembre)) ;

                $resultatConnexionAdmin = $reqConnexionAdmin -> fetch();  // On récupère les informations depuis la base de données

                if(!$resultatConnexionAdmin){
                    
                    session_start();
                    $_SESSION["idMembre"] = $resultatConnexionMembre["id_membre"];
                    $_SESSION["emailMembre"] = $resultatConnexionMembre["email_membre"];

                    $_SESSION["nomMembre"] = $resultatConnexionMembre["nom_membre"];
                    $_SESSION["prenomMembre"] = $resultatConnexionMembre["prenom_membre"];
                    $_SESSION["phoneMembre"] = $resultatConnexionMembre["phone_membre"];
                    $_SESSION["pays_membre"] = $resultatConnexionMembre["pays_membre"];
                    $_SESSION["villeMembre"] = $resultatConnexionMembre["ville_membre"];


                    header($redirectionPageMembre);

                }
                else{
                    
                    session_start();

                    $_SESSION["idAdmin"] = $resultatConnexionAdmin["id_admin"];
                    $_SESSION["nomAdmin"] = $resultatConnexionAdmin["nom_membre"];
                    $_SESSION["prenomAdmin"] = $resultatConnexionAdmin["prenom_membre"];
                    $_SESSION["phoneAdmin"] = $resultatConnexionAdmin["phone_membre"];
                    $_SESSION["emailAdmin"] = $resultatConnexionAdmin["email_membre"];
                    $_SESSION["villeAdmin"] = $resultatConnexionAdmin["ville_membre"];
                    $_SESSION["paysAdmin"] = $resultatConnexionAdmin["pays_membre"];


                    header($redirectionPageAdmin);

                }
            }
        }
    }
?>