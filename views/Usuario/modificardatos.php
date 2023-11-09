<?php
   include("./.././../includes/socio_crud.php");
   include("./.././../includes/socio.php");
   include("./.././../config/database.php");
   session_start();
   
    $db = new Database();
    $connection = $db->connect();
    $id = $_SESSION['id_socio'];
    $socio_crud = new SocioCrud($connection);
    $socio_info = $socio_crud->get_socio($id);
    $socio = new Socio($socio_info['id_socio'], $socio_info['nombre'], $socio_info['identificacion'], $socio_info['direccion'], $socio_info['email'], $socio_info['telefono']);
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

    <title>Perfil</title>
</head>
<body>
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
            <div class="PanelContenido__encabezado"><h3>Modificar Datos</h3></div>
            <div class="PanelContenido__contenido">
                    <div class="datosPersonales__datos">
                        <form style="color: black;" action="../../includes/procesar_edicion.php" method="POST">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $socio->get_nombre();?>">
                            <label for="identificacion">Identificación:</label>
                            <input type="text" name="identificacion" id="identificacion" value="<?php echo $socio->get_identificacion();?>">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" id="direccion" value="<?php echo $socio->get_direccion();?>">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?php echo $socio->get_email();?>">
                            <label for="telefono">Teléfono:</label>
                            <input type="number" name="telefono" id="telefono" value="<?php echo $socio->get_telefono();?>">
                            <input class="boton" type="submit" value="Enviar">
                        </form> 
                    </div>
            </div>
        </section>
    </main>
    <div class="capa"></div>
</body>
</html>