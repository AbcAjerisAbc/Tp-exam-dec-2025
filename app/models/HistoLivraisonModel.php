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


        public function getBeneficeJour($date = null) {
            $sql = "SELECT date_livraison, total_recette, total_salaire, benefice FROM transport_view_benefice_jour";
            $params = [];
            
            if ($date) {
                $sql .= " WHERE date_livraison = ?";
                $params = [$date];
            }
            
            $sql .= " ORDER BY date_livraison DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }
        
        public function getBeneficeMois($date = null) {
            $sql = "SELECT annee, mois, total_recette, total_salaire, benefice FROM transport_view_benefice_mois";
            $params = [];
            
            if ($date) {
                $sql .= " WHERE annee = YEAR(?) AND mois = MONTH(?)";
                $params = [$date, $date];
            }
            
            $sql .= " ORDER BY annee DESC, mois DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }
        
        public function getBeneficeAnnee($date = null) {
            $sql = "SELECT annee, total_recette, total_salaire, benefice FROM transport_view_benefice_annee";
            $params = [];
            
            if ($date) {
                $sql .= " WHERE annee = YEAR(?)";
                $params = [$date];
            }
            
            $sql .= " ORDER BY annee DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }
        
        public function getAnneesDisponibles() {
            $sql = "SELECT DISTINCT annee FROM transport_view_benefice_annee ORDER BY annee DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        }
    }