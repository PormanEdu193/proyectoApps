<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/registrar_cuenta_style.css">
    <title>Document</title>
 </head>
 <body>
        <div class="container">
            <div class="left">
                    <div class="info">
                        <p>
                            Es hora de crear una cuenta para que ingreses a nuestra plataforma, para eso ten en cuenta la siguiente información: <br>

                            1.El correo electrónico puede ser igual al anterior, es solo para el ingreso a la plataforma. <br>

                            2.Tu contraseña debe tener al menos 8 caracteres y contener al menos una letra mayúscula y un número. <br>
                        </p>
                    </div>
            </div>
            <div class="rigth">
                <div class="form_container">
                    <div class="title">
                        <p>Registro Cuenta</p>
                        <hr>
                    </div>
                    <form action="">
                        <div class="input">
                            <div>
                                <p>Correo electrónico</p>
                                <hr>
                            </div>
                            <input type="email" name="email" id="email" placeholder="Ingrese correo electronico ej. albatros@example.com">
                        </div>
                        <div class="input">
                            <div>
                                <p>Confirmación Correo electrónico</p>
                                <hr>
                            </div>
                            <input type="email" name="email_confirmacion" id="email_confirmacion" placeholder="Ingrese correo electronico ej. albatros@example.com">
                        </div>
                        <div class="input">
                            <div>
                                <p>Contraseña</p>
                                <hr>
                            </div>
                            <input type="password" name="password" id="password" placeholder="Ingrese contraseña">
                        </div>
                        <div class="button_register">
                             <button class="button" type="submit" name="registrar" id="registrar">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
 </body>
 </html>
