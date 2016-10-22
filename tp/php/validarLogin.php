<?php

function validarRegistro($nombre, $email, $userName, $password, $passwordConfirm){
  $errores = [];

  $errores['nombre'] = validarNombre($nombre);
  $errores['email'] = validarEmail($email,TRUE);
  $errores['nombreUsuario'] = validarNombreUsuario($userName,TRUE);
  $errores['password'] = validarPassword($password);
  $errores['passwordConfirm'] = validarPasswordConfirm($password, $passwordConfirm);

  return $errores;
}

function validarLogin($email, $password){
  $errores = [];

  $errores['emailLogin'] = validarEmail($email);
  $errores['passwordLogin'] = validarPassword($password);

  return $errores;
}

function validarNombre($nombre){

  $expresionNombre = '/^[a-zA-Z áéíóúÁÉÍÓÚ]+$/';
  $nombre = trim($nombre);

  if ($nombre == ''){
    return 'Su nombre esta vacio';
  } else {
    if (strlen($nombre) > 1 && preg_match($expresionNombre, $nombre)){
      return true;
    } else {
      return 'Escribi bien tu nombre';
    }
  }
}
function validarEmail($email,$unique=FALSE,$exclude=FALSE){

    $email = trim($email);

    if ($email == ''){
      return 'Su email esta vacio';
    } else {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)){

        if(!$unique) {
          return true;
        } else {
          //Validamos ademas que no haya otro usuario c el mismo move_uploaded_file

          if(!buscarUsuarioPorEmail($email,$exclude)) {
            return true;
          } else {
            return 'Este email esta en uso';
          }

        }
      } else {
        return 'Escribi bien tu email che!';
      }
    }
}

function buscarUsuarioPorEmail($email,$exclude=FALSE){

  $ruta = 'usuarios.json';
  $archivo = file_get_contents($ruta);
  $usuariosJson = json_decode($archivo,true);

  if(empty($usuariosJson['usuarios'])) {
    return false;
  }

  foreach ($usuariosJson['usuarios'] as $u){

    if(empty($exclude)) {
      if($u["email"] == $email){
        return true;
      }
    } else {
      if($u["email"] == $email && $u['email'] != $exclude){
        return true;
      }
    }

  }

  return false;
}

function buscarUsuarioPorNombreDeUsuario($userName,$exclude){

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

function validarNombreUsuario($userName,$unique=FALSE,$exclude=FALSE){

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
}
function validarPassword($password){

    $expresionPassword = '/^.{4,30}$/';
    $password = trim($password);

    if ($password == ''){
      return 'Su password esta vacio';
    } else {
      if (strlen($password) > 3 && preg_match($expresionPassword, $password)){
        return true;
      } else {
          return 'Escribi bien tu password che!';
      }
    }
}
function validarPasswordConfirm($password, $passwordConfirm){

    $password = trim($password);
    $passwordConfirm = trim($passwordConfirm);

    if ($passwordConfirm == ''){
      return 'Su confirmacion de password esta vacio';
    } else {
      if ($password === $passwordConfirm){
        return true;
      } else {
          return 'No coinciden capo!';
      }
    }
}

function generarUsuario($nombre, $email, $userName, $password){
  $usuario = [];

  $usuario['nombre'] = $nombre;
  $usuario['email'] = $email;
  $usuario['nombreUsuario'] = $userName;
  $usuario['password'] = sha1($password);
  $usuario['imagen'] = subirImagen($email);

  return $usuario;
}
function subirImagen($email){
  if (!empty($_FILES['imagen']['name'])){

    $info = pathinfo($_FILES['imagen']['name']);
    $extension = $info['extension'];
    $nombreArchivo = $email . '.' . $extension;
    $ruta = 'imagenesPerfil/' . $nombreArchivo;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

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

function buscarEmailAndPassword($email, $password){

  $ruta = 'usuarios.json';
  $archivo = file_get_contents($ruta);
  $usuariosJson = json_decode($archivo,true);

  foreach ($usuariosJson['usuarios'] as $u){

    if($u["email"] == $email && $u["password"] == sha1($password)){
      return $u;
    };

  }

  return false;
}
?>
