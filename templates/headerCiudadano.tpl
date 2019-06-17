<!-- Tpl de encabezado, contiene la barra de navegacion que integra las entregas 1 y 2-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Garbage Map</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="image/Tacho3.ico" type="image/x-icon" rel="shortcut icon" ><!-- Insertamos un icono a la pagina -->
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet" >
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<nav class="navbar navbar-default">
    <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" id="home" href="">Home</a>
      </div>
      <!-- Barra de navegacion general -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li> <a id="hd" href="" >Denuncia<span class="sr-only">(current)</span></a></li>  <!-- Opcion que nos dirige al formulario de denuncia comun-->
          <li> <a id="hdi" href="" >Denuncia in fraganti<span class="sr-only"></span></a></li> <!-- Opcion que nos dirige al formulario de denuncia Infraganti-->
          <li><a id="cont" href="">Contactanos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <form action="" class="navbar-form navbar-left" method="POST" enctype="multipart/form-data" id="loginw" role="logear">
            <div class="form-group">
              <label for="usuarioControlSelect">Usuario</label>
              <select class="form-control" id="usuarioMenu">
                <option value="Ciudadano">Ciudadano</option>
                <option value="Capataz">Capataz</option>
              </select>
            </div>
            {if isset($key_error)}
              <p class="text-danger">Clave incorrecta !!!</p>
            {/if}
          </form>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
