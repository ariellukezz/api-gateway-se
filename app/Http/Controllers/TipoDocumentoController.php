<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\TipoDocumentoService;

class TipoDocumentoController extends Controller
{
    use ApiResponser;
    public $tipoDocumentoService;
    
    public function __construct(TipoDocumentoService $tipoDocumentoService)
    {
        $this->tipoDocumentoService = $tipoDocumentoService;
    }

    public function index(Request $request)
    {
        return $this->successResponse($this->tipoDocumentoService->obtenerTiposDocumento($request));
    }
    
    // public function show($id)
    // {
    //     return $this->successResponse($this->tipoDocumentoService->mostrarUnidad($id));
    // }

    public function store(Request $request)
    {
       return $this->successResponse($this->tipoDocumentoService->crearTipoDocumento($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->tipoDocumentoService->actualizarTipoDocumento($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->tipoDocumentoService->eliminarTipoDocumento($id));
    }
    

}
