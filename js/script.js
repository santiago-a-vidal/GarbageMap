var mymap = L.map('mapid').setView([-37.32,-59.1401387], 13); // esta variable es el mapa, en esta se define la coordenada en donde estara centrado el mapa y el zoom que se vera
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoic2VyZ2lvZ2FyY2lhcmV0ZWd1aSIsImEiOiJjanYwdXg1bmYxbXB6M3lzZG5xazYwZnd2In0.VQS4bmrDF7yKJqqALbcc5A', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoic2VyZ2lvZ2FyY2lhcmV0ZWd1aSIsImEiOiJjanYwdXg1bmYxbXB6M3lzZG5xazYwZnd2In0.VQS4bmrDF7yKJqqALbcc5A' //esta clave de acceso se obtiene desde la pagina de Leaflet de manera gratuita
}).addTo(mymap);
