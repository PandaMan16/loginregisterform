<?php
    
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    require_once './class/Bdd.php';
    
    class Login extends Bdd{

        private $p_email;
        private $p_password;

        public function __construct(string $email, string $password) {
            $this->p_email = htmlspecialchars(strip_tags($email));
            $this->p_password = htmlspecialchars(strip_tags($password));
        }
        
        private function check() {
            $bdd = $this->Connect()->prepare('SELECT * FROM loginform WHERE email = ?');
            $bdd->execute([$this->p_email]);
            if($bdd->rowCount() > 0) {
                $row = $bdd->fetch(PDO::FETCH_ASSOC);
                if(password_verify("Panda".$this->p_password."Town", $row['password'])) {
                    return $row['name'];
                } else {
                    return 0;
                }
            }else {
                return -1;
            }
        }

        public function CheckLogin() {
            $result = $this->check();
            if($result == 0){
                return "Mot de passe incorrect";
            }else if($result == 1){
                return "Email incorrect créé vous un compte";
            }else{
                $_SESSION['name'] = $result;
                header('location: ./index.php');
                return true;
            }
        }
    }

?>