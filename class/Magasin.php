<?php 
    include_once("Bien.php");

    class Magasin extends Bien{

        // Les attributs
        private $idMagasin;
        private $idBienFK;
        private $superficieMagasin;
        private $nombrePieceMagasin;

        // Accesseurs et mutateurs

        public function getIdMagasin(){
            return $this->idMagasin;
        }
        public function setIdMagasin($idMagasin){
            $this->idMagasin = $idMagasin;
        }
        public function getIdBienFK(){
            return $this->idBienFK;
        }
        public function setIdBienFK($idBienFK){
            $this->idBienFK = $idBienFK;
        }
        public function getSuperficieMagasin(){
            return $this->superficieMagasin;
        }
        public function setSuperficieMagasin($superficieMagasin){
            $this->superficieMagasin = $superficieMagasin;
        }
        public function getNombrePieceMagasin(){
            return $this->nombrePieceMagasin;
        }
        public function setNombrePieceMagasin($nombrePieceMagasin){
            $this->nombrePieceMagasin = $nombrePieceMagasin;
        }
    }
?>