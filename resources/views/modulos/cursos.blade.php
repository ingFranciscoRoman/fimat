<script src="{{ asset('js/jquerymio.js') }}"></script>
<script src="{{ asset('js/AjaxFormIo.js') }}"></script>
<div id="cargar-contenido">
    <div class="container">
        <div class="card">
            <div class="card-body">
              <h3 class="card-title">Cursos</h3>
              <hr>
              <form id="form_cursos" name="form_cursos" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="cursos" class="form-label">Nombre del curso</label>
                        <input type="text" class="form-control form-control-sm" id="cursos" name="cursos" value="">
                    </div>
                    <div class="col">
                        <label for="descripcion_curso" class="form-label">Descripci&oacute;n del curso</label>
                        <input type="text" id="descripcion_curso" name="descripcion_curso" class="form-control form-control-sm" value="">
                    </div>
                    <div class="col">
                        <label for="descripcion_curso" class="form-label">Link clases</label>
                        <input type="text" id="link_cursos" name="link_cursos" class="form-control form-control-sm" value="">
                    </div>
                    
                    <div class="col">
                        <label for="descripcion_curso" class="form-label">Link simulacro</label>
                        <input type="text" id="link_simulacro" name="link_simulacro" class="form-control form-control-sm" value="">
                    </div>
                    
                    <div class="col">
                        <label for="">Tipo Curso</label>
                        <select name="tpcurso" id="tpcurso" class="form-control form-control-sm">
                          <option value="0"></option>
                          <option value="1">Normal</option>
                          <option value="2">Vacacional</option>
                          <option value="3">Piloto</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-1" id="agregar_cursos" name="agregar_cursos">Agregar</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#form_cursos").ajaxForm({
        type:"POST",
        url:"guardar/curso",
        dataType: "json",
        success: function(json) {
            if (json.status == "true") {
                alert(json.mensaje);
            }else{
                alert("No se pudo guardar el curso :(");
            }
        }
    });     
    });


    
</script>