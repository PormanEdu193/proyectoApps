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

    <title>Modificar barco</title>
</head>
<body>
    <?php 
    include(".././.././.././includes/barco_crud.php");
    include(".././.././.././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $barco_crud = new BarcoCrud($connection);
    $id = $_GET['id'];
    $barco = $barco_crud->get_barco($id);
    ?>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
        <li><a href=".././Administrador__Barcos.php">Volver</a></li>
        </ul>
        
    </header>
    <main>
    <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Modificar barco</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales" style="display:flex; justify-content:center;">                    
                    <div class="datosPersonales__datos">
                        <div class="datos__resto" style="gap:50px">
                            <form action=".././.././.././includes/actualizar_barco.php" method="POST">
                                <table>
                                    <tr>
                                        <th>id del barco : <input type="text" name="id_barco" value=<?php echo $barco['id_barco']; ?> style="display:inline-block" readonly></th>
                                    </tr>
                                    <tr>
                                        <th>id del socio : <input type="text" name="id_usuario" value=<?php echo $barco['id_socio']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Numero matricula : <input type="text" name="numero_matricula" value=<?php echo $barco['matricula']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Nombre : <input type="text" name="nombre" value=<?php echo $barco['nombre_barco']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Numero de amarre : <input type="text" name="numero_amarre" value=<?php echo $barco['numero_amarre']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Cuota a pagar : <input type="text" name="couta_pagar" value=<?php echo $barco['cuota']; ?> style="display:inline-block"></th>
                                    </tr>
                                </table>
                                <input class="boton" type="submit" value="Modificar barco">
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