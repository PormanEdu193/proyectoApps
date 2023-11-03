<?php
    include("verificar_login_registro.php");
    include("../config/database.php");    

    $db = new Database();
    $connection = $db->connect();
    $verify = new Verify($connection);


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST["email"];
        $identification_socio = $_POST["identification_type"] . " ". $_POST["identification"];

        if($verify->verify_register_socio($email,$identification_socio)){
            $name = $_POST['name'];
            $tel_number = $_POST['tel_number'];
            $adress = $_POST['adress'];  
            $socio = new Socio();
            $socio->set_nombre($name);
            $socio->set_identificacion($identification_socio);
            $socio->set_direccion($adress);
            $socio->set_email($email);
            $socio->set_telefono($tel_number);
            session_start();
            $_SESSION['socio'] = $socio;
            header("Location: ../views/Registro/Registro_cuenta.php");
            exit();
            
        }else{
            echo "Existe";
        }
    }
?>