<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class ConvocatoriaService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.convocatorias.base_uri');
    }

    public function obtenerConvocatorias($body){
        return $this->performRequest('POST', 'mostrar_todos_convocatoria',$body);    
    }

    public function crearConvocatoria($body) {
        try {
            $response = $this->performRequest('POST', 'crear_convocatoria/', $body);    
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrarConvocatoria($id) {
        try {
            $response = $this->performRequest('get', 'mostrar_un_convocatoria', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizarConvocatoria($body, $id) {
        try {
            $response = $this->performRequest('patch', 'actualizar_convocatoria', $body, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminarConvocatoria($id) {
        try {
            $response = $this->performRequest('delete', 'eliminar_un_convocatoria', null, $id);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function buscarConvocatoriaPorNombre($nombre){
        try {
            $response = $this->performRequest('get', 'buscar_convocatoria_por_nombre', null, $nombre);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}