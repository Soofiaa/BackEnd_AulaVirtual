<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends BaseController
{
  public function index()
  {
    $roles = Rol::all();
    return response($roles, 200);

  }

    public function crearRol(Request $request)
    {
      $roles = new Rol;
      $roles->nombre = $request->nombre;
      $roles->save();
      return response()->json([
        "message" => "Rol creado"
      ], 201);
    }
}