<div class="modal fade" id="consultarestudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Digita el correo electronico del estudiante</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('/consultar/estudiante')}}" method="GET" id="form_consultar">
              <label for="email">email</label>
              <input type="email" id="email_estudiante" name="email_estudiante" class="form-control form-control-sm" value="">
              <br>
              <button type="button" id="boton_consultar" class="btn btn-primary">consultar</button>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <script>

$('#boton_consultar').click(function() {
        var email = $('#email_estudiante').val();
        $.ajax({
            url: "consultar/estudianteperfil",
            contentType: "application/json",
            method: 'GET',
            data: {
                email_estudiante: email,
            },
            dataType: 'json',
            success: function(result) {
              console.log(result);
                if (result.status == "true") {
                  $("#id_estudiante").val(result.documentos.data_solicitud[0].Informacion_general[0].id);
                  $("#name").val(result.documentos.data_solicitud[0].Informacion_general[0].NAME);
                  $("#apellidos").val(result.documentos.data_solicitud[0].Informacion_general[0].apellidos);
                  $("#identificacion").val(result.documentos.data_solicitud[0].Informacion_general[0].identificacion);
                  $("#email").val(result.documentos.data_solicitud[0].Informacion_general[0].email);
                  $("#direccion").val(result.documentos.data_solicitud[0].Informacion_general[0].direccion);
                  $("#telefono").val(result.documentos.data_solicitud[0].Informacion_general[0].telefono);
                  /*id cursos*/
                  $("#curso").val(result.documentos.data_solicitud[0].Informacion_general[0].id_curso);
                  /*tipo de usuario*/
                  $("#tipoUsuario").val(result.documentos.data_solicitud[0].Informacion_general[0].tipoUsuario);
                  /*estado*/
                  $("#status").val(result.documentos.data_solicitud[0].Informacion_general[0].status);
                  /*vacacional*/
                  $("#curso_vacacional").val(result.documentos.data_solicitud[0].Informacion_general[0].vacacional);
                  /*Piloto*/
                  $("#curso_piloto").val(result.documentos.data_solicitud[0].Informacion_general[0].piloto);
                  $('#consultarestudiante .close').click(); 
                }else{
                  alert("No se encontro el estudiante.");
                }
            }
        });
    });
  </script>