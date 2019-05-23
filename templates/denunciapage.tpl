<!DOCTYPE html>
<html>
<head>
  <!-- Este archivo contiene la pagina en donde se mostrara el mapa en donde un denunciante debe marcar el unto en donde encontro la basura-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Llamado a la biblioteca de estilos de bootstrap-->
<link rel="stylesheet" href="css/leaflet.css"> <!-- Llamado a la biblioteca de estilos de la api Leaflet (Aplicacion de mapas Free)-->
<link rel="stylesheet" href="css/estilo.css"><!-- Llamado a la biblioteca de estilos personal en donde le daremos tamaño al mapa que se mostrara-->
<link href="image/Tacho3.ico" type="image/x-icon" rel="shortcut icon" ><!-- Insertamos un icono a la pagina -->
<title>GarbageMap</title>
</head>
<body>
<header>
</header>
<div id="mapid"></div> <!-- este div contendra el mapa-->

<form action="publicarDenuncia" method="post" enctype="multipart/form-data" id="add_denuncia">
    <label>Definir ubicacion</label>
    <input type="text" name="latitud" id="js-latitud">
    <input type="text" name="longitud" id="js-longitud">
    <label>Descripcion</label>
    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
    <label>Imagen</label>
    <input class="form-control" type="file" name="imagen" id="image">
    <input type="text" name="mail" value="mail@mail.com">
    <input name="estaCompletado" type="number" value="0">
    <button type="submit" class="btn btn-primary" id="submitDenuncia">Enviar</button>
</form>
<footer>
</footer>
<script src="js/jquery-3.0.0.min.js" charset="utf-8"></script> <!-- Llamado a la biblioteca javascript de bootstrap-->
<script src="js/leaflet.js" charset="utf-8"></script> <!-- Llamado a la biblioteca javascript de Leaflet (Mapas Free)-->
<script src="js/script.js" charset="utf-8"></script> <!-- Llamado a  javascript que contendra la funcionalidad del mapa-->
</body>
</html>