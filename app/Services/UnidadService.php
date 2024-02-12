<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class UnidadService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.unidades.base_uri');
    }

    public function obtenerUnidades(){
        return $this->performRequest('GET', 'get-unidades');    
    }

    public function crearUnidad($body) {
        try {
            $response = $this->performRequest('POST', 'save-unidad', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrarUnidad($id) {
        try {
            $response = $this->performRequest('get', 'get-unidad', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizarUnidad($body, $id) {
        try {
            $response = $this->performRequest('put', 'actualizar-unidad', $body, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminarUnidad($id) {
        try {
            $response = $this->performRequest('delete', 'eliminar-unidad', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
