<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Persona_Asignatura;

class Persona_AsignaturaController extends BaseController
{
    public function index()
    {
      $personas_asignaturas = Usuario::all();
      return response($personas_asignaturas, 200);

    }

    public function crearPersona_Asignatura(Request $request)
    {
      $personas_asignaturas = new Persona_Asignatura;
      $personas_asignaturas->id_asignatura = $request->id_asignatura;
      $personas_asignaturas->rut_alumno = $request->rut_alumno;
      $personas_asignaturas->id_evaluacion = $request->id_evaluacion;
      $personas_asignaturas->nota = $request->nota;
      $personas_asignaturas->save();
      return response()->json([
        "message" => "record created"
    ], 201);

    }
}
