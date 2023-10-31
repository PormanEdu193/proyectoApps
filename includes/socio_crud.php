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

        function actualizarDatos($identificacion, $telefono, $email, $direccion, $nombre){
            $consulta = "UPDATE Socios SET nombre = '$nombre', identificacion = '$identificacion', telefono = '$telefono', email = '$email', direccion = '$direccion' WHERE id_socio = '$id'";
            $result = mysqli_query($this->connection, $consulta);
            return $result;
        }
    }
   

?>