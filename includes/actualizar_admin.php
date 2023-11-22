<?php
include("socio.php");
include("socio_crud.php");
include("usuario.php");
include("usuario_crud.php");
include("socios_usuarios.php");
include("socios_usuarios_crud.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include(".././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $socio_crud = new SocioCrud($connection);
    $usuario_crud = new UsuarioCrud($connection);

    $id = $_POST['Id_usuario'];
    $nombre = $_POST['nombre'];
    $identificacion = $_POST['Cedula'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email']; 
    $telefono = $_POST['telefono'];

    $id_usuario = $_POST['Id'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    $usuarioAux = new Usuario($id_usuario,$email,$contraseña,$rol);
    if ($socio_crud->update_socio($id,$nombre,$identificacion,$direccion,$email,$telefono)) {
        if ($usuario_crud->actualizar_usuario($usuarioAux)) {
            $add_msg="Usuario y datos personales actualizados correctamente";
            header("location: ../views/Administrador/Administrador__Administradores.php?add_success=true&add_msg=$add_msg");
        }else{
            $error_msg="Error al actualizar el usuario.";
            header("location: ../views/Administrador/Administrador__Administradores.php?error=true&error_msg=$error_msg");
        }  
    } else {
        $error_msg="Error al actualizar los datos personales.";
        header("location: ../views/Administrador/Administrador__Administradores.php?error=true&error_msg=$error_msg");
    }
}
?>