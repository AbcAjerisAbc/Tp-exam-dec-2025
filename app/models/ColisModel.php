<?php
    namespace app\models;

    use Flight;

    class ColisModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAllcolis(){
            $stmt=$this->db->query("SELECT * FROM transport_colis ORDER BY nom_colis ASC");

            return $stmt->fetchAll();
        }

        public function getcolis($id){
            $stmt=$this->db->prepare("SELECT * FROM transport_colis WHERE id_colis=?");
            $stmt->execute([$id]);

            return $stmt->fetch();
        }
    }