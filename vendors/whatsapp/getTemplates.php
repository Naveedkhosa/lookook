<?php

/**
 * https://whatsapp-api.superfone.co.in/v1/messages/send
 * template_name : welcome_message_
 * https://whatsapp-api.superfone.co.in/v1/templates
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




$api_key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJidXNpbmVzcyI6eyJpZCI6MTE3OX0sImlhdCI6MTcwNTkyMzIwMiwiZXhwIjoxODkwOTIzMjAyfQ.nCr9-q8ryDONevDRg50YE_R2aaEenU3MgkDOj64TxNE";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://whatsapp-api.superfone.co.in/v1/templates");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization:Bearer {$api_key}",
    "Content-Type:application/json",
));
$response = curl_exec($ch);
curl_close($ch);
echo $response;
