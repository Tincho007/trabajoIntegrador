window.onload = function(){

var ultimaRespuestaMostrada = -1;
var preguntas = document.getElementsByTagName("dt");
var respuesta = document.getElementsByTagName("dd");

for (var i = 0; i < preguntas.length; i++) {
  var pregunta = preguntas[i];
  pregunta.indice = i;
  pregunta.onclick = function (e) {
    e.preventDefault;
    // esconder la ultima respuesta, si hay alguna mostrada
    if( ultimaRespuestaMostrada != -1 ) {
      respuesta[ultimaRespuestaMostrada].style.display = 'none';
    }
    // mostrar la respuesta actual
    respuesta[this.indice].style.display = 'inline-block';
    ultimaRespuestaMostrada = this.indice;
  };
};

  var ingresar = document.getElementById('ingresar');
  var email = document.getElementById('mailLog');
  var contrasena = document.getElementById('passLog');
  var expRegMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  var expRegPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/;

ingresar.addEventListener('click',function(e){
  e.preventDefault();
console.log("hola");
  if(email.value == ""){
    console.log(email.value);
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
})

}
