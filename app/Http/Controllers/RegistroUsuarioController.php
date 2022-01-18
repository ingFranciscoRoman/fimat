<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Session;

class RegistroUsuarioController extends Controller
{
    public function RegistrarUsuario()
    {
        return view("autenticacion.registro");
    }

    public function GuardarRegistro(Request $request)
    {
        $id = $request->input('id_estudiante');
        $name = $request->input('name');
        $apellido = $request->input('apellidos');
        $identificacion = $request->input('identificacion');
        $email = $request->input('email');
        $direccion = $request->input('direccion');
        $curso = $request->input('curso');
        $vacacional = $request->input('curso_vacacional');
        $piloto = $request->input('curso_piloto');
        $password = $request->input('password');
        $telefono = $request->input('telefono');
        $tipoUsuario = $request->input('tipoUsuario');
        $status = $request->input('status');
        $email_verified_at = '2021-02-22 02:39:28';
        $two_factor_secret = "";
        $two_factor_recovery_codes = "";
        
        $respuesta = Http::post(env('APP_URL') . '/api/registroUsuarios', [
            'id' => $id,
            'name' => $name,
            'apellidos' => $apellido,
            'identificacion' => $identificacion,
            'email' => $email,
            'direccion' => $direccion,
            'curso' => $curso,
            'vacacional' => $vacacional,
            'piloto' => $piloto,
            'password' => $password,
            'email_verified_at' => $email_verified_at,
            'two_factor_secret' => $two_factor_secret,
            'two_factor_recovery_codes' => $two_factor_recovery_codes,
            'telefono' => $telefono,
            'tipoUsuario' => $tipoUsuario,
            'status' => $status
        ]);

        $obj = json_decode($respuesta->getBody());

        // return response()->json(array($obj));
        if ($obj->status == "true") {
            return response()->json(array("status" => "true", "mensaje" => "Usuario registrado exitosamente!!", "datosEstudiante" => $obj));
        } else {
            return response()->json(array("status" => "false", "mensaje" => "Error al cargar los datos"));
        }
    }

    public function Guardado_cursos(Request $request)
    {
        $nombre_curso = $request->input('cursos');
        $descripcion = $request->input('descripcion_curso');
        $link_cursos = $request->input('link_cursos'); 
        $link_simulacro = $request->input('link_simulacro');
        $tpcurso = $request->input('tpcurso');

        $respuestaCurso = Http::post(env('APP_URL') . '/api/registroCursos', [
            'nombreCurso' => $nombre_curso,
            'descripcion' => $descripcion,
            'link' => $link_cursos,
            'link_simulacro' => $link_simulacro,
            'tpcurso' => $tpcurso
        ]);

        $obj = json_decode($respuestaCurso->getBody());
        // return response()->json(array($obj));
        if ($obj->status == "true") {
            return response()->json(array("status" => "true", "mensaje" => "Usuario registrado exitosamente!!"));
        } else {
            return response()->json(array("status" => "false", "mensaje" => "Error al cargar los datos"));
        }
    }

    public function Guardar_asignaturas(Request $request)
    {
        $nombre_asignaturas = $request->input('asignatura');
        $descripcion = $request->input('descripcion_asignatura');
        $pertenece_curso = $request->input('pertenece_curso');
        $materia = $request->input('materias');
        $respuestaAsignatura =  Http::post(env('APP_URL') . '/api/registroAsignaturas', [
            'nombreAsignatura' => $nombre_asignaturas,
            'descripcion' => $descripcion,
            'pertenece_curso' => $pertenece_curso,
            'materia' => $materia
        ]);

        $objAsignatura = json_decode($respuestaAsignatura->getBody());

        // return response()->json(array($objAsignatura));

        if ($objAsignatura->status == "true") {
            return response()->json(array("status" => "true", "mensaje" => "Asignatura registrado exitosamente!!"));
        } else {
            return response()->json(array("status" => "false", "mensaje" => "Error al guardar los datos"));
        }
    }
}
