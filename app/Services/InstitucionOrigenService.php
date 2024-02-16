<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class InstitucionOrigenService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.institucionorigen.base_uri');
    }

    public function obtenerInstitucionesOrigen(){
        return $this->performRequest('GET', 'institucionorigens');    
    }

    public function crearInstitucionOrigen($body) {
        try {
            $response = $this->performRequest('POST', 'institucionorigens/', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrarInstitucionOrigen($id) {
        try {
            $response = $this->performRequest('get', 'institucionorigens', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizarInstitucionOrigen($body, $id) {
        try {
            $response = $this->performRequest('patch', 'institucionorigens', $body, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminarInstitucionOrigen($id) {
        try {
            $response = $this->performRequest('delete', 'institucionorigens', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}