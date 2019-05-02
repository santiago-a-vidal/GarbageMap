<!DOCTYPE html>
<html>
<head>
  <!-- Este archivo contiene la pagina en donde se mostrara el mapa en donde un denunciante debe marcar el unto en donde encontro la basura-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Llamado a la biblioteca de estilos de bootstrap-->
<link rel="stylesheet" href="css/leaflet.css"> <!-- Llamado a la biblioteca de estilos de la api Leaflet (Aplicacion de mapas Free)-->
<link rel="stylesheet" href="css/estilo.css"><!-- Llamado a la biblioteca de estilos personal en donde le daremos tamaÃ±o al mapa que se mostrara-->
<link href="image/Tacho3.ico" type="image/x-icon" rel="shortcut icon" ><!-- Insertamos un icono a la pagina -->
<title>GarbageMap</title>
</head>
<body>
<header>
</header>
    {if $error == false}
	<div class="container">
        <div class="alert alert-success" role="alert" style="margin-top:40px;">
             <h1>Denuncia realizada con exito!</h1>
        </div>
        <div class="alert alert-info" role="alert">
            <h2>Numero de denuncia: {$response}</h2>
        </div>
	</div>
    {else}
    <div class="alert alert-danger" role="alert">
        Algo fallo al realizar la denuncia
    </div>
    {/if}
<footer>
</footer>
<script src="js/jquery-3.0.0.min.js" charset="utf-8"></script> <!-- Llamado a la biblioteca javascript de bootstrap-->
<script src="js/leaflet.js" charset="utf-8"></script> <!-- Llamado a la biblioteca javascript de Leaflet (Mapas Free)-->
<script src="js/script.js" charset="utf-8"></script> <!-- Llamado a  javascript que contendra la funcionalidad del mapa-->
</body>
</html>