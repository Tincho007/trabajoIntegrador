<?php
session_start();
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
  </head>
  <body>
    <?php require_once('header.php'); ?>
    <div id="container">
    	<div class="exito">
	    	<fieldset id="exito">
	        	<legend>REGISTRO</legend>
	        		<p><?php echo '<b>TE REGISTRASTE!</b><br>Ya podes conectarte con los profesionales.<br>'; ?></p>

	        		<a id="goHome" href="index.php">Empezar</a>
	    	</fieldset>
		</div>
	</div>
    <?php require_once('footer.php'); ?>
  </body>
</html>