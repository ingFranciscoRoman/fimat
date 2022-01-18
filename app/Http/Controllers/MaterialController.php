<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class MaterialController extends Controller
{
    public function AgregarMaterial(Request $request)
    {
        $nombreMaterial = $request->input('nombre_material');
        $AsignaturaMaterial = $request->input('asignatura_material');
        $LinkMaterial = $request->input('link_material');
        $tipomaterial = $request->input('tipo_documento');

        $respuesta = Http::post(env('APP_URL') . '/api/registroMaterial', [
            'nombre' => $nombreMaterial,
            'asignatura' => $AsignaturaMaterial,
            'link' => $LinkMaterial,
            'tipomaterial' => $tipomaterial
        ]);

        $obj = json_decode($respuesta->getBody());
        // return response()->json(array($obj));
        if ($obj->status == "true") {
            return response()->json(array("status" => "true", "mensaje" => "Se ha cargado un nuevo material :)"));
        } else {
            return response()->json(array("status" => "false", "mensaje" => "Error al cargar los datos"));
        }
    }

    public function ConsultarMaterial(Request $request)
    {
        $asignatura = $request->input('id_asignatura');

        $response = Http::get(env('APP_URL') . '/api/infoMaterial', [
            'asignatura' => $asignatura
        ]);

        $obj = json_decode($response->getBody());
        // return response()->json(array($obj));
        // return response()->json(array($obj->data_solicitud[0]->Material_Consultados));
        //000598 $request->input("codigo_empresa_old")
        if ($obj->status == "true") {
            return response()->json(array("status" => "true", "documentos" => $obj->data_solicitud[0]->Material_Consultados));
        }else{
            return response()->json(array("status" => "false", "mensaje" => "No tiene datos que cargar"));
        }
    }

    public function ConsultarEstudiante(Request $request)
    {
        $email = $request->input('email_estudiante');

        $respuesta = Http::get(env('APP_URL') . '/api/infoEstudiantePerfil', [
            'email' => $email
        ]);

        $obj = json_decode($respuesta->getBody());

        if ($obj->status == "true") {
            return response()->json(array("status" => "true", "documentos" => $obj));
        }else{
            return response()->json(array("status" => "false", "error" => "Estudiante no encontrado."));
        }
    }
}
