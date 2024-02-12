<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\services\UnidadService;

class UnidadController extends Controller
{
    use ApiResponser;
    public $unidadService;
    
    public function __construct(UnidadService $unidadService)
    {
        $this->unidadService = $unidadService;
    }

    public function index()
    {
        return $this->successResponse($this->unidadService->obtenerUnidades());
    }
    
    public function show($id)
    {
        return $this->successResponse($this->unidadService->mostrarUnidad($id));
    }

    public function store(Request $request)
    {
       return $this->successResponse($this->unidadService->crearUnidad($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->unidadService->actualizarUnidad($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->unidadService->eliminarUnidad($id));
    }
    

}
