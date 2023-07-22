
<!--HEADER -->
<header >
    <nav id="cabecera" class="p-3 text-white">
        <div class="dropdown">
            <form action="../inicio.php?data=<?=$encoded_data?>" method="Post" enctype="" >
                <button class="izquierdo" id="logo-header">
                    <img src="../recursos/specialities-03.png" style="margin-top: -20px" width="100px" height="100px">
                </button>
            </form>
            
            <button class="dropdown-toggle izquierdo points" id="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    type="button" style="margin-top: 10px; margin-left: 15px">
                <img src="../recursos/iconos/ajuste.png" width="50px" height="50px">
            </button>
            <ul class="dropdown-menu  dropdown-menu-dark">
                <li><a class="dropdown-item rounded-3 hover:bg-gray-300 nodeco" href="../inicio.php?data=<?=$encoded_data?>">Inicio</a></li>
                <li><a class="dropdown-item" href="./Atencion_lista.php?data=<?=$encoded_data?>">Atenciones</a></li>
                <li><a class="dropdown-item" href="./Consulta_lista.php?data=<?=$encoded_data?>">Consultas Médicas</a></li>
                <li><a class="dropdown-item" href="./Cliente_lista.php?data=<?=$encoded_data?>">Clientes</a></li>
                <li><a class="dropdown-item" href="./Mascota_lista.php?data=<?=$encoded_data?>">Mascotas</a></li>
                <li><a class="dropdown-item" href="./Servicios_lista.php?data=<?=$encoded_data?>">Servicios</a></li>
                <li><a class="dropdown-item" href="./Tratamiento_lista.php?data=<?=$encoded_data?>">Tratamientos</a></li>
                <li><a class="dropdown-item" href="./vacuna_lista.php?data=<?=$encoded_data?>">Vacunas</a></li>
                <li><a class="dropdown-item" href="./Usuario_lista.php?data=<?=$encoded_data?>">Usuarios</a></li>
                <li><a class="dropdown-item" href="./Raza_lista.php?data=<?=$encoded_data?>">Razas</a></li>
                <li><a class="dropdown-item" href="./Especie_lista.php?data=<?=$encoded_data?>">Especies</a></li>
                <li><a class="dropdown-item" href="../Procesos/p_session.php?data=<?=$encoded_data?>&accion=delete"><b style="color: red">Salir</b></a></li>
            </ul>
        </div>   
<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="../inicio.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-200 nodeco" id="fuente1">Inicio</a></li>
            <li><a href="./Atencion_lista.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 nodeco" id="fuente1">Atenciones</a></li>
            <li><a href="./Consulta_lista.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 nodeco" id="fuente1">Consultas</a></li>
            <li><a href="./Cliente_lista.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 nodeco" id="fuente1">Clientes</a></li>
            <li><a href="./Usuario_lista.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 nodeco" id="fuente1">Usuarios</a></li>
            
        </ul>
        <div class="text-end dropdown flex items-center">
            <button class="show-desktop dropdown-toggle" id="logo-header" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
                    style="margin-top: 20px;margin-left: -30px" title="Mantenimiento">
                <img src="../recursos/iconos/ajuste.png" width="70px" height="70px">
            </button>

            <ul class="dropdown-menu  dropdown-menu-dark">
                <li><a class="dropdown-item rounded-3 hover:bg-gray-300 nodeco" href="../inicio.php?data=<?=$encoded_data?>">Inicio</a></li>
                <li><a class="dropdown-item" href="./Atencion_lista.php?data=<?=$encoded_data?>">Atenciones</a></li>
                <li><a class="dropdown-item" href="./Consulta_lista.php?data=<?=$encoded_data?>">Consultas Médicas</a></li>
                <li><a class="dropdown-item" href="./Cliente_lista.php?data=<?=$encoded_data?>">Clientes</a></li>
                <li><a class="dropdown-item" href="./Mascota_lista.php?data=<?=$encoded_data?>">Mascotas</a></li>
                <li><a class="dropdown-item" href="./Servicios_lista.php?data=<?=$encoded_data?>">Servicios</a></li>
                <li><a class="dropdown-item" href="./Tratamiento_lista.php?data=<?=$encoded_data?>">Tratamientos</a></li>
                <li><a class="dropdown-item" href="./vacuna_lista.php?data=<?=$encoded_data?>">Vacunas</a></li>
                <li><a class="dropdown-item" href="./Usuario_lista.php?data=<?=$encoded_data?>">Usuarios</a></li>
                <li><a class="dropdown-item" href="./Raza_lista.php?data=<?=$encoded_data?>">Razas</a></li>
                <li><a class="dropdown-item" href="./Especie_lista.php?data=<?=$encoded_data?>">Especies</a></li>
                <li><a class="dropdown-item" href="../Procesos/p_session.php?data=<?=$encoded_data?>&accion=delete"><b style="color: red">Salir</b></a></li>
            </ul>
        </div>
    </div>
</div>
    </nav>
</header>

<!--HEADER -->