$("#tipoUsuario").change(function(){
   var estado = $("#tipoUsuario").val();
   $("#tipousuario_h").val(estado);
});

$("#status").change(function () {
   var status = $("#status").val();
   $("#status_h").val(status);
});

function zero(n) {
   return (n>9 ? '' : '0') + n;
}
var date = new Date();  
var time = date.getFullYear() +"-"+zero(date.getMonth()+1) +"-"+zero(date.getDate()) +" "+ zero(date.getHours()) + ":" + zero(date.getMinutes()) + ":" + zero(date.getSeconds());
$("#fecha_hora_registro").val(time);

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
