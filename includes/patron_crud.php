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

        function agregar_patron_bd($patron){
            $name = $patron->get_nombre();
            $identification = $patron->get_identificacion();
            $adress = $patron->get_direccion();
            $email = $patron->get_email();
            $tel_number = $patron->get_telefono();
            $id_patron = $patron->get_id_patron();
            $SQL = "INSERT INTO Patrones (id_patron,nombre, identificacion, direccion, email, telefono) VALUES ('$id_patron','$name', '$identification', '$adress', '$email', '$tel_number')";
            try {
                $result = mysqli_query($this->connection, $SQL);
                echo "Patron agregado con éxito.";
                return $result;
            } catch (Exception $e) {
                echo "Error al agregar el Patron: " . $e->getMessage();
            }
        }
    }
   

?>