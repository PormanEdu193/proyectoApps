<?php
include("barco.php");
include("barco_crud.php");
include(".././config/database.php");

$db = new Database();
$connection = $db->connect();
$barco_crud = new BarcoCrud($connection);
$id = $_GET['id'];

if ($barco_crud->eliminar_barco_bd($id)) {
    $msg="Barco eliminado correctamente";
    header("location: ../views/Administrador/Administrador__Barcos.php?delete_alert=true&alert_msg=$msg");
} else {
    $error_msg="Error al Eliminar los datos.";
    header("location: ../views/Administrador/Administrador__Barcos.php?error=true&error_msg=$error_msg");
}

?>