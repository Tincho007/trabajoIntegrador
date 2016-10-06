window.onload = function(){

  var ingresar = document.getElementById('ingresar');
  var email = document.getElementById('mailLog');
  var contrasena = document.getElementById('passLog');
  var expRegMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  var expRegPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/;

ingresar.addEventListener('click',function(e){
  
  if(email.value == ""){
    console.log(email.value);
    email.value = "completeSu@email";
    email.addEventListener ('focus',function(e) {
    email.value = "";
    e.preventDefault();
  });
  }else if(!expRegMail.test(email.value)){
    email.value = 'Formato de email inválido';
    email.addEventListener ('focus',function(e) {
    email.value = "";
    e.preventDefault();
  });
  }
  
  if(contrasena.value == ""){
    contrasena.type = "text";
    contrasena.value = 'Complete su contraseña';
    contrasena.addEventListener ('focus',function(e) {
    contrasena.type = "password";
    contrasena.value = "";
    e.preventDefault();
  });
  } else if(!expRegPass.test(contrasena.value)){
    contrasena.type = "text";
    contrasena.value = 'Su contraseña no es segura';
    contrasena.addEventListener ('focus',function(e) {
    contrasena.type = "password";
    contrasena.value = "";
    e.preventDefault();
  });
  }
})
}