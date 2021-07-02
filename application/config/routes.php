<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['Ventas']                       = 'Contabilidad/Ventas';
$route['Pedidos']                      = 'Contabilidad/Pedidos';
$route['Pagos']                        = 'Contabilidad/Pagos';
$route['Gastos']                       = 'Contabilidad/Gastos';
$route['Caja']                         = 'Contabilidad/Caja';
$route['Compras']                      = 'Contabilidad/Compras';
$route['VentasPorCliente']             = 'Informes/VentasPorCliente';
$route['Productos']                    = 'Sistema/Productos';
$route['Categorias']                   = 'Sistema/Categorias';
$route['Usuarios']                     = 'Sistema/Usuarios';
$route['Cliente']                      = 'RRHH/Cliente';
$route['Proveedor']                    = 'RRHH/Proveedor';
$route['Salir']                        = 'Conectar/salir';
$route['Calendario']                   = 'Gestion/Calendario';
$route['Inventarios']                  = 'Gestion/Inventarios';
$route['Trabajadores']                 = 'Gestion/Trabajadores';
$route['Remuneraciones']               = 'Gestion/Remuneraciones';
$route['Turnos']                       = 'Gestion/Turnos';
$route['ResumenCaja']                  = 'Informes/ResumenCaja';
//--------------------------------------------------
//INGREDIENTES
$route['tabla_ingredientes']          = 'Sistema/Ingredientes/ver_todos_ingredientes';
//PAQUETES INGREDIENTES
$route['crear_paquetes_ingredientes']          = 'Sistema/Ingredientes/crear_paquetes_ingredientes';
$route['default_controller']           = 'Conectar';
$route['404_override']                 = '';
$route['translate_uri_dashes']         = TRUE;
$route['login']                        = 'Conectar/login';
$route['empresa']                      = 'Conectar/empresa';
$route['servicios']                    = 'Conectar/servicios';

$route['Inicio']                       = 'Home';
$route['nacionalidad']                 = 'Home/nacionalidad';
$route['area_empresa']                 = 'Home/area_empresa';
$route['provincias']                   = 'Home/provincias';
$route['comunas']                      = 'Home/comunas';
$route['afp']                          = 'Home/afp';
$route['isapres']                      = 'Home/isapres';
//Productos
$route['tabla_productos_categoria']    = 'Sistema/Productos/ver_productos_categoria';
$route['ver_todos_productos']          = 'Sistema/Productos/ver_todos_productos';
$route['verificar_codigo']             = 'Sistema/Productos/verificar_codigo';
$route['imagen_producto']              = 'Sistema/Productos/imagen_producto';
$route['crear_producto']               = 'Sistema/Productos/crear_producto';
$route['ver_datos_producto']           = 'Sistema/Productos/ver_datos_producto';
//Categorias
$route['tabla_categorias']          = 'Sistema/Categorias/tabla_categorias';
$route['crear_categoria']           = 'Sistema/Categorias/crear_categoria';
$route['datos_categoria']           = 'Sistema/Categorias/datos_categoria';
$route['datos_categoria_nombre']    = 'Sistema/Categorias/datos_categoria_nombre';
$route['editar_categoria']          = 'Sistema/Categorias/editar_categoria';
$route['eliminar_categoria']        = 'Sistema/Categorias/eliminar_categoria';
$route['categorias_local']          = 'Sistema/Categorias/getCategoriasLocal';
//Cliente
$route['tabla_cliente']                = 'RRHH/Cliente/find';
$route['verificar_cliente']            = 'RRHH/Cliente/verificarcliente';
$route['crear_cliente']                = 'RRHH/Cliente/crear_cliente';
$route['datos_cliente']                = 'RRHH/Cliente/datoscliente';
$route['datos_cliente2']               = 'RRHH/Cliente/datoscliente2';
$route['editar_cliente']               = 'RRHH/Cliente/editar_cliente';
$route['deleteclient']                 = 'RRHH/Cliente/deleteclient';
$route['ocultarcliente']               = 'RRHH/Cliente/ocultarcliente';
$route['precioscliente']               = 'RRHH/Cliente/precioscliente';
//Proveedores
$route['tabla_proveedor']              = 'RRHH/Proveedor/find';
$route['verificar_proveedor']          = 'RRHH/Proveedor/verificarproveedor';
$route['crear_proveedor']              = 'RRHH/Proveedor/crear_proveedor';
$route['datos_proveedor']              = 'RRHH/Proveedor/datosproveedor';
$route['datos_proveedor2']             = 'RRHH/Proveedor/datosproveedor2';
$route['editar_proveedor']             = 'RRHH/Proveedor/editar_proveedor';
$route['deleteclient']                 = 'RRHH/Proveedor/deleteclient';
$route['ocultarproveedor']             = 'RRHH/Proveedor/ocultarproveedor';
$route['preciosproveedor']             = 'RRHH/Proveedor/preciosproveedor';
//Turnos
$route['generar_turno_trabajador']     = 'Gestion/Turnos/generar_turno_trabajador';
$route['ver_turno_area']               = 'Gestion/Turnos/ver_turno_area';
$route['ver_turno_area_dia']           = 'Gestion/Turnos/ver_turno_area_dia';
$route['ver_turno_area_dia2']          = 'Gestion/Turnos/ver_turno_area_dia2';
$route['editar_hora_trabajador']       = 'Gestion/Turnos/editar_hora_trabajador';
$route['contar_horas_trabajador']      = 'Gestion/Turnos/contar_horas_trabajador';
$route['cantidad_trabajando_area']     = 'Gestion/Turnos/cantidad_trabajando_area';
$route['generar_turno_area']           = 'Gestion/Turnos/generar_turno_area';
$route['get_turno_area']               = 'Gestion/Turnos/get_turno_area';

