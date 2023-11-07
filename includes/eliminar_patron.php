<?php
include("patron.php");
include("patron_crud.php");
include(".././config/database.php");

$db = new Database();
$connection = $db->connect();
$patron_crud = new PatronCrud($connection);

$id = $_GET['id'];

if ($patron_crud->eliminar_patron_bd($id)) {
    $msg="Patron eliminado correctamente";
    header("location: ../views/Administrador/Administrador__Patrones.php?delete_alert=true&alert_msg=$msg");
} else {
    $error_msg="Error al Eliminar los datos.";
    header("location: ../views/Administrador/Administrador__Patrones.php?error=true&error_msg=$error_msg");
}

?>