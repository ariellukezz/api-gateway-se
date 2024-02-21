<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class VacanteService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.vacantes.base_uri');
    }

    public function obtenerVacantes(){
        return $this->performRequest('post', 'vacantes');    
    }

    public function crearVacante($body) {
        try {
            $response = $this->performRequest('POST', 'vacantesstore/', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrarVacante($id) {
        try {
            $response = $this->performRequest('get', 'vacantes', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizarVacante($body, $id) {
        try {
            $response = $this->performRequest('patch', 'vacantes', $body, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminarVacante($id) {
        try {
            $response = $this->performRequest('delete', 'vacantes', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}