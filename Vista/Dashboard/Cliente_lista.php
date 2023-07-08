<!DOCTYPE html>

<!--
Proyecto CareVet Veterinaria
-->


<?php

//---------------------------------------------------------------
include_once './session.php';
//---------------------------------------------------------------


//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/clienteDAO.php';
include_once '../../Modelo/cliente.php';

$clienteDAO = new clienteDAO();
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
<script>
    <?php
    if(isset($_REQUEST['error'])){
        if($_REQUEST['error'] == "dup"){
            ?>
            window.onload = function() {
            alert("El DNI ingresado se repite en otro Cliente");
            }
            <?php
        }
    }
    ?>
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
                    <h1 class="display-6 fw-bold text-black izquierdo">Clientes Registrados</h1>
                </div>
            </div>
            <?php include './Modal/Cliente_new.php';?>
            <?php include './Modal/Cliente_update.php';?>
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
                                <button class="btn btn-primary" data-bs-target="#newcliente" data-bs-toggle="modal">Nuevo Cliente</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <table border="1" width="100%" class="ttable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Edad</th>
                                <th>Telefono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <!--FOREACH-->
                        <?php
                        foreach ($clienteDAO->seleccionar() as $k=>$d){
                            //DATOS DE SERVICIO
                            $id = $d->getIdcliente();
                            $ape = $d->getApellido_cli();
                            $nom = $d->getNombre_cli();
                            $dni = $d->getDni_cli();
                            $nac = date("d/m/Y", strtotime($d->getNacimiento_cli()));
                            $actual = date("Y-m-d");
                            $edad = date_diff(date_create($d->getNacimiento_cli()), date_create($actual))->y;
                            $direc = $d->getDireccion_cli();
                            $tel = $d->getTelefono_cli();
                            $correo = $d->getCorreo_cli();
                            $registro = date("d/m/Y", strtotime($d->getRegistro_cli()));
                        ?>
                        <tr class="articulo">
                            <td><?=$id?></td>
                            <td><?=$ape?></td>
                            <td><?=$nom?></td>
                            <td><?=$dni?></td>
                            <td><?=$edad?> Años</td>
                            <td><?=$tel?></td>
                            <td><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#detailscli<?=$id?>">
                                Detalles</button></td>
                            <div class="modal fade" id="detailscli<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-title">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del Ciente</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">Apellido:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$ape?>" readonly="">
                                            </div>
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">Nombre:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$nom?>" readonly="">
                                            </div>
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">DNI:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$dni?>" readonly="">
                                            </div>
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">Fecha de Nacimiento:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$nac?>" readonly="">
                                            </div>
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">Dirección:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$direc?>" readonly="">
                                            </div>
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">Telefono:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$tel?>" readonly="">
                                            </div>
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">Email:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$correo?>" readonly="">
                                            </div>
                                            <div class="input-group mb-3">
                                              <label style="flex-basis: 40%" class="input-group-text">Fecha de Registro:</label>
                                              <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$registro?>" readonly="">
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
