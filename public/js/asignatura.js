
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