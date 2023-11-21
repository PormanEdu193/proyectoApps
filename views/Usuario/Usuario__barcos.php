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
    

    <title>Barcos</title>
</head>
<body>
    <?php
        include("./.././../includes/barco.php");
        include("./.././../config/database.php");
        include("../../includes/barco_crud.php");
        $db = new Database();
        $connection = $db->connect();
        $id = $_SESSION['id_usuario'];
        $barco_crud = new BarcoCrud($connection);
        $barcos = $barco_crud->get_barcos() ;
    ?>
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
        <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Sus barcos</h3></div>
            <div class="PanelContenido__contenido">
                <table class="tablaDatosGrandes">
                    <tbody class="tablaDatosGrandes__cuerpo">
                    <tr class="tablaDatosGrandes__filas">
                        <th class="tablaDatosGrandes__columnas">Id del barco</th>
                        <th class="tablaDatosGrandes__columnas">Id del socio</th>
                        <th class="tablaDatosGrandes__columnas">Número de matrícula</th>
                        <th class="tablaDatosGrandes__columnas">Nombre</th>
                        <th class="tablaDatosGrandes__columnas">Número de amarre</th>
                        <th class="tablaDatosGrandes__columnas">Cuota</th>
                        
                    </tr>
                    
                    <?php
                        if (!empty($barcos)) {
                            foreach ($barcos as $barco) {
                                echo "<tr>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $barco['id_barco'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $barco['id_socio'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $barco['matricula'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $barco['nombre_barco'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $barco['numero_amarre'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $barco['cuota'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se encontraron barcos.";
                        }
                    ?>
                    
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <div class="capa"></div>
</body>
</html>