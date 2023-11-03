<?php
    session_start();
    if (empty($_SESSION['socio'])) {
        header("location: ./.././../index.php");   
    }
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/external/noty/noty.css" rel="stylesheet">
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
                    <form id=form action="../../includes/procesar_registro_usuario.php" method="POST">
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
        <script src="../../assets/external/noty/noty.js"></script>
        <script>

            var email = document.getElementById('email');
            var email_confirmation = document.getElementById('email_confirmacion');
            var password = document.getElementById('password');
            var form = document.getElementById('form');  
            var warnig=false;
            var warnig_msg="Hay campos vacios en el formulario o que no cumplen con los requisitos necesarios";

            form.addEventListener("submit", e=>{
                e.preventDefault();
                checkInputs();
                if(!warnig){
                    form.submit();
                }else{
                    sentAlert()
                    checkForm()
                }
            });
            
            function checkForm(){
                form.addEventListener("mouseover", e=>{
                    checkInputs()
                })
            }
            function sentAlert(){
                new Noty({
                        type: 'warning',
                        layout: 'bottomLeft',
                        theme: 'metroui',
                        text: 'Hay campos vacios en el formulario o que no cumplen con los requisitos necesarios',
                        timeout: 3500,
                    }).show();
             }
            function checkInputs(){
                    var emailPattern = /\S+@\S+\.\S+/;
                    if (!emailPattern.test(email.value)) {
                        email.style.border = "2px solid red";
                        warnig = true;
                    } else {
                        email.style.border = "none";
                        warnig = false;
                    }

                    if (!emailPattern.test(email_confirmation.value)){
                        email_confirmation.style.border = "2px solid red";
                        warnig = true;
                    } else {
                        email_confirmation.style.border = "none";
                        if(warnig){
                            warnig = true;
                        }else{
                            warnig = false;
                        }
                    }

                    if (password.value === "" || password.value.length < 8 || !password.value.match(/[A-Z]/) || !password.value.match(/[0-9]/)) {
                        password.style.border = "2px solid red";
                        warnig = true;
                    } else {
                        password.style.border = "none";
                        if(warnig){
                            warnig = true;
                        }else{
                            warnig = false;
                        }
                    }

                    if(email_confirmation.value != email.value || email_confirmation.value ===  "" || email.value === "" ){
                        email_confirmation.style.border = "2px solid red";
                        email.style.border = "2px solid red"
                        warnig = true;
                    }else{
                        email_confirmation.style.border = "none";
                        email.style.border = "none"
                        if(warnig){
                            warnig = true;
                        }else{
                            warnig = false;
                        }
                    }
                    

            }

        </script>
 </body>
 </html>
