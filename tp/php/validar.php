<?php

function validarRegistro($name, $lastName, $cui, $regPass, $regRePass,
$regMail, $reMail, $phone, $cel, $calle, $numero, $prov,
$barrio, $partido, $proveedorServ, $proveedorProd){
  $errores = [];

  $errores['name'] = validarNombre($name);
  $errores['lastName'] = validarApellido($lastName);
  $errores['cui'] = validarCui($cui);
  $errores['regPass'] = validarPassword($regPass);
  $errores['regRePass'] = validarPasswordConfirm($regPass, $regRePass);
  $errores['regMail'] = validarEmail($regMail,true);
  $errores['reMail'] = validarEmailConfirm($reMail,true);
  $errores['phone'] = validarPhone($phone);
  $errores['cel'] = validarCell($cel);
  $errores['calle'] = validarCalle($calle);
  $errores['numero'] = validarNumero($numero);
  $errores['prov'] = validarProv($prov);
  $errores['barrio'] = validarBarrio($barrio);
  $errores['partido'] = validarPartido($partido);
  $errores['proveedorServ'] = validarProveedorServ($proveedorServ);
  $errores['proveedorProd'] = validarProveedorProd($proveedorProd);


  return $errores;
}

function validarLogin($regMail, $regPass){
  $errores = [];

  $errores['emailLogin'] = validarEmail($regMail);
  $errores['passwordLogin'] = validarPassword($regPass);

  return $errores;
}

function validarNombre($name){

  $expresionNombre = '/^[a-zA-Z áéíóúÁÉÍÓÚ]+$/';
  $name = trim($name);

  if ($name == ''){
    return 'Su nombre está vacío';
  } else {
    if (strlen($name) > 1 && preg_match($expresionNombre, $name)){
      return true;
    } else {
      return 'Escribí bien tu nombre';
    }
  }
}

function validarApellido($lastName){

  $expresionApellido = '/^[a-zA-Z áéíóúÁÉÍÓÚ]+$/';
  $lastName = trim($lastName);

  if ($lastName == ''){
    return 'Su apellido está vacío';
  } else {
    if (strlen($lastName) > 1 && preg_match($expresionApellido, $lastName)){
      return true;
    } else {
      return 'Escribí bien tu apellido';
    }
  }
}

function validarEmail($regMail,$unique=false,$exclude=false){

    $regMail = trim($regMail);

    if ($regMail == ''){
      return 'El email está vacío';
    } else {
      if (filter_var($regMail, FILTER_VALIDATE_EMAIL)){

        if(!$unique) {
          return true;
        } else {
          //Validamos ademas que no haya otro usuario c el mismo move_uploaded_file

          if(!buscarUsuarioPorEmail($regMail,$exclude)) {
            return true;
          } else {
            return 'Este email está en uso';
          }
        }
      } else {
        return 'Escribi bien tu email';
      }
    }
}

function buscarUsuarioPorEmail($regMail,$exclude=false){

  $ruta = 'usuarios.json';
  $archivo = file_get_contents($ruta);
  $usuariosJson = json_decode($archivo,true);

  if(empty($usuariosJson['usuarios'])) {
    return false;
  }

  foreach ($usuariosJson['usuarios'] as $u){

    if(empty($exclude)) {
      if($u["regMail"] == $regMail){
        return true;
      }
    } else {
      if($u["regMail"] == $regMail && $u['regMail'] != $exclude){
        return true;
      }
    }
  }

  return false;
}

function buscarProvServPorEmail($regMail,$exclude=false){

  $ruta = 'proveedoresServicio.json';
  $archivo = file_get_contents($ruta);
  $proveedoresServicioJson = json_decode($archivo,true);

  if(empty($proveedoresServicioJson['proveedoresServicio'])) {
    return false;
  }

  foreach ($proveedoresServicioJson['proveedoresServicio'] as $u){

    if(empty($exclude)) {
      if($u["regMail"] == $regMail){
        return true;
      }
    } else {
      if($u["regMail"] == $regMail && $u['regMail'] != $exclude){
        return true;
      }
    }
  }

  return false;
}

function buscarProvProdPorEmail($regMail,$exclude=false){

  $ruta = 'proveedoresProducto.json';
  $archivo = file_get_contents($ruta);
  $proveedoresProductoJson = json_decode($archivo,true);

  if(empty($proveedoresProductoJson['proveedoresProducto'])) {
    return false;
  }

  foreach ($proveedoresProductoJson['proveedoresProducto'] as $u){

    if(empty($exclude)) {
      if($u["regMail"] == $regMail){
        return true;
      }
    } else {
      if($u["regMail"] == $regMail && $u['regMail'] != $exclude){
        return true;
      }
    }
  }

  return false;
}

