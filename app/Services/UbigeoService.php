<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class UbigeoService {

    public $baseUri;
    use ConsumesExternalService;

    public function __construct()
    {
        $this->baseUri = config('services.ubigeos.base_uri');
    }
    public function buscarUbigeo($body) {
        try {
            $response = $this->performRequest('POST', 'get-ubigeos', $body);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
