<link rel="stylesheet" href="css/leaflet.css"> <!-- Llamado a la biblioteca de estilos de la api Leaflet (Aplicacion de mapas Free)-->
<link rel="stylesheet" href="css/estilo.css"><!-- Llamado a la biblioteca de estilos personal en donde le daremos tamaño al mapa que se mostrara-->

    <div id="mapid"></div>
    <form action="publicarDenunciaInfraganti" method="post" enctype="multipart/form-data">
        <input type="text" name="latitud" id="js-latitud">
        <input type="text" name="longitud" id="js-longitud">
        <div class="form-group">
          <label for="video">video de la situacion</label>
          <input type="file" class="form-control-file" name="video" id="video">
        </div>
        <div class="form-group">
            <label for="patente">patente</label>
            <input type="text" class="form-control" id="patente" name="patente" placeholder="dni">
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="number" class="form-control" id="dni" name="dni" placeholder="dni">
        </div>

        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" class="form-control" name="apellido"  id="apellido" placeholder="apellido">
        </div><div class="form-group">
          <label for="direccion">Direccion de denunciante en el formato: direccion-altura</label>
          <input type="text" class="form-control" name="direccion"  id="direccion" placeholder="callefalsa-1234">
        </div>
        <div class="form-group">
          <label for="fecha">Fecha</label>
          <input type="date" class="form-control" name="fecha" id="fecha" placeholder="apellido">
        </div>
        <div class="form-group">
          <label for="hora">Hora</label>
          <input type="time" class="form-control" id="hora" name="hora" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="js/jquery-3.0.0.min.js" charset="utf-8"></script> <!-- Llamado a la biblioteca javascript de bootstrap-->
    <script src="js/leaflet.js" charset="utf-8"></script> <!-- Llamado a la biblioteca javascript de Leaflet (Mapas Free)-->
    <script src="js/script.js" charset="utf-8"></script> <!-- Llamado a  javascript que contendra la funcionalidad del mapa-->
