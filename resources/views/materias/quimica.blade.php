<link href="{{ asset('css/pantallas.css') }}" rel="stylesheet">
<div id="cargar-contenido">
    <div class="container" id="container_cartas">
        <input type="hidden" id="id_quimica_h" name="id_quimica_h" value=""> 
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Clases grabadas</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Material de estudio</a>
            </div>
        </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('../img/banner/2.png')}}" alt="Card image">
                    <div class="card-img-overlay">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="videoQuimica"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('../img/banner/2.png')}}" alt="Card image">
                    <div class="card-img-overlay">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="documentoQuimica" style="margin-left: 15px;"></div>
                </div>
            </div>
          </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#id_quimica_h").val($("#targeta_3").val());
        CargarMaterialVideoQuimica();
        CargarMaterialDocumentoQuimica();
    });

    function CargarMaterialVideoQuimica() {
        var id_asignatura = $("#id_quimica_h").val();
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
                    $(".videoQuimica").html(""); 
                    for (let i = 0; i < result.documentos.length; i++) {
                        console.log(result.documentos[i]);
                        if (result.documentos[i].tipomaterial == "video") {
                            let videoQuimica = "<div id='contenedor_media'>"+"<h5 id='cont_titulo'>"+result.documentos[i].nombre+"</h5>"+"<iframe  id='cont_videos' src="+result.documentos[i].link+" allow='autoplay' allowfullscreen='true'>"+ +"</iframe>"+"</div>";
                            $(".videoQuimica").append(videoQuimica);   
                        }                    
                    }
                }else{
                    alert("No hay material que cargar");
                }
            }
        });
    }

    function CargarMaterialDocumentoQuimica() {
        var id_asignatura = $("#id_quimica_h").val();
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
                    $(".documentoQuimica").html(""); 
                    for (let i = 0; i < result.documentos.length; i++) {
                        console.log(result.documentos);
                        if (result.documentos[i].tipomaterial == "documento") {    
                            let docQuimica = "<li id='li_documentos'>"+ "<a id='cont_documento' href="+ result.documentos[i].link +" width='640px' height='480px' target='_blank'>"+result.documentos[i].nombre+"</a>" + "</li>";
                            $(".documentoQuimica").append(docQuimica); 
                        }
                    }  
                }else{
                    alert("No hay material que cargar");
                }
            }
        });
    }

</script>