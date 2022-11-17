<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends BaseController
{
    public function index()
    {
      $personas = Persoba::all();
      return response($personas, 200);
    }

    public function crearPersona(Request $request)
    {
      $personas = new Persona;
      $personas->rut = $request->rut;
      $personas->id_rol = $request->id_rol;
      $personas->nombre = $request->nombre;
      $personas->apellido = $request->apellido;
      $personas->email = $request->email;
      $personas->nombre_curso = $request->nombre_curso;
      $personas->save();
      return response()->json([
        "message" => "record created"
    ], 201);

    }

    public function modificarPersona(Request $request,$id)
    {
        if (Persona::where('rut', $id)->exists()) {
            $personas = Persona::find($id);
            $personas->id_rol = is_null($request->id_rol) ? $personas->id_rol : $request->id_rol;
            $personas->email = is_null($request->email) ? $personas->email : $request->email;
            $personas->nombre_curso = is_null($request->nombre_curso) ? $personas->nombre_curso : $request->nombre_curso;
            $personas->save();
    
            return response()->json([
                "message" => "Usuario actualizado"
            ], 200);
            } else {
            return response()->json([
                "message" => "Usuario no encontrado"
            ], 404);
            
        }
    }
}
