<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Asignatura;

class AsignaturaController extends BaseController
{
    public function index()
    {
      $asignaturas = Asignatura::all();
      return response($asignaturas, 200);
    }

    public function crearCurso(Request $request)
    {
      $asignaturas = new Curso;
      $asignaturas->id = $request->id;
      $asignaturas->nombre = $request->nombre;
      $asignaturas->nombre_profesor = $request->nombre_profesor;
      $asignaturas->save();
      return response()->json([
        "message" => "record created"
    ], 201);
    }
}
