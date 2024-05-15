<?php

$token = "EAANOwut6ZBGgBADlvfl34ndEWVLNtxZAe9IAZBfKLLT9guuPgovPzxG17psQDSpvWtKIOIaVOJSQbGDkY2VRGfCrmHvHtxab0Gip4ZCftOMQPq44djoAUdDuOUajMtOnyeT8knM31yUHvt3ghmnQAPfySuNwOKFQ9S3BzUvZCaAhRRSdwZBEAqyaZClbddEFNKZC8XJSg3PXCAZDZD";
$telefono = "3124551226";
$url="https://graph.facebook.com/v17.0/101221206118463/messages";

$mensaje = ''
            .'"messaging_product":"whatsapp",'
            .'"to:":"'.$telefono.'",'
            .'"type":"template",'
            .'"template":'
            .'{'
            .' "name":"Hello Word",'
            .'"languaje":{ "code":"en_US"}'
            .'}'
            .'}';    

$header = array("Authorization: Bearer". $token,"Content-Type: application/json",);

$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_POSTFIELDS,$mensaje);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

$response = json_decode(curl_exec($curl),true);
print_r($response); 
curl_close($curl);







?>