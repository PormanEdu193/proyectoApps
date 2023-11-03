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

    <title>Salidas</title>
</head>
<body>
    <?php
        include("./.././../includes/salidas.php");
        include("./.././../config/database.php");
        $db = new Database();
        $connection = $db->connect();
        $id = $_SESSION['id_usuario'];
        $listaSalidas = array();

        $consulta = "SELECT Salidas.id_salida, Salidas.fecha_salida, Salidas.hora_salida,Salidas.destino, Salidas.id_barco, Salidas.id_patron 
                        FROM (Socios INNER JOIN Barcos on Socios.id_socio = Barcos.id_socio) INNER JOIN Salidas
                        on  Barcos.id_barco = Salidas.id_barco
                        WHERE Socios.id_socio = '$id'";
        $result = mysqli_query($connection, $consulta);
        if($result){
            while($row = $result->fetch_array()){
                $salida = new Salida($row['id_salida'], $row['fecha_salida'], $row['hora_salida'], $row['destino'], $row['id_barco'] ,$row['id_patron']);
                array_push($listaSalidas, $salida);
            }
        }
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
            <div class="PanelContenido__encabezado"><h3>Su historial de salidas</h3></div>
            <div class="PanelContenido__contenido">
                <table class="tablaDatosGrandes">
                    <tbody class="tablaDatosGrandes__cuerpo">
                    <tr class="tablaDatosGrandes__filas">
                        <th class="tablaDatosGrandes__columnas">Id de salida</th>
                        <th class="tablaDatosGrandes__columnas">Id del barco</th>
                        <th class="tablaDatosGrandes__columnas">Id del patron</th>
                        <th class="tablaDatosGrandes__columnas">Fecha</th>
                        <th class="tablaDatosGrandes__columnas">Hora</th>
                        <th class="tablaDatosGrandes__columnas">Destino</th>
                    </tr>
                    <?php
                        foreach ($listaSalidas as $salida) {
                            ?>
                            <tr class="tablaDatosGrandes__filas">
                                <th class="tablaDatosGrandes__columnas"><?php echo $salida->get_id_salida(); ?></th>
                                <th class="tablaDatosGrandes__columnas"><?php echo $salida->get_id_barco(); ?></th>
                                <th class="tablaDatosGrandes__columnas"><?php echo $salida->get_id_patron(); ?></th>
                                <th class="tablaDatosGrandes__columnas"><?php echo $salida->get_fecha(); ?></th>
                                <th class="tablaDatosGrandes__columnas"><?php echo $salida->get_hora(); ?></th>
                                <th class="tablaDatosGrandes__columnas"><?php echo $salida->get_destino(); ?></th>
                            </tr>
                            <?php
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