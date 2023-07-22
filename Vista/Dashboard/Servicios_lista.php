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
include_once '../../DAO/servicioDAO.php';
include_once '../../Modelo/servicio.php';

$servicioDAO = new servicioDAO();
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
    <?php include '../Dashboard/Header.php';?>
    <!--HEADER -->

<?php include './Modal/Servicio_new.php';?>
 <?php include './Modal/Servicio_update.php';?>   
<main class="main-content">
    <div class="container bg-light mt-5 rounded-3" id="Nosotros">
        <div class="container py-4">
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="display-6 fw-bold text-black izquierdo">Servicios Registrados</h1>
                </div>
            </div>
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
                                <button class="btn btn-primary" data-bs-target="#newservice" data-bs-toggle="modal">Nuevo Servicio</button>
                            </td>
                        </tr>
                    </table>
                </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <table border="1" width="65%" class="ttable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Servicio</th>
                                    <th>Estado</th>
                                    <th></th><th></th>
                                </tr>
                            </thead>
                            <!--FOREACH-->
                                <?php
                                foreach ($servicioDAO->seleccionar() as $kser=>$dser){
                                    $id = $dser->getIdservicio();
                                    $service = $dser->getNom_servicio();
                                    if($dser->getEstado() == 1){
                                        $estado = "Disponible";
                                        $status = "Habilitar"; $class = "primary";
                                    }else{
                                        $estado = "No Disponible";
                                        $status = "Deshabilitar"; $class = "danger";
                                    } 
                                ?>
                                <tr class="articulo">
                                    <td><?=$id?></td>
                                    <td><?=$service?></td>
                                    <td><?=$estado?></td>
                                    <?php
                                    if($dser->getEstado() == 1){
                                    ?>
                                        <td><button class="btn btn-primary" data-bs-target="#update<?=$id?>" data-bs-toggle="modal">Editar</button></td>
                                        <td><a href="../Procesos/p_servicio.php?data=<?=$encoded_data?>&idservicio=<?=$id?>&accion=down" 
                                               class="btn btn-danger" style="width: 110px">Deshabilitar</a></td>
                                    <?php
                                    }else{
                                    ?>  
                                        <td><button class="btn btn-primary" disabled="">Editar</button></td>
                                        <td><a href="../Procesos/p_servicio.php?data=<?=$encoded_data?>&idservicio=<?=$id?>&accion=up" 
                                               class="btn btn-primary" style="width: 110px">Habilitar</a></td>
                                    <?php
                                    }
                                    ?>
                                    
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
