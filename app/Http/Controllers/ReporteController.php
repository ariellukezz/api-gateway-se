<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\ReporteService;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ReporteController extends Controller
{
    use ApiResponser;
    public $reporteService;
    
    public function __construct(ReporteService $reporteService)
    {
        $this->ReporteService = $reporteService;
    }

    public function getSolicitud($con, $pro, $pos)
    {
        
        $url = 'http://servicio-reportes-se.test/api/pdf-solicitud/1-1-2';

        $nombreArchivoLocal = 'archivo_descargado.pdf';

        try {

            $contenido = file_get_contents($url);
            Storage::put($nombreArchivoLocal, $contenido);
            return response()->json(['message' => 'Archivo descargado correctamente', 'nombre_archivo' => $nombreArchivoLocal]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }


    }

}
