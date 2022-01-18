
<div id="cargar-vistas">
    <div class="card col-md-11" style="margin:auto; margin-top: 50px;">
        <div class="card-body">
            <div class="row" id="foto_heade">
                <img class="card-img-top" src="{{asset('../img/banner/banner_fimat.png')}}" alt="Card image cap">
            </div>
            <div class="row">
                <div class="col-md-2">
                    @if(empty(Session('vacasional')) != 1)
                     <a href="{{Session('vacasional')[0]->link}}" target="_blank" id="btn_clases_vivo">
                    <img src="{{asset('../img/boton/1.png')}}" alt="clases_vivo" id="btn_clases_vivo">
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{Session('vacasional')[0]->simulacro}}" target="_blank" id="btn_retos">
                    <img src="{{asset('../img/boton/2.png')}}" alt="btn_retos" id="btn_retos">
                    </a>
                </div>
                @endif 
            </div>
            @if (Session('tarjetas_vacacional') != "")
                <div class="row">
                    @for ($i = 0; $i < count(Session('tarjetas_vacacional')); $i++)
                        @if (Session('tarjetas_vacacional')[$i]->materia == 1)
                        <div class="col">
                            <input type="hidden" id="id_tarjeta" value="<?php print_r(Session('tarjetas_vacacional')[$i]->id); ?>">
                            <li class="nav-item" onclick="vista_biologia();" style="list-style: none;">
                                <img src="{{asset('../img/1.png')}}" alt="" id="img_biologia"  name="img_biologia" class="cardImg shadow p-3 mb-5 bg-white rounded">
                            </li>
                        </div>
                        @endif
                        @if (Session('tarjetas_vacacional')[$i]->materia == 2)    
                            <div class="col" onclick="alertaquimica();">
                                <input type="hidden" id="id_quimica" value="<?php print_r(Session('tarjetas_vacacional')[$i]->id); ?>">
                                <li class="nav-item" style="list-style: none;" onclick="vista_quimica();">
                                    <img src="{{asset('../img/2.png')}}" alt="" name="quimica" class="cardImg shadow p-3 mb-5 bg-white rounded">
                                </li>
                            </div>
                        @endif 
                        @if (Session('tarjetas_vacacional')[$i]->materia == 3)
                            <div class="col" onclick="alertafisica();">
                                <input type="hidden" id="id_fisica" value="<?php print_r(Session('tarjetas_vacacional')[$i]->id); ?>">
                                <li class="nav-item" style="list-style: none;" onclick="vista_fisica();">
                                    <img src="{{asset('../img/3.png')}}" alt="" name="fisica" class="cardImg shadow p-3 mb-5 bg-white rounded">
                                </li>
                            </div>   
                        @endif
                        @if (Session('tarjetas_vacacional')[$i]->materia == 4)
                            <div class="col" onclick="alertasociales();">
                                <input type="hidden" id="id_sociales" value="<?php print_r(Session('tarjetas_vacacional')[$i]->id); ?>">
                                <li class="nav-item" style="list-style: none;" onclick="vista_sociales();">
                                    <img src="{{asset('../img/4.png')}}" alt="" name="sociales" class="cardImg shadow p-3 mb-5 bg-white rounded">
                                </li>
                            </div>    
                        @endif
                        @if (Session('tarjetas_vacacional')[$i]->materia == 5)    
                            <div class="col" onclick="alertamatematicas();">
                                <input type="hidden" id="id_matematicas" value="<?php print_r(Session('tarjetas_vacacional')[$i]->id); ?>">
                                <li class="nav-item" style="list-style: none;" onclick="vista_matematicas();">
                                    <img src="{{asset('../img/5.png')}}" alt="" name="matematicas" class="cardImg shadow p-3 mb-5 bg-white rounded">
                                </li>
                            </div>
                        @endif
                        @if (Session('tarjetas_vacacional')[$i]->materia == 6)    
                            <div class="col" onclick="alertaingles();">
                                <input type="hidden" id="id_ingles" value="<?php print_r(Session('tarjetas_vacacional')[$i]->id); ?>">
                                <li class="nav-item" style="list-style: none;" onclick="vista_ingles();">
                                    <img src="{{asset('../img/6.png')}}" alt="" name="ingles" class="cardImg shadow p-3 mb-5 bg-white rounded">
                                </li>
                            </div>
                        @endif
                        @if (Session('tarjetas_vacacional')[$i]->materia == 7)    
                            <div class="col" onclick="alertalectura();">
                                <input type="hidden" id="id_lectura" value="<?php print_r(Session('tarjetas_vacacional')[$i]->id); ?>">
                                <li class="nav-item" style="list-style: none;" onclick="vista_lectura();">
                                    <img src="{{asset('../img/7.png')}}" alt="" name="lectura" class="cardImg shadow p-3 mb-5 bg-white rounded">
                                </li>
                                <a href="{{url('/lectura')}}">
                                </a>
                            </div>
                        @endif
                    @endfor
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        capturarvaluetarjetas();
    });
    function alertrabiologia() {
        let valor_div = $("#id_tarjeta").val();
        $("#asignatura_h").val(valor_div);
    }

    function alertaquimica() {
        let valor_quimica = $("#id_quimica").val();
        $("#asignatura_h").val(valor_quimica);
    }

    function alertafisica() {
        let valor_fisica = $("#id_fisica").val();
        $("#asignatura_h").val(valor_fisica);
    }

    function alertasociales() {
        let valor_sociales = $("#id_sociales").val();
        $("#asignatura_h").val(valor_sociales);
    }

    function alertamatematicas() {
        let valor_matematicas = $("#id_matematicas").val();
        $("#asignatura_h").val(valor_matematicas);
    }

    function alertaingles() {
        let valor_ingles = $("#id_ingles").val();
        $("#asignatura_h").val(valor_ingles);
    }

    function alertalectura() {
        let valor_lectura = $("#id_lectura").val();
        $("#asignatura_h").val(valor_lectura);
    }

    function vista_biologia() {
        $("#biologia").click();
    }
    function vista_quimica() {
        $("#quimica").click();
    }
    function vista_fisica() {
        $("#fisica").click();
    }
    function vista_sociales() {
        $("#sociales").click();
    }
    function vista_matematicas() {
        $("#matematicas").click();
    }
    function vista_ingles() {
        $("#ingles").click();
    }
    function vista_lectura() {
        $("#lectura").click();
    }

    function capturarvaluetarjetas() {
        $("#targeta_1").val($("#id_tarjeta").val());
        $("#targeta_2").val($("#id_fisica").val());
        $("#targeta_3").val($("#id_quimica").val());
        $("#targeta_4").val($("#id_sociales").val());
        $("#targeta_5").val($("#id_matematicas").val());
        $("#targeta_6").val($("#id_ingles").val());
        $("#targeta_7").val($("#id_lectura").val());
    }
</script>