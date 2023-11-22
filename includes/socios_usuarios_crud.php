<?php
    class SocioUsuariosCrud{
        private $connection;

        public function __construct($connection){
            $this->connection=$connection;
        }

        public function add_socio_usuario($socio_usuario){
            $id_socio=$socio_usuario->get_id_socio();
            $id_usuario=$socio_usuario->get_id_usuario();
            $SQL="INSERT INTO Socios_Usuarios (id_socio,id_usuario) VALUES ('$id_socio','$id_usuario')";
            try {
                $result = mysqli_query($this->connection, $SQL);
                echo "Relacion Socio_Usuario agregado con éxito.";
                return $result;
            } catch (Exception $e) {
                echo "Error al agregar relacion: " . $e->getMessage();
            }
        }

        function actualizar_socio_usuario($socioUsuario){
            $id_socio = $socioUsuario->get_id();
            $id_usuario = $socioUsuario->get_email();

            $consulta = "UPDATE Socios_usuarios SET id_socio = '$id_socio', id_usuario = '$id_usuario' WHERE id_socio = '$id_socio' AND id_usuario = '$id_usuario'";
            try {
                $result = mysqli_query($this->connection, $consulta);
                return $result;
            } catch (Exception $e) {
                echo "Error al actualizar la union entre los datos y el usuario: " . $e->getMessage();
            }
        }
    }
?>