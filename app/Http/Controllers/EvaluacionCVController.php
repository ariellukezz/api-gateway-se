<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\DB;
use App\Services\EvaluacionCVService;

class EvaluacionCVController extends Controller
{
    use ApiResponser;
    public $evaluacioncvService;
    
    public function __construct(EvaluacionCVService $evaluacionCVService)
    {
        $this->evaluacioncvService = $evaluacionCVService;
    }

    public function getPostulantes(Request $request)
    {
        $programas = DB::table('programa_usuario')->where('id_usuario', $request->user()->id)
                    ->pluck('id_programa')
                    ->toArray();
        $convocatorias = DB::table('convocatoria_usuario')->where('id_usuario', $request->user()->id)
                    ->where('estado', 1)
                    ->pluck('id_convocatoria')
                    ->first();                    
        $request['programas'] = $programas;
        $request['convocatoria'] = $convocatorias;

        return $this->successResponse($this->evaluacioncvService->obtenerPostulantes($request));
    }

}
