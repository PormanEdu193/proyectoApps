<?php 
    class SocioCrud{
        private $connection;
        public function __construct($connection){
            $this->connection=$connection;
        }
        
        function get_socio($id_socio){
            $SQL = "SELECT * FROM Socios WHERE id_socio = '$id_socio'";
            $result = mysqli_query($this->connection, $SQL);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }
   

?>