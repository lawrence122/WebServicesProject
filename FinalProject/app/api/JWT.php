<?php
namespace App\api;

class JWT {
    function encode($clientID, $licenseNumber, $licenseEndDate)
    {
        // Create token header as a JSON string
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

        // Create token payload as a JSON string
        $payload = json_encode(['clientID' => $clientID, 'exp' => $licenseEndDate]);

        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $licenseNumber, true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        // Create JWT
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

        // echo $jwt;
        return $jwt;
    }

    function decode($token)
    {
        if (!is_null($token) && preg_match('/^[\w-]*\.[\w-]*\.[\w-]*$/', $token)) {
            return json_decode(base64_decode((str_replace(['-', '_', ''], ['+', '/', '='], str_replace(['-', '_', ''], ['+', '/', '='], explode('.', $token)[1])))), true);
        } else {
            return null;
        }
    }
}
?>