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
                $pdfContent = $response->body();
                
                // Devolver el PDF como descarga en el navegador
                return response($pdfContent)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="solicitud.pdf"');
            } else {
                // Manejar el caso en que la respuesta no es exitosa
                return response('Error al obtener el PDF', $response->status());
            }
        } catch (RequestException $e) {
            // Manejar errores de solicitud HTTP
            return response('Error al obtener el PDF: ' . $e->getMessage());
        }

    }

}
