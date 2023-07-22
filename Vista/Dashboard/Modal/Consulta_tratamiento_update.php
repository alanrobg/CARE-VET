<?php
foreach ($consulta_tratamientoDAO->seleccionarxConsulta($idconsulta) as $kcontrat=>$dcontrat){
    //DATOS DEL TRATAMIENTO
    $idconsulta_tratamiento = $dcontrat->getIdconsulta_tratamiento();
    $tratamiento = $tratamientoDAO->seleccionar_idtratamiento(new tratamiento($dcontrat->getIdtratamiento(), null, null));
    $com = $dcontrat->getComentario();
?>
<div class="modal fade" id="updtate_tratamiento<?=$idconsulta_tratamiento?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Tratamiento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_consulta_tratamiento.php?data=<?=$encoded_data?>&accion=update&idconsulta_tratamiento<?=$idconsulta_tratamiento?>"
                  method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                        <input type="text" hidden="" readonly="" name="idconsulta" value="<?=$idconsulta?>">
                        <label style="flex-basis: 20%" class="input-group-text">Tratamiento:<label style="color: red">*</label></label>
                        <select style="flex-basis: 80%" class="form-select"  name="idtratamiento" required="">
                              <option value="">Seleccione un Tratamiento</option>
                              <?php
                              foreach ($tratamientoDAO->seleccionarxDisponibles() as $ktrat=>$dtrat) {
                                  $cad = "";
                                  $cad2 = "";
                                  if($dtrat->getIdtratamiento() == $dcontrat->getIdtratamiento()){
                                      $cad2 = "selected";
                                  }else{
                                      $cad2 = "";
                                  }
                                  ///DATOS DE TITULO
                                  echo "<option value=".$dtrat->getIdtratamiento()." ".$cad2.">"." ".$dtrat->getNom_tratamiento()."</option>";
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
                        <button type="submit" class="btn btn-primary">Agregar</button>
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