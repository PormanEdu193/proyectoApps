<?php
   
    class Salida{
        private $id_salida;
        private $fecha;
        private $hora;
        private $destino;
        private $id_barco;
        private $id_patron;

        public function __construct($id_salida = null, $fecha = null, $hora = null, $destino = null, $id_barco = null, $id_patron = null){
            $this->id_salida=$id_salida;
            $this->fecha=$fecha;
            $this->hora=$hora;
            $this->destino=$destino;
            $this->id_barco=$id_barco;
            $this->id_patron=$id_patron;
        }

        public function get_id_salida(){
            return $this->id_salida;
        }
        public function get_fecha(){
            return $this->fecha;
        }
        public function get_hora(){
            return $this->hora;
        }
        public function get_destino(){
            return $this->destino;
        }
        public function get_id_barco(){
            return $this->id_barco;
        }
        public function get_id_patron(){
            return $this->id_patron;
        }
        public function __toString(){
            return $this->id_salida." ".$this->fecha." ".$this->hora." ".$this->destino." ".$this->id_barco." ".$this->id_patron;
        }
        public function set_id_salida($id_salida){
            $this->id_salida=$id_salida;
        }
        public function set_fecha($fecha){
            $this->fecha=$fecha;
        }
        public function set_hora($hora){
            $this->hora=$hora;
        }
        public function set_destino($destino){
            $this->destino=$destino;
        }
        public function set_id_barco($id_barco){
            $this->id_barco=$id_barco;
        }
        public function set_id_patron($id_patron){
            $this->id_patron=$id_patron;
        }
    }
?>