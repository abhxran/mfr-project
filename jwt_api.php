<?php

    $signing_key = "795fe762-52de-46da-9065-f35318ed33fe";
    $header = [ 
        "alg" => "RS256", 
        "typ" => "JWT" 
    ];
    $header = json_encode($header);

$payload = json_encode([
   'iss'   => 'http://tools.mindforceresearch.com',
   'aud'   => 'http://dpdp.tools.mindforceresearch.com',
   'email'   => 'compliance@mindforceresearch.com',
   'exp'   => 1735669799,
]);

$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

$data = $base64UrlHeader . "." . $base64UrlPayload;

    //$base64UrlHeader = $this->base64UrlEncode($header);
    //$base64UrlPayload = $this->base64UrlEncode($payload);
    $base64UrlSignature = base64_encode(hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $signing_key, true));
    $base64UrlSignature = strtr($base64UrlSignature , '+/', '-_');
    $base64UrlSignature = rtrim($base64UrlSignature , '=');


   // $base64UrlSignature = $this->base64UrlEncode($base64UrlSignature);
    $token =  $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;


function token(){

 $token =  $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;

}


function base64UrlEncode($data)
{
    $base64 = base64_encode($data);
    $base64Url = strtr($base64, '+/', '-_');
    return rtrim($base64Url, '=');
}




?>