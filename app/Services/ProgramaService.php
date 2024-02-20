<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class ProgramaService {

    public $baseUri;
    public $secret;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.unidades.base_uri');
        $this->secret = config('services.unidades.secret');
    }

    public function obtenerProgramas(){
        return $this->performRequest('GET', 'get-programas');    
    }

    public function crearPrograma($body) {
        try {
            $response = $this->performRequest('POST', 'save-programa', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrarPrograma($id) {
        try {
            $response = $this->performRequest('get', 'get-programa', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizarPrograma($body, $id) {
        try {
            $response = $this->performRequest('put', 'actualizar-programa', $body, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminarPrograma($id) {
        try {
            $response = $this->performRequest('delete', 'eliminar-programa', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
