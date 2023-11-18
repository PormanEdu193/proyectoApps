<?php
    class UsuarioCrud{
        private $connection;

        public function __construct($connection){
            $this->connection=$connection;
        }
        
        public function get_user($id_user=null,$email=null){
            $SQL="SELECT * FROM Usuarios WHERE id_usuario='$id_user' OR email='$email'";
            try {
                $result = mysqli_query($this->connection, $SQL);
                $row = mysqli_fetch_assoc($result);
                return $row;
            } catch (Exception $e) {
                echo "Error al obtener el usuario: " . $e->getMessage();
            }
        }
        public function add_user($user){
            $email=$user->get_email();
            $password=$user->get_password();
            $rol=$user->get_rol();
            $id_user = $user->get_id();
            $SQL="INSERT INTO Usuarios (id_usuario,email, contraseña, rol) VALUES ('$id_user','$email', '$password', '$rol')";
            try {
                $result = mysqli_query($this->connection, $SQL);
                echo "Usuario agregado con éxito.";
                return $result;
            } catch (Exception $e) {
                echo "Error al agregar el socio: " . $e->getMessage();
            }
        }

        function get_users(){
            $SQL = "SELECT u.id_usuario, s.identificacion, s.nombre, s.telefono, s.direccion, u.email, u.rol
            FROM usuarios AS u INNER JOIN socios_usuarios AS su
            ON (u.id_usuario = su.id_usuario)
            INNER JOIN socios AS s
            ON (su.id_socio = s.id_socio)
            WHERE u.rol = 'Administrador'";
            try{
                $result = mysqli_query($this->connection, $SQL);
                $socios = array();
                while ($row = mysqli_fetch_array($result)) {
                    $socios[] = $row;
                }
                return $socios;
            }catch(Exception $e){
                echo "Error al consultar el socio: " . $e->getMessage();
                return false;
            }
        }
    }
?>