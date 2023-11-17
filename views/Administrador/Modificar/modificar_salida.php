<?php
session_start();
if (empty($_SESSION['id_usuario'])) {
    header("location: ./.././.././../views/Administrador_login/index.php");   
}
?>
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

    <title>Modificar patron</title>
</head>
<body>
    <?php 
    include(".././.././.././includes/salidas_crud.php");
    include(".././.././.././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $salida_crud = new SalidasCrud($connection);
    $id = $_GET['id'];
    $salida = $salida_crud->get_salida($id);
    ?>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href=".././Administrador__Patrones.php">Volver</a></li>
        </ul>
        
    </header>
    <main>
    <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Modificar patron</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales" style="display:flex; justify-content:center;">                    
                    <div class="datosPersonales__datos">
                        <div class="datos__resto" style="gap:50px">
                            <form action=".././.././.././includes/actualizar_patron.php" method="POST">                                <table>
                                    <tr>
                                        <th>Id salida : <input type="text" name="Id_salida" value=<?php echo $salida['id_salida']; ?> style="display:inline-block" readonly></th>
                                    </tr>
                                    <tr>
                                        <th>Fecha : <input type="text" name="fecha" value=<?php echo $salida['fecha_salida']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Hora : <input type="text" name="hora" value=<?php echo $salida['hora_salida']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Destino : <input type="text" name="destino" value=<?php echo $salida['destino']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Id Barco : <input type="text" name="id_barco" value=<?php echo $salida['id_barco']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Id Patron : <input type="text" name="id_patron" value=<?php echo $salida['id_patron']; ?> style="display:inline-block"></th>
                                    </tr>
                                </table>
                                <input class="boton" type="submit" value="Modificar patron">
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