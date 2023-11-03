<?php
    class Usuario{
        private $id;
        private $email;
        private $password;
        private $rol;

        public function __construct($id = null, $email = null, $password = null, $rol = null){
            $this->id=$id;
            $this->email=$email;
            $this->password=$password;
            $this->rol=$rol;
        }

        public function get_id(){
            return $this->id;
        }

        public function get_email(){
            return $this->email;
        }

        public function get_password(){
            return $this->password;
        }

        public function get_rol(){
            return $this->rol;
        }

        public function __toString(){
            return $this->id." ".$this->email." ".$this->password." ".$this->rol;
        }

        public function set_id($id){
            $this->id=$id;
        }

        public function set_email($email){
            $this->email=$email;
        }

        public function set_password($password){
            $this->password=$password;
        }

        public function set_rol($rol){
            $this->rol=$rol;
        } 
    }
?>