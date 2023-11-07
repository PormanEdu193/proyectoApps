<?php
include("socio.php");
include("socio_crud.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include(".././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $socio_crud = new SocioCrud($connection);

    $id = $_POST['Id_usuario'];
    $nombre = $_POST['nombre'];
    $identificacion = $_POST['Cedula'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email']; 
    $telefono = $_POST['telefono'];

    $usuarioAux = new Socio($id,$nombre,$identificacion,$direccion,$email,$telefono);
    if ($socio_crud->actualizar_usuario_bd($usuarioAux)) {
        $add_msg="Usuario actualizado correctamente";
        header("location: ../views/Administrador/Administrador__socios.php?add_success=true&add_msg=$add_msg");
    } else {
        $error_msg="Error al actualizar los datos.";
        header("location: ../views/Administrador/Administrador__socios.php?error=true&error_msg=$error_msg");
    }
}
?>