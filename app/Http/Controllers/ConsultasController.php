<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsultasController extends Controller
{
    public function cursos()
    {
        $respuesta = Http::get(env('APP_URL') . '/api/infoAsignaturas', [
        ]);
        $obj = json_decode($respuesta->getBody());
        $data_solicitud_array = array();

        for ($i=0; $i < count($obj->data_solicitud); $i++) {
            $data_solicitud_array[] = array("value" => $obj->data_solicitud[$i]->Asignaturas_consutlados);
            return $data_solicitud_array;
        }
    }

    public function consultar_curso()
    {
        $respuesta = Http::get(env('APP_URL') . '/api/infoCursos', [
        ]);
        $obj = json_decode($respuesta->getBody());
        // return response()->json(array($obj->data_solicitud));
        $cursos_array = array();
        for ($i=0; $i < count($obj->data_solicitud); $i++) { 
            $cursos_array[] = array("value" => $obj->data_solicitud[$i]->Cursos_registrados);
            return $cursos_array;
        }
    }
    
    public function consultar_cursovaca()
    {
        $respuesta = Http::get(env('APP_URL') . '/api/infoCursosvaca', [
        ]);
        $obj = json_decode($respuesta->getBody());
        //return response()->json(array($obj->data_solicitud));
        $cursos_array = array();
        for ($i=0; $i < count($obj->data_solicitud); $i++) { 
            $cursos_array[] = array("value" => $obj->data_solicitud[$i]->Cursos_registrados);
            return $cursos_array;
        }
    }
    
    public function consultar_cursopiloto()
    {
        $respuesta = Http::get(env('APP_URL') . '/api/infoCursospilo', [
        ]);
        $obj = json_decode($respuesta->getBody());
        //return response()->json(array($obj->data_solicitud));
        $cursos_array = array();
        for ($i=0; $i < count($obj->data_solicitud); $i++) { 
            $cursos_array[] = array("value" => $obj->data_solicitud[$i]->Cursos_registrados);
            return $cursos_array;
        }
    }
}
