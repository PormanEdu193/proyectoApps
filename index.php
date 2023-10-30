<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style_login.css">
  <link href="assets/external/noty/noty.css" rel="stylesheet">
  <title>Login</title>
</head>
<body>
    <div class="container">
      <div class="left">
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

            <div class="input">
              <div>
                <p>Contraseña</p>
                <hr>
              </div>
              <input type="password" name="password" id="password" placeholder="Ingrese Contraseña">
            </div>

            <div class="button_login">
                <button class="button" type="submit" name="login" id="login">Ingresar</button>
            </div>
          </div>
        </form>
        <div class="login_footer">
          <p>¿Olvidaste tu contraseña?</p>
          <a href="#">Click aquí</a>
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
    ?>
</body>
</html> 