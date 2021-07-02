
  <div id="wrapper"  style="color: black">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
   <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header" >
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="Inicio" class="navbar-brand" style="background-color:red"><i class="fa fa-home"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">


                    <?php if( $this->session->userdata('Administrador') == TRUE){ ?>
                      <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears"></i>ADMINISTRACION<span class="caret"></span></a>

                        <ul role="menu" class="dropdown-menu">
                             <li><a href="Categorias" style="display:none">CATEGORIAS</a></li>
                            <li><a href="Cliente">CLIENTES</a></li>
                            <li><a href="Proveedor">PROVEEDORES</a></li>
                            <li><a href="Productos">PRODUCTOS</a></li>
                            <li><a href="Usuarios">USUARIOS</a></li>
                        </ul>
                    </li>

                        <?php } ?>
       <?php if( $this->session->userdata('Administrador') == TRUE OR $this->session->userdata('Secretaria') == TRUE){ ?>
                     <li >
                        <a href="Calendario">
                            <i class="fa fa-calendar"></i>CALENDARIO
                        </a>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-money"></i>CONTABILIDAD<span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">

                            <li><a href="Compras">COMPRAS</a></li>
                            <li ><a href="Gastos">GASTOS</a></li>
                             <li><a href="Pagos">PAGOS</a></li>


                        </ul>
                    </li>

                     <li class="dropdown" >
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i>RR.HH<span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="Trabajadores">TRABAJADORES</a></li>
                            <li><a href="Remuneraciones">REMUNERACIONES</a></li>
                             <li><a href="Sueldos">SUELDOS</a></li>
                             <li><a href="Turnos">TURNOS</a></li>
                        </ul>
                    </li>


                     <li><a href="Caja"><i class="fa fa-bar-chart"></i>CAJA</a></li>
                     <li><a href="Pedidos"><i class="fa fa-money"></i> PEDIDOS</a></li>



                    <?php } ?>
                </ul>

                <ul class="nav navbar-top-links navbar-right">
                   <?php if( $this->session->userdata('Administrador') == TRUE){ ?>

                <li> <a class="" href="Configuracion" ><i class="fa fa-gears"></i></a></li>
                 <?php } ?>
                    <li>
                        <a href="Salir">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
      </div>
