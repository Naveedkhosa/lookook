<?php

/**
 * https://whatsapp-api.superfone.co.in/v1/messages/send
 * template_name : welcome_message_
 *
 */

// {
//     "messages": [
//         {
//             "clientWaNumber": "917764800143",
//             "templateName": "start_conversation",
//             "languageCode": "en",
//             "variables": [],
//             "messageType": "template",
//             "refId": "uPFYyZJcKsQLNwDXyyYk2"
//         }
//     ]

$post_data = array (
    'messages' => 
    array (
      0 => 
      array (
        'clientWaNumber' => '917428939324',
        'templateName' => 'welcome_message_',
        'languageCode' => 'en',
        'variables' => 
        array (
        ),
        'messageType' => 'template'
      ),
    ),
);
$post_data = json_encode($post_data);



$api_key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJidXNpbmVzcyI6eyJpZCI6MTE3OX0sImlhdCI6MTcwNTkyMzIwMiwiZXhwIjoxODkwOTIzMjAyfQ.nCr9-q8ryDONevDRg50YE_R2aaEenU3MgkDOj64TxNE";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://whatsapp-api.superfone.co.in/v1/messages/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization:Bearer {$api_key}",
    "Content-Type:application/json",
));
curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
