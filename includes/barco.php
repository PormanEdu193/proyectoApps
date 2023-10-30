<?php
   
    class Barco{
        private $id_barco;
        private $matricula;
        private $nombre_barco;
        private $numero_amarre;
        private $cuota;
        private $id_socio;

        public function __construct($id_barco = null, $matricula = null, $nombre_barco = null, $numero_amarre = null, $cuota = null, $id_socio = null){
            $this->id_barco=$id_barco;
            $this->matricula=$matricula;
            $this->nombre_barco=$nombre_barco;
            $this->numero_amarre=$numero_amarre;
            $this->cuota=$cuota;
            $this->id_socio=$id_socio;
        }

        public function get_id_barco(){
            return $this->id_barco;
        }
        public function get_matricula(){
            return $this->matricula;
        }
        public function get_nombre_barco(){
            return $this->nombre_barco;
        }
        public function get_numero_amarre(){
            return $this->numero_amarre;
        }
        public function get_cuota(){
            return $this->cuota;
        }
        public function get_id_socio(){
            return $this->id_socio;
        }
        public function __toString(){
            return $this->id_barco." ".$this->matricula." ".$this->nombre_barco." ".$this->numero_amarre." ".$this->cuota." ".$this->id_socio;
        }
        public function set_id_barco($id_barco){
            $this->id_barco=$id_barco;
        }
        public function set_matricula($matricula){
            $this->matricula=$matricula;
        }
        public function set_nombre_barco($nombre_barco){
            $this->nombre_barco=$nombre_barco;
        }
        public function set_numero_amarre($numero_amarre){
            $this->numero_amarre=$numero_amarre;
        }
        public function set_cuota($cuota){
            $this->cuota=$cuota;
        }
        public function set_id_socio($id_socio){
            $this->id_socio=$id_socio;
        }
    }
?>