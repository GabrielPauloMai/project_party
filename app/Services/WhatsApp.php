<?php

namespace App\Services;

use \Illuminate\Support\Facades\Http;
use DB;

class WhatsApp
{
    public $url = 'http://172.17.0.1:3000';
   public function whatsapp($number, $text)
    {


        $number = $this->formatPhone($number);

        $response = Http::withHeaders([
            'X-Api-Key' => 'h8eeNNrp7u4Z63e921b413af1',
            'Content-Type' => 'application/json'
        ])
            ->post("$this->url/api/sendText", [
                'chatId' => $number,
                "text" => $text,
                "session" => "default"
            ]);

        return $response;
    }


    public function formatPhone($phone)
    {
        $x = array('(', ')', '-', ' ');
        $phone = str_replace($x, '', $phone);

        if (strlen($phone) == 11) {
            $phone = substr_replace($phone, '', 2, 1);
            $phone = '55' . $phone . '@c.us';
            return $phone;
        } elseif (strlen($phone) == 10) {
            $phone = '55' . $phone . '@c.us';
            return $phone;
        } else {
            $text = $phone;

            Http::withHeaders([
                'X-Api-Key' => 'h8eeNNrp7u4Z63e921b413af1',
                'Content-Type' => 'application/json'
            ])
                ->post("$this->url/api/sendText", [
                    'chatId' => '554792627617@c.us',
                    "text" => $text,
                    "session" => "default"
                ]);
        }
    }

    public function format($phone)
    {
        $x = array('(', ')', '-', ' ');
        $phone = str_replace($x, '', $phone);

        if (strlen($phone) == 11) {
            $phone = substr_replace($phone, '', 2, 1);
            $phone = '55' . $phone;
            return $phone;
        } elseif (strlen($phone) == 10) {
            $phone = '55' . $phone . '@c.us';
            return $phone;
        } else {
            $text = $phone;

            Http::withHeaders([
                'X-Api-Key' => 'h8eeNNrp7u4Z63e921b413af1',
                'Content-Type' => 'application/json'
            ])
                ->post("$this->url/api/sendText", [
                    'chatId' => '554792627617@c.us',
                    "text" => $text,
                    "session" => "default"
                ]);
        }
    }

    public function sessionWhatsApp()
    {
        Http::withHeaders([
            'X-Api-Key' => 'h8eeNNrp7u4Z63e921b413af1',
            'Content-Type' => 'application/json'
        ])
            ->post("$this->url/api/sessions/start", [
                "name" => "default"
            ]);

        $this->screenshot();
    }

    public function screenshot()
    {
        $response = Http::withHeaders([
            'X-Api-Key' => 'h8eeNNrp7u4Z63e921b413af1',
            'Content-Type' => 'application/json'
        ])
            ->get("$this->url/api/screenshot");

        return $response;
    }

}
