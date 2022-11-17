<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends BaseController
{
    public function index()
    {
      $usuarios = Usuario::all();
      return response($usuarios, 200);

    }

    public function crearUsuario(Request $request)
    {
      $usuarios = new Usuario;
      $usuarios->email = $request->email;
      $usuarios->password = $request->password;
      $usuarios->save();
      return response()->json([
        "message" => "Usuario creado"
    ], 201);

    }

    public function modificarUsuario(Request $request,$id)
    {
        if (Usuario::where('id', $id)->exists()) {
            $usuario = Usuario::find($id);
            $usuario->email = is_null($request->email) ? $student->email : $request->email;
            $usuario->password = is_null($request->password) ? $usuario->password : $request->password;
            $usuario->save();
    
            return response()->json([
                "message" => "Usuario actualizado"
            ], 200);
            } else {
            return response()->json([
                "message" => "Usuario no encontrado"
            ], 404);
            
        }
    }

    public function EliminarUsuario(Request $request,$id)
    {
        if (Usuario::where('id', $id)->exists()) {
            $usuario = Usuario::find($id);

            $usuario->delete();
            return response()->json([
                "message" => "Usuario eliminado"
            ], 202);
            } else {
            return response()->json([
                "message" => "Usuario no encontrado"
            ], 404);
            
        }
    }
}