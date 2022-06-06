<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class Slack
{
    static public function postMessage(string $channel, string $title, string $body)
    {
        $client = new Client();
        $url = "https://slack.com/api/chat.postMessage";

        // $msg = json_encode([
        $msg = [
            "channel" => $channel,
            "blocks" => [
                [ "type" => "header", "text" => [ "type" => "plain_text", "text" => $title ]], 
                [ "type" => "divider" ],
                [ "type" => "section", "text" => [ "type" => "mrkdwn", "text" => $body ]],
            ]
        ];

        $options = [
            'headers' => [
                'Content-type' => "application/json",
                'Authorization' => "Bearer ". config('slack.token'),
            ],
            'json' => $msg
        ];

        $res = $client->request('POST', $url, $options);
        
        return true;
    }

}