	<?php

  require_once ("funciones.php");
  require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
    require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos*/



    ?>

    
      <!-- Sidebar -->
      <?php include_once "includes/menu.php"; ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
    
  <nav>      
    <ul>
        <li class="logo-li"><a class="logo-a" href="panel.php"><img src="./img/usc.png" width="110px" height="40px" class="logo"></a></li>
        <li><a href="panel.php"><span class="primero"><i class="icon icon-home"></i></span>Inicio</a></li>
        <li><a><span class="segundo"><i class="icon icon-new"></i></span>Administración</a>
        <ul>
        <li><a href="profesor.php">Listados de Profesores</a></li>
        <li><a href="curso.php">listar Curso</a></li>
        <li><a href="colegio.php">Listados Colegio</a></li>
        <li><a href="carro.php">Listados Vehiculos</a></li>
        <li><a href="dicta.php">registro de curso</a></li>
        </ul>
        </li><li>
        <li><a href="#"><span class="tercero"><i class="icon icon-suitcase"></i></span>Ofertas de Empleo</a></li>
        <li><a href="#"><span class="cuarto"><i class="icon icon-text-document"></i></span>Registrase</a></li>
        <li><a href="#"><span class="quinto"><i class="icon icon-mail"></i></span>Contacto</a>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->