<div>
<?php
    foreach ($mascotaDAO->seleccionar() as $kmu=>$dmu){
        $id = $dmu->getIdmascota();
        $nom = $dmu->getNom_mascota();
        $idcli = $dmu->getIdcliente();
        $raza = $dmu->getIdraza();
        $est = $dmu->getIdesterilizacion()
?>
    
    <!-- INICIO_VENTANA_EMERGENTE------------------------------------------------------------------------------------- -->
<div class="modal fade" id="update<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-title">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Mascota</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_mascota.php?data=<?=$encoded_data?>&idmascota=<?=$id?>&accion=update" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Nombre:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="nombre" value="<?=$nom?>" required="">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Cliente:</label>
                        <select style="flex-basis: 60%" class="form-select"  name="idcli" required="" required="">
                            <option value="">Seleccione un Cliente</option>
                            <?php
                            foreach ($clienteDAO->seleccionar() as $kcli=>$dcli) {
                                $cad = "";
                                $cad2 = "";
                                if($dcli->getIdcliente()==$idcli){
                                    $cad2 = "selected";
                                }else{
                                    $cad2 = "";
                                }
                                /*DATOS DEL CLIENTE*/
                                $name = $dcli->getNombre_cli(); $apellido = $dcli->getApellido_cli();
                                echo "<option value=".$dcli->getIdcliente()." ".$cad2.">"." ".$name." ".$apellido."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Nacimiento:</label>
                        <input style="flex-basis: 60%" type="date" class="form-control" name="nacimiento" value="<?=$dmu->getNacimiento_mascota()?>" required="">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Color:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="color" value="<?=$dmu->getColor_mascota()?>" required="">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Foto:</label>
                        <input style="flex-basis: 60%" type="file" class="form-control" name="fileToUpload" value="">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Esterilizado:</label>
                        <select style="flex-basis: 60%" class="form-select"  name="esterilizado" required="" required="">
                            <option value="">Seleccione</option>
                            <?php
                            foreach ($esterilizacionDAO->seleccionar() as $kest=>$dest) {
                                $cad = "";
                                $cad2 = "";
                                if($dest->getIdesterilizacion()==$est){
                                    $cad2 = "selected";
                                }else{
                                    $cad2 = "";
                                }
                                /*DATOS DEL CLIENTE*/
                                $name = $dest->getNom_esterilizacion();
                                echo "<option value=".$dest->getIdesterilizacion()." ".$cad2.">"." ".$name."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Raza:</label>
                        <select style="flex-basis: 60%" class="form-select"  name="raza" required="" required="">
                            <option value="">Seleccione</option>
                            <?php
                            foreach ($razaDAO->seleccionar() as $knraz=>$dnraz) {
                                $cad = "";
                                $cad2 = "";
                                if($dnraz->getIdraza()==$dmu->getIdraza()){
                                    $cad2 = "selected";
                                }else{
                                    $cad2 = "";
                                }
                                /*DATOS DEL CLIENTE*/
                                echo "<option value=".$dnraz->getIdraza()." ".$cad2.">"." ".$dnraz->getNom_raza()."</option>";
                                }
                            ?>
                        </select>
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