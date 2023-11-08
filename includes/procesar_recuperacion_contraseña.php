<?php
    include("verificar_login_registro.php");
    include("../config/database.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    $database = new DataBase();
    $connection = $database->connect();
    $verify = new Verify($connection);

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
                $mail->Body = 'Tu codigo de recuperacion es XXXXX';
    
                $mail->send();
                header("Location: ../index.php");
            }catch (Exception $e) {
                echo "Error al enviar el correo: {$mail->ErrorInfo}";
            }
        }

    }



?>