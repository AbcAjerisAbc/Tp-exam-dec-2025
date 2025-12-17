<?php
    namespace app\models;

    use Flight;

    class VehiculeModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAllvehicule(){
            $stmt=$this->db->query("SELECT * FROM transport_vehicule ORDER BY nom_vehicule ASC");

            return $stmt->fetchAll();
        }
    }