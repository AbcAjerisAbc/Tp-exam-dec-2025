<?php
    namespace app\models;

    use Flight;

    class HistoLivraisonModel{
        private $db;
        private $id_livraison;
        private $id_livreur;
        private $id_vehicule;
        private $montant_recette;
        private $salaire_livreur;


        public function __construct($db){
            $this->db = $db;
        }

        /*Setters*/
        public function setidlivraison($id_livraison){
            $this->id_livraison=$id_livraison;
        }

        public function setidlivreur($id_livreur){
            $this->id_livreur=$id_livreur;
        }

        public function setidvehicule($id_vehicule){
            $this->id_vehicule=$id_vehicule;
        }

        public function setmontantrecette($recette){
            $this->montant_recette=$recette;
        }

        public function setsalaire($salaire){
            $this->salaire_livreur=$salaire;
        }


        public function insererhistorique(){
            $sql="INSERT INTO transport_historique_livraison (id_livraison, id_livreur,id_vehicule, date_livraison , montant_recette, salaire_livreur) VALUES (?,?,?,NOW(),?,?) ";
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$this->id_livraison,$this->id_livreur,$this->id_vehicule,$this->montant_recette,$this->salaire_livreur]);
        }
    }