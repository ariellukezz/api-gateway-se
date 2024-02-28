<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\ReporteService;

class ReporteController extends Controller
{
    use ApiResponser;
    public $reporteService;
    
    public function __construct(ReporteService $reporteService)
    {
        $this->ReporteService = $reporteService;
    }

    public function getSolicitud($con, $pro, $pos)
    {
        return $this->successResponse($this->ReporteService->descargarSoliciud($con, $pro, $pos));
    }

}
