<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\PagoService;

class PagoController extends Controller
{
    use ApiResponser;
    public $PagoService;
    
    public function __construct(PagoService $PagoService)
    {
        $this->PagoService = $PagoService;
    }


    // public function index()
    // {
    //     return $this->successResponse($this->PagoService->obtenerSedes());
    // }

    // public function show($id)
    // {
    //     return $this->successResponse($this->PagoService->mostrarSede($id));
    // }

    public function store(Request $request)
    {
       return $this->successResponse($this->PagoService->crearPago($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->PagoService->actualizarPago($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->PagoService->eliminarSede($id));
    }


}
