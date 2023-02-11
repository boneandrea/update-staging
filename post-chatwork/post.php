<?php

//
// Post to chatwork when kicked
//
// Usage: $0 [message]

require_once __DIR__.'/vendor/autoload.php';

class PostCW
{
    public $room_id;
    public $api_token;

    public function __construct()
    {
        try {
            $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__)."/..");
            $dotenv->load();
            if(!$this->api_token=$_ENV["API_TOKEN"] ?? ""){
                throw new Exception("API_KEY is not set");
            }
        } catch(Exception $e) {
            echo $e->getMessage()."\n";
            echo "set ROOM_ID and API_TOKEN in .env. exit.\n";
            exit(1);
        }
    }

        public function postMessage(array $args): void
        {
            $body=$args[1] ?? "no message";
            if (isset($args[2])) {
                $this->room_id=$args[2];
            }
            $params =[
                'body' =>$body
            ];

            $options = [
                CURLOPT_URL => "https://api.chatwork.com/v2/rooms/{$this->room_id}/messages",
                CURLOPT_HTTPHEADER => ['X-ChatWorkToken: '. $this->api_token],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query($params, '', '&'),
            ];
            header("Content-type: text/html; charset=utf-8");
            $ch = curl_init();
            curl_setopt_array($ch, $options);
            $response = curl_exec($ch);
            curl_close($ch);
        }
}

(new PostCW())->postMessage($argv);
