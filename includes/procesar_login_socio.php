<?php
    include("verificar_login.php");
    include("../config/database.php");

    $db = new Database();
    $connection = $db->connect();
    $verify = new Verify($connection);
   
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login"])){
        
        $username = $_POST["email"];
        $password = $_POST["password"];
        if (!empty($username) and !empty($password)) {
            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $verification= $verify->verify_login_socio($username,$password);
                $socio = $verify->get_socio_instance();
                if($verification){
                    session_start();
                    $_SESSION['nombre_usuario'] = $socio->get_nombre();
                    $_SESSION['id_usuario'] = $socio->get_id_socio();
                    $_SESSION['alert'] = false ;
                    header("Location: ../views/Usuario?login_success=true");
                    exit;
                }
                else{
                    echo "Inicio de sesión fallido. Usuario o contraseña incorrectos.";
                }
            } else {
                echo "El usuario no es un correo electronico valido.";
            }
        } else {
            echo "Rellana todos los campos.";
        }
        
        

    }
?>
