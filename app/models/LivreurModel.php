<?php
    namespace app\models;

    use Flight;

    class LivreurModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAlllivreur(){
            $stmt=$this->db->query("SELECT * FROM v_livreur_non_occuper ORDER BY nom_livreur ASC");

            return $stmt->fetchAll();
        }
    }