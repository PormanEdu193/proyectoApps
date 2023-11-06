<?php
include("patron.php");
include("patron_crud.php");
include(".././config/database.php");

$db = new Database();
$connection = $db->connect();
$patron_crud = new PatronCrud($connection);

$id = $_GET['id'];

if ($patron_crud->eliminar_patron_bd($id)) {
    header("location: ../views/Administrador/Administrador__Patrones.php");
} else {
    echo "Error al Eliminar los datos.";
}

?>