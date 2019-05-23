$(document).ready(function(){
function cargarPagina(seccion){
  $.ajax({
    type: 'GET',
    dataType: 'HTML',
    url: seccion,
    success: function(data){
          $('#conten').html(data);
        },
    error: function(){
          alert('Error al Cargar la Pagina de ' + seccion);
        }
  });
};




$('#hd').on('click', function(event){
    event.preventDefault();
    cargarPagina("hacerDenuncia");
  });

  $('#hdi').on('click', function(event){
      event.preventDefault();
      cargarPagina("hacerDenunciaInfraganti");
    });
  $('#home').on('click', function(event){
      event.preventDefault();
      cargarPagina("home");
    });


});
