<?php
    namespace app\models;

    use Flight;

    class LivraisonModel{
        private $db;
        private $id_colis;
        private $adresse_depart;
        private $adresse_destination;
        private $id_statut;


        public function __construct($db){
            $this->db = $db;
        }

        /*Setters*/
        public function setidcolis($colis){
            $this->id_colis=$colis;
        }

        public function setadressedepart($depart){
            $this->adresse_depart=$depart;
        }

        public function setadressedestinaton($destinaton){
            $this->adresse_destination=$destinaton;
        }

        public function setidstatut($statut){
            $this->id_statut=$statut;
        }


        public function insererlivraison(){
            $sql="INSERT INTO transport_livraison (id_colis, adresse_depart, adresse_destination, id_statut) VALUES (?,?,?,?)";
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$this->id_colis,$this->adresse_depart,$this->adresse_destination,$this->id_statut]);
        }

        public function getdernierelivraison(){
            $stmt=$this->db->query("SELECT * FROM transport_livraison ORDER BY id_livraison DESC LIMIT 1");

            return $stmt->fetch();
        }
    }