  <h1>HACÉ TU DENUNCIA ONLINE</h1>
    <div class="form-group">
        <span for="input_ubicacion" class="col-sm-2 col-form-label">Marcá la ubicación de la basura </span>
    </div>
    <div id="mapid">
    </div> <!-- este div contendra el mapa-->
    <form action="publicarDenunciaInfraganti" method="post" enctype="multipart/form-data" id="add_denuncia_infraganti">


      
      <div class= "form-group row">
          <div class="col-sm-10">
            <input type="text" class="form-control" name="latitud" id="js-latitud" placeholder="Latitud">
            <input type="text" class="form-control" name="longitud" id="js-longitud"placeholder="Longitud">
          </div>
      </div>
     <div class="form-group row">
       <span>Datos del denunciante</span>
     </div>
     <div class="form-group row">
       <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
       <div class="col-sm-10">
           <input type="text" class= "form-control" name="nombre" id="nombre" placeholder="Nombre">
        </div>
      </div>
      <div class="form-group row">
        <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
        <div class="col-sm-10">
            <input type="text" class= "form-control" name="apellido" id="apellido" placeholder="Apellido">
         </div>
       </div>
       <div class="form-group row">
         <label for="documento" class="col-sm-2 col-form-label">Documento</label>
         <div class="col-sm-10">
             <input type="text" class= "form-control" name="documento" id="documento" placeholder="Documento de Identidad">
             <label for="select_tipo">Tipo</label>
             <select class="form-control" id="select_tipo">
               <option>DNI</option>
               <option>Pasaporte</option>
             </select>
          </div>
        </div>
      <div class="form-group row">
        <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
        <div class="col-sm-10">
            <input type="text" class= "form-control" name="direccion" id="direccion_calle" placeholder="Calle">
            <input type="text" class= "form-control" name="direccion" id="direccion_numero" placeholder="Numero">
            <input type="text" class= "form-control" name="direccion" id="direccion_depto" placeholder="Departamento">
         </div>
       </div>
       <div class="form-group row">
         <span>Detalles de la Infracción</span>
       </div>
       <div class="form-group row">
         <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
         <div class="col-sm-10">
             <input type="date" class= "form-control" name="fecha" id="fecha" placeholder="Fecha">
          </div>
        </div>
         <div class="form-group row">
           <label for="hora" class="col-sm-2 col-form-label">Hora</label>
           <div class="col-sm-10">
               <input type="time" class= "form-control" name="hora" id="hora" placeholder="Hora">
            </div>
          </div>
          <div class="form-group row">
            <label for="patente" class="col-sm-2 col-form-label">Patente del vehículo</label>
            <div class="col-sm-10">
                <input type="text" class= "form-control" name="patente" id="patente" placeholder="Patente">
             </div>
           </div>
           <div class="form-group row">
             <label for="descripcion" class="col-sm-2 col-form-label">Descripción Opcional</label>
           </div>
            <div class="form-group row">
              <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
            </div>
            <div class="custom-file">
              <label class="custom-file-label" for="js-video">Subir Video</label>
              <input type="file" class="custom-file-input" id="js-video">
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Ingresá tu mail para que te enviemos el comprobante de tu denuncia</label>
              <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" value="mail@mail.com" placeholder="Dirección de Correo Electrónico">
                <!--     <input name="estaCompletado" type="number" value="0"> -->
               </div>
             </div>
             <div>
             <button type="submit" class="btn btn-primary" id="submitDenuncia">Enviar Denuncia</button>
           </div>


</form>
