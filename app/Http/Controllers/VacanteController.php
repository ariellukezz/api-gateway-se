<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\VacanteService;

class VacanteController extends Controller
{
    use ApiResponser;
    public $VacanteService;
    
    public function __construct(VacanteService $VacanteService)
    {
        $this->VacanteService = $VacanteService;
    }

    public function index()
    {
        return $this->successResponse($this->VacanteService->obtenerVacantes());
    }

    public function show($id)
    {
        return $this->successResponse($this->VacanteService->mostrarVacante($id));
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->VacanteService->crearVacante($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->VacanteService->actualizarVacante($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->VacanteService->eliminarVacante($id));
    }


}
