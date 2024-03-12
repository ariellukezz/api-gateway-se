<?php

namespace App\Http\Middleware;
use DB;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
         if ($request->user()) {
            $roles = DB::table('rol_usuario')
            ->where('id_usuario', $request->user()->id)
            ->pluck('id_rol')
            ->toArray();

            if (in_array(1, $roles)) {
                return $next($request);
            }
        }

        return abort(401, 'No autorizado.');
    }
    
}
