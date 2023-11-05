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
    <link rel="stylesheet" href="../../assets/css/Datos Personales/datosPersonales.css">
    <link rel="stylesheet" href="../../assets/css/Boton/boton.css">

    <title>Perfil</title>
</head>
<body>
    <?php
        include("./.././../includes/socio_crud.php");
        include("./.././../includes/socio.php");
        include("./.././../config/database.php");
        $db = new Database();
        $connection = $db->connect();
        
        $id = $_SESSION['id_usuario'];
        $socio;

        $consulta = "SELECT * FROM Socios WHERE id_socio = '$id'";
        $result = mysqli_query($connection, $consulta);
        if($result->num_rows==1){
            $row = $result->fetch_assoc();
            $id_socio = $row['id_socio'];
            $socio_crud = new SocioCrud($connection);
            $socio_info = $socio_crud->get_socio($id_socio);
            $socio = new Socio($socio_info['id_socio'], $socio_info['nombre'], $socio_info['identificacion'], $socio_info['direccion'], $socio_info['email'], $socio_info['telefono']); 
            
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
            <div class="PanelContenido__encabezado"><h3>Sus datos personales</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales">
                    <img src="../../assets/images/Icono_3.png" alt="Imagen default usuario" class="datosPersonales__imagen">
                    <div class="datosPersonales__datos">
                        <div class="datos__encabezado">
                            <h3 class="datos__encabezado--nombre"><?php echo $socio->get_nombre(); ?></h3>
                        </div>
                        <div class="datos__resto">
                            <table>
                                <tr>
                                    <th>
                                        Cédula : <?php echo $socio->get_identificacion(); ?>
                                    </th>
                                    <th class="datos__resto--cedula">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Telefono : <?php echo $socio->get_telefono(); ?>
                                    </th>
                                    <th class="datos__resto--telefono">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Email : <?php echo $socio->get_email(); ?>
                                    </th>
                                    <th class="datos__resto--email">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Direccion : <?php echo $socio->get_direccion(); ?>
                                    </th>
                                    <th class="datos__resto--direccion">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Id usuario : <?php echo $socio->get_id_socio(); ?>
                                    </th>
                                    <th class="datos__resto--idUsuario">

                                    </th>                            
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>
                <a class="boton" href="modificardatos.php">Modificar datos</a>
            </div>
        </section>
    </main>
    <div class="capa"></div>

</body>
</html>