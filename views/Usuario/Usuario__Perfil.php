<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/Usuario__header__interfaces.css">
    <link rel="stylesheet" href="../../assets/css/Usuario__Panel_Contenido.css">
    <link rel="stylesheet" href="../../assets/css/datosPersonales.css">
    <link rel="stylesheet" href="../../assets/css/boton.css">

    <title>Perfil</title>
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
            <div class="PanelContenido__encabezado"><h3>Sus datos personales</h3></div>
            <div class="PanelContenido__contenido">
                <section class="datosPersonales">
                    <img src="../../assets/images/Icono_3.png" alt="" class="datosPersonales__imagen">
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
                <button class="boton">Modificar datos</button>
            </div>
        </section>
    </main>
    <div class="capa"></div>
</body>
</html>