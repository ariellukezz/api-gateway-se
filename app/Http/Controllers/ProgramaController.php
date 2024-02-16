<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\ProgramaService;

class ProgramaController extends Controller
{
    use ApiResponser;
    public $ProgramaService;
    
    public function __construct(ProgramaService $ProgramaService)
    {
        $this->ProgramaService = $ProgramaService;
    }

    public function index()
    {
        return $this->successResponse($this->ProgramaService->obtenerProgramas());
    }
    
    public function show($id)
    {
        return $this->successResponse($this->ProgramaService->mostrarPrograma($id));
    }

    public function store(Request $request)
    {
       return $this->successResponse($this->ProgramaService->crearPrograma($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->ProgramaService->actualizarPrograma($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->ProgramaService->eliminarPrograma($id));
    }
    

}
