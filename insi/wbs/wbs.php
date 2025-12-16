<?php
error_reporting(0);
session_start();
header('Content-Type: application/json');
include_once('config.php');
//var_dump($_REQUEST);

if($_SERVER['REQUEST_METHOD']=="GET")
{
    $data_send = @http_build_query($_REQUEST['data'], '', '&');
    $url_api = URL_API.$_REQUEST['modulo'].'/'.$_REQUEST['metodo'].'?'.$data_send;
}
else
{
    $url_api = URL_API.$_REQUEST['modulo'].'/'.$_REQUEST['metodo'];
}



 //datos a enviar
if($_REQUEST['debug']==='true')
{
    echo 'Send data:';
    print_r($_REQUEST);
    echo 'URL API:';
    print_r($url_api);
    echo 'METHOD:';
    print_r($_SERVER['REQUEST_METHOD']);
}

 //url contra la que atacamos
 $ch = curl_init($url_api);
 //a true, obtendremos una respuesta de la url, en otro caso,
 //true si es correcto, false si no lo es
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //establecemos el verbo http que queremos utilizar para la petición
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_SERVER['REQUEST_METHOD']);
 //enviamos el array data CURLOPT_URL
 if($_SERVER['REQUEST_METHOD']=='POST')
	curl_setopt($ch, CURLOPT_POSTFIELDS,@http_build_query($_REQUEST['data'], '', '&'));
 //obtenemos la respuesta
 $response = curl_exec($ch);
 // Se cierra el recurso CURL y se liberan los recursos del sistema
 curl_close($ch);

 $datos_response = json_decode($response,true);
 
 // RESPONSE
 echo $response;
 //var_dump($response);
?>

