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
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="">Usuarios</a></li>
            <li><a href="">Patrones</a></li>
            <li><a href="">Barcos</a></li>
            <li><a href="">Salidas</a></li>
            <li><a href="">Administradores</a></li>
            <li><a href="../../includes/cerrar_session.php">Salir</a></li>
        </ul>
        
    </header>
    <main>
    <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Modificar barco</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales" style="display:flex; justify-content:center;">                    
                    <div class="datosPersonales__datos">
                        <div class="datos__resto" style="gap:50px">
                            <form action="procesar_edicion.php" method="post" style="gap: 20px; padding: 25px; display: flex; justify-content: center; flex-direction: column;">
                                <table>
                                    <tr>
                                        <th>Numero matricula : <input type="text" name="numero_matricula" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>id del barco : <input type="text" name="id_barco" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Nombre : <input type="text" name="nombre" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Numero de amarre : <input type="text" name="numero_amarre" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>id del usuario : <input type="text" name="id_usuario" value="" style="display:inline-block"></th>
                                    </tr>
                                    <tr>
                                        <th>Couota a pagar : <input type="text" name="couta_pagar" value="" style="display:inline-block"></th>
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