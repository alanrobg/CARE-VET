<div class="modal fade" id="listaVacuna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-title modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Lista Vacunas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <table border="1" width="100%" class="ttable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha Aplicacion</th>
                                <th>Fecha Prox. Aplicacion</th>
                                <th>Observación</th>
                            </tr>
                        </thead>
                        <!--FOREACH-->
                        <?php
                        $idmascota;
                        foreach ($detalle_vacunaDAO->seleccionar($idmascota) as $k=>$d){
                            
                            //DATOS DE SERVICIO
                            $vac1=$vacunaDAO->seleccionar_idvacuna(new vacuna($d->getIdvacuna(),null,null));
                            $nomvacuna=$vac1->getNom_vacuna();
                            $desvacuna=$vac1->getDes_vacuna();
                            $fechavac=$d->getFecha_detalle();
                            $fechaproxvac=$d->getFecha_proxdet();
                            $obsvacuna=$d->getObs();
                        ?>
                        <tr class="articulo">
                            <td><?=$nomvacuna?></td>
                            <td><?=$desvacuna?></td>
                            <td><?=$fechavac?></td>
                            <td><?=$fechaproxvac?></td>
                            <td><?=$obsvacuna?></td>
                            
                        </tr>
                        <?php    
                        }

                        ?>
                    <!--FIN FOREACH-->
                </table>
            </div>
        </div>
    </div>
</div>

