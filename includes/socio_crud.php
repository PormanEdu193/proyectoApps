<?php 
    class SocioCrud{
        private $connection;
        public function __construct($connection){
            $this->connection=$connection;
        }
        
        function get_socio($id_socio){
            $SQL = "SELECT * FROM Socios WHERE id_socio = '$id_socio'";
            try{
                $result = mysqli_query($this->connection, $SQL);
                $row = mysqli_fetch_array($result);
                return $row;
            }catch(Exception $e){
                echo "Error al consultar el socio: " . $e->getMessage();
            }
            
            
        }

        function get_socios(){
            $SQL = "SELECT * FROM Socios ";
            try{
                $result = mysqli_query($this->connection, $SQL);
                $socios = array();
                while ($row = mysqli_fetch_array($result)) {
                    $socios[] = $row;
                }
                return $socios;
            }catch(Exception $e){
                echo "Error al consultar el socio: " . $e->getMessage();
            }
        }

        function update_socio($identificacion, $telefono, $email, $direccion, $nombre,$id){
            $consulta = "UPDATE Socios SET nombre = '$nombre', identificacion = '$identificacion', telefono = '$telefono', email = '$email', direccion = '$direccion' WHERE id_socio = '$id'";
            $result = mysqli_query($this->connection, $consulta);
            return $result;
        }

        function add_socio($socio){
            $name = $socio->get_nombre();
            $identification = $socio->get_identificacion();
            $adress = $socio->get_direccion();
            $email = $socio->get_email();
            $tel_number = $socio->get_telefono();
            $id_socio = $socio->get_id_socio();
            $SQL = "INSERT INTO Socios (id_socio,nombre, identificacion, direccion, email, telefono) VALUES ('$id_socio','$name', '$identification', '$adress', '$email', '$tel_number')";
            try {
                $result = mysqli_query($this->connection, $SQL);
                echo "Socio agregado con éxito.";
                return $result;
            } catch (Exception $e) {
                echo "Error al agregar el socio: " . $e->getMessage();
            }
        }
    }
   

?>