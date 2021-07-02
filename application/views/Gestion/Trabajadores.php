<div class="panel panel-primary" id="tb_trab">
    <div class="panel-heading">
        <button type="button" class="btn pull-left btn-info dim" onclick="MostrarT(0)"><i class="fa fa-plus"></i> AÑADIR TRABAJADOR</button>
        <h2 class="text-center"><b>TABLA TRABAJADORES</b></h2>

    </div>
    <div class="panel body">
        <table class="table table-bordered" id="TablaTrabajadores">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="10%">RUN</th>
                    <th width="20%">NOMBRE COMPLETO</th>
                    <th>CARGO</th>
                    <th>FECHA NACIMIENTO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCIÓN</th>
                    <th width="40%" class="hidden-print">DOCUMENTACIÓN</th>
                    <th class="hidden-print"></th>
                    <th class="hidden-print"></th>
                </tr>
            </thead>
        <tbody></tbody>
    </table>
</div>
</div>
<?php  ?>
<form id="form_trabajadores" class="form_trabajador" enctype="multipart/form-data" style="display: none;">
<input type="hidden" name="vacaciones" id="vacaciones" value="0" />
<input type="hidden" name="licencias" id="licencias" value="0" />
<input type="hidden" name="ausencias" id="ausencias" value="0" />
<input type="hidden" name="colaciones1" id="colaciones1" value="0" />
<input type="hidden" name="colaciones2" id="colaciones2" value="0" />
<input type="hidden" name="colaciones3" id="colaciones3" value="0" />
<input type="hidden" name="colaciones4" id="colaciones4" value="0" />
<input type="hidden" name="colaciones5" id="colaciones5" value="0" />
<input type="hidden" name="colaciones6" id="colaciones6" value="0" />
<input type="hidden" name="colaciones7" id="colaciones7" value="0" />
<input type="hidden" name="horas_extras1" id="horas_extras1" value="0" />
<input type="hidden" name="horas_extras2" id="horas_extras2" value="0" />
<input type="hidden" name="horas_extras3" id="horas_extras3" value="0" />
<input type="hidden" name="horas_extras4" id="horas_extras4" value="0" />
<input type="hidden" name="horas_extras5" id="horas_extras5" value="0" />
<input type="hidden" name="horas_extras6" id="horas_extras6" value="0" />
<input type="hidden" name="horas_extras7" id="horas_extras7" value="0" />
<input type="hidden" name="id_trabajador" id="id_trabajador" value="0" />
<div class="panel panel-success">
    <div class="panel-heading">
        <button type="button" class="btn pull-left btn-info dim" onclick="MostrarT(1)"><i class="fa fa-eye"></i> VER TABLA TRABAJADOR</button>
        <h2 class="text-center"><b>TRABAJADOR</b></h2>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="rut_trabajador" class="control-label">RUN</label>
                    <input type="text" name="rut_trabajador" id="rut_trabajador" value="" class="form-control ruts" placeholder="RUN " />
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="nombres" class="control-label">NOMBRES</label>
                    <input type="text" name="nombres" id="nombres" value="" class="form-control letras mayusculas" placeholder="NOMBRES " />
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="apellidos" class="control-label">APELLIDOS</label>
                    <input type="text" name="apellidos" id="apellidos" value="" class="form-control letras mayusculas" placeholder="APELLIDOS " />
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="fecha_ingreso" class="control-label">FECHA INGRESO</label>
                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="" class="form-control numeros" placeholder="FECHA INGRESO " />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="telefono" class="control-label">TELEFONO</label>
                    <input type="text" name="telefono" id="telefono" value="" class="form-control numeros" placeholder="TELEFONO " />
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="correo" class="control-label">CORREO</label>
                    <input type="text" name="correo" id="correo" value="" class="form-control" placeholder="CORREO " />
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="direccion" class="control-label">DIRECCION</label>
                    <input type="text" name="direccion" id="direccion" value="" class="form-control mayusculas" placeholder="DIRECCION " />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="nacionalidad" class="control-label">NACIONALIDAD</label>
                <select name="nacionalidad" id="nacionalidad" class="form-control"></select>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="fecha_nacimiento" class="control-label">FECHA DE NACIMIENTO</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="" class="form-control numeros" placeholder="FECHA DE NACIMIENTO " />
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="estado_civil" class="control-label">ESTADO CIVIL</label>
                <select name="estado_civil" id="estado_civil" class="form-control">
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <option value="1">SOLTERO(A)</option>
                    <option value="2">CASADO(A)</option>
                    <option value="3">DIVORCIADO(A)</option>
                    <option value="4">VIUDO(A)</option>
                </select>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="ciudad" class="control-label">CIUDAD </label>
                <input type="text" name="ciudad" id="ciudad" value="" class="form-control letras mayusculas" placeholder="CIUDAD" />
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="cargo" class="control-label">CARGO</label>
                <input type="text" name="cargo" id="cargo" value="" class="form-control letras mayusculas" placeholder="CARGO " />
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="sueldo" class="control-label">SUELDO</label>
                <input type="text" name="sueldo" id="sueldo" value="" class="form-control numeros precio" placeholder="SUELDO " />
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="movilizacion" class="control-label">MOVILIZACION</label>
                <input type="text" name="movilizacion" id="movilizacion" value="0" class="form-control numeros precio" placeholder="MOVILIZACION " />
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="colacion" class="control-label">COLACION</label>
                <input type="text" name="colacion" id="colacion" value="" class="form-control numeros precio" placeholder="COLACION " />
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="afp" class="control-label">A.F.P.</label>
            <select name="afp" id="afp" class="form-control"> </select>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="tipo_contrato" class="control-label">TIPO CONTRATO?</label>
            <select name="tipo_contrato" id="tipo_contrato" class="form-control" onchange="contrato_inde()">
                <option value="0">SELECCIONE UNA OPCION</option>
                <option value="1">CONTRATO PLAZO INDEFINIDO</option>
                <option value="2">CONTRATO PLAZO FIJO</option>
                <option value="3">CONTRATO PLAZO INDEFINIO 11 AÑOS O MÁS</option>
            </select>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="tipo_salud" class="control-label">AREA DESEMPEÑO</label>
            <select name="select_area" id="select_area" class="form-control" onchange="sel_isapre()">
                <option value="0">SELECCIONE UNA OPCION</option>
                <option value="1">FONASA</option>
                <option value="2">ISAPRE</option>
            </select>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="sexo" class="control-label">SEXO</label>
            <select name="sexo" id="sexo" class="form-control">
                <option value="">SELECCIONE UNA OPCION</option>
                <option value="F">FEMENINO</option>
                <option value="M">MASCULINO</option>
            </select>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="carga_familiar" class="control-label">¿CARGA FAMILIAR?</label>
            <select name="carga_familiar" id="carga_familiar" class="form-control" onchange="cargafam()">
                <option value="0">SELECCIONE UNA OPCION</option>
                <option value="1">NO</option>
                <option value="2">SI</option>
            </select>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 carga_fam" style="display: none;">
        <div class="form-group">
            <label for="numero_cargas" class="control-label">NUMERO CARGAS FAMILIARES</label>
            <input type="text" name="numero_cargas" id="numero_cargas" value="" class="form-control numeros" placeholder="NUMERO CARGAS FAMILIARES " />
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 contrato_indef" style="display: none;">
        <div class="form-group">
            <label for="duracion_contrato" class="control-label">DURACION CONTRATO(MESES)</label>
            <input type="text" name="duracion_contrato" id="duracion_contrato" value="" class="form-control numeros" placeholder="DURACION CONTRATO " />
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="tipo_salud" class="control-label">TIPO DE SALUD</label>
            <select name="tipo_salud" id="tipo_salud" class="form-control" onchange="sel_isapre()">
                <option value="0">SELECCIONE UNA OPCION</option>
                <option value="1">FONASA</option>
                <option value="2">ISAPRE</option>
            </select>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 div_isapre" style="display: none;">
        <div class="form-group">
            <label for="isapre" class="control-label">NOMBRE ISAPRE</label>
        <select name="isapre" id="isapre" class="form-control"> </select>
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        <label for="modalidad_trabajo" class="control-label">MODALIDAD DE TRABAJO</label>
        <select name="modalidad_trabajo" id="modalidad_trabajo" class="form-control" onchange="sel_isapre()">
            <option value="0">SELECCIONE UNA OPCION</option>
            <option value="1">FULL-TIME</option>
            <option value="2">PART-TIME</option>
        </select>
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        <label for="trabaja_hora_extras" class="control-label">¿TRABAJA HORA EXTRAS?</label>
        <select name="trabaja_hora_extras" id="trabaja_hora_extras" class="form-control" onchange="sel_isapre()">
            <option value="0">SELECCIONE UNA OPCION</option>
            <option value="1">NO</option>
            <option value="2">SI</option>
        </select>
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        <label for="fecha_pacto" class="control-label">FECHA DE PACTO HORAS EXTRAS</label>
        <input type="date" name="fecha_pacto" id="fecha_pacto" value="" class="form-control numeros" placeholder="FECHA DE PACTO HORAS EXTRAS" />
    </div>
