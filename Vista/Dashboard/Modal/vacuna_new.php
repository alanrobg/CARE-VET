<div class="modal fade" id="newVacuna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-title">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Aplicación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Procesos/p_vacuna.php?data=<?= $encoded_data ?>&accion=create" method="Post" enctype="multipart/form-data">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" hidden="" value="<?=$idmascota?>" name="idmascota" required="">
                        <input type="text" hidden="" value="<?=$idconsulta?>" name="idconsulta" required="">
                        <div class="input-group mb-3">
                            <label style="flex-basis: 40%" class="input-group-text">Vacuna :<label style="color: red">*</label></label>
                            <select style="flex-basis: 60%" class="form-select"  name="idvac" required="">
                                <option value="">Seleccione una Vacuna</option>
                                <?php
                                foreach ($vacunaDAO->seleccionar() as $kvac => $dvac) {
                                    $cad = "";
                                    $cad2 = "";
                                    if ($dvac->getIdvacuna() == $cad) {
                                        $cad2 = "selected";
                                    } else {
                                        $cad2 = "";
                                    }
                                    ///DATOS DE TITULO
                                    echo "<option value=".$dvac->getIdvacuna()." ".$cad2.">".$dvac->getNom_vacuna()."ECHO"."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <label style="flex-basis: 40%" class="input-group-text">Fecha proxima aplicación:<label style="color: red">*</label></label>
                            <input  type="date" class="input-group-text" name="fechaproximadv">
                        </div>
                        <div class="input-group mb-3">
                            <label style="flex-basis: 40%" class="input-group-text">Observación: <label style="color: red">*</label></label>
                            <input type="text" style="flex-basis: 60%" class="input-group-text"  name="obsvac" required="">
                        </div>
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

