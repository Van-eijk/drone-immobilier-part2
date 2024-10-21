<?php 
    include_once("Bien.php");

    class Chambre extends Bien{
        // les attributs
        private $idChambre;
        private $idBienFK;
        private $superficieChambre;
        private $moderneChambre; // peut prendre 2 valeurs: 'OUI' ou 'NON'

        // Accesseurs et mutateurs

        public function getIdChambre(){
            return $this->idChambre;
        }
        public function setIdChambre($idChambre){
            $this->idChambre = $idChambre;
        }
        public function getIdBienFK(){
            return $this->idBienFK;
        }
        public function setIdBienFK($idBienFK){
            $this->idBienFK = $idBienFK;
        }
        public function getSuperficieChambre(){
            return $this->superficieChambre;
        }
        public function setSuperficieChambre($superficieChambre){
            $this->superficieChambre = $superficieChambre;
        }
        public function getModerneChambre(){
            return $this->moderneChambre;
        }
        public function setModerneChambre($moderneChambre){
            $this->moderneChambre = $moderneChambre;
        }
        

        // constructeur
        public function __construct($idChambre, $idBienFK, $superficieChambre, $moderneChambre){
            $this->idChambre = $idChambre;
            $this->idBienFK = $idBienFK;
            $this->superficieChambre = $superficieChambre;
            $this->moderneChambre = $moderneChambre;
        }

    }
?>