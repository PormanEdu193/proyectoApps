<?php
   
    class Socio{
        private $id_socio;
        private $nombre;
        private $identificacion;
        private $direccion;
        private $email;
        private $telefono;

        public function __construct($id_socio = null, $nombre = null, $identificacion = null, $direccion = null, $email = null, $telefono = null){
            $this->id_socio=$id_socio;
            $this->nombre=$nombre;
            $this->identificacion=$identificacion;
            $this->direccion=$direccion;
            $this->email=$email;
            $this->telefono=$telefono;
        }

        public function get_id_socio(){
            return $this->id_socio;
        }
        public function get_nombre(){
            return $this->nombre;
        }
        public function get_identificacion(){
            return $this->identificacion;
        }
        public function get_direccion(){
            return $this->direccion;
        }
        public function get_email(){
            return $this->email;
        }
        public function get_telefono(){
            return $this->telefono;
        }
        public function __toString(){
            return $this->id_socio." ".$this->nombre." ".$this->identificacion." ".$this->direccion." ".$this->email." ".$this->telefono;
        }
        public function set_id_socio($id_socio){
            $this->id_socio=$id_socio;
        }
        public function set_nombre($nombre){
            $this->nombre=$nombre;
        }
        public function set_identificacion($identificacion){
            $this->identificacion=$identificacion;
        }
        public function set_direccion($direccion){
            $this->direccion=$direccion;
        }
        public function set_email($email){
            $this->email=$email;
        }
        public function set_telefono($telefono){
            $this->telefono=$telefono;
        }
    }
?>