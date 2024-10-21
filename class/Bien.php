<?php 
    class Bien{
        // les attributs
        private $idBien;
        private $idAdminFK;
        private $referenceBien;
        private $dateTimeBien;
        private $titreBien;
        private $descriptionBien;
        private $locationVenteBien; // peut prendre 2 valeurs : "location" ou "vente"
        private $prixBien;
        /*private $lieuBien;*/
        private $paysBien;
        private $villeBien;
        private $lienPhoto1;
        private $lienPhoto2;
        private $lienPhoto3;
        private $lienPhoto4;
        private $lienPhoto5;
        private $lienPhoto6;
        private $lienPhoto7;
        private $lienPhoto8;

        // les accesseurs & les mutateurs

        public function getIdBien(){
            return $this->idBien;
        }
        public function setIdBien($idBien){
            $this->idBien = $idBien;
        }

       public function getIdAdminFK(){
        return $this->idAdminFK;
       }
       public function setIdAdminFK($idAdminFK){
        $this->idAdminFK = $idAdminFK;
       }

        public function getReferenceBien(){
            return $this->referenceBien;
        }
        public function setReferenceBien($referenceBien){
            $this->referenceBien = $referenceBien;
        }
        public function getDateTimeBien(){
            return $this->dateTimeBien;
        }
        public function setDateTimeBien($dateTimeBien){
            $this->dateTimeBien = $dateTimeBien;
        }
        public function getTitreBien(){
            return $this->titreBien;
        }
        public function setTitreBien($titreBien){
            $this->titreBien = $titreBien;
        }
        public function getDescriptionBien(){
            return $this->descriptionBien;
        }
        public function setDescriptionBien($descriptionBien){
            $this->descriptionBien = $descriptionBien;
        }
        public function getLocationVenteBien(){
            return $this->locationVenteBien;
        }
        public function setLocationVenteBien($locationVenteBien){
            $this->locationVenteBien = $locationVenteBien;
        }
        public function getPrixBien(){
            return $this->prixBien;
        }
        public function setPrixBien($prixBien){
            $this->prixBien = $prixBien;
        }
        public function getPaysBien(){
            return $this->paysBien;
        }
        public function setPaysBien($paysBien){
            $this->paysBien = $paysBien;
        }
        public function getVilleBien(){
            return $this->villeBien;

        }
        public function setVilleBien($villeBien){
            $this->villeBien = $villeBien;
        }
        public function getLienPhoto1(){
            return $this->lienPhoto1;
        }
        public function setLienPhoto1($lienPhoto1){
            $this->lienPhoto1 = $lienPhoto1;
        }
        public function getLienPhoto2(){
            return $this->lienPhoto2;
        }
        public function setLienPhoto2($lienPhoto2){
            $this->lienPhoto2 = $lienPhoto2;
        }
        public function getLienPhoto3(){
            return $this->lienPhoto3;
        }
        public function setLienPhoto3($lienPhoto3){
            $this->lienPhoto3 = $lienPhoto3;
        }
        public function getLienPhoto4(){
            return $this->lienPhoto4;
        }
        public function setLienPhoto4($lienPhoto4){
            $this->lienPhoto4 = $lienPhoto4;
        }
        public function getLienPhoto5(){
            return $this->lienPhoto5;
        }
        public function setLienPhoto5($lienPhoto5){
            $this->lienPhoto5 = $lienPhoto5;
        }
        public function getLienPhoto6(){
            return $this->lienPhoto6;
        }
        public function setLienPhoto6($lienPhoto6){
            $this->lienPhoto6 = $lienPhoto6;
        }
        public function getLienPhoto7(){
            return $this->lienPhoto7;
        }
        public function setLienPhoto7($lienPhoto7){
            $this->lienPhoto7 = $lienPhoto7;
        }
        public function getLienPhoto8(){
            return $this->lienPhoto8;
        }
        public function setLienPhoto8($lienPhoto8){
            $this->lienPhoto8 = $lienPhoto8;
        }

        
        
        // constructeur

        public function __construct($idBien, $idAdminFK, $referenceBien, $dateTimeBien, $titreBien, $descriptionBien, $locationVenteBien, $prixBien, $paysBien, $villeBien, $lienPhoto1, $lienPhoto2, $lienPhoto3, $lienPhoto4, $lienPhoto5, $lienPhoto6, $lienPhoto7, $lienPhoto8){
            $this->idBien = $idBien;
            $this->idAdminFK = $idAdminFK;
            $this->referenceBien = $referenceBien;
            $this->dateTimeBien = $dateTimeBien;
            $this->titreBien = $titreBien;
            $this->descriptionBien = $descriptionBien;
            $this->locationVenteBien = $locationVenteBien;
            $this->prixBien = $prixBien;
            $this->paysBien = $paysBien;
            $this->villeBien = $villeBien;
            $this->lienPhoto1 = $lienPhoto1;
            $this->lienPhoto2 = $lienPhoto2;
            $this->lienPhoto3 = $lienPhoto3;
            $this->lienPhoto4 = $lienPhoto4;
            $this->lienPhoto5 = $lienPhoto5;
            $this->lienPhoto6 = $lienPhoto6;
            $this->lienPhoto7 = $lienPhoto7;
            $this->lienPhoto8 = $lienPhoto8;
           
        }
        


        

    }
?>