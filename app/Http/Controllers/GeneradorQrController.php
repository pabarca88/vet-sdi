<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class GeneradorQrController extends Controller
{
    static public function generar($valor = '')
    {
        //https://www.simplesoftware.io/#/docs-introduction

        if(empty($valor))
            $valor = env('APP_URL').'?tkx='.rand(1111,9999);

        // Usage	        Prefix	    Example
        // Website URL	    http://	    http://www.simplesoftware.io
        // Secured URL	    https://	https://www.simplesoftware.io
        // E-mail Address	mailto:	    support@simplesoftware.io
        // Phone Number	    tel:	    tel:555-555-5555


        //format('png')->(requiere imagick)
        return QrCode::size(150)->color(0, 0, 0)->backgroundColor(255, 255, 255 )->margin(1)->generate($valor);

        //Genera un QrCode con una imagen en el centro.
        // return QrCode::format('png')->merge('/public/images/logo.png', .3)->generate($valor);

    }
}
