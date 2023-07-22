<div class="modal fade" id="neservice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Servicio</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_atencion_servicio.php?data=<?=$encoded_data?>&accion=create" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                        <input type="text" hidden="" readonly="" name="idatencion" value="<?=$idatencion?>">
                        <label style="flex-basis: 20%" class="input-group-text">Servicio:<label style="color: red">*</label></label>
                        <select style="flex-basis: 80%" class="form-select"  name="idservicio" required="">
                              <option value="">Seleccione un servicio</option>
                              <?php
                              foreach ($servicioDAO->seleccionarxDisponibles() as $kservice=>$dservice) {
                                  $cad = "";
                                  $cad2 = "";
                                  if($dservice->getIdservicio() == $cad){
                                      $cad2 = "selected";
                                  }else{
                                      $cad2 = "";
                                  }
                                  ///DATOS DE TITULO
                                  echo "<option value=".$dservice->getIdservicio()." ".$cad2.">"." ".$dservice->getNom_servicio()."</option>";
                                  }
                              ?>
                          </select>
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 20%" class="input-group-text">Comentario:</label>
                        <textarea class="form-control" cols="20" rows="3" name="comentario"></textarea>
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

