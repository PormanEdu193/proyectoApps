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
    }
?>