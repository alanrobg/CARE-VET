<div class="modal fade" id="newraza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-title">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Raza</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_raza.php?data=<?=$encoded_data?>&accion=create" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                      <label style="flex-basis: 40%" class="input-group-text">Raza:</label>
                      <input style="flex-basis: 60%" type="text" class="form-control" name="nom_raza" value="">
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Especie:<label style="color: red">*</label></label>
                        <select style="flex-basis: 60%" class="form-select"  name="idespecie" required="">
                              <option value="">Seleccione una especie</option>
                              <?php
                              foreach ($especieDAO->seleccionar() as $knesp=>$dnesp) {
                                  $cad = "";
                                  $cad2 = "";
                                  if($dnesp->getIdespecie() == $cad){
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
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

