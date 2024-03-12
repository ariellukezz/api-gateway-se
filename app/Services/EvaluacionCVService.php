<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class EvaluacionCVService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.evaluacioncv.base_uri');
    }

    public function obtenerPostulantes($body) {
        try {
            $response = $this->performRequest('POST', 'get-postulantes-cv', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
