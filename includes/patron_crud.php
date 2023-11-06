<?php 
    class PatronCrud{
        private $connection;
        public function __construct($connection){
            $this->connection=$connection;
        }
        
        function get_patrones(){
            $SQL = "SELECT * FROM Patrones ";
            try{
                $result = mysqli_query($this->connection, $SQL);
                $patrones = array();
                while ($row = mysqli_fetch_array($result)) {
                    $patrones[] = $row;
                }
                return $patrones;
            }catch(Exception $e){
                echo "Error al consultar el socio: " . $e->getMessage();
            }
        }
    }
   

?>