<div>
    <?php
    foreach ($usuarioDAO->seleccionar() as $k => $d) {
        $id = $d->getIdusuario();
        $apellido = $d->getApellido_usuario();
        $nom = $d->getNombre_usuario();
        $dni = $d->getDni_usuario();
        $area = $d->getIdarea();
        $direccion = $d->getDireccion_usuario();
        $nacimiento = date("d-m-Y", strtotime($d->getNacimiento_usuario()));
        $telefono = $d->getTelefono_usuario();
        $correo = $d->getCorreo_usuario();
        $contrato = $d->getContrato_usuario();
        $nom_usuario = $d->getUsu_usuario();
        ?>


        <div class="modal fade" id="update<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-title">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../Procesos/p_usuario1.php?data=<?= $encoded_data ?>&idusuario=<?= $id ?>&accion=update" method="Post" enctype="multipart/form-data">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Apellido:</label>
                                    <input style="flex-basis: 60%" type="text" class="form-control" name="apellido_usu" value="<?= $apellido ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Nombre:</label>
                                    <input style="flex-basis: 60%" type="text" class="form-control" name="nombre_usu" value="<?= $nom ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">DNI:</label>
                                    <input style="flex-basis: 60%" type="text" class="form-control" name="dni_usu" value="<?= $dni ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Dirección:</label>
                                    <input style="flex-basis: 60%" type="text" class="form-control" name="direccion" value="<?= $direccion ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Fecha de Nacimiento:</label>
                                    <input style="flex-basis: 60%" type="date" class="form-control" name="nacimiento" value="<?= $d->getNacimiento_usuario() ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Telefono:</label>
                                    <input style="flex-basis: 60%" type="text" class="form-control" name="telefono" value="<?= $telefono ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Correo:</label>
                                    <input style="flex-basis: 60%" type="text" class="form-control" name="correo" value="<?= $correo ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Contrato:</label>
                                    <select class="form-select"  name="contrato" required="" >
                                        <option value="TP">Temporal</option>
                                        <option value="PR">Permanente</option>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Tipo Cliente:<label style="color: red">*</label></label>
                                    <select class="form-select"  name="idarea" required="" >
                                        <option value="">Seleccione un tipo</option>
                                        <?php
                                        $usuarioDAO_area = new usuario_areaDAO();
                                        foreach ($usuarioDAO_area->seleccionar() as $kcli => $dcli) {
                                            $cad = "";
                                            $cad2 = "";
                                            if ($dcli->getIdusuario_area() == $area) {
                                                $cad2 = "selected";
                                            } else {
                                                $cad2 = "";
                                            }
                                            /* DATOS DEL CLIENTE */
                                            $name = $dcli->getNom_area();
                                            echo "<option value=" . $dcli->getIdusuario_area() . " " . $cad2 . ">" . " " . $name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Usuario:</label>
                                    <input style="flex-basis: 60%" type="text" class="form-control" name="usuario" value="<?=$nom_usuario?>">
                                </div>

                                <div class="input-group mb-3">
                                    <label style="flex-basis: 40%" class="input-group-text">Contraseña:</label>
                                    <input style="flex-basis: 60%" type="password" class="form-control" name="password" value="">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                                <input type="text" value="<?=$id?>" name="id_usu" hidden="">
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