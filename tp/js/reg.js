window.onload = function(){

  var email = document.getElementById('regMail');
  var expRegMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  /*var expRegPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/;*/
  var siguiente = document.getElementById('siguiente');
  var enviar = document.getElementById('bots');
  var borrar = document.getElementById('botr');

  siguiente.addEventListener("click",function(e){
    e.preventDefault();
    var a = document.getElementById('a');
    var b = document.getElementById('b');
    var c = document.getElementById('c');
    var tipo = document.querySelector('fieldset#tipo');
    var personal = document.querySelector('fieldset#personal');
    var contacto = document.querySelector('fieldset#contacto');
    var productos = document.querySelector('fieldset#productos');
    var servicios = document.querySelector('fieldset#servicios');
    var enviar = document.getElementById('bots');
    var borrar = document.getElementById('botr');

    if (a.checked) {
        tipo.style.display = 'none';
        personal.style.display = 'inline-block';
        contacto.style.display = 'inline-block';
        productos.style.display = 'none';
        servicios.style.display = 'none';
        enviar.style.display = 'inline-block';
        borrar.style.display = 'inline-block';
        }
    if (b.checked) {
        tipo.style.display = 'none';
        personal.style.display = 'inline-block';
        contacto.style.display = 'inline-block';
        productos.style.display = 'none';
        servicios.style.display = 'inline-block';
        enviar.style.display = 'inline-block';
        borrar.style.display = 'inline-block';
        }
    if (c.checked) {
        tipo.style.display = 'none';
        personal.style.display = 'inline-block';
        contacto.style.display = 'inline-block';
        productos.style.display = 'inline-block';
        servicios.style.display = 'none';
        enviar.style.display = 'inline-block';
        borrar.style.display = 'inline-block';
        }
  });

  enviar.addEventListener('click',function(e){
    var nombre = document.getElementById('name');
    var apellido = document.getElementById('lastname');
    var id = document.getElementById('cui');
    var repcontrasena = document.getElementById('regRePass');
    var reemail = document.getElementById('remail');
    var telefono = document.getElementById('phone');
    var celular =  document.getElementById('cel');
    var provinciaElegida = document.getElementById('prov');
    var ciudadElegida = document.getElementById('ciudad');
    var expRegCuit = /^[0-9]{2}-[0-9]{8}-[0-9]$/;
    var expRegNombre = /^[a-zA-Z áéíóúÁÉÍÓÚ]+$/;
    var expRegMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    /*var expRegTel = /^\d{11}/;/^((\(?\d{3}\)? \d{4})|(\(?\d{4}\)? \d{3})|(\(?\d{5}\)? \d{2}))-\d{4}/;*/
    var contrasena = document.getElementById('regPass');
    var errores = false;

    if(nombre.value == ""){
      nombre.value = 'Complete su nombre';
      nombre.addEventListener ('focus',function(e) {
      nombre.value = "";
      e.preventDefault();
      errores =true;
    });
    }else if(!expRegNombre.test(nombre.value)){
      nombre.value = 'Nombre de formato inválido';
      nombre.addEventListener ('focus',function(e) {
      nombre.value = "";
      e.preventDefault();
      errores =true;

    });
    }
    if(apellido.value == ""){
      apellido.value = 'Complete su apellido';
      apellido.addEventListener ('focus',function(e) {
      apellido.value = "";
      e.preventDefault();
      errores =true;

    });
    } else if (!expRegNombre.test(apellido.value)){
      apellido.value = 'Apellido de formato inválido';
      apellido.addEventListener ('focus',function(e) {
      apellido.value = "";
      e.preventDefault();
      errores =true;

    });
    }
    if(id.value == ""){
      id.value = 'Complete su Cuit o Cuil';
      id.addEventListener ('focus',function(e) {
      id.value = "";
      e.preventDefault();
      errores =true;

      errores =true;

    });
    }else if(!expRegCuit.test(id.value)){
      id.value = 'Cuit o Cuil inválido';
      id.addEventListener ('focus',function(e) {
      id.value = "";
      e.preventDefault();
      errores =true;

    });
    }

    if(contrasena.value == ""){
      contrasena.type = "text";
      contrasena.value = 'Complete su contraseña';
      contrasena.addEventListener ('focus',function(e) {
      contrasena.type = "password";
      contrasena.value = "";
      e.preventDefault();
      errores =true;

    });
  }/* else if(!expRegPass.test(contrasena.value)){
      contrasena.type = "text";
      contrasena.value = 'Su contraseña no es segura';
      contrasena.addEventListener ('focus',function(e) {
      contrasena.type = "password";
      contrasena.value = "";
    });
  }*/

    if(repcontrasena.value != contrasena.value){
      repcontrasena.type = "text";
      repcontrasena.value = 'Sus contraseñas no coinciden';
      repcontrasena.addEventListener ('focus',function(e) {
      repcontrasena.type = "password";
      repcontrasena.value = "";
      e.preventDefault();
      errores =true;

    });
    }

    if(email.value == ""){
      email.value = "completeSu@email";
      email.addEventListener ('focus',function(e) {
      email.value = "";
      e.preventDefault();
      errores =true;

    });
    }else if(!expRegMail.test(email.value)){
      email.value = 'Formato de email inválido';
      email.addEventListener ('focus',function(e) {
      email.value = "";
      e.preventDefault();
      errores =true;

      });
    }

    if(reemail.value != email.value){
      reemail.value = 'Sus emails no coinciden';
      reemail.addEventListener ('focus',function(e) {
      reemail.value = "";
      e.preventDefault();
      errores =true;

      });
    }

    if(telefono.value == ""){
      telefono.value = 'Complete su número de telefono';
      telefono.addEventListener ('focus',function(e) {
      telefono.value = "";
      e.preventDefault();
      errores =true;

      });
    }/*else if(!expRegTel.test(telefono.value)){
      telefono.value = 'Formato de telefono inválido';
      telefono.addEventListener ('focus',function(e) {
      telefono.value = "";
    });
  }*/

    if(celular.value == ""){
      celular.value = 'Complete su número de celular';
      celular.addEventListener ('focus',function(e) {
      celular.value = "";
      e.preventDefault();
      errores =true;

      });
    }/*else if(!expRegTel.test(celular.value)){
      celular.value = 'Formato de celular inválido';
      celular.addEventListener ('focus',function(e) {
      celular.value = "";
      });
    }*/
//*********************************
//ajax
if (errores == false) {   //si no hay errores entonces hacer ajax

  var ajax = new XMLHttpRequest();

  ajax.onreadystatechange = function() {
    if (ajax.readyState == 4 && ajax.status == 200){

      var ajax2 = new XMLHttpRequest();
      var miRespuesta;

      ajax2.onreadystatechange = function() {
        if (ajax2.readyState == 4 && ajax2.status == 200){
          miRespuesta = JSON.parse(ajax2.responseText);
          //console.log(miRespuesta);
          var numeroDeUsuario = miRespuesta['cantidad'];
        }
      }
      ajax2.open("GET","https://sprint.digitalhouse.com/getUsuarios", false);
      ajax2.send();

    }
  }
  ajax.open("GET","https://sprint.digitalhouse.com/nuevoUsuario", false);
  ajax.send();

if(ajax2.readyState == 4 && ajax2.status == 200){
    alert('Bienvenido' + nombre + '!, ya hay ' + numeroDeUsuario + ' usuarios registrados.');
  }else{
    alert('Completá todos los campos.');
  };
}
//

});


  ingresar.addEventListener('click',function(e){
    e.preventDefault();
    var ingresar = document.getElementById('ingresar');
    var email = document.getElementById('mailLog');
    var contrasena = document.getElementById('passLog');
    var expRegMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var expRegPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/;

    if(email.value == ""){
        email.value = "completeSu@email";
        email.addEventListener ('focus',function(e) {
        email.value = "";
      });
    }else if(!expRegMail.test(email.value)){
        email.value = 'Formato de email inválido';
        email.addEventListener ('focus',function(e) {
        email.value = "";
      });
    }
    if(contrasena.value == ""){
        contrasena.type = "text";
        contrasena.value = 'Complete su contraseña';
        contrasena.addEventListener ('focus',function(e) {
        contrasena.type = "password";
        contrasena.value = "";
      });
    } else if(!expRegPass.test(contrasena.value)){
        contrasena.type = "text";
        contrasena.value = 'Su contraseña no es segura';
        contrasena.addEventListener ('focus',function(e) {
        contrasena.type = "password";
        contrasena.value = "";
      });
    }
  });
}
