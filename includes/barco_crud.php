<?php 
    class BarcoCrud{
        private $connection;
        public function __construct($connection){
            $this->connection=$connection;
        }
        
        function get_barco($id){
            $SQL = "SELECT * FROM Barcos WHERE id_barco = '$id'";
            $result = mysqli_query($this->connection, $SQL);
            $row = mysqli_fetch_array($result);
            return $row;
        }

        function get_barcos(){
            $SQL = "SELECT * FROM Barcos ";
            try{
                $result = mysqli_query($this->connection, $SQL);
                $barcos = array();
                while ($row = mysqli_fetch_array($result)) {
                    $barcos[] = $row;
                }
                return $barcos;
            }catch(Exception $e){
                echo "Error al consultar el barcos: " . $e->getMessage();
            }
        }

        function agregar_barco_bd($barco){
            $id = $barco->get_id_barco();
            $id_socio = $barco->get_id_socio();
            $matricula = $barco->get_matricula();
            $nombre = $barco->get_nombre_barco();
            $amarre = $barco->get_numero_amarre();
            $cuota = $barco->get_cuota();
            $SQL = "INSERT INTO barcos (id_barco, matricula, nombre_barco, numero_amarre, cuota, id_socio) VALUES ('$id','$matricula', '$nombre', '$amarre', '$cuota', '$id_socio')";
            try {
                $result = mysqli_query($this->connection, $SQL);
                echo "Barco agregado con éxito.";
                return $result;
            } catch (Exception $e) {
                echo "Error al agregar el Barco: " . $e->getMessage();
            }
        }

        function actualizar_barco_bd($barco){
            $id = $barco->get_id_barco();
            $id_socio = $barco->get_id_socio();
            $matricula = $barco->get_matricula();
            $nombre = $barco->get_nombre_barco();
            $amarre = $barco->get_numero_amarre();
            $cuota = $barco->get_cuota();

            $consulta = "UPDATE Barcos SET matricula = '$matricula', nombre_barco = '$nombre', numero_amarre = '$amarre', cuota = '$cuota', id_socio = '$id_socio' WHERE id_barco = '$id'";
            try {
                $result = mysqli_query($this->connection, $consulta);
                return $result;
            } catch (Exception $e) {
                echo "Error al actualizar el Barco: " . $e->getMessage();
            }
        }

        function eliminar_barco_bd($id){
            $consulta = "DELETE FROM Barcos WHERE id_barco = '$id'";
            try {
                $result = mysqli_query($this->connection, $consulta);
                return $result;
            } catch (Exception $e) {
                echo "Error al eliminar el Barco: " . $e->getMessage();
            }
        }
    }
   

?>