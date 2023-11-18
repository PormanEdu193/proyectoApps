<?php
include("salidas.php");
include("salidas_crud.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include(".././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $salida_crud = new SalidasCrud($connection);

    $Id_salida = $_POST['Id_salida'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $destino = $_POST['destino'];
    $id_barco = $_POST['id_barco']; 
    $id_patron = $_POST['id_patron'];

    $salidaAux = new Salida($Id_salida,$fecha,$hora,$destino,$id_barco,$id_patron);
    if ($salida_crud->actualizar_salida_bd($salidaAux)) {
        $add_msg="Salida actualizada correctamente";
        header("location: ../views/Administrador/Administrador__Salidas.php?add_success=true&add_msg=$add_msg");
    } else {
        $error_msg="Error al actualizar los datos.";
        header("location: ../views/Administrador/Administrador__Salidas.php?error=true&error_msg=$error_msg");
    }
}
?>