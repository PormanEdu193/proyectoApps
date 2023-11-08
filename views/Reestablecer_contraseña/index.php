<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reestablecer_style.css">
    <title>Reestablecer contraseña</title>
</head>
<body>
    <div class="container">
        <div class="form_body">
            <div class="title_form">
                <div class="image">
                    <img src="../../assets/images/ship_white.png" alt="Logo">
                </div>
                <h1>Reestablecer contraseña</h1>
                <p>Busca tu correo electrónico</p>
                <hr>
            </div>
            <form action="../../includes/procesar_recuperacion_contraseña.php" method="post">
                <div class="input">
                    <div>
                        <p>Correo electrónico</p>
                        <hr>
                    </div>
                    <input type="email" name="email" id="email" placeholder="Ingrese Correo electrónico">
                </div>
                <div class="button_enviar">
                    <button class="button" type="submit" name="enviar" id="enviar">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>