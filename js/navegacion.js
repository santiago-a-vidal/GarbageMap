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

function cargarMenu(seccion){
  $.ajax({
    type: 'GET',
    dataType: 'HTML',
    url: seccion,
    success: function(data){
      $('#page').html(data);
    },
    error: function(){
          alert('Error al Cargar la Pagina de ' + seccion);
        }
  });
};
$('#usuarioMenu').change(function () {
  var seccion=$('#usuarioMenu').val();
  cargarMenu(seccion);
});


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

    function callPostAjax(dir, data) {
      $.ajax({
          "url" : dir,
          processData: false,
          contentType: false,
          "method" : "POST",
          "data" : data,
          "success" : mostrarAlerta,
          "error": handleError
      });
   }

  function handleError(xmlhr, r, error) {
      console.log(error);
  }

  function mostrarAlerta (data, textStatus, jqXHR) {
      data = JSON.parse(data);
      $('.btn-denunciar').attr("disabled",false);
      $('.btn-denunciar').html('Denunciar');
      alertify.set('notifier','position', 'top-center');
      if (data.success){
        alertify.alert('Denuncia realizada', 'El numero de denuncia para su seguimiento es: '+data.id, function(){ alertify.success('Denuncia exitosa'); });
      }else{
        alertify.error('No se pudo realizar la denuncia');
      }
  }

  /*$('body').on("submit",'.form-infraganti', function (event) {
      event.preventDefault();
      var form = new FormData($('.form-infraganti')[0]);
      let link = 'publicarDenunciaInfraganti';
      $('.btn-denunciar').attr("disabled",true);
      $('.btn-denunciar').html('<i class="fas fa-circle-notch fa-spin"></i>');
      callPostAjax(link, form);
  })*/

});
