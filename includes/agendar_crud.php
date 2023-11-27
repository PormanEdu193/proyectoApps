<?php 
    class AgendarCrud{
        private $connection;
        public function __construct($connection){
            $this->connection=$connection;
        }

        function get_salidas_agendadas(){
            $SQL = "SELECT * FROM agendar ";
            try{
                $result = mysqli_query($this->connection, $SQL);
                $agendas = array();
                while ($row = mysqli_fetch_array($result)) {
                    $agendas[] = $row;
                }
                return $agendas;
            }catch(Exception $e){
                echo "Error al consultar la tabla agendar: " . $e->getMessage();
            }
        }

        function agregar_agendar_salida($agendar){
            $id_agenda = $agendar->get_id_agendar_salida();
            $Id_salida = $agendar->get_id_salida();
            $fecha = $agendar->get_fecha();
            $hora = $agendar->get_hora();
            $destino = $agendar->get_destino();
            $id_barco = $agendar->get_id_barco();
            $id_patron = $agendar->get_id_patron();
            $SQL = "INSERT INTO agendar (id_agenda,fecha_agenda, hora_agenda, destino, id_barco, id_patron,id_salida) VALUES ('$id_agenda','$fecha', '$hora', '$destino', '$id_barco', '$id_patron','$Id_salida')";
            
            try {
                $result = mysqli_query($this->connection, $SQL);
                echo "Salida agendada con éxito.";
                return $result;
            } catch (Exception $e) {
                echo "Error al agendar la Salida: " . $e->getMessage();
            }
        }
    }
?>