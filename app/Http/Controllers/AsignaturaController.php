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

    public function crearAsignatura(Request $request)
    {
      $asignaturas = new Asignatura;
      $asignaturas->nombre = $request->nombre;
      $asignaturas->nombre_profesor = $request->nombre_profesor;
      $asignaturas->apellido_profesor = $request->apellido_profesor;
      $asignaturas->save();
      return response()->json([
        "message" => "Asignatura creada"
    ], 201);
    }

    public function modificarAsignatura(Request $request,$id)
    {
        if (Asignatura::where('id', $id)->exists()) {
            $asignatura = Asignatura::find($id);
            $asignatura->nombre = is_null($request->nombre) ? $student->nombre : $request->nombre;
            $asignatura->nombre_profesor = is_null($request->nombre_profesor) ? $asignatura->nombre_profesor : $request->nombre_profesor;
            $asignatura->apellido_profesor = is_null($request->apellido_profesor) ? $asignatura->apellido_profesor : $request->apellido_profesor;
            $asignatura->save();
    
            return response()->json([
                "message" => "Asignatura actualizada"
            ], 200);
            } else {
            return response()->json([
                "message" => "Asignatura no encontrada"
            ], 404);
            
        }
    }

    public function eliminarAsignatura(Request $request,$id)
    {
        if (Asignatura::where('id', $id)->exists()) {
            $asignatura = Asignatura::find($id);

            $asignatura->delete();
            return response()->json([
                "message" => "Asignatura eliminada"
            ], 202);
            } else {
            return response()->json([
                "message" => "Asignatura no encontrada"
            ], 404);
            
        }
    }
}
