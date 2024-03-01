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

    public function descargarPDF($con, $pro, $pos)
    {
        try {
            $response = Http::get('http://174.138.178.198:8097/api/pdf-solicitud/'.$con.'-'.$pro.'-'.$pos);        

            if ($response->successful()) {
                // Obtener el contenido del PDF
                $pdfContent = $response->body();

                // Devolver el PDF como una respuesta de descarga
                return response()->streamDownload(function () use ($pdfContent) {
                    echo $pdfContent;
                }, 'solicitud.pdf');
            } else {
                return response('Error al obtener el PDF', $response->status());
            }
        } catch (RequestException $e) {
            // Capturar y mostrar detalles de la excepción
            return response('Error al obtener el PDF: ' . $e->getMessage());
        }
    }

}
