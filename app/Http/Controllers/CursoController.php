<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends BaseController
{
    public function index()
    {
      $cursos = Curso::all();
      return response($cursos, 200);
    }

    public function crearCurso(Request $request)
    {
      $cursos = new Curso;
      $cursos->nombre = $request->nombre;
      $cursos->paralelo = $request->paralelo;
      $cursos->save();
      return response()->json([
        "message" => "Curso creado"
    ], 201);
    }

    public function EliminarCurso(Request $request,$id)
    {
        if (Curso::where('id', $id)->exists()) {
            $cursos = Curso::find($id);

            $cursos->delete();
            return response()->json([
                "message" => "Curso eliminado"
            ], 202);
            } else {
            return response()->json([
                "message" => "Curso no encontrado"
            ], 404);
            
        }
    }
}
