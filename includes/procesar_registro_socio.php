<?php
    include("verificar_login_registro.php");
    include("../config/database.php");    

    $db = new Database();
    $connection = $db->connect();
    $verify = new Verify($connection);


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        print_r($_POST);
        $email = $_POST["email"];
        $identification_socio = $_POST["identification_type"] . $_POST["identification"];
        if($verify->verify_register_socio($email,$identification_socio)){
            echo "Existe";
        }else{
            echo "No existe";
        }
        echo $identification_socio;

    }
?>