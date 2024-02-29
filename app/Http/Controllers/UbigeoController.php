<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\UbigeoService;

class UbigeoController extends Controller
{
    use ApiResponser;
    public $UbigeoService;
    
    public function __construct(UbigeoService $UbigeoService)
    {
        $this->UbigeoService = $UbigeoService;
    }

    public function ubigeoSearch($term)
    {
       return $this->successResponse($this->UbigeoService->buscarUbigeo($term));
    }

}
