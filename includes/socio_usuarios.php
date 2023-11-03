<?php
    class SocioUsuarios{
        private $id_socio;
        private $id_usuario;
        public function __construct($id_socio,$id_usuario){
            $this -> id_socio = $id_socio;
            $this -> id_usuario = $id_usuario;
        }

        public function get_id_socio(){
            return $this -> id_socio;
        }
        public function get_id_usuario(){
            return $this -> id_usuario;
        }
        public function set_id_socio($id_socio){
            $this -> id_socio = $id_socio;
        }
        public function set_id_usuario($id_usuario){
            $this -> id_usuario = $id_usuario;
        }
        
    }
?>