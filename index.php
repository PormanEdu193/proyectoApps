<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style_login.css">
  <link href="assets/external/noty/noty.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Login</title>
</head>
<body>
    <div class="container">
      <div class="left">
        <header>
          <p>Ingresar como administrator</p>
          <hr>
                <div class="anchor">
                    <a href="views/Administrador_login/index.php">Login Administrator</a>
                  </div>
        </header>
        <div class="login">

          <div class="title_login">
            <h1>Login</h1>
            <hr>
          </div>

          <div class="image">
            <img src="assets/images/ship_white.png" alt="Logo">
          </div>
        <form action="includes/procesar_login_socio.php" method="POST">
            <div class="input">
              <div>
                <p>Correo electrónico</p>
                <hr>
              </div>
              <input type="email" name="email" id="email" placeholder="Ingrese Correo electrónico">
            </div>

            <div class="input" id="pass">
              <div>
                <p>Contraseña</p>
                <hr>
              </div>
              <input type="password" name="password" id="password" placeholder="Ingrese Contraseña">
              <i class='bx bx-show-alt'></i>
            </div>
              <style>
                  .bx {
                    font-size: 30px;
                    transform: translateX(150px);
                    cursor: pointer;
                  }
              </style>
              <script>
                const pass =document.getElementById('password');
                const icon = document.querySelector('.bx');
                icon.addEventListener('click', function(e) {
                  if (pass.type == 'password'){
                      pass.type = 'text';
                      icon.classList.remove('bx-show-alt');
                      icon.classList.add('bxs-hide');
                    }else{
                      pass.type = 'password';
                      icon.classList.add('bx-show-alt');
                      icon.classList.remove('bxs-hide');
                    }
                });
                
              </script>
            <div class="button_login">
                <button class="button" type="submit" name="login" id="login">Ingresar</button>
            </div>
          </div>
        </form>
        <div class="login_footer">
          <p>¿Olvidaste tu contraseña?</p>
          <a href="views/Reestablecer_contraseña/index.php">Click aquí</a>
      </div>
      </div>

      <div class="rigth">
        <div class="info">
              <div class="title">
                <div class="welcome">
                  <p><b>Bienvenido!</b></p>
                </div>
                <div class="name">
                  <p><b>Club Náutico Albatros</b></p>
                </div>
              </div>
              <div class="register">
                  <p>¿No tienes cuenta? Registrate aquí</p>
                  <button class="button" type="button" onclick="register()"> Registarse </button>
              </div>
        </div>
      </div>
    </div>
    <script>
      function register(){
        window.location.href = "views/Registro";
      }
    </script>
    <script src="assets/external/noty/noty.js"></script>
    <?php 
      if(isset($_GET['login_error'])){
        $error_msg = $_GET['error_msg'];
        echo "
          <script>
            new Noty({
                type: 'error',
                layout: 'bottomLeft',
                theme: 'metroui',
                text: '$error_msg',
                timeout: 2000,
            }).show();
          </script>"; 
      }
      if(isset($_GET['login_alert'])){
        $alert_msg = $_GET['alert_msg'];
        echo "
          <script>
            new Noty({
                type: 'warning',
                layout: 'bottomLeft',
                theme: 'metroui',
                text: '$alert_msg',
                timeout: 2000,
            }).show();
          </script>"; 
      }
      if(isset($_GET['add_success'])){
        $add_msg = $_GET['add_msg'];
        echo "
          <script>
            new Noty({
                type: 'success',
                layout: 'topRight',
                theme: 'metroui',
                text: '$add_msg',
                timeout: 2000,
            }).show();
          </script>"; 
      }
    ?>
</body>
</html> 