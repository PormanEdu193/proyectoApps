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
    <title>Socios</title>
</head>
<body>
    <?php
        include("../../config/database.php");
        include("../../includes/socio_crud.php");

        $db = new Database();
        $connection = $db->connect();
        $socio_crud = new SocioCrud($connection);

        $socios = $socio_crud->get_socios() ;
        

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
            <div class="PanelContenido__encabezado"><h3>Socios</h3></div>
            <div class="PanelContenido__contenido">
                
                <table>
                    <tbody>
                        
                    <tr class="tablaDatosGrandes__filas">
                        <th class="tablaDatosGrandes__columnas">Id usuario</th>
                        <th class="tablaDatosGrandes__columnas">Cedula</th>
                        <th class="tablaDatosGrandes__columnas">Nombre</th>
                        <th class="tablaDatosGrandes__columnas">Telefono</th>
                        <th class="tablaDatosGrandes__columnas">Direccion</th>
                        <th class="tablaDatosGrandes__columnas">Email</th>
                        <th class="tablaDatosGrandes__columnas">Acciones</th>
                    </tr>
                    <?php
                        if (!empty($socios)) {
                            foreach ($socios as $socio) {
                                echo "<tr>";
                                echo "<td class='tablaDatosGrandes__columnas'>" . $socio['id_socio'] . "</td>";
                                echo "<td class='tablaDatosGrandes__columnas'>" . $socio['identificacion'] . "</td>";
                                echo "<td class='tablaDatosGrandes__columnas'>" . $socio['nombre'] . "</td>";
                                echo "<td class='tablaDatosGrandes__columnas'>" . $socio['telefono'] . "</td>";
                                echo "<td class='tablaDatosGrandes__columnas'>" . $socio['direccion'] . "</td>";
                                echo "<td class='tablaDatosGrandes__columnas'>" . $socio['email'] . "</td>";
                                ?>
                                <th class="tablaDatosGrandes__columnas">
                                <?php echo '<a href="Modificar/modificar_usuario.php?id='.$socio['id_socio'].'"><input type="button" value="Actualizar" class="boton" style="padding:2px; display:inline-block;"></a>'; ?>
                                
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
                <a href="Agregar/agregar_usuario.php" class="boton">Agregar nuevo Socio</a>
            </div>
        </section>
    </main>
    <div class="capa" style="z-index: -1;"></div>
    <script src="../../assets/external/noty/noty.js"></script>
    <?php 
      if(isset($_GET['add_success'])){
        $add_msg = $_GET['add_msg'];
        echo "
          <script>
            new Noty({
                type: 'success',
                layout: 'topRight',
                theme: 'metroui',
                text: '$add_msg',
                timeout: 2000,
            }).show();
          </script>"; 
      }
      if(isset($_GET['delete_alert'])){
        $alert_msg = $_GET['alert_msg'];
        echo "
          <script>
            new Noty({
                type: 'warning',
                layout: 'topRight',
                theme: 'metroui',
                text: '$alert_msg',
                timeout: 2000,
            }).show();
          </script>"; 
      }
      if(isset($_GET['error'])){
        $error_msg = $_GET['error_msg'];
        echo "
          <script>
            new Noty({
                type: 'error',
                layout: 'topRight',
                theme: 'metroui',
                text: '$error_msg',
                timeout: 2000,
            }).show();
          </script>"; 
      }
    ?>


</body> 
</html>