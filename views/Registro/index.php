 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/registrar_style.css">
    <link href="../../assets/external/noty/noty.css" rel="stylesheet">
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
                    <form action="../../includes/procesar_registro_socio.php" id="form" method="POST">
                        <div class="input">
                            <div>
                                <p>Nombre</p>
                                <hr>
                            </div>  
                            <input type="text" name="name" id="name_input" placeholder="Ingrese Nombre y apellido">
                        </div>
                        <div class="id_input">
                            <div class="label">
                                <p>Identificación</p>
                                <hr>
                            </div>
                            <div class="id_selection">
                                <select name="identification_type" id="identification_type">
                                    <option value="C.c">C.c</option>
                                    <option value="C.e">C.e</option>
                                </select>
                                <input type="number" name="identification" id="identification" placeholder="Ingrese No.Identificación">
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
                        <button name="continue" class="button" type="submit"  id="continue">Continuar</button>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
        <script src="../../assets/external/noty/noty.js"></script>
        <script>
            var name_input = document.getElementById("name_input");
            var identification = document.getElementById('identification');
            var telNumber = document.getElementById('tel_number');
            var address = document.getElementById('adress');
            var email = document.getElementById('email');
            var form = document.getElementById('form');  
            var warnig=false;
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
                        text: 'Hay campos que no cumplen los requisitos necesarios en el formulario',
                        timeout: 2000,
                    }).show();
             }
            function checkInputs(){
                    if(name_input.value === ""){
                        name_input.style.border = "2px solid red";
                        warnig = true;
                    }else{
                        name_input.style.border = "none";
                        warnig = false;
                    }

                    if (identification.value === "" || isNaN(identification.value)||identification.value.length < 7) {
                        identification.style.border = "2px solid red";
                        warnig = true;
                    } else {
                        identification.style.border = "none";
                        if(warnig){
                            warnig = true;
                        }else{
                            warnig = false;
                        }
                    }

                    if (telNumber.value === "" || isNaN(telNumber.value)||telNumber.value.length < 10) {
                        telNumber.style.border = "2px solid red";
                        warnig = true;
                    } else {
                        telNumber.style.border = "none";
                        if(warnig){
                            warnig = true;
                        }else{
                            warnig = false;
                        }
                    }

                    if (address.value === "") {
                        address.style.border = "2px solid red";
                        warnig = true;
                    } else {
                        address.style.border = "none";
                        if(warnig){
                            warnig = true;
                        }else{
                            warnig = false;
                        }
                    }
                    var emailPattern = /\S+@\S+\.\S+/;
                    if (!emailPattern.test(email.value)) {
                        email.style.border = "2px solid red";
                        warnig = true;
                    } else {
                        email.style.border = "none";
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
