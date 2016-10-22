<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>solucionado.com.ar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles_768.css">
    <link rel="stylesheet" href="css/styles_400.css">
    <script type="text/javascript" src="js/reg.js"></script>
  </head>
  <body>
    <header>
        <h1 id="name2">Solucionado</h1>
        <div id="logoSolucionado"><a id="link_logo" href="index.php" target="_self"><img src="img/logo_solucionado.png" class="logo_header"></a></div>
        <nav class="main-nav">
          <ul>
            <li><a href="registration.html" target="_self">Registro</a></li>
            <li><a href="faq.html" target="_self">FAQ</a></li>
          </ul>
        </nav>
        <form id="loginHome" action="" method="post">
           <input id="mailLog" name="mailLog" placeholder=" mail">
           <input id="passLog" type="password" name="passLog" placeholder=" contraseña">
           <button id="ingresar" type="submit" name="ingresar">Ingresar</button>
        </form>
      </header>
    <div id="container">
        <div class="log_in">
        <form id="form_log" action="" method="post">
         <fieldset>
           <legend>INGRESA</legend>
           <br>
           <label for="mail">Email</label>
           <input id="mail" type="email" name="user_email"><br><br>
           <label for="pass">Contraseña</label>
           <input id="pass" type="password" name="user_password"><br><br>
           <small><a href="restablecer.html">Olvide mi contraseña</a></small><br><br>
           <input type="checkbox" name="recordar">Recordarme<br><br>
           <button class="bot" type="submit" name="login">Ingresar</button> <br>
       </form>
        </div>
    </div>
    <footer>
          <div id="social">
            <a href="mailto:contactenos@solucionado.com.ar"><img class="icon" src="img/mail.png"></a>
            <a href="https://www.linkedin.com" title="LinkedIn" target="_blank"><img class="icon" src="img/linke.png"></a>
            <a href="https://www.facebook.com" title="Facebook" target="_blank"><img class="icon" src="img/face.png"></a>
            <a href="https://www.twitter.com" title="Twitter" target="_blank"><img class="icon" src="img/twit.png"></a>
            <a href="https://www.instagram.com" title="Instagram" target="_blank"><img class="icon" src="img/inst.png"></a>
          </div>
          <div id="legal">
            <!--<img src="img/logo.png" class="logo_footer">-->
            <p>Creada y desarrollada por <strong>Grupo 6 Webfull-Stack</strong> turno noche Digital House <br>
              <small>Todos los derechos están reservados.</small>
            </p>
          </div>
      </footer>
  </body>
</html>
