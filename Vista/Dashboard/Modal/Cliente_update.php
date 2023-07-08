<div>
<?php
foreach ($clienteDAO->seleccionar() as $kcli=>$dcli){
    $id = $dcli->getIdcliente();
    $ape = $dcli->getApellido_cli();
    $nom = $dcli->getNombre_cli();
    $dni = $dcli->getDni_cli();
    $nac = $dcli->getNacimiento_cli();
    $actual = date("Y-m-d");
    $direc = $dcli->getDireccion_cli();
    $tel = $dcli->getTelefono_cli();
    $correo = $dcli->getCorreo_cli();
    ?>
    
    <!-- INICIO_VENTANA_EMERGENTE------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="update<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-title">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_cliente.php?data=<?=$encoded_data?>&idcliente=<?=$id?>&accion=update" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Apellido:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="apellido_cli" value="<?=$ape?>">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Nombre:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="nombre_cli" value="<?=$nom?>">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">DNI:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="dni_cli" value="<?=$dni?>">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Fecha de Nacimiento:</label>
                        <input style="flex-basis: 60%" type="date" class="form-control" name="nacimiento_cli" value="<?=$nac?>">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Dirección:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="direccion_cli" value="<?=$direc?>">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Telefono:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="telefono_cli" value="<?=$tel?>">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Email:</label>
                        <input style="flex-basis: 60%" type="email" class="form-control" name="email_cli" value="<?=$correo?>">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Nom Usuario:</label>
                        <input style="flex-basis: 60%" type="email" class="form-control" name="email_cli" value="<?=$correo?>">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
    <!-- FIN_VENTANA_EMERGENTE---------------------------------------------------------------------------------------- -->
<?php
}
?>
</div>