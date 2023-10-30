 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/registrar_style.css">
    <title>Document</title>
 </head>
 <body>
        <div class="container">
            <div class="left">
                    <div class="login">
                        <p>¿Ya tienes una cuenta?</p>
                        <div class="anchor">
                            <a href="../../index.php">Login</a>
                        </div>
                        
                    </div>
            </div>
            <div class="rigth">
                <div class="form_container">
                    <div class="title">
                        <p>Registro</p>
                        <hr>
                    </div>
                    <form action="">
                        <div class="input">
                            <div>
                                <p>Nombre</p>
                                <hr>
                            </div>
                            <input type="text" name="name" id="name" placeholder="Ingrese Nombre y apellido">
                        </div>
                        <div class="id_input">
                            <div class="label">
                                <p>Identificación</p>
                                <hr>
                            </div>
                            <div class="id_selection">
                                <select name="identificatio_type" id="identificatio_type">
                                    <option value="C.c">C.c</option>
                                    <option value="C.e">C.e</option>
                                </select>
                                <input type="number" name="identification"  placeholder="Ingrese No.Identificación">
                            </div>
                            
                        </div>
                        <div class="input">
                            <div>
                                <p>Teléfono</p>
                                <hr>
                            </div>
                            <input type="number" name="tel_number" id="tel_number" placeholder="Ingres No.Teléfono">
                        </div>
                        <div class="input">
                            <div>
                                <p>Direccion</p>
                                <hr>
                            </div>
                            <input type="text" name="adress" id="adress" placeholder="Ingrese direccion ej. Carrera 4a #12-50sur">
                        </div>
                        <div class="input">
                            <div>
                                <p>Correo electrónico</p>
                                <hr>
                            </div>
                            <input type="email" name="email" id="email" placeholder="Ingrese correo electronico ej. albatros@example.com">
                        </div>
                        <div class="button_continue">
                             <button class="button" type="submit" name="continue" id="continue">Continuar</button>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
 </body>
 </html>
