<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'crearusuario', 
        'modificarusuario/*',
        'eliminarusuario/*',
        'crearpersona/',
        'modificarpersona/*',
        'crearasignatura',
        'modificarasignatura/*',
        'eliminarasignatura/*',
        'crearcurso',
        'eliminarcurso/*',
        'crearpersona_asignatura',
        'modificarpersona_asignatura/*',
        'crearrol'
    ];
}
