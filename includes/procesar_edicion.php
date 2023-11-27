<?php
include("socio_crud.php");
include("socio.php");
session_start();
if (empty($_SESSION['nombre_usuario'])) {
    header("location: ../views/Usuario/index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $socio_crud = new SocioCrud($connection);

    $id = $_SESSION['id_socio'];
    $identificacion = $_POST['identificacion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $nombre = $_POST['nombre'];
    
    $socioAux = new Socio($id,$nombre,$identificacion,$direccion,$email,$telefono);
    if ($socio_crud->actualizar_usuario_bd($socioAux)) {
        header("location: ../views/Usuario/Usuario__Perfil.php");
    } else {
        echo "Error al actualizar los datos";
    }
    
}
?>
