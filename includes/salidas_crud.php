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

        function get_salidas_by_date($start_date,$end_date){
            $SQL = "SELECT * FROM Salidas WHERE fecha_salida BETWEEN '$start_date' AND '$end_date'";
            try{
                $result = mysqli_query($this->connection, $SQL);
                $salidas = array();
                while ($row = mysqli_fetch_array($result)) {
                    $salidas[] = $row;
                }
                return $salidas;
            }catch(Exception $e){
                echo "Error al consultar la salida: " . $e->getMessage();
            }
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
                echo "Error al consultar la salida: " . $e->getMessage();
            }
        }

        function agregar_salida_bd($salida){
            $Id_salida = $salida->get_id_salida();
            $fecha = $salida->get_fecha();
            $hora = $salida->get_hora();
            $destino = $salida->get_destino();
            $id_barco = $salida->get_id_barco();
            $id_patron = $salida->get_id_patron();
            $SQL = "INSERT INTO Salidas (id_salida,fecha_salida, hora_salida, destino, id_barco, id_patron) VALUES ('$Id_salida','$fecha', '$hora', '$destino', '$id_barco', '$id_patron')";
            try {
                $result = mysqli_query($this->connection, $SQL);
                echo "Salida agregado con éxito.";
                return $result;
            } catch (Exception $e) {
                echo "Error al agregar la Salida: " . $e->getMessage();
            }
        }

        function actualizar_salida_bd($salida){
            $Id_salida = $salida->get_id_salida();
            $fecha = $salida->get_fecha();
            $hora = $salida->get_hora();
            $destino = $salida->get_destino();
            $id_barco = $salida->get_id_barco();
            $id_patron = $salida->get_id_patron();

            $consulta = "UPDATE Salidas SET fecha_salida = '$fecha', hora_salida = '$hora', destino = '$destino', id_barco = '$id_barco', id_patron = '$id_patron' WHERE id_salida = '$Id_salida'";
            try {
                $result = mysqli_query($this->connection, $consulta);
                return $result;
            } catch (Exception $e) {
                echo "Error al actualizar la Salida: " . $e->getMessage();
            }
        }
    }
   

?>