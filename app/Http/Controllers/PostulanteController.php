<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\PostulanteService;

class PostulanteController extends Controller
{
    use ApiResponser;
    public $PostulanteService;
    
    public function __construct(PostulanteService $PostulanteService)
    {
        $this->PostulanteService = $PostulanteService;
    }

    public function index()
    {   
        return $this->successResponse($this->PostulanteService->obtenerPostulantes());
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        return $this->successResponse($this->PostulanteService->crearPostulante($request));
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }


}