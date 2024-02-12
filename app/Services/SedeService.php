<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class SedeService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.sedes.base_uri');
    }

    public function obtenerSedes(){
        return $this->performRequest('GET', 'mostrar_todos_sede');    
    }

    public function crearSede($body) {
        try {
            $response = $this->performRequest('POST', 'crear_sede', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrarSede($id) {
        try {
            $response = $this->performRequest('get', 'mostrar_un_sede', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizarSede($body, $id) {
        try {
            $response = $this->performRequest('patch', 'actualizar_sede', $body, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminarSede($id) {
        try {
            $response = $this->performRequest('delete', 'eliminar_un_sede', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
