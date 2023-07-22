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
include_once '../../DAO/consultaDAO.php';
include_once '../../Modelo/consulta.php';

$consultaDAO = new consultaDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/mascotaDAO.php';
include_once '../../Modelo/mascota.php';

$mascotaDAO = new mascotaDAO();
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
    
<?php include './Modal/Consulta_new.php';?>
<main class="main-content">
<div class="container bg-light mt-5 rounded-3" id="Nosotros">
        <div class="container py-4">
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="display-6 fw-bold text-black izquierdo">Consultas Registrados</h1>
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
                                <button class="btn btn-primary" data-bs-target="#newconsulta" data-bs-toggle="modal">Nueva Consulta</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <table border="1" width="100%" class="ttable">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Trabajador</th>
                                <th>Mascota</th>
                                <th>Comentario</th>
                                <th></th>
                            </tr>
                        </thead>
                        <!--FOREACH-->
                        <?php
                        foreach ($consultaDAO->seleccionarDesc() as $kc=>$dcon){
                            //DATOS DE SERVICIO
                            $id = $dcon->getIdconsulta();
                            $cliente = $clienteDAO->seleccionar_idcliente(new cliente($dcon->getIdcliente(), null, null, null, null, null, null, null, null, null));
                            $nomcli = $cliente->getNombre_cli(); $apecli = $cliente->getApellido_cli();
                            $nommascota = $mascotaDAO->seleccionar_idmascota(new mascota
                                    ($dcon->getIdmascota(), null, null, null, null, null, null, null, null))->getNom_mascota();
                            $trabajador = $usuarioDAO->seleccionar_idusuario(new usuario($dcon->getIdusu(), null, null, null, null, null, null, null, null, null, null, null));
                            $nomtra = $trabajador->getNombre_usuario(); $apetra = $trabajador->getApellido_usuario();
                            $fecha = date("H:s d/m/Y", strtotime($dcon->getFecha()));
                            $com = $dcon->getComentario();
                        ?>
                        <tr class="articulo">
                            <td><?=$nomcli." ".$apecli?></td>
                            <td><?=$fecha?></td>
                            <td><?=$nomtra." ".$apetra?></td>
                            <td><?=$nommascota?></td>
                            <td><textarea class="form-control" rows="2" cols="20" readonly=""><?=$com?></textarea></td>
                            <td><a class="btn btn-primary" href="./Consulta_detalle.php?data=<?=$encoded_data?>&idconsulta=<?=$id?>">Detalles</a></td>
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
