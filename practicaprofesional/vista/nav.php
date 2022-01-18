<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Main CSS -->
<link rel="stylesheet" href="./css/main.css">
<!-- Ionicons -->
<link rel="stylesheet" href="dist/css/ionicons.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Link de consultas_fechas.php -->
<link rel="stylesheet" href="librerias/bootstrap/css/estilos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Link de fechas.php -->
<script src="/js/chart.min.js"></script>

		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="libreria/bootstrap/css/bootstrap.min.css">

    
		<!-- SCRIPTS JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
    <script src="buscadorAjax/peticion_articulos.js"></script>

 <!-- Lo de puntoventa --> 
<?php include "./class_lib/links.php"; ?>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">

 </head>
 <body onload="pone_num_entrada();lista_proveedores();revisa_entrada_ini();">
 

    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
            <a href="inicio.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AS </b> PA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Restaurante</b></span>
    </a>
<!-- Header Navbar -->
          <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Numero de accesos a la aplicacion.</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="dist/img/information_image.png" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          
                          <!-- The message -->
                          
                        </a>
                      </li><!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
                </a>
                <ul class="dropdown-menu">
                  

                  <li>

                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu arti_caducos">

                    </ul>
                  </li>
                  <!--<li class="footer"><a href="#">View all</a></li>-->
                </ul>
              </li>
              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
                </a>
                <ul class="dropdown-menu">
                  
      
                </ul>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/avatar.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">administrador</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
                    <p>
                      Usuario: administrador     
                  <li class="user-footer">
                    
                    <a href="login.php" class="btn btn-danger btn-block btn-exit-system"><i class='fa fa-power-off'></i> Salir</a>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
            </ul>
          </div>
        </nav>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrador Kevin</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
          </div>

          <!-- search form (Optional)
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
          


            <li class="treeview">
              <a href="#"><i class="fa fa-server"></i> <span>Informe Gráficos.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="consultas_fechas.php"><i class="fa fa-cubes"></i> Ingresos entre fecha.</a></li>
                <li><a href="consultas_fechas_compras.php"><i class="fa fa-cubes"></i> Egresos entre fecha.</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-server"></i> <span>Productos.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="almacen_articulos.php"><i class="fa fa-cubes"></i> Agregar Producto.</a></li>
                <li><a href="lista_articulos.php"><i class="fa fa-cubes"></i> Lista de Productos.</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-server"></i> <span>Categoria de Producto</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="almacencategorias.php"><i class="fa fa-cubes"></i> Agregar Categoria.</a></li>
                <li><a href="Lista_categorias.php"><i class="fa fa-cubes"></i> Lista de Categorias.</a></li>
              </ul>
            </li>

            

            <li class="treeview">
              <a href="#"><i class="fa fa-home"></i> <span>Proveedores.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="almacen_proveedores.php"><i class="fa fa-male"></i> Agregar Proveedor.</a></li>
                <li><a href="lista_proveedores.php"><i class="fa fa-users"></i>  Lista de Proveedores.</a></li>
              </ul>
            </li>

            
            
            <li class="treeview">
              <a href="#"><i class="fa fa-home"></i> <span>Mesas.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                
                <li><a href="lista_mesas.php"><i class="fa fa-users"></i>  Agregar Mesas.</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-terminal"></i> <span>Usuarios.</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                
                <li><a href="almacenusuarios.php"><i class="fa fa-user"></i> Registrar Usuario.</a></li>
                <li><a href="listadeusuarios.php"><i class="fa fa-check"></i> Lista de Usuarios.</a></li>
                <li><a href="almacen_tipo.php"><i class="fa fa-archive"></i> Registrar Rol.</a></li>
                <li><a href="listar_tipos.php"><i class="fa fa-check"></i> Lista de Roles.</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
         