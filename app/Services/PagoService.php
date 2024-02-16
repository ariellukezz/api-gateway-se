<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class PagoService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.pagos.base_uri');
    }

    // public function obtenerSedes(){
    //     return $this->performRequest('GET', 'mostrar_todos_sede');    
    // }

    public function crearPago($body) {
        try {
            $response = $this->performRequest('POST', 'pagos', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // public function mostrarSede($id) {
    //     try {
    //         $response = $this->performRequest('get', 'mostrar_un_sede', null, $id);
    //         return $response;
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function actualizarPago($body, $id) {
        try {
            $response = $this->performRequest('patch', 'pagos', $body, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // public function eliminarSede($id) {
    //     try {
    //         $response = $this->performRequest('delete', 'eliminar_un_sede', null, $id);
    //         return $response;
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }


}