/*function buscarUsuarioPorNombreDeUsuario($userName,$exclude){

  $ruta = 'usuarios.json';
  $archivo = file_get_contents($ruta);
  $usuariosJson = json_decode($archivo,true);

  foreach ($usuariosJson['usuarios'] as $u){

    if(empty($exclude)) {
      if(strtolower($u["nombreUsuario"]) == strtolower($userName)){
        return true;
      }
  } else {
    if(strtolower($u["nombreUsuario"]) == strtolower($userName) && $u['nombreUsuario'] != $exclude){
      return true;
    }

  }

  }

  return false;
}

function validarNombreUsuario($userName,$unique=false,$exclude=false){

  $expresionNombreUsuario = '/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/';
  $userName = trim($userName);

  if ($userName == ''){
    return 'Su nombre de usuario esta vacio';
  } else {
    if (strlen($userName) > 1 && preg_match($expresionNombreUsuario, $userName)){

      if(!$unique) {
        return true;
      } else {
        if(buscarUsuarioPorNombreDeUsuario($userName,$exclude)) {
            return 'El usuario esta en uso';
        } else {
          return true;
        }

      }

    } else {
      return 'Escribi bien tu nombre de usuario che!';
    }
  }
}*/
function validarPassword($regPass){

    $expresionPassword = '/^.{4,30}$/';
    $regPass = trim($regPass);

    if ($regPass == ''){
      return 'El password está vacío';
    } else {
      if (strlen($regPass) > 3 && preg_match($expresionPassword, $regPass)){
        return true;
      } else {
          return 'Escribí bien tu password';
      }
    }
}
function validarPasswordConfirm($regPass, $regRePass){

    $regPass = trim($regPass);
    $regRePass = trim($regRePass);

    if ($regRePass == ''){
      return 'La confirmación de password está vacía';
    } else {
      if ($regPass === $regRePass){
        return true;
      } else {
          return 'Las contraseñas no coinciden';
      }
    }
}

function generarUsuario($name, $lastName, $cui, $regPass, $regRePass,
$regMail, $reMail, $phone, $cel, $calle, $numero, $prov, $barrio, $partido){
  $usuario = [];

  $usuario['name'] = $name;
  $usuario['lastName'] = $lastName;
  $usuario['cui'] = $cui;
  $usuario['phone'] = $phone;
  $usuario['cel'] = $cel;
  $usuario['calle'] = $calle;
  $usuario['numero'] = $numero;
  $usuario['prov'] = $prov;
  $usuario['barrio'] = $barrio;
  $usuario['partido'] = $partido;
  $usuario['regMail'] = $regMail;
  $usuario['reMail'] = $reMail;
  $usuario['regPass'] = sha1($regPass);
  $usuario['regRePass'] = sha1($regRePass);

  return $usuario;
}

function generarProveedorServicio($name, $lastName, $cui, $regPass, $regRePass,
$regMail, $reMail, $phone, $cel, $calle, $numero, $prov, $barrio, $partido, $proveedorServ){
  $proveedorServicio = [];

  $proveedorServicio['name'] = $name;
  $proveedorServicio['lastName'] = $lastName;
  $proveedorServicio['cui'] = $cui;
  $proveedorServicio['phone'] = $phone;
  $proveedorServicio['cel'] = $cel;
  $proveedorServicio['calle'] = $calle;
  $proveedorServicio['numero'] = $numero;
  $proveedorServicio['prov'] = $prov;
  $proveedorServicio['barrio'] = $barrio;
  $proveedorServicio['partido'] = $partido;
  $proveedorServicio['regMail'] = $regMail;
  $proveedorServicio['reMail'] = $reMail;
  $proveedorServicio['regPass'] = sha1($regPass);
  $proveedorServicio['regRePass'] = sha1($regRePass);
  $proveedorServicio['proveedorServ'] = ($proveedorServ);
  $proveedorServicio['doc_servicios'] = subirArchivoServ($name, $lastName);

  return $proveedorServicio;
}

function generarProveedorProducto($name, $lastName, $cui, $regPass, $regRePass,
$regMail, $reMail, $phone, $cel, $calle, $numero, $prov, $barrio, $partido, $proveedorProd){
  $proveedorProducto = [];

  $proveedorProducto['name'] = $name;
  $proveedorProducto['lastName'] = $lastName;
  $proveedorProducto['cui'] = $cui;
  $proveedorProducto['phone'] = $phone;
  $proveedorProducto['cel'] = $cel;
  $proveedorProducto['calle'] = $calle;
  $proveedorProducto['numero'] = $numero;
  $proveedorProducto['prov'] = $prov;
  $proveedorProducto['barrio'] = $barrio;
  $proveedorProducto['partido'] = $partido;
  $proveedorProducto['regMail'] = $regMail;
  $proveedorProducto['reMail'] = $reMail;
  $proveedorProducto['regPass'] = sha1($regPass);
  $proveedorProducto['regRePass'] = sha1($regRePass);
  $proveedorProducto['proveedorServ'] = ($proveedorProd);
  $proveedorProducto['doc_productos'] = subirArchivoProd($name, $lastName);

  return $proveedorProducto;
}

