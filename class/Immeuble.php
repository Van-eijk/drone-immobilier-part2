<?php
    include_once("Bien.php");

    class Immeuble extends Bien{

        // Les attributs
        private $idImmeuble;
        private $idBienFK;
        private $superficieTerrainImmeuble;
        private $etageImmeuble;

        // Accesseurs et mutateurs

        public function getIdImmeuble(){
            return $this->idImmeuble;
        }
        public function setIdImmeuble($idImmeuble){
            $this->idImmeuble=$idImmeuble;
        }
        public function getIdBienFK(){
            return $this->idBienFK;
        }
        public function setIdBienFK($idBienFK){
            $this->idBienFK=$idBienFK;
        }
        public function getSuperficieTerrainImmeuble(){
            return $this->superficieTerrainImmeuble;
        }
        public function setSuperficieTerrainImmeuble($superficieTerrainImmeuble){
            $this->superficieTerrainImmeuble=$superficieTerrainImmeuble;
        }
        public function getEtageImmeuble(){
            return $this->etageImmeuble;
        }
        public function setEtageImmeuble($etageImmeuble){
            $this->etageImmeuble=$etageImmeuble;
        }
        
        // constructeur

        public function __construct($idImmeuble, $idBienFK, $superficieTerrainImmeuble, $etageImmeuble){
            $this->idImmeuble=$idImmeuble;
            $this->idBienFK=$idBienFK;
            $this->superficieTerrainImmeuble=$superficieTerrainImmeuble;
            $this->etageImmeuble=$etageImmeuble;
        }
    }
?>