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