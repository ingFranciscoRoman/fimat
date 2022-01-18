

$('select#asignatura_material').on('change',function(){
    var valor = $(this).val();
    $("#asignatura_material_h").val(valor); 
});