//Informes
$route['informe_venta']                = 'Informes/Informes/informeventa';
//Cotizaciones
$route['crear_cotizacion']             = 'Gestion/Cotizaciones/crearcotizacion';
$route['tabla_cotizaciones']           = 'Gestion/Cotizaciones/find';

//Trabajadores
$route['crear_trabajador']             = 'Gestion/Trabajadores/creartrabajador';
$route['tabla_trabajador']             = 'Gestion/Trabajadores/find';
$route['verificartrabajador']          = 'Gestion/Trabajadores/verificartrabajador';
$route['datos_trabajador']             = 'Gestion/Trabajadores/datostrabajador';
$route['editar_trabajador']            = 'Gestion/Trabajadores/editartrabajador';
$route['delete_trabajador']            = 'Gestion/Trabajadores/deletetrabajador';
$route['carnetdelantera']              = 'Gestion/Trabajadores/carnetdelantera';
$route['carnettrasera']                = 'Gestion/Trabajadores/carnettrasera';
$route['get_horario_trabajador']       = 'Gestion/Trabajadores/get_horario_trabajador';
$route['get_trabajadores_area']        = 'Gestion/Trabajadores/get_trabajadores_area';
$route['subir_archivos_trabajador']    = 'Gestion/Trabajadores/subir_archivos_trabajador';
$route['get_documentos_trabajador']    = 'Gestion/Trabajadores/get_documentos_trabajador';
$route['get_licencias_trabajador']     = 'Gestion/Trabajadores/get_licencias_trabajador';
$route['get_vacaciones_trabajador']    = 'Gestion/Trabajadores/get_vacaciones_trabajador';
$route['get_ausencias_trabajador']     = 'Gestion/Trabajadores/get_ausencias_trabajador';

$route['borrar_documentos_trabajador'] = 'Gestion/Trabajadores/borrar_documentos_trabajador';
$route['borrar_licencias_trabajador']  = 'Gestion/Trabajadores/borrar_licencias_trabajador';
$route['borrar_vacaciones_trabajador'] = 'Gestion/Trabajadores/borrar_vacaciones_trabajador';
$route['borrar_ausencias_trabajador']  = 'Gestion/Trabajadores/borrar_ausencias_trabajador';
$route['borrar_colacion_trabajador']   = 'Gestion/Trabajadores/borrar_colacion_trabajador';
$route['borrar_hora_extra_trabajador'] = 'Gestion/Trabajadores/borrar_hora_extra_trabajador';
//Inventarios
$route['crear_inventario']             = 'Gestion/Inventarios/crearinventario';
$route['tabla_inventario']             = 'Gestion/Inventarios/find';
$route['tabla_inventario2']            = 'Gestion/Inventarios/find2';
//Remuneraciones
$route['crearremuneracion']            = 'Gestion/Remuneraciones/crearremuneracion';
//Pagos
$route['tabla_pagos_cliente']          = 'Contabilidad/Pagos/pagos_clientes';
$route['deuda_cliente']                = 'Contabilidad/Pagos/deuda_cliente';
$route['tabla_pagos_proveedores']      = 'Contabilidad/Pagos/pagos_proveedores';
$route['deuda_proveedores']            = 'Contabilidad/Pagos/deuda_proveedores';
$route['crear_pago']                   = 'Contabilidad/Pagos/crear_pago';


//Caja
$route['detalle_caja']                 = 'Contabilidad/Caja/detalle_caja';
$route['find_caja']                    = 'Contabilidad/Caja/find';
$route['caja_inicio']                  = 'Contabilidad/Caja/crear_caja_inicio';
$route['caja_fin']                     = 'Contabilidad/Caja/crear_caja_fin';
//Usuarios
$route['tabla_usuario']                = 'Sistema/Usuarios/find';
$route['imagenusuario']                = 'Sistema/Usuarios/imagenusuario';
$route['crearusuario']                = 'Sistema/Usuarios/crearusuario';
$route['datos_usuario']                = 'Sistema/Usuarios/datosusuario';
$route['editarusuario']                = 'Sistema/Usuarios/editarusuario';
$route['eliminarusuario']              = 'Sistema/Usuarios/eliminarusuario';
$route['comprobar_usuario']            = 'Sistema/Usuarios/comprobarusuario';
$route['editar_clave']                 = 'Sistema/Usuarios/editarclave';

//Informes
$route['informe_venta']                = 'Informes/Informes/informeventa';
$route['informe_caja']                 = 'Informes/Informes/informe_caja';
$route['informe_venta_cliente']        = 'Informes/Informes/informe_venta_cliente';
//Gastos
$route['tabla_gastos']                 = 'Contabilidad/Gastos/find';
$route['crear_gasto']                 = 'Contabilidad/Gastos/crear_gastos';
//Calendario
$route['getCalendario']  			   = 'Gestion/Calendario/getCalendario';
$route['verdatoscalendarioid']  	   = 'Gestion/Calendario/ver_datos_calendario_id';
$route['crearevento']  			   = 'Gestion/Calendario/crear_evento';
$route['editarevento']  			   = 'Gestion/Calendario/editar_evento';
$route['eliminarevento']  			   = 'Gestion/Calendario/eliminar_evento';

