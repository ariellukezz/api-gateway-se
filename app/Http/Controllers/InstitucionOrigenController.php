<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\InstitucionOrigenService;

class InstitucionOrigenController extends Controller
{
    use ApiResponser;
    public $InstitucionOrigenService;
    
    public function __construct(InstitucionOrigenService $InstitucionOrigenService)
    {
        $this->InstitucionOrigenService = $InstitucionOrigenService;
    }

    public function index()
    {
        return $this->successResponse($this->InstitucionOrigenService->obtenerInstitucionesOrigen());
    }

    public function show($id)
    {
        return $this->successResponse($this->InstitucionOrigenService->mostrarInstitucionOrigen($id));
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->InstitucionOrigenService->crearInstitucionOrigen($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->InstitucionOrigenService->actualizarInstitucionOrigen($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->InstitucionOrigenService->eliminarInstitucionOrigen($id));
    }


}
