<?php
    include("verificar_login.php");
    include("../config/database.php");

    $db = new Database();
    $connection = $db->connect();
    $verify = new Verify($connection);
   
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login"])){
        $username = $_POST["email"];
        $password = $_POST["password"];
        $verification= $verify->verify_login_socio($username,$password);
        $socio = $verify->get_socio_instance();
        if($verification){
            session_start();
            $_SESSION['nombre_usuario'] = $socio->get_nombre();
            header("Location: ../views/Usuario?login_success=true");
            exit;
        }
        else{
            echo "Inicio de sesión fallido. Usuario o contraseña incorrectos.";
        }

    }
?>
