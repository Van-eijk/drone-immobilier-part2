<?php 
    class Favoris{
        // Les attributs
        private $idFavoris;
        private $idBienFK;
        private $idMembreFk;
        private $dateTimeFavoris;


        // Les accesseurs & les mutateurs

        public function getIdBienFK(){
            return $this->idBienFK;
        }
        public function setIdBienFK($idBienFK){
            $this->idBienFK = $idBienFK;
        }

        public function getIdFavoris(){
            return $this->idFavoris;
        }

        public function setIdFavoris($idFavoris){
            $this->idFavoris = $idFavoris;
        }

        public function getIdMembreFk(){
            return $this->idMembreFk;
        }
        public function setIdMembreFk($idMembreFk){
            $this->idMembreFk = $idMembreFk;
        }

        public function getDateTimeFavoris(){
            return $this->dateTimeFavoris;
        }

        public function setDateTimeFavoris($dateTimeFavoris){
            $this->dateTimeFavoris = $dateTimeFavoris;
        }

        public function __construct($idFavoris, $idBienFK, $idMembreFk, $dateTimeFavoris){
            $this->idFavoris = $idFavoris;
            $this->idBienFK = $idBienFK;
            $this->idMembreFk = $idMembreFk;
            $this->dateTimeFavoris = $dateTimeFavoris;
            
        }


    }
?>