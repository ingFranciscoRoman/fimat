
<link href="{{ asset('css/pantallas.css') }}" rel="stylesheet">
<div id="cargar-contenido">
    <div class="container" id="container_cartas">
        <input type="hidden" id="id_asignatura" name="id_asignatura" value="">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Clases grabadas</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Material de estudio</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('../img/banner/1.png')}}" alt="Card image">
                    <div class="card-img-overlay">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="link_video"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('../img/banner/1.png')}}" alt="Card image">
                    <div class="card-img-overlay">
                    </div>
                </div>
                <hr>
                <div class="row">
                        <div class="link_documento" style="margin-left: 15px;"></div>
                </div>
            </div>
          </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $("#id_asignatura").val($("#targeta_1").val());
    cargar_material_video();
    cargar_material_documento();
});

function cargar_material_video(id_asignatura) {
    var id_asignatura = $("#id_asignatura").val();
    $.ajax({
        url: "consultar/material",
        contentType: "application/json",
        method: 'GET',
        data: {
            id_asignatura: id_asignatura
        },
        dataType: 'json',
        success: function(result) {
            if (result.status == "true") {
                $(".link_video").html(""); 
                for (let i = 0; i < result.documentos.length; i++) {
                    if (result.documentos[i].tipomaterial == "video") {
                        let links_video = "<div id='contenedor_media'>"+"<h5 id='cont_titulo'>"+result.documentos[i].nombre+"</h5>"+"<iframe  id='cont_videos' src="+result.documentos[i].link+" allow='autoplay' allowfullscreen='true'>"+ +"</iframe>"+"</div>";
                        $(".link_video").append(links_video);   
                    } 
                }  
            }else{
                alert("No hay material que cargar");
            }
        }
    });
}

function cargar_material_documento(id_asignatura) {
    var id_asignatura = $("#id_asignatura").val();
    $.ajax({
        url: "consultar/material",
        contentType: "application/json",
        method: 'GET',
        data: {
            id_asignatura: id_asignatura
        },
        dataType: 'json',
        success: function(result) {
            if (result.status == "true") {
                $(".link_documento").html(""); 
                for (let i = 0; i < result.documentos.length; i++) {
                    if (result.documentos[i].tipomaterial == "documento") {    
                        let links_documento = "<li id='li_documentos'>"+ "<a id='cont_documento' href="+ result.documentos[i].link +" width='640px' height='480px' target='_blank'>"+result.documentos[i].nombre+"</a>" + "</li>";
                        $(".link_documento").append(links_documento); 
                    }
                }  
            }else{
                alert("No hay material que cargar");
            }
        }
    });
}

</script>