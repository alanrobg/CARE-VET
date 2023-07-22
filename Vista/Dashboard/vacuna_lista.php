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
include_once '../../DAO/razaDAO.php';
include_once '../../Modelo/raza.php';

$razaDAO = new razaDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/especieDAO.php';
include_once '../../Modelo/especie.php';

$especieDAO = new especieDAO();
//---------------------------------------------------------------

//Recursos Vacuna
include_once '../../DAO/vacunaDAO.php';
include_once '../../DAO/detalle_vacunaDAO.php';
include_once '../../Modelo/vacuna.php';
include_once '../../Modelo/detalle_vacuna.php';

$vacunaDAO = new vacunaDAO();
$detalle_vacunaDAO = new detalle_vacunaDAO();
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

<!-------------------------------------------------SCRIPT PARA CLI_DUPLICADOS------------------------------------------------->

<body id="cuerpo">
    
    <!--HEADER -->
    <?php include './Header.php';?>
    <!--HEADER -->
    
    
<main class="main-content">
<div class="container bg-light mt-5 rounded-3" id="Nosotros">
        <div class="container py-4">
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="display-6 fw-bold text-black izquierdo">Vacunas Registradas</h1>
                </div>
            </div>
            <?php include './Modal/vacuna_new2.php';?>
            <?php include './Modal/vacuna_update.php';?>
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
                                <button class="btn btn-primary" data-bs-target="#newvacuna2" data-bs-toggle="modal">Nueva vacuna</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <table border="1" width="80%" class="ttable">
                        <thead>
                            <tr>
                                <th>ID Vacuna</th>
                                <th>Vacuna</th>
                                <th>Descripcion</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <!--FOREACH-->
                        <?php
                        foreach ($vacunaDAO->seleccionar() as $kr=>$dr){
                            //DATOS DE SERVICIO
                            $idvacuna = $dr->getIdvacuna();
                            $nomvac = $dr->getNom_vacuna();
                            $desvacuna = $dr->getDes_vacuna();
                        ?>
                        <tr class="articulo">
                            <td><?=$idvacuna?></td>
                            <td><?=$nomvac?></td>
                            <td><?=$desvacuna?></td>
                            <td><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#updatevac<?=$idvacuna?>">
                                Editar</button></td>
                                
                            
                            
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
