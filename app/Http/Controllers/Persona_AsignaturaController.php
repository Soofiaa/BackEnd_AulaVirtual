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
      $personas_asignaturas = Persona_Asignatura::all();
      return response($personas_asignaturas, 200);

    }

    public function crearPersona_Asignatura(Request $request)
    {
      $personas_asignaturas = new Persona_Asignatura;
      $personas_asignaturas->id_asignatura = $request->id_asignatura;
      $personas_asignaturas->id_curso = $request->id_curso;
      $personas_asignaturas->rut_alumno = $request->rut_alumno;
      $personas_asignaturas->id_evaluacion = $request->id_evaluacion;
      $personas_asignaturas->nota = $request->nota;
      $personas_asignaturas->save();
      return response()->json([
        "message" => "Ocurrencia Persona_Asignatura creada"
    ], 201);

    }

    public function modificarPersona_Asignatura(Request $request,$id)
    {
        if (Persona_Asignatura::where('id', $id)->exists()) {
          $personas_asignaturas = Persona_Asignatura::find($id);
          $personas_asignaturas->nota = is_null($request->nota) ? $personas_asignaturas->nota : $request->nota;
          $personas_asignaturas->save();
    
            return response()->json([
                "message" => "Ocurrencia 'Persona_Asignatura' actualizada"
            ], 200);
            } else {
            return response()->json([
                "message" => "Ocurrencia 'Persona_Asignatura' no encontrada"
            ], 404);
            
        }
    }

    public function eliminarPersona_Asignatura(Request $request,$id)
    {
        if (Persona_Asignatura::where('id', $id)->exists()) {
            $personas_asignaturas = Persona_Asignatura::find($id);

            $personas_asignaturas->delete();
            return response()->json([
                "message" => "Ocurrencia 'Persona_Asignatura' eliminada"
            ], 202);
            } else {
            return response()->json([
                "message" => "Ocurrencia 'Persona_Asignatura' no encontrada"
            ], 404);
            
        }
    }
}
