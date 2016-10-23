<?php
require_once('php/validar.php');

session_start();

if(!empty($_SESSION['usuario'])) {
  header("Location:exito.php");exit;

  $defaultName = '';
  $defaultLastName = '';
  $defaultCui = '';
  $defaultRegPass = '';
  $defaultRegRePass = '';
  $defaultRegMail = '';
  $defaultReMail = '';
  $defaultPhone = '';
  $defaultCel = '';
  $defaultCalle = '';
  $defaultNumero = '';
  $defaultProv = '';
  $defaultBarrio = '';
  $defaultPartido = '';
  $defaultProveedorServ = '';
  $defaultProveedorProd = '';
}
if (!empty($_POST)){
  //Aca registramos el usuario
  if (isset($_POST['registro']) && $_POST['registro'] == 'registro'){

    $defaultName = isset($_POST['name'])?$_POST['name']:'';
    $defaultLastName = isset($_POST['lastName'])?$_POST['lastName']:'';
    $defaultCui = isset($_POST['cui'])?$_POST['cui']:'';
    $defaultRegPass = isset($_POST['regPass'])?$_POST['regPass']:'';
    $defaultRegRePass = isset($_POST['regRePass'])?$_POST['regRePass']:'';
    $defaultRegMail = isset($_POST['regMail'])?$_POST['regMail']:'';
    $defaultReMail = isset($_POST['reMail'])?$_POST['reMail']:'';
    $defaultPhone = isset($_POST['phone'])?$_POST['phone']:'';
    $defaultCel = isset($_POST['cel'])?$_POST['cel']:'';
    $defaultCalle = isset($_POST['calle'])?$_POST['calle']:'';
    $defaultNumero = isset($_POST['numero'])?$_POST['numero']:'';
    $defaultProv = isset($_POST['prov'])?$_POST['prov']:'';
    $defaultBarrio = isset($_POST['barrio'])?$_POST['barrio']:'';
    $defaultPartido = isset($_POST['partido'])?$_POST['partido']:'';
    $defaultProveedorServ = isset($_POST['proveedorServ'])?$_POST['proveedorServ']:'';
    $defaultProveedorProd = isset($_POST['proveedorProd'])?$_POST['proveedorProd']:'';


    $validacion = validarRegistro($defaultName, $defaultLastName, $defaultCui, $defaultRegPass, $defaultRegRePass,
    $defaultRegMail, $defaultReMail, $defaultPhone, $defaultCel, $defaultCalle, $defaultNumero, $defaultProv,
    $defaultBarrio, $defaultPartido, $defaultProveedorServ, $defaultProveedorProd);

    $state = true;

    foreach ($validacion as $value){
      if ($value != 1){
        $state = false;
      }
    }

    if ($state == true){

      $usuario = generarUsuario($defaultName, $defaultLastName, $defaultCui, $defaultRegPass, $defaultRegRePass,
      $defaultRegMail, $defaultReMail, $defaultPhone, $defaultCel, $defaultCalle, $defaultNumero, $defaultProv,
      $defaultBarrio, $defaultPartido);

      if(guardarUsuario($usuario)) {
        header("Location:exito.php");exit;
      } else {
        die('ERROR al registrate, intenta luego');
      }

    }

    if ($state == true){

      $proveedorServicio = generarProveedorServicio($defaultName, $defaultLastName, $defaultCui, $defaultRegPass, $defaultRegRePass, $defaultRegMail, $defaultReMail, $defaultPhone, $defaultCel, $defaultCalle, $defaultNumero, $defaultProv, $defaultBarrio, $defaultPartido, $defaultProveedorServ);

      if(guardarProveedorServicio($proveedorServicio)) {
        header("Location:exito.php");exit;
      } else {
        die('ERROR al registrate, intenta luego');
      }

    }

    if ($state == true){

      $proveedorProducto = generarProveedorProducto($defaultName, $defaultLastName, $defaultCui, $defaultRegPass, $defaultRegRePass, $defaultRegMail, $defaultReMail, $defaultPhone, $defaultCel, $defaultCalle, $defaultNumero, $defaultProv, $defaultBarrio, $defaultPartido, $defaultProveedorProd);

      if(guardarProveedorProducto($proveedorProducto)) {
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
    <script type="text/javascript" src="js/reg.js"></script>
  </head>
  <body>
    <?php require_once('header.php'); ?>
    <div id="container">

      <div class="registration">
        <div class="dentro">
        <form id="registro" method="post">
          <h1>REGISTRATE</h1>
          <fieldset id="tipo">
            <legend>TIPO DE REGISTRACIÓN</legend>
            <input class="radio" type="radio" id="a" name="tipo_usuario" value="Cliente" /><p>Cliente</p><br>
            <input class="radio" type="radio" id="b" name="tipo_usuario" value="ProvedorS" /><p>Proveedor de Servicios</p><br>
            <input class="radio" type="radio" id="c" name="tipo_usuario" value="ProveedorP" /><p>Proveedor de Materiales</p><br>
            <button id="siguiente">Siguiente</button>
           </fieldset>

           <fieldset id="personal" >
             <legend>DATOS PERSONALES</legend>
             <label for="name">Nombre</label>
             <input id="name" type="text" name="user_name"><br><br>
             <label for="lastname">Apellido</label>
             <input id="lastname" type="text" name="user_lastname"><br><br>
             <label for="cui">CUIL/CUIT</label>
             <input id="cui" type="text" name="user_ID"><br><br>
             <label for="regPass">Contraseña</label>
             <input id="regPass" type="password" name="user_password"><br><br>
             <label for="regRePass">Repetir Contraseña</label>
             <input id="regRePass" type="password" name="user_repassword"><br><br>
             </fieldset>

           <fieldset id="contacto">
            <legend>DATOS DE CONTACTO</legend>
              <label for="regMail">Correo Electrónico</label>
              <input id="regMail" type="email" name="user_email"><br><br>
              <label for="remail">Reingrese Correo Electrónico</label>
              <input id="remail" type="email" name="user_emailDos"><br><br>
              <label for="phone">Telefono</label>
              <input id="phone" type="tel" name="user_phone"><br><br>
              <label for="cel">Celular</label>
              <input id="cel" type="tel" name="user_celphone"><br><br>
              <label for="calle">Calle</label>
              <input id="calle" type="text" name="user_street"><br><br>
              <label for="numero">Número</label>
              <input id="numero" type="number" name="user_street_number"><br><br>
              <label for="prov">Provincia</label>
              <select name="prov">
                <option value="none">Seleccione una Provincia</option>
                <option value="caba">Ciudad de Buenos Aires</option>
                <option value="gbs">Gran Buenos Aires</option>
              </select><br><br>
              <label for="barrio">Barrio</label>
              <select name="barrio">
                <option value="none">Seleccione un Barrio</option>
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
              </select><br><br>
            <label for="partido">Partido</label>
            <select name="partido">
              <option value="none">Seleccione un Partido</option>
              <option value="avellaneda">Avellaneda</option>
              <option value="a_brown">Almirante Brown</option>
              <option value="berazategui">Berazategui</option>
              <option value="berisso">Berisso</option>
              <option value="ensenada">Ensenada</option>
              <option value="e_echeveria">Esteban Echeberria</option>
              <option value="ezeiza">Ezeiza</option>
              <option value="f_varela">Florencio Varela</option>
              <option value="g_s_martin">General San Martín</option>
              <option value="hurlingham">Hurlingham</option>
              <option value="ituzaingo">Ituzaingó</option>
              <option value="j_c_paz">José C. Paz</option>
              <option value="matanza">La Matanza</option>
              <option value="plata">La Plata</option>
              <option value="lanus">Lanús</option>
              <option value="l_zamora">Lomas de Zamora</option>
              <option value="malvinas_argentinas">Malvinas Argenitnas</option>
              <option value="merlo">Merlo</option>
              <option value="moreno">Moreno</option>
              <option value="moron">Morón</option>
              <option value="p_peron">Presidente Perón</option>
              <option value="quilmes">Quilmes</option>
              <option value="s_fernando">San Fernando</option>
              <option value="s_isidro">San Isidro</option>
              <option value="s_miguel">San Miguel</option>
              <option value="s_vicente">San Vicente</option>
              <option value="tres_febrero">Tres de Febrero</option>
              <option value="tigre">Tigre</option>
              <option value="v_lopez">Vicente López</option>
            </select>
           </fieldset>

           <fieldset id="servicios">
             <legend>SERVICIOS PRESTADOS</legend>
             <input type="checkbox" name="proveedorServ" value="electricista">Electricista
             <input type="checkbox" name="proveedorServ" value="gasista">Gasista<br>
             <input type="checkbox" name="proveedorServ" value="plomero">Plomero
             <input type="checkbox" name="proveedorServ" value="calefacion">Calefaccionista<br>
             <input type="checkbox" name="proveedorServ" value="aireac">Aire acondicionado
             <input type="checkbox" name="proveedorServ" value="techista">Techista<br>
             <input type="checkbox" name="proveedorServ" value="albañil">Albañil
             <input type="checkbox" name="proveedorServ" value="pintor">Pintor<br>
             <input type="checkbox" name="proveedorServ" value="yesista">Yesista
             <input type="checkbox" name="proveedorServ" value="carpintero">Carpintero<br>
             <input type="checkbox" name="proveedorServ" value="cerrajero">Cerrajero
             <input type="checkbox" name="proveedorServ" value="herrero">Herrero<br>
             <input type="checkbox" name="proveedorServ" value="tapicero">Tapicero
             <input type="checkbox" name="proveedorServ" value="fletero">Fletero<br>
             <input type="checkbox" name="proveedorServ" value="heladera">Reparación heladeras
             <input type="checkbox" name="proveedorServ" value="lavarropa">Reparación lavarropas<br>
             <input type="checkbox" name="proveedorServ" value="tv">Reparación TV
             <input type="checkbox" name="proveedorServ" value="parquetista">Parquetista<br>
             <input type="checkbox" name="proveedorServ" value="jardinero">Jardinero
             <input type="checkbox" name="proveedorServ" value="piletero">Piletero<br>
             <input type="checkbox" name="proveedorServ" value="decorador">Decorador<br><br>
             <p><b>Adjunte documentación respaldatoria</b></p><br><br><input class="inputAdj" type="file" name="doc_servicios">
           </fieldset>

           <fieldset id="productos">
             <legend>PRODUCTOS OFRECIDOS</legend>
             <input type="checkbox" name="proveedorProd" value="ferreteria">Ferretería
             <input type="checkbox" name="proveedorProd" value="materiales">Corralón de materiales<br>
             <input type="checkbox" name="proveedorProd" value="madera">Madedera
             <input type="checkbox" name="proveedorProd" value="refigeracion">Refrigeración<br>
             <input type="checkbox" name="proveedorProd" value="calefaccion">Calefacción
             <input type="checkbox" name="proveedorProd" value="zingueria">Zinguería<br>
             <input type="checkbox" name="proveedorProd" value="limpieza">Articulos de limpieza
             <input type="checkbox" name="proveedorProd" value="pintor">Articulos de piscina<br>
             <input type="checkbox" name="proveedorServ" value="vivero">Vivero<br><br>
             <br>
             <p><b>Adjunte documentación respaldatoria</b></p><br><br><input class="inputAdj" type="file" name="doc_productos">
           </fieldset>
           <br>
           <div id="botRegistro">
            <button id="bots" class="bot" type="submit">Enviar</button>
           <button id="botr" class="bot" type="reset">Borrar</button>
            </div>
       </form>
       </div>
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
