<?php
namespace App\Traits;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
trait ConsumesExternalService
{

    public function performRequest($method, $requestUrl, $body = null, $id = null, $headers = [])
    {
        try {
            $url = $this->baseUri . $requestUrl;
            
            if (!is_null($id)) {
                $url .= '/' . $id;
            }
            
            if (isset($this->secret)) {
                $headers['Authorization'] = $this->secret;
            }

            if (!is_null($body)) {  
                $response = Http::$method($url, $body, $headers);
            } else {
                $response = Http::withHeaders($headers)->$method($url);
            }
            
            // Verificar si la solicitud fue exitosa (código de estado 200)
            if ($response->successful()) {
                // Devolver el contenido de la respuesta (puede ser JSON, archivo PDF, etc.)
                return $response->body();
            } else {
                // Manejar errores de solicitud no exitosa
                return 'Error: ' . $response->status();
            }
        } catch (\Exception $e) {
            // Manejar otras excepciones
            return $e->getMessage();
        }
    }

    // public function performRequest($method, $requestUrl, $body = null, $id = null, $headers = [])
    // {
    //     try {
    //         $url = $this->baseUri . $requestUrl;
            
    //         if (!is_null($id)) {
    //             $url .= '/' . $id;
    //         }
            
    //         if (isset($this->secret)) {
    //             $headers['Authorization'] = $this->secret;
    //         }

    //         if (!is_null($body)) {  
    //             $response = Http::$method($url, $body, $headers);
    //         } else {
    //             $response = Http::withHeaders($headers)->get($url);
    //         }
            
    //         return $response->json();
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }

    // }

}

