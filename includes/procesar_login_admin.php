<?php
    include("verificar_login_registro.php");
    include("../config/database.php");

    $db = new Database();
    $connection = $db->connect();
    $verify = new Verify($connection);
   
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login"])){
        
        $username = $_POST["email"];
        $password = $_POST["password"];
        if (!empty($username) and !empty($password)) {
            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $verification= $verify->verify_login_admin($username,$password);
                $admin = $verify->get_admin_instance();
                if($verification){
                    session_start();
                    $_SESSION['id_usuario'] = $admin->get_id_socio();
                    $_SESSION['email'] = $admin->get_email();
                    $_SESSION['alert'] = false ;
                    header("Location: ../views/Administrador?login_success=true");
                    exit;
                }
                else{
                    $error_msg="Inicio de sesión fallido. Usuario o contraseña incorrectos.";
                    header("Location: ../views/Administrador_login/index.php?login_error=true&error_msg=$error_msg");
                }
            } else {
                $alert_msg="El usuario no es un correo electronico valido.";
                header("Location: ../views/Administrador_login/index.php?login_alert=true&alert_msg=$alert_msg");
            }
        } else {
            $alert_msg="Rellana todos los campos.";
            header("Location: ../views/Administrador_login/index.php?login_alert=true&alert_msg=$alert_msg");
        }
    }
?>