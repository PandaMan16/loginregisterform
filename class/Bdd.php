<?php 
    abstract class Bdd{
        private $ip = 'localhost';
        private $user = 'root';
        private $pass = 'XXXX';
        private $db = 'online_forma_pro';

        public function Connect(){
            try {
                $pdo = new PDO("mysql:host=$this->ip;dbname=$this->db", $this->user, $this->pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch ( PDOException $th ) {
                return new Exception ($th->getMessage());
            }
        }
    }
?>