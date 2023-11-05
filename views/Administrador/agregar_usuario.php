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
    <title>Agregar Socios</title>
</head>
<body>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="../../includes/cerrar_session.php">Salir</a></li>
        </ul>   
    </header>
    <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Socios</h3></div>
            <div class="PanelContenido__contenido">
    
                <form action="../../includes/procesar_agregar_usuario.php" method="POST">
                    <tbody>

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required>

                    <select name="identification_type" id="identification_type">
                        <option value="C.c">C.c</option>
                        <option value="C.e">C.e</option>
                    </select>
                    
                    <label for="identificacion">Identificación:</label>
                    <input type="text" name="identificacion" required>

                    <label for="direccion">Direccion:</label>
                    <input type="text" name="direccion" required>

                    <label for="email">Email:</label>
                    <input type="text" name="email" required>

                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" required>

                    <input class="boton" type="submit" value="Agregar Socio">
                    
                    </tbody>
                </form>
                <a href="Administrador__socios.php">Volver</a>
            </div>    
    </section>    
    
</body>
</html>
