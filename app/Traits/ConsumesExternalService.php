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

            if (!is_null($body)) {  
                $response = Http::$method($url, $body);
                
            } else {
                $response = Http::$method($url);
            }
            
            
            return $response->json();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}

