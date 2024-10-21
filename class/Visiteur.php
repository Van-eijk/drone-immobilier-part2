<?php 
     class Visteur{

        // Les attributs du visiteur
        private $adresseIp;
        private $idVisiteur;
        private $dateTimeVisiteur;

        // Les accesseurs & mutateurs

        public function getAdresseIp(){
            return $this->adresseIp;
        }

        public function setAdresseIp($adresseIp){
            $this->adresseIp = $adresseIp;
        }

        public function getIdVisiteur(){
            return $this->idVisiteur;
        }

        public function setIdVisiteur($idVisiteur){
            $this->idVisiteur = $idVisiteur;
        }

        public function getDateTimeVisiteur(){
            return $this->dateTimeVisiteur;
        }
        public function setDateTimeVisiteur($dateTimeVisiteur){
            $this->dateTimeVisiteur = $dateTimeVisiteur;
        }

        // le constructeur

        /*public function __construct($adresseIp){
            $this->adresseIp = $adresseIp;

        }*/

        // les methodes

        public function rechercheBien(){
            // cette fonction permet à un visiteur de rechercher un bien
        }

        public function prendreRDV(){
            // cette fonction permet à un visiteur de prendre un RDV pour un bien précis

        }

        public function contactWhatsapp(){
            // Cette fonction permet à un visiteur de contacter l'adminstrateur directement sur whatsapp

        }

        public function afficherListePub(){
            
        }

    }
?>