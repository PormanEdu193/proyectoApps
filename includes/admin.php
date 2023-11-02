<?php
   
    class Admin{
        private $id_socio;
        private $email;

        public function __construct($id_socio = null, $email = null){
            $this->id_socio=$id_socio;
            $this->email=$email;
        }

        public function get_id_socio(){
            return $this->id_socio;
        }
        public function get_email(){
            return $this->email;
        }
        public function __toString(){
            return $this->id_socio." ".$this->email;
        }
        public function set_id_socio($id_socio){
            $this->id_socio=$id_socio;
        }
        public function set_email($email){
            $this->email=$email;
        }
    }
?>