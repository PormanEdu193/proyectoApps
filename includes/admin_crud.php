<?php 
    class AdminCrud{
        private $connection;
        public function __construct($connection){
            $this->connection=$connection;
        }
        
        function get_admin($id_admin){
            $SQL = "SELECT * FROM Usuarios WHERE id_usuario = '$id_admin'";
            $result = mysqli_query($this->connection, $SQL);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }
   

?>