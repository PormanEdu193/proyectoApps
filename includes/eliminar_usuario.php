<?php
include("socio.php");
include("socio_crud.php");
include(".././config/database.php");

$db = new Database();
$connection = $db->connect();
$socio_crud = new SocioCrud($connection);

$id = $_GET['id'];

if ($socio_crud->eliminar_usuario_bd($id)) {
    $msg="Usuario eliminado correctamente";
    header("location: ../views/Administrador/Administrador__socios.php?delete_alert=true&alert_msg=$msg");
} else {
    $error_msg="Error al Eliminar los datos.";
    header("location: ../views/Administrador/Administrador__socios.php?error=true&error_msg=$error_msg");
}

?>