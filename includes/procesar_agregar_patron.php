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
    if ($patron_crud->agregar_patron_bd($patronAux)) {
        $add_msg="Patron agregado correctamente";
        header("location: ../views/Administrador/Administrador__Patrones.php?add_success=true&add_msg=$add_msg");
    } else {
        $error_msg="Error al agregar los datos.";
        header("location: ../views/Administrador/Administrador__Patrones.php?error=true&error_msg=$error_msg");
    }
}
?>