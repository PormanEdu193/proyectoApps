<?php
session_start();
if (empty($_SESSION['nombre_usuario'])) {
    header("location: ./.././../index.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/Body/Body principal.css">
    <link rel="stylesheet" href="../../assets/css/Body/Body Principal usuario.css">
    <link rel="stylesheet" href="../../assets/css/Header/header.css">
    <link href="../../assets/external/noty/noty.css" rel="stylesheet">
    <title>Pagina principal</title>
</head>
<body>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="index.php">home</a></li>
            <li><a href="Usuario__Perfil.php">perfil</a></li>
            <li><a href="Usuario__barcos.php">barcos</a></li>
            <li><a href="Usuario__Salidas.php">historial de salidas</a></li>
            <li><a href="../../includes/cerrar_session.php">salir</a></li>
        </ul>   
    </header>
    <main>
        <div class="logoContainer">
            <img src="../../assets/images/ship_white.png" alt="Silueta de un barco">
        </div>
    </main>
    <div class="capa"></div>
    <script src="../../assets/external/noty/noty.js"></script>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (isset($_GET['login_success']) && !$_SESSION['alert']) {
            $nombreUsuario = $_SESSION['nombre_usuario'];
            echo "
                <script>
                    new Noty({
                        type: 'success',
                        layout: 'topRight',
                        theme: 'metroui',
                        text: '<p style=\"font-size:120%;\"><b>✅Inicio de sesión exítoso</b></p><p style=\"font-size:110%;\">Bienvenido socio $nombreUsuario!</p>',
                        timeout: 2000,
                    }).show();
                </script>"; 
            $_SESSION['alert'] = true;
        }

         
        ?>
</body> 
</html>