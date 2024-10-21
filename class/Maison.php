<?php 
    include_once("Bien.php");

    class Maison extends Bien{
        private $idMaison; // entier
        private $idBienFK; // entier
        private $nbrePiece; // entier
        private $nbreChambre; // entier
        private $nbreCuisine; // entier
        private $nbreSalon; // entier
        private $nbreDouche; // entier
        private $typeMaison;  // chaine de caractère qui peut prendre 4 valeurs (studio, Appartement, maison, villa);
        private $superficieTerrain; // float
        // accesseur et mutateur

        public function getIdMaison(){
            return $this->idMaison;
        }
        public function setIdMaison($idMaison){
            $this->idMaison = $idMaison;
        }
       public function getIdBienFK(){
        return $this->idBienFK;
       }
       public function setIdBienFK($idBienFK){
        $this->idBienFK = $idBienFK;
       }

        public function getNbrePiece(){
            return $this->nbrePiece;
        }
        public function setNbrePiece($nbrePiece){
            $this->nbrePiece = $nbrePiece;
        }
        public function getNbreCuisine(){
            return $this->nbreCuisine;
        }
        public function setNbreCuisine($nbreCuisine){
            $this->nbreCuisine = $nbreCuisine;
        }
        public function getNbreSalon(){
            return $this->nbreSalon;
        }
        public function setNbreSalon($nbreSalon){
            $this->nbreSalon = $nbreSalon;
        }
        public function getNbreChambre(){
            return $this->nbreChambre;
        }
        public function setNbreChambre($nbreChambre){
            $this->nbreChambre = $nbreChambre;
        }
        public function getNbreDouche(){
            return $this->nbreDouche;
        }
        public function setNbreDouche($nbreDouche){
            $this->nbreDouche = $nbreDouche;
        }

        public function getTypeMaison(){
            return $this->typeMaison;
        }
        public function setTypeMaison($typeMaison){
            $this->typeMaison = $typeMaison;
        }
        public function getSperficieTerrain(){
            return $this->superficieTerrain;
        }
        public function setSperficieTerrain($superficieTerrain){
            $this->superficieTerrain = $superficieTerrain;
        }

        //Constructeur

        public function __construct($idMaison, $typeMaison, $idBienFK, $superficieTerrain, $nbrePiece, $nbreChambre, $nbreSalon, $nbreCuisine, $nbreDouche){
            $this->idMaison = $idMaison;
            $this->nbrePiece = $nbrePiece;
            $this->nbreChambre = $nbreChambre;
            $this->nbreSalon = $nbreSalon;
            $this->nbreCuisine = $nbreCuisine;
            $this->nbreDouche = $nbreDouche;
            $this->typeMaison = $typeMaison;
            $this->idBienFK = $idBienFK;
            $this->superficieTerrain = $superficieTerrain;
            
        }
    }
?>