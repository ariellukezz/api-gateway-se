<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\EntrevistaService;

class UnidadController extends Controller
{
    use ApiResponser;
    public $entrevistaService;
    
    public function __construct(EntrevistaService $entrevistaService)
    {
        $this->entrevistaService = $entrevistaService;
    }

    public function index()
    {
        return $this->successResponse($this->entrevistaService->obtenerUnidades());
    }
    
    public function show($id)
    {
        return $this->successResponse($this->entrevistaService->mostrarUnidad($id));
    }

    public function store(Request $request)
    {
       return $this->successResponse($this->entrevistaService->crearUnidad($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->entrevistaService->actualizarUnidad($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->entrevistaService->eliminarUnidad($id));
    }
    

}
