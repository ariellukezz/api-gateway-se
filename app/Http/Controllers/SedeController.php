<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\SedeService;

class SedeController extends Controller
{
    use ApiResponser;
    public $sedeService;
    
    public function __construct(SedeService $sedeService)
    {
        $this->SedeService = $sedeService;
    }


    public function index(Request $request)
    {
        return $this->successResponse($this->SedeService->obtenerSedes($request));
    }

    public function show($id)
    {
        return $this->successResponse($this->SedeService->mostrarSede($id));
    }

    public function store(Request $request)
    {
       return $this->successResponse($this->SedeService->crearSede($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->SedeService->actualizarSede($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->SedeService->eliminarSede($id));
    }


}
