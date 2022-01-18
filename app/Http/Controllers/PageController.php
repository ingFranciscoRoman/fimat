<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Home()
    {
        return view('layouts.app');
    }

    public function layout()
    {
        return view('home');
    }

    public function biologia()
    {
        return view('materias.biologia');
    }

    public function quimica()
    {
        return view("materias.quimica");
    }

    public function fisica()
    {
        return view("materias.fisica");
    }

    public function sociales()
    {
        return view("materias.sociales");
    }

    public function matematicas()
    {
        return view("materias.matematicas");
    }

    public function ingles()
    {
        return view("materias.ingles");
    }

    public function asignaturas()
    {
        return view("modulos.asignaturas");
    }

    public function cursos()
    {
        return view("modulos.cursos");
    }

    public function lectura()
    {
        return view("materias.lectura");
    }

    public function piloto()
    {
        return view("modulos.piloto");
    }

    public function vacacional(){
        return view("modulos.vacacional");
    }
}
