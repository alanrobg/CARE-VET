<?php
foreach ($atencion_servicioDAO->seleccionar() as $kas=>$dasu){
    //DATOS DE SERVICIO
    $idatserv = $dasu->getIdatencion_servicion();
    $idservicio = $dasu->getIdservicio();
    $com = $dasu->getComentario();
?>
<div class="modal fade" id="updateservice<?=$idatserv?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Servicio</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_atencion_servicio.php?data=<?=$encoded_data?>&accion=update&idatencion_servicio<?=$idatserv?>" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                        <input type="text" hidden="" readonly="" name="idatencion" value="<?=$idatencion?>">
                        <label style="flex-basis: 20%" class="input-group-text">Servicio:</label>
                        <select style="flex-basis: 80%" class="form-select"  name="idservicio">
                              <option value="">Seleccione un servicio</option>
                              <?php
                              foreach ($servicioDAO->seleccionarxDisponibles() as $kservice=>$dserviceu) {
                                  $cad2 = "";
                                  if($dserviceu->getIdservicio() == $idservicio){
                                      $cad2 = "selected";
                                  }else{
                                      $cad2 = "";
                                  }
                                  ///DATOS DE TITULO
                                  echo "<option value=".$dserviceu->getIdservicio()." ".$cad2.">"." ".$dserviceu->getNom_servicio()."</option>";
                                  }
                              ?>
                          </select>
                    </div>
                    <div class="input-group mb-3">
                        <label style="flex-basis: 20%" class="input-group-text">Comentario:</label>
                        <textarea class="form-control" cols="20" rows="3" name="comentario"><?=$com?></textarea>
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
<?php    
}
?>