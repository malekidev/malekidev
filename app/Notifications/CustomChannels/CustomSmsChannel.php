<?php
namespace App\Notifications\CustomChannels;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Notifications\Notification;

class CustomSmsChannel{

    /**
     * @throws GuzzleException
     */
    public function send(object $notifiable, Notification $notification){

        $data = $notification->toCustomSms($notifiable);
        $options = [
            'query' => array_merge([
                'apikey' => 'yWz9sWVC7id-z49BJg3tFr6bdg34uWMj0dOz9VdBWL8=',
                'fnum' => '3000505'
            ],$data)
        ];
        $client = new Client();
        $client->request('GET','http://ippanel.com:8080/',$options);

    }
}
