<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\DocumentoService;

class DocumentoController extends Controller
{
    use ApiResponser;
    public $documentoService;
    
    public function __construct(DocumentoService $documentoService)
    {
        $this->DocumentoService = $documentoService;
    }

    public function index(Request $request)
    {
        return $this->successResponse($this->DocumentoService->obtenerDocumentos($request));
    }

    public function documentsPreinscripcion (Request $request)
    {
        return $this->successResponse($this->DocumentoService->documentsPreinscripcion($request));
    }
    
    // public function show($id)
    // {
    //     return $this->successResponse($this->DocumentoService->mostrarUnidad($id));
    // }

    // public function store(Request $request)
    // {
    //    return $this->successResponse($this->DocumentoService->crearTipoDocumento($request));
    // }

    // public function update(Request $request, $id)
    // {
    //     return $this->successResponse($this->DocumentoService->actualizarTipoDocumento($request, $id));
    // }

    // public function destroy($id)
    // {
    //     return $this->successResponse($this->DocumentoService->eliminarTipoDocumento($id));
    // }
        

}
