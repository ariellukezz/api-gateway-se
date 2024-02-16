<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class PostulanteService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.postulantes.base_uri');
    }

    public function obtenerPostulantes(){
        return $this->performRequest('GET', 'v1/postulants/');    
    }

    public function crearPostulante($body) {
        try {
            $response = $this->performRequest('POST', 'v1/postulants/', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
