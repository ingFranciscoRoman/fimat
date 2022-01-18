<script src="{{ asset('js/jquerymio.js') }}"></script>
<script src="{{ asset('js/AjaxFormIo.js') }}"></script>
<div id="cargar-contenido">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11 shadow p-3 mb-5 bg-white rounded" style="margin-top: 100px;">
                <div class="card mb-3">
                    <img class="card-img-top" src="{{asset('../img/banner/banner_fimat.png')}}" alt="Card image cap">
                    <div class="card-body">
                      <h3 class="card-title">Formulario de registro</h3>
                      <hr>
                      <form id="formulario_registro" name="formulario_registro" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="tipousuario_h" id="tipousuario_h">
                        <input type="hidden" name="status_h" id="status_h">
                        <input type="hidden" name="fecha_hora_registro" id="fecha_hora_registro">
                        <input type="hidden" name="id_estudiante" id="id_estudiante">
                            <div class="row">
                                <div class="col">
                                    <label for="">Nombres</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <label for="">Apellidos</label>
                                    <input type="text" name="apellidos" id="apellidos" class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <label for="">Identificaci&oacute;n</label>
                                    <input type="number" name="identificacion" id="identificacion" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <label for="">Direcci&oacute;n</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Curso</label>
                                    <select name="curso" id="curso" class="form-control form-control-sm">
                                        <option value="0"></option>
                                        @inject('select', 'App\Http\Controllers\ConsultasController')
                                        @foreach ($select->consultar_curso() as $cursos)
                                            @for ($i = 0; $i < count($cursos['value']); $i++)
                                                <option value="<?php print_r($cursos['value'][$i]->id); ?>"><?php print_r($cursos['value'][$i]->nombreCurso); ?></option>
                                            @endfor
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="col">
                                    <label for="">Vacacional</label>
                                    <select name="curso_vacacional" id="curso_vacacional" class="form-control form-control-sm">
                                         <option value="0"></option>
                                        @inject('select', 'App\Http\Controllers\ConsultasController')
                                        @foreach ($select->consultar_cursovaca() as $cursosvaca)
                                            @for ($i = 0; $i < count($cursosvaca['value']); $i++)
                                                <option value="<?php print_r($cursosvaca['value'][$i]->id); ?>"><?php print_r($cursosvaca['value'][$i]->nombreCurso); ?></option>
                                            @endfor
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Piloto</label>
                                    <select name="curso_piloto" id="curso_piloto" class="form-control form-control-sm">
                                        <option value="0"></option>
                                        @inject('select', 'App\Http\Controllers\ConsultasController')
                                        @foreach ($select->consultar_cursopiloto() as $cursos)
                                            @for ($i = 0; $i < count($cursos['value']); $i++)
                                                <option value="<?php print_r($cursos['value'][$i]->id); ?>"><?php print_r($cursos['value'][$i]->nombreCurso); ?></option>
                                            @endfor
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Tel&eacute;fono</label>
                                    <input type="number" name="telefono" id="telefono" class="form-control form-control-sm" autocomplete="off">
                                </div>
                                <div class="col">
                                    <label for="">Tipo de usuario</label>
                                    <select name="tipoUsuario" id="tipoUsuario" class="form-control form-control-sm">
                                        <option value="0"></option>
                                        <option value="1">Administrador</option>
                                        <!--<option value="2">Coordinador</option>
                                        <option value="3">Docente</option>-->
                                        <option value="4">Estudiante</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Estado</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="A">Activo</option>
                                        <option value="I">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" id="registrar">Registrar</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#consultarestudiante">
                                Consultar Estudiante
                            </button>
                      </form>
                      @include('modulos.consultar')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#formulario_registro").ajaxForm({
        type:"POST",
        url:"guardar/registro",
        dataType: "json",
            success: function(json) {
                if (json.status == "true") {
                    alert(json.mensaje);
                }
            }
        });
    });
    

</script>
    