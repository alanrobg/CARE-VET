<div>
<?php
foreach ($razaDAO->seleccionar() as $kraz=>$draz){
    $idraz = $draz->getidraza();
    $nomraz = $draz->getnom_raza();
    ?>
    
    <!-- INICIO_VENTANA_EMERGENTE------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="update<?=$idraz?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-title">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Raza</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_raza.php?data=<?=$encoded_data?>&idraza=<?=$idraz?>&accion=update" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Raza:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="nom_raza" value="<?=$nomraz?>">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Especie:</label>
                        <select style="flex-basis: 60%" class="form-select"  name="idespecie" required="">
                              <option value="">Seleccione una especie</option>
                              <?php
                              foreach ($especieDAO->seleccionar() as $knesp=>$dnesp) {
                                  $cad = "";
                                  $cad2 = "";
                                  if($dnesp->getIdespecie() == $draz->getIdespecie()){
                                      $cad2 = "selected";
                                  }else{
                                      $cad2 = "";
                                  }
                                  ///DATOS DE TITULO
                                  echo "<option value=".$dnesp->getIdespecie()." ".$cad2.">"." ".$dnesp->getNom_especie()."</option>";
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

