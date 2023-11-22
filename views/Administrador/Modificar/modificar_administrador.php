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
    include(".././.././.././includes/socio_crud.php");
    include(".././.././.././includes/socio.php");
    include(".././.././.././config/database.php");
    include(".././.././.././includes/usuario.php");
    include(".././.././.././includes/usuario_crud.php");
    $db = new Database();
    $connection = $db->connect();
    $socio_crud = new SocioCrud($connection);
    $id = $_GET['id'];
    $socio_info = $socio_crud->get_socio($id);
    $socio = new Socio($socio_info['id_socio'], $socio_info['nombre'], $socio_info['identificacion'], $socio_info['direccion'], $socio_info['email'], $socio_info['telefono']);
    
    $usuario_crud = new UsuarioCrud($connection);
    $id_usuario = $_GET['id_usuario'];
    $usuario_info = $usuario_crud->get_user($id_usuario, null);
    $usuario = new Usuario($usuario_info['id_usuario'], $usuario_info['email'], $usuario_info['contraseña'], $usuario_info['rol']);
    ?>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href=".././Administrador__Administradores.php">Volver</a></li>
        </ul>
        
    </header>
    <main>
    <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Modificar patron</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales" style="display:flex; justify-content:center;">                    
                    <div class="datosPersonales__datos">
                        <div class="datos__resto" style="gap:50px">
                            <form action=".././.././.././includes/actualizar_admin.php" method="POST">        
                                <table>
                                    <th align="center">Datos personales:</th>
                                    <tr>
                                        <th>Id usuario : <input type="text" name="Id_usuario" value=<?php echo $socio->get_id_socio(); ?> style="display:inline-block" readonly></th>
                                    </tr>
                                    <tr>
                                        <th>Cedula : <input type="text" name="Cedula" value=<?php echo $socio->get_identificacion(); ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Nombre : <input type="text" name="nombre" value=<?php echo $socio->get_nombre(); ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Telefono : <input type="text" name="telefono" value=<?php echo $socio->get_telefono(); ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Email : <input type="text" name="email" value=<?php echo $socio->get_email(); ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Direccion : <input type="text" name="direccion" value=<?php echo $socio->get_direccion(); ?> style="display:inline-block"></th>
                                    </tr>
                                    <th align="center">Usario:</th>
                                    <tr>
                                        <th>Id : <input type="text" name="Id" value=<?php echo $usuario->get_id(); ?> style="display:inline-block" readonly></th>
                                    </tr>
                                    <tr>
                                        <th>email : <input type="text" name="email" value=<?php echo $usuario->get_email(); ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>contraseña : <input type="text" name="contraseña" value=<?php echo $usuario->get_password(); ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>rol : <input type="text" name="rol" value=<?php echo $usuario->get_rol(); ?> style="display:inline-block" readonly></th>
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