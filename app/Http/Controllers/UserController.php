<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class UserController extends Controller
{
    
    //Petición y codificación URL
    public function getJson (Request $request){
        
        /*
            ===Construción del Nonce y declaración de Variables para el Trankey====
        */
        if (function_exists("random_bytes")) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand(0, mt_getrandmax());
        }

        /*
            ===Fin====
        */


        $nonceBase64 = base64_encode($nonce);
        $secretKey = "024h1IlD";
        $seed = date("c");
        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));
        
    
        $request = array(
            "auth" => array(
                        "login" => "6dd490faf9cb87a9862245da41170ff2",
                        "seed" => $seed,
                        "nonce" => $nonceBase64,
                        "tranKey" => $tranKey
                    ),
            "buyer" => array(
                    "document" => "1040046087",
                    "documentType" => "CC",
                    "name" => "Pablo Andrés",
                    "surname" => "Muñoz Osorio",
                    "email" => "paban@correoejemplo.com",
                    "address" => array(
                        "street" => "Calle 20 # 6 -63",
                        "city" => "Medellin",
                        "country" => "Colombia"
                    ),
            ),
            
            "payment" => array(
                "reference" => "5976030f5575d",
                "description" => "Pago básico de prueba",
                "amount" => 
                        array(
                            "currency" => "COP",
                            "total" => "10000"
                        ),
                "allowPartial" => false
                ),
            "expiration" => date("c", strtotime("+1 hour")),
            "returnUrl" => "https://dev.placetopay.com/redirection/sandbox/session/5976030f5575d",
            "ipAddress" =>"127.0.0.1",
            "userAgent" => "PlacetoPay Sandbox"    
        );

           //dd($request);
            /*
                * Conexión por cURL
                * ¡Códico sin fines comerciales!            
            */
            $link = "https://test.placetopay.com/redirection/api/session";
            $ch = curl_init($link);
            $datos_json = json_encode($request);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $datos_json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "User-Agent: cUrl Testing"));
           
            $result = curl_exec($ch);
            $response = json_decode($result, true);
            $idRequest = $response['requestId'];
           
            $processUrl = $response['processUrl'];
            //dd($processUrl);
            //dd($idRequest);
            return view("usuarios")->with("processUrl", $processUrl);
    }
        
}




