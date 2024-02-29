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
    public function buscarUbigeo($term) {
        try {
            $response = $this->performRequest('GET', 'search-ubigeo/'.$term);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
