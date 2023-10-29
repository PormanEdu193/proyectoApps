<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/Usuario__header__interfaces.css">
    <link rel="stylesheet" href="../../assets/css/Usuario__Panel_Contenido.css">

    <title>Salidas</title>
</head>
<body>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="">home</a></li>
            <li><a href="./Usuario__Perfil.php">perfil</a></li>
            <li><a href="./Usuario__barcos.php">barcos</a></li>
            <li><a href="./Usuario__Salidas.php">historial de salidas</a></li>
            <li><a href="../../index.php">salir</a></li>
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
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <div class="capa"></div>
</body>
</html>