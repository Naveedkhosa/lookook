<?php
define("WA_API", "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJidXNpbmVzcyI6eyJpZCI6MTE3OX0sImlhdCI6MTcwNTkyMzIwMiwiZXhwIjoxODkwOTIzMjAyfQ.nCr9-q8ryDONevDRg50YE_R2aaEenU3MgkDOj64TxNE");

function sendMessage($template_name, $whatsapp_numbers = array(), $body_parameters = null, $header_parameters = null)
{
    $post_data = array(
        'messages' => array()
    );
    $variables = array();
    if ($body_parameters != null) {

        $body_variables = array(
            "type" => "body",
            "parameters" => $body_parameters,
        );
        array_push($variables,$body_variables);
    }
    
    if ($header_parameters != null) {
        $header_variables = array(
            "type" => "body",
            "parameters" => $header_parameters,
        );
        array_push($variables,$header_variables);
    }

    foreach ($whatsapp_numbers as $key => $wa_number) {
        $message_data =  array(
            'clientWaNumber' => $wa_number,
            'templateName' => $template_name,
            'languageCode' => 'en',
            'variables' => $variables,
            'messageType' => 'template'
        );
        array_push($post_data['messages'], $message_data);
    }

     $post_data = json_encode($post_data);
    //  echo $post_data;
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, "https://whatsapp-api.superfone.co.in/v1/messages/send");
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
             "Authorization:Bearer ".WA_API,
             "Content-Type:application/json",
         ));
         curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
         $response = curl_exec($ch);
         curl_close($ch);
         echo $response;
}



$whatsapp_numbers = ["923361226935"];
$body_parameters = array(
    array(
        "type" => "text",
        "text" => "2402071",
    ),
    array(
        "type" => "text",
        "text" => "08/02/24",
    ),
    array(
        "type" => "text",
        "text" => "https://www.lookmycook.com/",
    )
);
// sendMessage("waiter_payment_complete", $whatsapp_numbers, $body_parameters);
// sendMessage("waiter_payment_complete", $whatsapp_numbers, $body_parameters);
