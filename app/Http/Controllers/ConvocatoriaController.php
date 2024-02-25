<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\ConvocatoriaService;

class ConvocatoriaController extends Controller
{
    use ApiResponser;
    public $ConvocatoriaService;
    
    public function __construct(ConvocatoriaService $ConvocatoriaService)
    {
        $this->ConvocatoriaService = $ConvocatoriaService;
    }

    public function index()
    {
        return $this->successResponse($this->ConvocatoriaService->obtenerConvocatorias());
    }

    public function show($id)
    {
        return $this->successResponse($this->ConvocatoriaService->mostrarConvocatoria($id));
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->ConvocatoriaService->crearConvocatoria($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->ConvocatoriaService->actualizarConvocatoria($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->ConvocatoriaService->eliminarConvocatoria($id));
    }

    public function findByName($name)
    {
        return $this->successResponse($this->ConvocatoriaService->buscarConvocatoriaPorNombre($name));
    }


}
