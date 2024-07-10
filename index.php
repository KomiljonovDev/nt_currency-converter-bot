<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$token = "7408239461:AAFxgYyzneaEs3WUi340_AkrlBxZEy_ht6Y";
$tgApi = "https://api.telegram.org/bot$token/";

$client = new Client(['base_uri' => $tgApi]);

$currency = new Client(['base_uri'=>'https://cbu.uz/oz/arkhiv-kursov-valyut/json/']);

$update = json_decode(file_get_contents('php://input'));
var_dump($update);
if (isset($update)) {
    if (isset($update->message)) {
        $message = $update->message;
        $chat_id = $message->chat->id;
        $miid =$message->message_id;
        $name = $message->from->first_name;
        $fromid = $message->from->id;
        $text = $message->text;
        $photo = $message->photo ?? '';
        $video = $message->video ?? '';
        $audio = $message->audio ?? '';
        $voice = $message->voice ?? '';
        $reply = $message->reply_markup ?? '';


        $exp = explode('-',$text);

//        "12600-usd";
        'data: ["12600","usd"]'

        $client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chat_id,
                'text' => "data: " . json_encode($exp)
            ]
        ]);

//        $client->post('sendMessage', [
//            'form_params' => [
//                'chat_id' => $chat_id,
//                'text' => "update: " . json_encode($update)
//            ]
//        ]);
    }
}