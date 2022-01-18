<section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nombre_de_usuario'] ?></p>
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
