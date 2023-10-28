<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/external/noty/noty.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <script src="../../assets/external/noty/noty.js"></script>
        <?php
            if (isset($_GET['login_success']) && $_GET['login_success']) {
                session_start();
                $nombreUsuario = $_SESSION['nombre_usuario'];
                echo "
                    <script>
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme: 'metroui',
                            text: '<p style=\"font-size:120%;\"><b>✅Inicio de sesión exítoso</b></p><p style=\"font-size:110%;\">Bienvenido socio $nombreUsuario!</p>',
                            timeout:2000,
                        }).show();
                    </script>
                "; 
            }
        ?>
</body>
</html>