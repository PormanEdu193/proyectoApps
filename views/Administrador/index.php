<?php
session_start();
if (empty($_SESSION['id_usuario'])) {
    header("location: ./../Administrador_login/index.php");   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/Body/Body principal.css">
    <link rel="stylesheet" href="../../assets/css/Header/header.css">
    <link rel="stylesheet" href="../../assets/css/Body/Body  Administrador.css">
    <link rel="stylesheet" href="../../assets/css/Panel contenido/Panel_Contenido.css">
    <link rel="stylesheet" href="../../assets/css/Datos Personales/datosPersonales.css">
    <link rel="stylesheet" href="../../assets/css/Boton/Boton administrador.css">
    <link href="../../assets/external/noty/noty.css" rel="stylesheet">
    <title>Pagina principal</title>
</head>
<body>
    <script src="../../assets/external/noty/noty.js"></script>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (isset($_GET['login_success']) && !$_SESSION['alert']) {
            $nombre_usuario = $_SESSION['nombre'];
            echo "
                <script>
                    new Noty({
                        type: 'success',
                        layout: 'topRight',
                        theme: 'metroui',
                        text: '<p style=\"font-size:120%;\"><b>✅Inicio de sesión exítoso</b></p><p style=\"font-size:110%;\">Bienvenido admin: $nombre_usuario!</p>',
                        timeout: 2000,
                    }).show();
                </script>"; 
            $_SESSION['alert'] = true;
        }

         
        ?>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="../../includes/cerrar_session.php">Salir</a></li>
        </ul>   
    </header>
    <main>
        <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Sus datos personales</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales">
                    <img src="../../assets/images/Icono_3.png" alt="imagen Default Usuario" class="datosPersonales__imagen">
                    <div class="datosPersonales__datos">
                        <div class="datos__encabezado">
                            <h3 class="datos__encabezado--nombre"><?php echo $_SESSION['nombre'] ?></h3>
                        </div>
                        <div class="datos__resto">
                            <table>
                                <tr>
                                    <th>
                                        Cédula : <?php echo $_SESSION['identificacion'] ?>
                                    </th>
                                    <th class="datos__resto--cedula">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Telefono : <?php echo $_SESSION['telefono'] ?>
                                    </th>
                                    <th class="datos__resto--telefono">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Email : <?php echo $_SESSION['email'] ?>
                                    </th>
                                    <th class="datos__resto--email">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Id usuario : <?php echo $_SESSION['id_usuario'] ?>
                                    </th>
                                    <th class="datos__resto--idUsuario">

                                    </th>                            
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <section class="containerBotones">
            <a href="Administrador__socios.php" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Usuarios</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_1.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
            <a href="Administrador__Patrones.php" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Patrones</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_1.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
            <a href="Administrador__Barcos.php" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Barcos</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_2.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
            <a href="Administrador__Salidas.php" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Salidas</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_6.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
            <a href="Administrador__Administradores.php" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Administradores</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_4.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
            
        </section>
    </main>
    <div class="capa" style="z-index: -1;"></div>
    
</body> 
</html>