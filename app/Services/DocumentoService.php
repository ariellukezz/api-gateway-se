<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class TipoDocumentoService {

    public $baseUri;
    // public $secret;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.documento.base_uri');
        // $this->secret = config('services.unidades.secret');
    }

    public function obtenerDocumentos($body){
        try {
            $response = $this->performRequest('POST', 'documents');
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function documentsPreinscripcion($body){
        try {
            $response = $this->performRequest('POST', 'documents/preinscription');
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



}