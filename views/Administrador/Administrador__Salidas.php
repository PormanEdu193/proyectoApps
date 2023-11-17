<?php
session_start();
if (empty($_SESSION['id_usuario'])) {
    header("location: ./.././../views/Administrador_login/index.php");   
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
    <link rel="stylesheet" href="../../assets/css/Boton/boton.css">
    <link href="../../assets/external/noty/noty.css" rel="stylesheet">
    <title>Salidas</title>
</head>
<body>
    <?php
        include("../../config/database.php");
        include("../../includes/salidas_crud.php");

        $db = new Database();
        $connection = $db->connect();
        $salida_crud = new SalidasCrud($connection);

        $salidas = $salida_crud->get_salidas() ;
        

    ?>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="index.php">Home</a></li>
            <li><a href="Administrador__socios.php">Usuarios</a></li>
            <li><a href="Administrador__Patrones.php">Patrones</a></li>
            <li><a href="Administrador__Barcos.php">Barcos</a></li>
            <li><a href="Administrador__Salidas.php">Salidas</a></li>
            <li><a href="Administrador__Administradores.php">Administradores</a></li>
            <li><a href="../../includes/cerrar_session.php">Salir</a></li>
        </ul>   
    </header>
    <main>
        <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Salidas</h3></div>
            <div class="PanelContenido__contenido">
                <table>
                    <tbody>
                    <tr class="tablaDatosGrandes__filas">
                        <th class="tablaDatosGrandes__columnas">Id de salida</th>
                        <th class="tablaDatosGrandes__columnas">Id del barco</th>
                        <th class="tablaDatosGrandes__columnas">Id del patron</th>
                        <th class="tablaDatosGrandes__columnas">Fecha</th>
                        <th class="tablaDatosGrandes__columnas">Hora</th>
                        <th class="tablaDatosGrandes__columnas">Destino</th>
                        <th class="tablaDatosGrandes__columnas">Acciones</th>
                    </tr>
                    <?php
                        if (!empty($salidas)) {
                            foreach ($salidas as $salida) {
                                echo "<tr>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $salida['id_salida'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $salida['id_barco'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $salida['id_patron'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $salida['fecha_salida'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $salida['hora_salida'] . "</td>";
                                echo "<th class='tablaDatosGrandes__columnas'>" . $salida['destino'] . "</td>";
                                ?>
                                <th class="tablaDatosGrandes__columnas">
                                <?php echo '<a href="Modificar/modificar_salida.php?id='.$salida['id_salida'].'"><input type="button" value="Actualizar" class="boton" style="padding:2px; display:inline-block;"></a>'; ?>
                                -
                                <?php echo '<a href="../../includes/?id='.$salida['id_salida'].'"><input type="button" value="Eliminar" class="boton" style="padding:2px; display:inline-block;"></a>'; ?>
                                </td>
                                <?php
                                echo "</tr>";
                            }
                        } else {
                            echo "No se encontraron socios.";
                        }
                    ?>
                    </tbody>
                </table>
                <a href="Agregar/agregar_salida.php" class="boton">Agregar nueva Salida</a>
            </div>
        </section>
    </main>
    <div class="capa" style="z-index: -1;"></div>

</body> 
</html>