<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>solucionado.com.ar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles_768.css">
    <link rel="stylesheet" href="css/styles_400.css">
  </head>
  <body>
    <?php require_once('header.php'); ?>
    <div id="container">

      <div class="faq">
        <h1>PREGUNTAS FRECUENTES</h1>
        <dl>
          <dt>¿De qué forma me resgistro en el sitio? ¿Puedo ofrecer mis servicios?</dt>
          <dd> Para registrarte en el sitio ya sea como proveedor o cliente, debes ingresar los datos que te solicitamos. En caso de que quieras ser provedor por favor no olvides de ingresar las referancias laborales y antecedentes de formacion. <br>
          Si te especializas en la venta de insumos para la construccion también puedes ser provedor.</dd>

          <dt>¿Como solicito presupuesto?</dt>
          <dd> Luego de seleccionar la zona y el servicio que estas buscando, elige el proveedor y desde la opcion contactar,enviaras tus datos y trabajo a realizar, o cantidad y tipos de materieles que necesites.<br>
            El provedor en 48 hs te enviara el presupuesto via e-mail. </dd>

          <dt>¿Los profesionales cuentan con su matrícula correspondiente? </dt>
          <dd> Todos nuestros porvedores fueron seleccionados, previa evaluacion de antecedentes y constacion de formacion profesional. </dd>

          <dt>¿Puedo contratar un servicio sin que incluya materiales?</dt>
          <dd> Si usted puedo contratar el servicio que desee, no es condicion que la contratacion incluya materiales.Todas las contrataciones son de acuerdo sus necesiades. </dd>

          <dt>¿En qué zona trabajan? </dt>
          <dd> Este sitio es una gran Red de contactos, no importa en que lugar te encuentres del pais,ingresando la zona en la que necesites el servicio te contactaremos con los proveedores mas cercanos.</dd>

          <dt>¿Cómo hago para contratar el servicio si el presupuesto esta ok? </dt>
          <dd> Cuando recibas el presupuesto, el proveedor te pasara sus datos para que en caso de estar conforme con el mismo,lo contactes y coordines directamente con el.</dd>

          <dt>¿Qué tiempo tengo para desistir de la contratación?</dt>
          <dd> Un vez confirmada la contratacion de los servicios, tanto el cliente como el proveedor tiene un plazo de 72 hs para cancelar la misma, en caso de no ser asi y hacerlo en un tiempo posterior se lo puntuara de forma negativa. A fin de dejar antecedentes. Teniendo presente que si presentan un elevado porcentaje desfavorable se los dara de baja como usuarios.</dd>
        </dl>


      </div>
    </div>
    <?php require_once('footer.php'); ?>
  </body>
</html>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="server/lib/nicescroll/jquery.nicescroll.js"></script>
<script type="text/javascript" src="js/faq.js"></script>

<script type="text/javascript">
  $(document).ready(
    function() { 
      $("html").niceScroll({cursorcolor:"#264663",cursorborder:"1px solid #333"});
    }
  );
</script>