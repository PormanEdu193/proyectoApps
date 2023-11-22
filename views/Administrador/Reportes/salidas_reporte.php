<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/reset.css">
    <link rel="stylesheet" href="../../../assets/css/Body/Body principal.css">
    <link rel="stylesheet" href="../../../assets/css/Header/header.css">
    <link rel="stylesheet" href="../../../assets/css/Body/Body  Administrador.css">
    <link rel="stylesheet" href="../../../assets/css/Panel contenido/Panel_Contenido.css">
    <link rel="stylesheet" href="../../../assets/css/Datos Personales/datosPersonales.css">
    <link rel="stylesheet" href="../../../assets/css/Boton/Boton administrador.css">
    <link rel="stylesheet" href="../../../assets/css/Boton/boton.css">
    <link href="../../assets/external/noty/noty.css" rel="stylesheet">
    <title>Reporte Salidas</title>
</head>
<body>
    <style>
         @media print {
            .PanelContenido__encabezado {
                visibility: visible;
                margin: 0; /* Eliminar márgenes alrededor del encabezado */
            }

            table ,tr, th{
                visibility: visible;
                margin-top: 0; 
                color: black;
            }
            
            header{
                display: none;
            }
            .PanelContenido{
               visibility: hidden;
            }
            .dates{
                display: none;
            }
        }
    </style>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="../Administrador__Salidas.php">Volver</a></li>
        </ul>   
    </header>
    <main>
        <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Reporte Salidas</h3></div>
            <div class="PanelContenido__contenido">
                <div class="dates">
                    <form style="display:flex;align-items: center;" action="salidas_reporte.php" method="POST">
                        <label style="margin-right: 5px;" for="fecha_inicio">Desde:</label>
                        <input style="margin-right: 10px;width: 40%;"type="date" name="fecha_inicio" id="fecha_inicio">
                        <label style="margin-right: 5px;" for="fecha_fin">Hasta:</label>
                        <input style="margin-right: 10px;width: 40%;"type="date" name="fecha_fin" id="fecha_fin">
                        <input style="margin-right: 5px;padding: 10px;width: 30%;" type="submit" value="Buscar" class="boton">
                    </form>
                    
                </div>
                <?php
                    include("../../../config/database.php");
                    include("../../../includes/salidas_crud.php");

                    $db = new Database();
                    $connection = $db->connect();
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $fecha_inicio = $_POST['fecha_inicio'];
                        $fecha_fin = $_POST['fecha_fin'];

                        $salida_crud = new SalidasCrud($connection);
                        $salidas = $salida_crud->get_salidas_by_date($fecha_inicio,$fecha_fin);
                    }
                   
                ?>
                <table>
                    <tbody>
                    <tr class="tablaDatosGrandes__filas">
                        <th class="tablaDatosGrandes__columnas">Id de salida</th>
                        <th class="tablaDatosGrandes__columnas">Id del barco</th>
                        <th class="tablaDatosGrandes__columnas">Id del patron</th>
                        <th class="tablaDatosGrandes__columnas">Fecha</th>
                        <th class="tablaDatosGrandes__columnas">Hora</th>
                        <th class="tablaDatosGrandes__columnas">Destino</th>
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
                            }
                        } else {
                            echo "No se encontraron salidas.";
                        }
                    ?>
                    </tbody>
                </table>
                <button class="boton" onclick="imprimirReporte()">Imprimir Reporte</button>
            </div>
        </section>
    </main>
    <div class="capa" style="z-index: -1;"></div>
    <script>
        function imprimirReporte() {
            window.print();
        }
    </script>
    </body> 
</html>