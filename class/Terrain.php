<?php 
    include_once("Bien.php");

    class Terrain extends Bien{
        // les attributs
        private $idTerrain;
        private $idBienFK;
        private $superficieTerrain;

        // accesseurs & mutateurs

        public function getIdTerrain(){
            return $this->idTerrain;
        }
        public function setIdTerrain($idTerrain){
            $this->idTerrain = $idTerrain;
        }
        public function getIdBienFK(){
            return $this->idBienFK;
        }
        public function setIdBienFK($idBienFK){
            $this->idBienFK = $idBienFK;
        }
        public function getSuperficieTerrain(){
            return $this->superficieTerrain;
        }
        public function setSuperficieTerrain($superficieTerrain){
            $this->superficieTerrain = $superficieTerrain;
        }

        // constructeur
        public function __construct($idTerrain, $idBienFK, $superficieTerrain){
            $this->idTerrain = $idTerrain;
            $this->idBienFK = $idBienFK;
            $this->superficieTerrain = $superficieTerrain;

        }
    }
?>