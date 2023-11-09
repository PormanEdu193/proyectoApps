<?php
    include("verificar_login_registro.php");
    include("../config/database.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../assets/external/PHPMailer/src/Exception.php';
    require '../assets/external/PHPMailer/src/PHPMailer.php';
    require '../assets/external/PHPMailer/src/SMTP.php';

    $database = new DataBase();
    $connection = $database->connect();
    $verify = new Verify($connection);
    $usuario_crud = new UsuarioCrud($connection);

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST["email"];
        if($verify->verify_register_user($email)){
            echo("No existe");
        }else{
            $mail = new PHPMailer(true);
            try{
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'albatrosclub5@gmail.com';
                $mail->Password = 'gsuf iljn fkem lyit';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
    
                $mail->setFrom('albatrosclub5@gmail.com', 'Club albatros');
                $mail->addAddress($email, 'Socio');
    
                $mail->isHTML(true);
                $mail->Subject = 'Recuperacion contrasena';

                if($usuario_crud->get_user(null,$email)){
                    $password = $usuario_crud->get_user(null,$email)['contraseña'];
                    print_r($result);
                    $mail->Body = 'Tu contrasena es :'.$password;
                    $mail->send();
                    header("Location: ../index.php");
                }else{
                    echo("Error consulta");
                }
                
            }catch (Exception $e) {
                echo "Error al enviar el correo: {$mail->ErrorInfo}";
            }
        }

    }



?>