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
    <link rel="stylesheet" href="../../assets/css/Header/header.css">
    <link rel="stylesheet" href="../../assets/css/Header/header usuario.css">
    <link rel="stylesheet" href="../../assets/css/Body/Body Opciones usuario.css">
    <link rel="stylesheet" href="../../assets/css/Panel contenido/Panel_Contenido.css">

    <title>Agendar Salidas</title>
</head>
<body>
    <?php
        include("./.././../includes/agendar.php");
        include("./.././../includes/agendar_crud.php");
        include("./.././../config/database.php");
        $db = new Database();
        $connection = $db->connect();
        $id = $_SESSION['id_usuario'];
        $agendar_crud = new AgendarCrud($connection);
        $agendada = $agendar_crud->get_salidas_agendadas() ;

        
    ?>
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
            <div class="PanelContenido__encabezado"><h3>Su historial de salidas</h3></div>
            <div class="PanelContenido__contenido">
                <table class="tablaDatosGrandes">
                    <tbody class="tablaDatosGrandes__cuerpo">
                    <tr class="tablaDatosGrandes__filas">
                        <th class="tablaDatosGrandes__columnas">Id Agenda</th>
                        <th class="tablaDatosGrandes__columnas">Fecha</th>
                        <th class="tablaDatosGrandes__columnas">Hora</th>
                        <th class="tablaDatosGrandes__columnas">Destino</th>
                        <th class="tablaDatosGrandes__columnas">Id del barco</th>
                        <th class="tablaDatosGrandes__columnas">Id del patron</th>
                        <th class="tablaDatosGrandes__columnas">Id de salida</th>
                        
                    </tr>
                    <?php
                        if (!empty($agendada)) {
                            foreach ($agendada as $agendar) {
                                echo "<tr>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $agendar['id_agenda'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $agendar['fecha_agenda'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $agendar['hora_agenda'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $agendar['destino'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $agendar['id_barco'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $agendar['id_patron'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $agendar['id_salida'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se encontraron barcos.";
                        }
                    ?>
                    </tbody>
                </table>
                <a class="boton" href="agendar_salidas.php">Agendar salida</a>
            </div>
        </section>
    </main>
    <div class="capa"></div>
</body>
</html>