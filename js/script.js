var mymap = L.map('mapid').setView([-37.32,-59.1401387], 13); // esta variable es el mapa, en esta se define la coordenada en donde estara centrado el mapa y el zoom que se vera
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoic2VyZ2lvZ2FyY2lhcmV0ZWd1aSIsImEiOiJjanYwdXg1bmYxbXB6M3lzZG5xazYwZnd2In0.VQS4bmrDF7yKJqqALbcc5A', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoic2VyZ2lvZ2FyY2lhcmV0ZWd1aSIsImEiOiJjanYwdXg1bmYxbXB6M3lzZG5xazYwZnd2In0.VQS4bmrDF7yKJqqALbcc5A' //esta clave de acceso se obtiene desde la pagina de Leaflet de manera gratuita
}).addTo(mymap);
var popup = L.popup(); // creo un popup para mostrar en pantalla un mensaje con el punto geografico seleccionado
var latitud=0;
var longitud=0;
function onMapClick(e) {
  latitud=e.latlng.lat
  longitud=e.latlng.lng
    popup
        .setLatLng(e.latlng)
        .setContent("El lugar a denunciar se ubica en el punto " + e.latlng.toString())
        .openOn(mymap);
        console.log(e.latlng);// muestro por consola un json con los datos de latitud y longitud, a futuro estos datos son los que guardaremos en la base de datos
}
mymap.on('click', onMapClick); // capturo el evento click sobre el mapa e invoco al metodo que muestra el popup

 $("#add_denuncia").submit(function(e){
   e.preventDefault();
   var formData = {lat:latitud,
                   long:longitud,
                  descripcion:descripcion.value}
   console.log(formData);
   $.ajax({
    method: "POST",
    url: "routeAdvance.php?action=publicarDenuncia",
    data: formData,
    contentType: false,
    cache: false,
    processData:false,
    success: function(receivedData){
      console.log(receivedData);
      }
    });
    });
