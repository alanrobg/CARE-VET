<!DOCTYPE html>

<!--
Proyecto CareVet Veterinaria
-->


<?php
$privilegio = 3;

//---------------------------------------------------------------
include_once './session.php';
//---------------------------------------------------------------


//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/especieDAO.php';
include_once '../../Modelo/especie.php';

$especieDAO = new especieDAO();
//---------------------------------------------------------------

?>
<html lang="en" >
<head>
  <?php include './links.php';?>
    <title>CareVet Veterinaria</title>
</head>
<!-------------------------------------------------SCRIPT PARA BUSQUEDA------------------------------------------------->
<script>
document.addEventListener("keyup", e=>{

  if (e.target.matches("#buscador")){

      if (e.key ==="Escape")e.target.value = ""

      document.querySelectorAll(".articulo").forEach(fruta =>{

          fruta.textContent.toLowerCase().includes(e.target.value.toLowerCase())
            ?fruta.classList.remove("filtro")
            :fruta.classList.add("filtro")
      })

  }


})
</script>

<body id="cuerpo">
    
    <!--HEADER -->
    <?php include './Header.php';?>
    <!--HEADER -->
    
    
<main class="main-content">
<div class="container bg-light mt-5 rounded-3" id="Nosotros">
        <div class="container py-4">
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="display-6 fw-bold text-black izquierdo">Especies Registradas</h1>
                </div>
            </div>
            <?php include './Modal/Especie_new.php';?>
            <?php include './Modal/Especie_update.php';?>
            <style>
                .filtro{
                    display: none;
                }
            </style>
                             
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <table>
                        <tr>
                            <td align="right" style="padding-right: 5px">
                                Busqueda:
                            </td>
                            <td>
                                <input class="form-control" type="text" name="buscador" id="buscador" placeholder="Buscar...">
                            </td>
                            <td>&emsp;</td>
                            <td>
                                <button class="btn btn-primary" data-bs-target="#newespecie" data-bs-toggle="modal">Nueva Especie</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <table border="1" width="30%" class="ttable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <!--FOREACH-->
                        <?php
                        foreach ($especieDAO->seleccionar() as $k=>$d){
                            //DATOS DE SERVICIO
                            $id = $d->getidespecie();
                            $nom = $d->getnom_especie();
                        ?>
                        <tr class="articulo">
                            <td><?=$id?></td>
                            <td><?=$nom?></td>
                            <td><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#detailscli<?=$id?>">
                                Detalles</button></td>
                            <div class="modal fade" id="detailscli<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-title">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la Especie</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">Especie:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$nom?>" readonly="">
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?=$id?>">Editar</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
</main>
	<!-- Component End  -->
<script src="../recursos/main.js"></script>
</body>
</html>
