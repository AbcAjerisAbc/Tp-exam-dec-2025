<?php
    namespace app\models;

    use Flight;

    class StatutModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAllstatut(){
            $stmt=$this->db->query("SELECT * FROM transport_statut");

            return $stmt->fetchAll();
        }
    }