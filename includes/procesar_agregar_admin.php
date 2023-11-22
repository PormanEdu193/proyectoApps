<?php
include("socio.php");
include("socio_crud.php");
include("usuario.php");
include("usuario_crud.php");
include("socio_usuarios.php");
include("socios_usuarios_crud.php");
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $socio_crud = new SocioCrud($connection);
    $usuario_crud = new UsuarioCrud($connection);
    $so_us_crud = new SocioUsuariosCrud($connection);

    // Recupera los datos del formulario
    
    $nombre = $_POST['nombre'];
    $identificacion = $_POST['identificacion'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email']; 
    $telefono = $_POST['telefono'];

    $socio = new Socio(NULL,$nombre,$identificacion,$direccion,$email,$telefono);
    $id_socio=substr($socio->get_nombre(), 0, 3) . substr($socio->get_identificacion(), -3);
    $socio->set_id_socio($id_socio);

    $id_usuario = $_POST['Id'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    $usuarioAux = new Usuario(null,$email,$contraseña,$rol);
    $id_usuario=substr($usuarioAux->get_email(), 0, 3) . substr($usuarioAux->get_password(), -3);
    $usuarioAux->set_id($id_usuario);

    $relacion = new SocioUsuarios($socio->get_id_socio(), $usuarioAux->get_id());

    if ($socio_crud->add_socio($socio)) {
        if ($usuario_crud->add_user($usuarioAux)) {
            if ($so_us_crud->add_socio_usuario($relacion)) {
                $add_msg="Administrador agregado correctamente";
                header("location: ../views/Administrador/Administrador__Administradores.php?add_success=true&add_msg=$add_msg");
            }else{
                $error_msg="Error al agregar la relacion entre los datos y el usuario.";
                header("location: ../views/Administrador/Administrador__Administradores.php?error=true&error_msg=$error_msg");
            }
        }else {
            $error_msg="Error al agregar el usuario.";
            header("location: ../views/Administrador/Administrador__Administradores.php?error=true&error_msg=$error_msg");
        }
    } else {
        $error_msg="Error al agregar los datos personales.";
        header("location: ../views/Administrador/Administrador__Administradores.php?error=true&error_msg=$error_msg");
    }
}
?>
