<?php
    include("../../includes/socio_crud.php");
    session_start();
    if (empty($_SESSION['nombre_usuario'])) {
        header("location: ./.././../index.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("./.././../config/database.php");
        $db = new Database();
        $connection = $db->connect();
        $socio_crud = new SocioCrud($connection);

        $id = $_SESSION['id_usuario'];
        $identificacion = $_POST['identificacion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $nombre = $_POST['nombre'];
        
        if ($socio_crud->update_socio($identificacion,$telefono,$email,$direccion,$nombre,$id)) {
            header("location: Usuario__Perfil.php");
        } else {
            echo "Error al actualizar los datos.";
        }
    }
?>
