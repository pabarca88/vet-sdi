<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{

    /**
     * GENERAR PDF
     *
     * @param STRING $titulo
     * @param ARRAY $detalle
     * @param STRING $nombre
     * @param STRING $template
     * @return PFD VISTA
     */
    static function generarPDF($titulo, $detalle, $nombre, $template, $funcionalida = 'V')
    {

        ini_set('display_errors', '1');
        // return response($detalle)->header('Content-Type', 'application/json');
        $date = date('Y-m-d');
        $titulo = $titulo;
        $cuerpo = $detalle;
        $nombre_pdf = str_replace('/', '-', $nombre);

        $view =  View::make('PDF.'.$template, compact('date', 'titulo', 'cuerpo'))->render();
        // $view =  View::make('PDF.pdf_receta_medica', compact('date', 'titulo', 'cuerpo'))->render();


        $pdf = App::make('dompdf.wrapper');

        /** tamaño de pagina */
        // $customPaper = array(0,0,600,765);
        // $pdf->setPaper($customPaper);
        // $pdf->setPaper('A4', 'portrait');

        /** contraseña para editar documento */
        $permitted_chars = '0123456789=!abcdefghijklmnopqrstuvwxyz.$阿贝色德饿艾弗日阿什伊鸡卡艾勒艾马艾娜哦佩苦艾和艾丝特玉维独布勒维伊克斯伊格黑克贼德ABCDEFGHIJKLMNOPQRSTUVWXYZ&בגדהוזחטיכלמנסעפצקרשת';

        $tempPass = substr(str_shuffle($permitted_chars), 0, 150);
        $pdf->get_canvas()->get_cpdf()->setEncryption('',$tempPass,array( 'modify','add' ));


        $pdf->loadHTML(ob_get_clean());
        $pdf->loadHTML($view);
        $pdf->getDomPDF()->set_option('isRemoteEnabled', true);

        $pdf->render();

        switch ($funcionalida) {
            case 'V':
                return $pdf->stream($nombre_pdf.'.pdf', array("Attachment" => 0));
            break;
            case 'G': //GUARDAR
                $datos = array();
                /** DESAROLLO */
                // if($pdf->save('storage/pdf/' . $nombre_pdf . '.pdf'))
                /** PRODUCCION */
                if($pdf->save('public/storage/pdf/' . $nombre_pdf . '.pdf'))
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'pdf generado';
                    $datos['pdf'] = $nombre_pdf . '.pdf';
                    $datos['pdf_url'] = asset('storage/pdf/').'/'.$nombre_pdf . '.pdf';
                }
                else
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'error pdf';
                }
                return (object)$datos;
            break;
            case 'D': //DESCARGAR
                return $pdf->download($nombre_pdf.'.pdf');
            break;
        }
    }
}
