<link href="{{ asset('css/pantallas.css') }}" rel="stylesheet">
<div id="cargar-contenido">
    <div class="container" id="container_cartas">
        <input type="hidden" name="id_fisica" id="id_fisica">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Clases grabadas</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Material de estudio</a>
            </div>
        </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('../img/banner/3.png')}}" alt="Card image">
                    <div class="card-img-overlay">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="VideoFisica"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('../img/banner/3.png')}}" alt="Card image">
                    <div class="card-img-overlay">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="DocumentoFisica" style="margin-left: 15px;"></div>
                </div>
            </div>
          </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#id_fisica").val($("#targeta_2").val());
        CargarMatrialFisica();
        CargarMaterialFisicaDoc();
    });

    function CargarMatrialFisica() {
        var id_fisica = $("#id_fisica").val();
        $.ajax({
            url: "consultar/material",
            contentType: "application/json",
            method: 'GET',
            data: {
                id_asignatura: id_fisica
            },
            dataType: 'json',
            success: function(result) {
                if (result.status == "true") {
                    $(".VideoFisica").html("");
                    for (let i = 0; i < result.documentos.length; i++) {
                        if (result.documentos[i].tipomaterial == "video") {
                            let videoFisica = "<div id='contenedor_media'>"+"<h5 id='cont_titulo'>"+result.documentos[i].nombre+"</h5>"+"<iframe  id='cont_videos' src="+result.documentos[i].link+" allow='autoplay' allowfullscreen='true'>"+ +"</iframe>"+"</div>";
                            $(".VideoFisica").append(videoFisica);
                        }
                    }
                }else{
                    alert("No hay material que cargar");
                }
            }
        });
    }

    function CargarMaterialFisicaDoc() {
        var id_fisica = $("#id_fisica").val();
        $.ajax({
            url: "consultar/material",
            contentType: "application/json",
            method: 'GET',
            data: {
                id_asignatura: id_fisica
            },
            dataType: 'json',
            success: function(result) {
                if (result.status == "true") {
                    $(".DocumentoFisica").html("");
                    for (let i = 0; i < result.documentos.length; i++) {
                        if (result.documentos[i].tipomaterial == "documento") {
                            let linkDocumentoFisica = "<li id='li_documentos'>"+"<a id='cont_documento' href="+result.documentos[i].link+" target='_blank'>"+result.documentos[i].nombre+"</a>"+"</li>";
                            $(".DocumentoFisica").append(linkDocumentoFisica);   
                        }
                    }
                }else{
                    alert("Ups no tienes acceso a documentos, comunicate con el coordinador.");
                }                
            }
        });
    }
</script>