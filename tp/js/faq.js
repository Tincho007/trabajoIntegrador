window.onload = function(){

/*var ultimaRespuestaMostrada = -1;
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
};*/

  $('dd').hide();

  $('dt').click(function() {
    var toggle = $(this).nextUntil('dt');
    toggle.slideToggle();
    $('dd').not(toggle).slideUp();
  })
}
