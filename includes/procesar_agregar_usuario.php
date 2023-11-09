<?php
include("socio_crud.php");
include("socio.php");
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $socio_crud = new SocioCrud($connection);

    // Recupera los datos del formulario
    
    $nombre = $_POST['nombre'];
    $identificacion = $_POST['identification_type'] . " ". $_POST['identificacion'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email']; 
    $telefono = $_POST['telefono'];

    $socio = new Socio(NULL,$nombre,$identificacion,$direccion,$email,$telefono);
    $id_socio=substr($socio->get_nombre(), 0, 3) . substr($socio->get_identificacion(), -3);
    $socio->set_id_socio($id_socio);

    if ($socio_crud->add_socio($socio)) {
        $add_msg="Usuario agregado correctamente";
        header("location: ../views/Administrador/Administrador__socios.php?add_success=true&add_msg=$add_msg");
    } else {
        $error_msg="Error al agregar los datos.";
        header("location: ../views/Administrador/Administrador__socios.php?error=true&error_msg=$error_msg");
    }
}
?>
