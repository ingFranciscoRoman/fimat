<div class="modal fade" id="material_educativo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Material a Agregar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="agregarMaterial" name="agregarMaterial" autocomplete="off">
            {{ csrf_field() }}
            <input type="hidden" id="asignatura_material_h" name="asignatura_material_h">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" id="nombre_material" name="nombre_material">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Tipo de documento:</label>
              <select name="tipo_documento" id="tipo_documento" class="form-control form-control-sm">
                <option value=""></option>
                <option value="documento">Documento</option>
                <option value="video">Video</option>
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Asignatura:</label>
              <select name="asignatura_material" id="asignatura_material" class="form-control">
                  @inject('select', 'App\Http\Controllers\ConsultasController')
                  @foreach ($select->cursos() as $asignaturas)
                    @for ($i = 0; $i < count($asignaturas['value']); $i++)
                      <option value="<?php print_r($asignaturas['value'][$i]->id); ?>"><?php print_r($asignaturas['value'][$i]->nombreAsignatura); ?></option>
                    @endfor
                  @endforeach
              </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Link:</label>
                <input type="text" class="form-control" id="link_material" name="link_material">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn_agregar_material">Agregar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
  $("#agregarMaterial").ajaxForm({
    type:"POST",
    url:"agregar/material",
    dataType: "json",
    success: function(json) {
       if (json.status == "true") {
         alert(json.mensaje);
         $("#inicio").click();
         limpiarCampos();
       }else{
         alert("Hubo un problema al cargar los datos");
       }
    }
  });
  
  function limpiarCampos() {
    $("#nombre_material").val('');
    $("#tipo_documento").val('');
    $("#asignatura_material").val('');
    $("#link_material").val('');
  }
  </script>