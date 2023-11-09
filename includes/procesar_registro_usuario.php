<?php
     include("verificar_login_registro.php");
     include("../config/database.php");  
     include("socio_usuarios.php");
     include("socios_usuarios_crud.php");
     require_once "socio.php";
     
    $db = new Database();
    $connection = $db->connect();
    $verify = new Verify($connection);
   

    if($_SERVER["REQUEST_METHOD"]=="POST"){
       session_start();
       $email = $_POST['email'];
       $socio = $_SESSION['socio'];
       $id_socio=substr($socio->get_nombre(), 0, 3) . substr($socio->get_identificacion(), -3);
       $socio->set_id_socio($id_socio);
       if($verify->verify_register_user($email)){
          $password = $_POST['password'];
          $socio_crud = new SocioCrud($connection);
          $socio_crud->add_socio($socio);
          $id_user =substr(sha1($email),0,6);
          $user = new Usuario($id_user,$email,$password,"Socio");
          $user_crud = new UsuarioCrud($connection);
          $user_crud->add_user($user);
          $socio_usuarios = new SocioUsuarios($socio->get_id_socio(),$user->get_id());
          $socio_usuarios_crud = new SocioUsuariosCrud($connection);
          $socio_usuarios_crud->add_socio_usuario($socio_usuarios);
          $add_msg="Usuario agregado correctamente";
            header("location: ../index.php?add_success=true&add_msg=$add_msg");
          exit();
       }else{
          $error_msg="Error el usuario ya existe en la base de datos.";
            header("location: ../index.php?login_error=true&error_msg=$error_msg");
          exit();
       }
    }else{
        header("location: ../index.php");   
    }

?>