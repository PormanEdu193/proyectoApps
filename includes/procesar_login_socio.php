<?php
    include("verificar_login.php");
    include("../config/database.php");

    $db = new Database();
    $connection = $db->connect();
    $verify = new Verify($connection);
   
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login"])){
        $username = $_POST["email"];
        $password = $_POST["password"];
        $verification= $verify->vericate_login_socio($username,$password);
        $socio = $verify->get_socio_instance();
        if($verification){
            echo "Inicio de sesión exitoso. ¡Bienvenido, " . $socio->get_nombre() . "!";
        }
        else{
            echo "Inicio de sesión fallido. Usuario o contraseña incorrectos.";
        }

    }
?>
