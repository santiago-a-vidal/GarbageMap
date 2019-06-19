<link rel="stylesheet" href="css/leaflet.css"> <!-- Llamado a la biblioteca de estilos de la api Leaflet (Aplicacion de mapas Free)-->
<link rel="stylesheet" href="css/estilo.css"><!-- Llamado a la biblioteca de estilos personal en donde le daremos tamaño al mapa que se mostrara-->
<div class="container">
<div id="mapid" ></div> <!-- este div contendra el mapa-->
<form action="publicarDenuncia" method="post" enctype="multipart/form-data" id="add_denuncia">
    <div class="form-group">
    <label>Definir ubicacion</label>
    </div>
    <div class="form-group">
    <input type="text" name="latitud" id="js-latitud">
    <input type="text" name="longitud" id="js-longitud">
    </div>
    <div class="form-group">
    <label>Descripcion</label>
    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
    </div>
    <div class="form-group">
    <label>Imagen</label>
    <input class="form-control" type="file" name="imagen" id="image">
    </div>
    <div class="form-group">
    <input type="text" name="mail" value="mail@mail.com">
    <button type="submit" class="btn btn-primary btn-denunciar" id="submitDenuncia">Denunciar</button>
</form>
</div>
<script src="js/jquery-3.0.0.min.js" charset="utf-8"></script> <!-- Llamado a la biblioteca javascript de bootstrap-->
<script src="js/leaflet.js" charset="utf-8"></script> <!-- Llamado a la biblioteca javascript de Leaflet (Mapas Free)-->
<script src="js/script.js" charset="utf-8"></script> <!-- Llamado a  javascript que contendra la funcionalidad del mapa-->
