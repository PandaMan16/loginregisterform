<?php
    require_once './class/Bdd.php';

    class Register extends Bdd{
        private $p_name;
        private $p_email;
        private $p_password;
        private $p_password2;

        public function __construct($name, $email, $password, $password2){
            $this->p_name = htmlspecialchars(strip_tags($name));
            $this->p_email = htmlspecialchars(strip_tags($email));
            $this->p_password = htmlspecialchars(strip_tags($password));
            $this->p_password2 = htmlspecialchars(strip_tags($password2));
        }

        private function CheckMail(){
            $bdd = $this->Connect()->prepare('SELECT * FROM loginform WHERE email = ?');
            $bdd->execute([$this->p_email]);
            if($bdd->rowCount() > 0) {
                return false;
            }else{
                return true;
            }
        }

        private function RegisterUser(){
            $bdd = $this->Connect()->prepare('INSERT INTO loginform (name, email, password) VALUES (?,?,?)');
            $hachpasswd = password_hash("Panda".$this->p_password."Town", PASSWORD_DEFAULT);
            $bdd->execute([$this->p_name, $this->p_email, $hachpasswd]);
            return true;
        }
        private function ComparePasswords(){
            if($this->p_password == $this->p_password2){
                return false;
            }else{
                return true;
            }
        }
        public function Register(){
            if($this->ComparePasswords()){
                return "Mot de passe ne correspond pas";
            }else{
                if($this->CheckMail()){
                    $this->RegisterUser();
                    return true;
                }else{
                    return "Vous avez déjà un compte";
                }
            }
        }
        
    }
    
?>