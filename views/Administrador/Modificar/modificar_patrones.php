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
    include(".././.././.././includes/patron_crud.php");
    include(".././.././.././config/database.php");
    $db = new Database();
    $connection = $db->connect();
    $patron_crud = new PatronCrud($connection);
    $id = $_GET['id'];
    $patron = $patron_crud->get_patron($id);
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
                                        <th>Id usuario : <input type="text" name="Id_usuario" value=<?php echo $patron['id_patron']; ?> style="display:inline-block" readonly></th>
                                    </tr>
                                    <tr>
                                        <th>Cedula : <input type="text" name="Cedula" value=<?php echo $patron['identificacion']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Nombre : <input type="text" name="nombre" value=<?php echo $patron['nombre']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Telefono : <input type="text" name="telefono" value=<?php echo $patron['telefono']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Email : <input type="text" name="email" value=<?php echo $patron['email']; ?> style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Direccion : <input type="text" name="direccion" value=<?php echo $patron['direccion']; ?> style="display:inline-block"></th>
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