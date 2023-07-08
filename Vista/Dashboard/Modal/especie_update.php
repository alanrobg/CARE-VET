<div>
<?php
foreach ($especieDAO->seleccionar() as $kcli=>$espe){
    $id = $espe->getidespecie();
    $nom = $espe->getnom_especie();
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
            <form action="../Procesos/p_especie.php?data=<?=$encoded_data?>&idespecie=<?=$id?>&accion=update" method="Post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                        <label style="flex-basis: 40%" class="input-group-text">Especie:</label>
                        <input style="flex-basis: 60%" type="text" class="form-control" name="nom_especie" value="<?=$nom?>">
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