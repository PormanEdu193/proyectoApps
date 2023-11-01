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
    <link href="../../assets/external/noty/noty.css" rel="stylesheet">
    <title>Pagina principal</title>
</head>
<body>
    <header>
        <h1 class="header__Nombre">CLUB NÁUTICO ALBATROS</h1>
        <ul class="header__opciones">
            <li><a href="../../includes/cerrar_session.php">Salir</a></li>
        </ul>   
    </header>
    <main>
        <section class="PanelContenido">
            <div class="PanelContenido__encabezado"><h3>Sus datos personales</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales">
                    <img src="../../assets/images/Icono_3.png" alt="imagen Default Usuario" class="datosPersonales__imagen">
                    <div class="datosPersonales__datos">
                        <div class="datos__encabezado">
                            <h3 class="datos__encabezado--nombre">Un nombre</h3>
                        </div>
                        <div class="datos__resto">
                            <table>
                                <tr>
                                    <th>
                                        Cédula : 
                                    </th>
                                    <th class="datos__resto--cedula">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Telefono : 
                                    </th>
                                    <th class="datos__resto--telefono">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Email : 
                                    </th>
                                    <th class="datos__resto--email">

                                    </th>                            
                                </tr>
                                <tr>
                                    <th>
                                        Id usuario : 
                                    </th>
                                    <th class="datos__resto--idUsuario">

                                    </th>                            
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <section class="containerBotones">
            <a href="" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Usuarios</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_1.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
            <a href="" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Barcos</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_2.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
            <a href="" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Salidas</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_6.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
            <a href="" class="botonAdministrador">
                <h3 class="botonAdministrador__descripcion">Administradores</h3>
                <div class="botonAdministrador__imagen">
                    <img src="../../assets/images/Icono_4.png" alt="" class="botonAdministrador__imagen--imagen">
                </div>
                
            </a>
        </section>
    </main>
    <div class="capa" style="z-index: -1;"></div>

</body> 
</html>