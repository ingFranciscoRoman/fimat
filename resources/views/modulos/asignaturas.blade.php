<script src="{{ asset('js/jquerymio.js') }}"></script>
<script src="{{ asset('js/AjaxFormIo.js') }}"></script>
<div id="cargar-contenido">
    <div class="container">
        <div class="card">
            <div class="card-body">
              <h3 class="card-title">Asignaturas</h3>
              <hr>
              <form id="form_asignaturas" name="form_asignaturas" autocomplete="off">
                <input type="hidden" id="pertenece_curso_h" name="pertenece_curso_h">
                @csrf 
                <div class="row">
                    <div class="col">
                        <label for="asignatura" class="form-label">Nombre de la asignatura</label>
                        <input type="text" class="form-control form-control-sm" id="asignatura" name="asignatura">
                    </div>
                    <div class="col">
                        <label for="">Tarjetas</label>
                        <select name="materias" id="materias" class="form-control form-control-sm">
                            <option value=""></option>
                            <option value="1">Biolog&iacute;a</option>
                            <option value="2">Qu&iacute;mica</option>
                            <option value="3">F&iacute;sica</option>
                            <option value="4">Sociales</option>
                            <option value="5">Matem&aacute;ticas</option>
                            <option value="6">Ingl&eacute;s</option>
                            <option value="7">Lectura Cr&iacute;tica</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Descripci&oacute;n de la asignatura</label>
                        <input type="text" class="form-control form-control-sm" name="descripcion_asignatura" id="descripcion_asignatura">
                    </div>
                    <div class="col">
                        <label for="">Curso</label>
                        <select name="pertenece_curso" id="pertenece_curso" class="form-control form-control-sm">
                            <option value="0"></option>
                            @inject('select', 'App\Http\Controllers\ConsultasController')
                            @foreach ($select->consultar_curso() as $cursos)
                                @for ($i = 0; $i < count($cursos['value']); $i++)
                                    <option value="<?php print_r($cursos['value'][$i]->id); ?>"><?php print_r($cursos['value'][$i]->nombreCurso); ?></option>
                                @endfor
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-1" id="agregar_asigantura" name="agregar_asigantura">Agregar</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#form_asignaturas").ajaxForm({
        type:"POST",
        url:"guardar/asigantura",
        dataType: "json",
        success: function(json) {
            console.log(json);
           if (json.status == "true") {
               alert(json.mensaje);
           }else{
               alert("Error al guardar la asignatura");
           }
        }
    }); 

$('select#pertenece_curso').on('change',function(){
    var valor = $(this).val();
    $("#pertenece_curso_h").val(valor); 
});
    });


</script>