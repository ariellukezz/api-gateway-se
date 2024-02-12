<?php
namespace App\Traits;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
trait ConsumesExternalService
{
    public function performRequest($method, $requestUrl, $body = null, $id = null)
    {
        try {
            $url = $this->baseUri . $requestUrl;
            
            // Agregar el ID a la URL si está definido
            if (!is_null($id)) {
                $url .= '/' . $id;
            }
            
            // Enviar la solicitud con el método correcto y el cuerpo adecuado
            if (!is_null($body)) {
                $response = Http::$method($url, $body);
            } else {
                $response = Http::$method($url);
            }
    
            // Devolver la respuesta adecuada
            return $response->json(); // Suponiendo que deseas devolver la respuesta como JSON
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

