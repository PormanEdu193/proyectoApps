<?php
    class UsuarioCrud{
        private $connection;

        public function __construct($connection){
            $this->connection=$connection;
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