</div>
</div>
<div class="col-md-12" id="opciones_trabajador" style="display:none">
<div class="panel panel-danger">
    <div class="panel-heading">
        <h2 class="text-center"><b>OPCIONES TRABAJADOR</b></h2>
        <div class="alert alert-info">
            <b>
                <ul>
                    <li>Para ingresar licencias, vacaciones y/o ausencias el trabajador debe tener el turno de dicha semana creado previamente </li>

                </ul>
            </b>
        </div>
    </div>
    <div class="panel-body">
        <div class="tabs-container">
            <div class="tabs-left">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1"> Configuración Horario</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-2">Vacaciones</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">Licencias</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-4">Ausencias</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-5">Documentación</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div  style="display: none;" id="horario_trabajador">
                                <h2 class="text-center"><b>CONFIGURACIÓN HORARIO TRABAJADOR</b></h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="10%">Día</th>
                                            <th width="10%">Hora Inicio</th>
                                            <th width="10%">Hora Termino</th>
                                            <th width="10%">Horas Extras</th>
                                            <th width="20%">Horario Colación</th>
                                            <th width="10%">Horas de trabajo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Lunes</b> <button type="button" class="btn btn-primary" onclick="add_horario_colacion(1)"><i class='fa fa-plus'></i> COLACIÓN</button><br><button type="button" class="btn btn-warning" onclick="add_horario_hora_extra(1)"><i class='fa fa-plus'></i> HORA EXTRA</button></td>
                                            <td><input type="time" id="hora_inicio_lunes" name="hora_inicio_lunes" class="form-control horas_b" value="" /></td>
                                            <td><input type="time" id="hora_termino_lunes" name="hora_termino_lunes" class="form-control horas_b" value="" onchange="SumaTiempo(1)" /></td>
                                            <td id="td_hora_extra_1" name='td_hora_extra_1' class="td_hora_extra_1"><input type="number" value="60" id="colacion1_lunes" name="colacion1_lunes" class="numeros form-control" placeholder="EN MINUTOS" onchange="SumaTiempo(1)"  style='display:none'/></td>
                                            <td id='td_colacion_1' class="td_colacion"></td>
                                            <td class="tiempo_lunes"></td>
                                            <input type="hidden" id="hora_lunes" name="hora_lunes" class="horas_sumar" value="0" />
                                            <input type="hidden"  id="id_horario_1"  name="id_horario_1" class="id_horario_1  idhorario" value="">
                                            <input type="hidden" id="minutos_lunes" name="minutos_lunes" class="minutos_sumar" value="0" />
                                            <input type="hidden" id="colacion_lunes" name="colacion_lunes" class="colacion_sumar" value="0" />
                                            <input type="hidden" id="horas_extras_lunes" name="horas_extras_lunes" class="horas_extras_lunes " value="0" />
                                        </tr>
                                        <tr>
                                            <td><b>Martes</b><button type="button" class="btn btn-primary" onclick="add_horario_colacion(2)"><i class='fa fa-plus'></i> COLACIÓN</button><br><button type="button" class="btn btn-warning" onclick="add_horario_hora_extra(2)"><i class='fa fa-plus'></i> HORA EXTRA</button></td>
                                            <td><input type="time" id="hora_inicio_martes" name="hora_inicio_martes" class="form-control horas_b" value="" /></td>
                                            <td><input type="time" id="hora_termino_martes" name="hora_termino_martes" class="form-control horas_b" value="" onchange="SumaTiempo(2)" /></td>
                                            <td id="td_hora_extra_2" name='td_hora_extra_2' class="td_hora_extra_2"><input type="number" value="60" id="colacion1_martes" name="colacion1_martes" class="numeros form-control" placeholder="EN MINUTOS" onchange="SumaTiempo(2)" style='display:none' /></td>
                                            <td id="td_colacion_2" class="td_colacion"></td>
                                            <input type="hidden" id="hora_martes" name="hora_martes" class="horas_sumar" value="0" />
                                            <input type="hidden"  id="id_horario_2"  name="id_horario_2" class="id_horario_2  idhorario" value="">
                                            <input type="hidden" id="minutos_martes" name="minutos_martes" class="minutos_sumar" value="0" />
                                            <input type="hidden" id="colacion_martes" name="colacion_martes" class="colacion_sumar" value="0" />
                                            <input type="hidden" id="horas_extras_martes" name="horas_extras_martes" class="horas_extras_martes " value="0" />
                                            <td class="tiempo_martes"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Miercoles</b><button type="button" class="btn btn-primary" onclick="add_horario_colacion(3)"><i class='fa fa-plus'></i> COLACIÓN</button><br><button type="button" class="btn btn-warning" onclick="add_horario_hora_extra(3)"><i class='fa fa-plus'></i> HORA EXTRA</button></td>
                                            <td><input type="time" id="hora_inicio_miercoles" name="hora_inicio_miercoles" class="form-control horas_b" value="" /></td>
                                            <td><input type="time" id="hora_termino_miercoles" name="hora_termino_miercoles" class="form-control horas_b" value="" onchange="SumaTiempo(3)" /></td>
                                            <td id="td_hora_extra_3" name='td_hora_extra_3' class="td_hora_extra_3"><input type="number" value="60" id="colacion1_miercoles" name="colacion1_miercoles" class="numeros form-control" placeholder="EN MINUTOS" onchange="SumaTiempo(3)" style='display:none' /></td>
                                            <td id="td_colacion_3" class="td_colacion"></td>
                                            <input type="hidden" id="hora_miercoles" name="hora_miercoles" class="horas_sumar" value="0" />
                                            <input type="hidden"  id="id_horario_3"  name="id_horario_3" class="id_horario_3  idhorario" value="">
                                            <input type="hidden" id="minutos_miercoles" name="minutos_miercoles" class="minutos_sumar" value="0" />
                                            <input type="hidden" id="colacion_miercoles" name="colacion_miercoles" class="colacion_sumar" value="0" />
                                            <input type="hidden" id="horas_extras_miercoles" name="horas_extras_miercoles" class=" horas_extras_miercoles " value="0" />
                                            <td class="tiempo_miercoles"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jueves</b><button type="button" class="btn btn-primary" onclick="add_horario_colacion(4)"><i class='fa fa-plus'></i> COLACIÓN</button><br><button type="button" class="btn btn-warning" onclick="add_horario_hora_extra(4)"><i class='fa fa-plus'></i> HORA EXTRA</button></td>
                                            <td><input type="time" id="hora_inicio_jueves" name="hora_inicio_jueves" class="form-control horas_b" value="" /></td>
                                            <td><input type="time" id="hora_termino_jueves" name="hora_termino_jueves" class="form-control horas_b" value="" onchange="SumaTiempo(4)" /></td>
                                            <td id="td_hora_extra_4" name='td_hora_extra_4' class="td_hora_extra_4"><input type="number" value="60" id="colacion1_jueves" name="colacion1_jueves" class="numeros form-control" placeholder="EN MINUTOS" onchange="SumaTiempo(4)" style='display:none' /></td>
                                            <td id="td_colacion_4" class="td_colacion"></td>
                                            <input type="hidden" id="hora_jueves" name="hora_jueves" class="horas_sumar" value="0" />
                                            <input type="hidden"  id="id_horario_4"  name="id_horario_4" class="id_horario_4  idhorario" value="">
                                            <input type="hidden" id="minutos_jueves" name="minutos_jueves" class="minutos_sumar" value="0" />
                                            <input type="hidden" id="colacion_jueves" name="colacion_jueves" class="colacion_sumar" value="0" />
                                            <input type="hidden" id="horas_extras_jueves" name="horas_extras_jueves" class=" horas_extras_jueves " value="0" />
                                            <td class="tiempo_jueves"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Viernes</b><button type="button" class="btn btn-primary" onclick="add_horario_colacion(5)"><i class='fa fa-plus'></i> COLACIÓN</button><br><button type="button" class="btn btn-warning" onclick="add_horario_hora_extra(5)"><i class='fa fa-plus'></i> HORA EXTRA</button></td>
                                            <td><input type="time" id="hora_inicio_viernes" name="hora_inicio_viernes" class="form-control horas_b" value="" /></td>
                                            <td><input type="time" id="hora_termino_viernes" name="hora_termino_viernes" class="form-control horas_b" value="" onchange="SumaTiempo(5)" /></td>
                                            <td id="td_hora_extra_5" name='td_hora_extra_5' class="td_hora_extra_5"><input type="number" value="60" id="colacion1_viernes" name="colacion1_viernes" class="numeros form-control" placeholder="EN MINUTOS" onchange="SumaTiempo(5)" style='display:none' /></td>
                                            <td id="td_colacion_5" class="td_colacion"></td>
                                            <input type="hidden" id="hora_viernes" name="hora_viernes" class="horas_sumar" value="0" />
                                            <input type="hidden"  id="id_horario_5"  name="id_horario_5" class="id_horario_5  idhorario" value="">
                                            <input type="hidden" id="minutos_viernes" name="minutos_viernes" class="minutos_sumar" value="0" />
                                            <input type="hidden" id="colacion_viernes" name="colacion_viernes" class="colacion_sumar" value="0" />
                                            <input type="hidden" id="horas_extras_viernes" name="horas_extras_viernes" class="horas_extras_viernes " value="0" />
                                            <td class="tiempo_viernes"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Sabado</b><button type="button" class="btn btn-primary" onclick="add_horario_colacion(6)"><i class='fa fa-plus'></i> COLACIÓN</button><br><button type="button" class="btn btn-warning" onclick="add_horario_hora_extra(6)"><i class='fa fa-plus'></i> HORA EXTRA</button></td>
                                            <td><input type="time" id="hora_inicio_sabado" name="hora_inicio_sabado" class="form-control horas_b" value="" /></td>
                                            <td><input type="time" id="hora_termino_sabado" name="hora_termino_sabado" class="form-control horas_b" value="" onchange="SumaTiempo(6)" /></td>
                                            <td id="td_hora_extra_6" name='td_hora_extra_6' class="td_hora_extra_6"><input type="number" value="60" id="colacion1_sabado" name="colacion1_sabado" class="numeros form-control" placeholder="EN MINUTOS" onchange="SumaTiempo(6)" style='display:none' /></td>
                                            <td id="td_colacion_6" class="td_colacion"></td>
                                            <input type="hidden" id="hora_sabado" name="hora_sabado" class="horas_sumar" value="0" />
                                            <input type="hidden"  id="id_horario_6"  name="id_horario_6" class="id_horario_6  idhorario" value="">
                                            <input type="hidden" id="minutos_sabado" name="minutos_sabado" class="minutos_sumar" value="0" />
                                            <input type="hidden" id="colacion_sabado" name="colacion_sabado" class="colacion_sumar" value="0" />
                                            <input type="hidden" id="horas_extras_sabado" name="horas_extras_sabado" class="horas_extras_sabado " value="0" />
                                            <td class="tiempo_sabado"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Domingo</b><button type="button" class="btn btn-primary" onclick="add_horario_colacion(7)"><i class='fa fa-plus'></i> COLACIÓN</button><br><button type="button" class="btn btn-warning" onclick="add_horario_hora_extra(7)"><i class='fa fa-plus'></i> HORA EXTRA</button></td>
                                            <td><input type="time" id="hora_inicio_domingo" name="hora_inicio_domingo" class="form-control horas_b" value="" /></td>
                                            <td><input type="time" id="hora_termino_domingo" name="hora_termino_domingo" class="form-control horas_b" value="" onchange="SumaTiempo(7)" /></td>
                                            <td id="td_hora_extra_7" name='td_hora_extra_7' class="td_hora_extra_7"><input type="number" value="60" id="colacion1_domingo" name="colacion1_domingo" class="numeros form-control" placeholder="EN MINUTOS" onchange="SumaTiempo(7)" style='display:none' /></td>
                                            <td id="td_colacion_7" class="td_colacion"></td>
                                            <input type="hidden" id="hora_domingo" name="hora_domingo" class="horas_sumar" value="0" />
                                            <input type="hidden"  id="id_horario_7"  name="id_horario_7" class="id_horario_7  idhorario" value="">
                                            <input type="hidden" id="minutos_domingo" name="minutos_domingo" class="minutos_sumar" value="0" />
                                            <input type="hidden" id="colacion_domingo" name="colacion_domingo" class="colacion_sumar" value="0" />
                                            <input type="hidden" id="horas_extras_domingo" name="horas_extras_domingo" class="horas_extras_domingo " value="0" />
                                            <td class="tiempo_domingo"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>TOTAL HORAS TRABAJADAS :</b></td>
                                            <td class="horas_trabajadas"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <div class="col-md-12" id="vacaciones_trabajador">
                                <h2 class="text-center"><b>VACACIONES TRABAJADOR</b></h2>
                                <button type="button" class="btn btn-warning dim" onclick="add_vacaciones()"><i class="fa fa-plus"></i> AÑADIR VACACIONES</button>
                                <table class="table table-bordered" id="Vacaciones">
                                    <thead>
                                        <tr>
                                            <th width="10%">FECHA INICIO VACACIONES</th>
                                            <th width="10%">FECHA TERMINO VACACIONES</th>
                                            <th width="10%">PDF</th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body">
                        <div class="col-md-12" id="licencias_trabajador">
                            <h2 class="text-center"><b>LICENCIAS TRABAJADOR</b></h2>
                            <button type="button" class="btn btn-primary dim" onclick="add_licencias()"><i class="fa fa-plus"></i> AÑADIR LICENCIAS</button>
                            <table class="table table-bordered" id="Licencias">
                                <thead>
                                    <tr>
                                        <th width="10%">Nº LICENCIA</th>
                                        <th width="10%">FECHA INICIO REPOSO</th>
                                        <th width="10%">FECHA TERMINO REPOSO</th>
                                         <th width="5%"></th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="tab-4" class="tab-pane">
                <div class="panel-body">
                    <div class="col-md-12" id="ausencias_trabajador">
                        <h2 class="text-center"><b>AUSENCIAS TRABAJADOR</b></h2>
                        <button type="button" class="btn btn-danger dim" onclick="add_ausencias()"><i class="fa fa-plus"></i> AÑADIR AUSENCIAS</button>
                        <table class="table table-bordered" id="Ausencias">
                            <thead>
                                <tr>
                                    <th width="5%">FECHA</th>
                                    <th width="15%">MOTIVO</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="tab-5" class="tab-pane">
            <div class="panel-body">
                <div class="col-md-12" id="documentacion_trabajador">
                    <h2 class="text-center"><b>DOCUMENTACION TRABAJADOR</b></h2>
                    <button type="button" class="btn btn-success dim" onclick="add_documentos()"><i class="fa fa-plus"></i> AÑADIR DOCUMENTACION</button>
                    <table class="table table-bordered" id="Documentacion">
                        <thead>
                            <tr>
                                <th width="10%">TIPO</th>
                                <th width="10%">ARCHIVO</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="panel-footer">
<button type="submit" class="btn btn-line btn-info dim btn-lg"><i class="fa fa-paste"></i> GUARDAR DATOS</button>
</div>
</div>
</form>