<?php
include("patron.php");
include("patron_crud.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include(".././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $patron_crud = new PatronCrud($connection);

    $id = $_POST['Id_usuario'];
    $nombre = $_POST['nombre'];
    $identificacion = $_POST['Cedula'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email']; 
    $telefono = $_POST['telefono'];

    $patronAux = new Patron($id,$nombre,$identificacion,$direccion,$email,$telefono);
    if ($patron_crud->actualizar_patron_bd($patronAux)) {
        header("location: ../views/Administrador/Administrador__Patrones.php");
    } else {
        echo "Error al actualizar los datos.";
    }
}
?>