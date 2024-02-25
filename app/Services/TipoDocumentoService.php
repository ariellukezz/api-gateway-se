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

    public function obtenerTiposDocumento($body){
        try {
            $response = $this->performRequest('POST', 'document-types');
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function crearTipoDocumento($body) {
        try {
            $response = $this->performRequest('POST', 'document-types/data', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // public function mostrarUnidad($id) {
    //     try {
    //         $response = $this->performRequest('get', 'get-unidad', null, $id);
    //         return $response;
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function actualizarTipoDocumento($body, $id) {
        try {
            $response = $this->performRequest('put', 'document-types', $body, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminarTipoDocumento($id) {
        try {
            $response = $this->performRequest('delete', 'document-types', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}