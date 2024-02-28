<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class ReporteService {

    public $baseUri;
    // public $secret;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.reportes.base_uri');
    }

    public function descargarSoliciud($con, $pro, $pos){
        
        try {
            $response = $this->performRequest('get', 'pdf-solicitud/'.$con.'-'.$pro.'-'.$pos);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}