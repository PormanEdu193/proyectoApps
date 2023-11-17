<?php 
    class SalidasCrud{
        private $connection;
        public function __construct($connection){
            $this->connection=$connection;
        }
        
        function get_salida($id){
            $SQL = "SELECT * FROM Salidas WHERE id_salida = '$id'";
            $result = mysqli_query($this->connection, $SQL);
            $row = mysqli_fetch_array($result);
            return $row;
        }

        function get_salidas(){
            $SQL = "SELECT * FROM Salidas ";
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

        function actualizar_patron_bd($patron){
            $name = $patron->get_nombre();
            $identification = $patron->get_identificacion();
            $adress = $patron->get_direccion();
            $email = $patron->get_email();
            $tel_number = $patron->get_telefono();
            $id_patron = $patron->get_id_patron();

            $consulta = "UPDATE Patrones SET nombre = '$name', identificacion = '$identification', telefono = '$tel_number', email = '$email', direccion = '$adress' WHERE id_patron = '$id_patron'";
            try {
                $result = mysqli_query($this->connection, $consulta);
                return $result;
            } catch (Exception $e) {
                echo "Error al actualizar el Patron: " . $e->getMessage();
            }
        }

        function eliminar_patron_bd($id_patron){
            $consulta = "DELETE FROM Patrones WHERE id_patron = '$id_patron'";
            try {
                $result = mysqli_query($this->connection, $consulta);
                return $result;
            } catch (Exception $e) {
                echo "Error al eliminar el Patron: " . $e->getMessage();
            }
        }
    }
   

?>