window.onload = function(){

  var ingresar = document.getElementById('ingresar');
  var email = document.getElementById('mailLog');
  var contrasena = document.getElementById('passLog');
  var expRegMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  var expRegPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/;

ingresar.addEventListener('click',function(e){
  
  if(email.value == ""){
    console.log(email.value);
    email.value = "completaTu@email.com";
    e.preventDefault();
    email.addEventListener ('focus',function(e) {
    email.value = "";
  });
  }else if(!expRegMail.test(email.value)){
    email.value = 'El email no es correcto';
    e.preventDefault();
    email.addEventListener ('focus',function(e) {
    email.value = "";
  });
  }
  
  if(contrasena.value == ""){
    contrasena.type = "text";
    contrasena.value = 'Completá la contraseña';
    e.preventDefault();
    contrasena.addEventListener ('focus',function(e) {
    contrasena.type = "password";
    contrasena.value = "";
  });
  } else if(!expRegPass.test(contrasena.value)){
    contrasena.type = "text";
    contrasena.value = 'La contraseña no es correcta';
    e.preventDefault();
    contrasena.addEventListener ('focus',function(e) {
    contrasena.type = "password";
    contrasena.value = "";
  });
  }
})
}