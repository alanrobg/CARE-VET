<div class="modal fade" id="newcliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-title">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_cliente.php?data=<?=$encoded_data?>&accion=create" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                      <label style="flex-basis: 40%" class="input-group-text">Apellido:</label>
                      <input style="flex-basis: 60%" type="text" class="form-control" name="apellido_cli" value="">
                    </div>
                    <div class="input-group mb-3">
                      <label style="flex-basis: 40%" class="input-group-text">Nombre:</label>
                      <input style="flex-basis: 60%" type="text" class="form-control" name="nombre_cli" value="">
                    </div>
                    <div class="input-group mb-3">
                      <label style="flex-basis: 40%" class="input-group-text">DNI:</label>
                      <input style="flex-basis: 60%" type="text" class="form-control" name="dni_cli" value="">
                    </div>
                    <div class="input-group mb-3">
                      <label style="flex-basis: 40%" class="input-group-text">Fecha de Nacimiento:</label>
                      <input style="flex-basis: 60%" type="date" class="form-control" name="nacimiento_cli" value="">
                    </div>
                    <div class="input-group mb-3">
                      <label style="flex-basis: 40%" class="input-group-text">Dirección:</label>
                      <input style="flex-basis: 60%" type="text" class="form-control" name="direccion_cli" value="">
                    </div>
                    <div class="input-group mb-3">
                      <label style="flex-basis: 40%" class="input-group-text">Telefono:</label>
                      <input style="flex-basis: 60%" type="text" class="form-control" name="telefono_cli" value="">
                    </div>
                    <div class="input-group mb-3">
                      <label style="flex-basis: 40%" class="input-group-text">Correo:</label>
                      <input style="flex-basis: 60%" type="text" class="form-control" name="email_cli" value="">
                    </div>
                    <input type="text" name="idusuario" value="<?=$usuario->getIdusuario()?>" hidden="">
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>