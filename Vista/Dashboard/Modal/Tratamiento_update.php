<?php
foreach ($tratamientoDAO->seleccionarxDisponibles() as $ktratuo=>$tratup){
    $id = $tratup->getIdtratamiento();
    $tratamiento = $tratup->getNom_tratamiento(); 
?>
<div class="modal fade" id="update<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-title">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Servicio</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../Procesos/p_tratamiento.php?data=<?=$encoded_data?>&idtratamiento=<?=$id?>&accion=update" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                      <label style="flex-basis: 30%" class="input-group-text">Tratamiento:</label>
                      <input style="flex-basis: 70%" type="text" class="form-control" name="nom_tratamiento" value="<?=$tratamiento?>">
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