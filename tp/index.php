<?php
require_once('php/validarLogin.php');

session_start();

if(!empty($_SESSION['usuario'])) {
  header("Location:XXXXXXXXXXXXXXXXX.php");exit;

  $defaultName = '';
  $defaultEmail = '';
  $defaultUsername = '';
  $defaultPassword = '';
  $defaultPasswordConfirm = '';
}

if (!empty($_POST)){
  //Aca registramos el usuario
  if (isset($_POST['formulario']) && $_POST['formulario'] == 'registro'){

    $defaultName = isset($_POST['name'])?$_POST['name']:'';
    $defaultEmail = isset($_POST['email'])?$_POST['email']:'';
    $defaultUsername = isset($_POST['username'])?$_POST['username']:'';
    $defaultPassword = isset($_POST['password'])?$_POST['password']:'';
    $defaultPasswordConfirm = isset($_POST['passwordConfirm'])?$_POST['passwordConfirm']:'';

    $validacion = validarRegistro($defaultName, $defaultEmail, $defaultUsername, $defaultPassword, $defaultPasswordConfirm);

    $state = true;

    foreach ($validacion as $value){
      if ($value != 1){
        $state = false;
      }
    }

    if ($state == true){

      $usuario = generarUsuario($defaultName,
                                  $defaultEmail,
                                  $defaultUsername,
                                  $defaultPassword);

      if(guardarUsuario($usuario)) {
        header("Location:exito.php");exit;
      } else {
        die('ERROR al registrate, intenta luego');
      }

    }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>solucionado.com.ar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles_768.css">
    <link rel="stylesheet" href="css/styles_400.css">
    <script type="text/javascript" src="js/log.js"></script>
  </head>
  <body>
    <?php require_once('header.php'); ?>
    <div id="container">

        <h2><strong>Solucionado</strong> ofrece una solución integral para reparar o construir tu hogar u oficina.<br>
        Conectando clientes con especialistas y proveedores de materiales.
        </h2>
        <div class="fotos">
            <img src="img/electricista.jpg" class="bannerA">
            <img src="img/plomero.jpg" class="bannerB">
            <img src="img/gasista.jpg" class="bannerC">
        </div>
        <div class="buscadorHome">
          <form id="buscaHome" action="" method="post">
            <h3>Qué necesitás?</h3>
            <select id="sel_servicio" name="servicio">
                <option value="none"> Servicio</option>
                <option value="Electricista">Electricista</option>
                <option value="Plomero">Plomero</option>
                <option value="Gasista">Gasista</option>
                <option value="Albañil">Albañil</option>
                <option value="Calefaccionista">Calefaccionista</option>
                <option value="Aire_acondicionado">Aire acondicionado</option>
                <option value="Pintor">Pintor</option>
                <option value="Techista">Techista</option>
                <option value="Yesista">Yesista</option>
                <option value="Carpintero">Carpintero</option>
                <option value="Cerrajero">Cerrajero</option>
                <option value="Herrero">Herrero</option>
                <option value="Tapicero">Tapicero</option>
                <option value="Fletero">Fletero</option>
                <option value="Reparacion_heladeras">Reparación heladeras</option>
                <option value="Reparacion_lavarropas">Reparación lavarropas</option>
                <option value="Reparacion_TV">Reparación TV</option>
                <option value="Parquetista">Parquetista</option>
                <option value="Jardinero">Jardinero</option>
                <option value="Piletero">Piletero</option>
                <option value="Decorador">Decorador</option>
              </select>
            <select id="sel_zona" name="zona">
                <option value="none"> Zona</option>
                <option value="agronomia">Agronomia</option>
                <option value="almagro">Almagro</option>
                <option value="balvanera">Balvanera</option>
                <option value="barracas">Barracas</option>
                <option value="belgrano">Belgrano</option>
                <option value="boedo">Boedo</option>
                <option value="caballito">Caballito</option>
                <option value="chacarita">Chacarita</option>
                <option value="coghlan">Coghlan</option>
                <option value="colegiales">Colegiales</option>
                <option value="constitucion">Constitucion</option>
                <option value="flores">Flores</option>
                <option value="floresta">Floresta</option>
                <option value="laboca">La Boca</option>
                <option value="lapaternal">La Paternal</option>
                <option value="liniers">Liniers</option>
                <option value="monte_castro">Monte Castro</option>
                <option value="montserrat">Montserrat</option>
                <option value="nueva_pompeya">Nueva Pompeya</option>
                <option value="nuñez">Nuñez</option>
                <option value="palermo">Palermo</option>
                <option value="p_avellaneda">Parque Avellaneda</option>
                <option value="p_chacabuco">Parque Chacabuco</option>
                <option value="p_chas">Parque Chas</option>
                <option value="p_patricios">Parque Patricios</option>
                <option value="p_madero">Puerto Madero</option>
                <option value="recoleta">Recoleta</option>
                <option value="retiro">Retiro</option>
                <option value="saavedra">Saavedra</option>
                <option value="san_nicolas">San Nicolas</option>
                <option value="san_telmo">San Telmo</option>
                <option value="versalles">Versalles</option>
                <option value="v_crespo">Villa Crespo</option>
                <option value="v_devoto">Villa Devoto</option>
                <option value="v_g_mitre">Villa General Mitre</option>
                <option value="v_lugano">Villa Lugano</option>
                <option value="v_luro">Villa Luro</option>
                <option value="v_ortuzar">Villa Ortuzar</option>
                <option value="v_pueyrredon">Villa Pueyrredon</option>
                <option value="v_real">Villa Real</option>
                <option value="v_riachuelo">Villa Riachuelo</option>
                <option value="v_santa_rita">Villa Santa Rita</option>
                <option value="v_soldati">Villa Soldati</option>
                <option value="v_urquiza">Villa Uriquiza</option>
                <option value="v_del_parque">Villa del Parque</option>
                <option value="velez_sarfield">Velez Sarfield</option>
              </select>
            <input id="empresa_profesional" type="text" name="empresa_profesional" placeholder="  Nombre de empresa o profesional">
            <button id="botBusca" type="submit" name="search">Buscar</button>
          </form>
        </div>
    </div>
    <?php require_once('footer.php'); ?>
  </body>
</html>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="server/lib/nicescroll/jquery.nicescroll.js"></script>
<script type="text/javascript">
  $(document).ready(
    function() { 
      $("html").niceScroll({cursorcolor:"#264663",cursorborder:"1px solid #333"});
    }
  );
</script>