function subirArchivoServ($name, $lastName){
  if (!empty($_FILES['doc_servicios']['name'])){

    $info = pathinfo($_FILES['doc_servicios']['name']);
    $extension = $info['extension'];
    $nombreArchivo = $name . $lastName . '.' . $extension;
    $ruta = 'archivosUsuario/' . $nombreArchivo;

    move_uploaded_file($_FILES['doc_servicios']['tmp_name'], $ruta);

    return $ruta;
  }
}

function subirArchivoProd($name, $lastName){
  if (!empty($_FILES['doc_productos']['name'])){

    $info = pathinfo($_FILES['doc_productos']['name']);
    $extension = $info['extension'];
    $nombreArchivo = $name . $lastName . '.' . $extension;
    $ruta = 'archivosUsuario/' . $nombreArchivo;

    move_uploaded_file($_FILES['doc_productos']['tmp_name'], $ruta);

    return $ruta;
  }
}
function guardarUsuario($arrayUsuario){

  $ruta = 'usuarios.json';

  //Si el archivo existe tomamos los datos actuales y agregamos
  if(file_exists($ruta)) {
    $archivo = file_get_contents($ruta);
    $arrUsuariosActuales = json_decode($archivo,true);
  } else {
  //Si no existe solo creamos un array nuevo y agregamos el user
  $arrUsuariosActuales = array();
  }

  $arrUsuariosActuales['usuarios'][] = $arrayUsuario;

  //Escribimos el archivo con el nuevo usuario
  $arrUsuariosActuales = json_encode($arrUsuariosActuales);
  $apertura = fopen($ruta, 'w+');
  fwrite($apertura, $arrUsuariosActuales);
  fclose($apertura);

  return true;
}

function guardarProveedorServicio($arrayProveedorServ){

  $ruta = 'proveedoresServicio.json';

  //Si el archivo existe tomamos los datos actuales y agregamos
  if(file_exists($ruta)) {
    $archivo = file_get_contents($ruta);
    $arrProvServActuales = json_decode($archivo,true);
  } else {
  //Si no existe solo creamos un array nuevo y agregamos el user
  $arrProvServActuales = array();
  }

  $arrProvServActuales['proveedoresServicio'][] = $arrayProveedorServ;

  //Escribimos el archivo con el nuevo usuario
  $arrProvServActuales = json_encode($arrProvServActuales);
  $apertura = fopen($ruta, 'w+');
  fwrite($apertura, $arrProvServActuales);
  fclose($apertura);

  return true;
}

function guardarProveedorProducto($arrayProveedorProd){

  $ruta = 'proveedoresProducto.json';

  //Si el archivo existe tomamos los datos actuales y agregamos
  if(file_exists($ruta)) {
    $archivo = file_get_contents($ruta);
    $arrProvProdActuales = json_decode($archivo,true);
  } else {
  //Si no existe solo creamos un array nuevo y agregamos el user
  $arrProvProdActuales = array();
  }

  $arrProvProdActuales['proveedoresProducto'][] = $arrayProveedorProd;

  //Escribimos el archivo con el nuevo usuario
  $arrProvProdActuales = json_encode($arrProvProdActuales);
  $apertura = fopen($ruta, 'w+');
  fwrite($apertura, $arrProvProdActuales);
  fclose($apertura);

  return true;
}

function buscarEmailAndPassword($regMail, $regPass){

  $ruta = 'usuarios.json';
  $archivo = file_get_contents($ruta);
  $usuariosJson = json_decode($archivo,true);

  foreach ($usuariosJson['usuarios'] as $u){

    if($u["regMail"] == $regMail && $u["regPass"] == sha1($regPass)){
      return $u;
    };
  }

  return false;
}

function buscarEmailAndPasswordServ($regMail, $regPass){

  $ruta = 'proveedoresServicio.json';
  $archivo = file_get_contents($ruta);
  $proveedoresServicioJson = json_decode($archivo,true);

  foreach ($proveedoresServicioJson['proveedoresServicio'] as $u){

    if($u["regMail"] == $regMail && $u["regPass"] == sha1($regPass)){
      return $u;
    };
  }

  return false;
}

function buscarEmailAndPasswordProd($regMail, $regPass){

  $ruta = 'proveedoresProducto.json';
  $archivo = file_get_contents($ruta);
  $proveedoresProductoJson = json_decode($archivo,true);

  foreach ($proveedoresProductoJson['proveedoresProducto'] as $u){

    if($u["regMail"] == $regMail && $u["regPass"] == sha1($regPass)){
      return $u;
    };
  }

  return false;
}
?>
