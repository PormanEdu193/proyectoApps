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
    <link rel="stylesheet" href="../../assets/css/Body/Body Opciones usuario.css">
    <link rel="stylesheet" href="../../assets/css/Header/header.css">
    <link rel="stylesheet" href="../../assets/css/Header/header usuario.css">
    <link rel="stylesheet" href="../../assets/css/Panel contenido/Panel_Contenido.css"> 
    <link rel="stylesheet" href="../../assets/css/Datos Personales/datosPersonales.css">
    <link rel="stylesheet" href="../../assets/css/Boton/boton.css">

    <title>Agendar salida</title>
</head>
<body>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="index.php">home</a></li>
            <li><a href="Usuario__Perfil.php">perfil</a></li>
            <li><a href="Usuario__barcos.php">barcos</a></li>
            <li><a href="Usuario__Salidas.php">historial de salidas</a></li>
            <li><a href="Usuario__agendar.php">agendar salidas</a></li>
            <li><a href="../../includes/cerrar_session.php">salir</a></li>
        </ul>
        
    </header>
    <main>
    <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Agendar salida</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales" style="display:flex; justify-content:center;">                    
                    <div class="datosPersonales__datos">
                        <div class="datos__resto" style="gap:50px">
                            <form action="../../includes/procesar_agendar_salida.php" method="POST">
                                <table>
                                    <tr>
                                        <th>Id agendar salida : <input type="text" name="id_agenda" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Id salida : <input type="text" name="id_salida" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Fecha : <input type="date" name="fecha" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Hora : <input type="time" name="hora" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Destino : <input type="text" name="destino" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Id Barco : <input type="text" name="id_barco" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Id Patron : <input type="text" name="id_patron" value="" style="display:inline-block"></th>
                                    </tr>
                                    
                                </table>
                                
                                <input class="boton" type="submit" value="Agendar salida">
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </section>
    </main>
    <div class="capa" style="z-index: -1;"></div>

</body>
</html>