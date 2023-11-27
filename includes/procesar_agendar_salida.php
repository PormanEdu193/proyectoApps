<?php
include("agendar.php");
include("agendar_crud.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include(".././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $agendar_crud = new AgendarCrud($connection);

    $id_agenda = $_POST['id_agenda'];
    $id_salida = $_POST['id_salida'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $destino = $_POST['destino'];
    $id_barco = $_POST['id_barco']; 
    $id_patron = $_POST['id_patron'];

    $agendaAux = new Agendar($id_agenda,$id_salida,$fecha,$hora,$destino,$id_barco,$id_patron);
    
    if ($agendar_crud->agregar_agendar_salida($agendaAux)) {
        $add_msg="Salida agendada correctamente";
        header("location: ../views/Usuario/Usuario__agendar.php?add_success=true&add_msg=$add_msg");
    } else {
        $error_msg="Error al agregar los datos de la salida.";
        header("location: ../views/Usuario/Usuario__agendar.php?error=true&error_msg=$error_msg");
    }
}
?>


