<?php

namespace App\Services;

use \Illuminate\Support\Facades\Http;
use DB;

class WhatsApp
{
    public $url = 'http://host.docker.internal:3000';
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

    public function week()
    {
        $week = DB::select("SELECT 
        date_format(parties.date_init,'%d/%m/%y') as 'date',
        date_format(parties.date_init,'%H:%i') as 'hour_init',
        clients.name as 'client_name',
        parties.description,
        types_events.name
        
        FROM EVENT
          INNER JOIN clients on clients.id = event.client_id
          inner join parties on event.party_id = parties.id
          inner join types_events on parties.type = types_events.id
          WHERE DATE_INIT < CURDATE() + INTERVAL 360 DAY
              AND DATE_INIT > CURDATE()
              AND event.STATUS <> 3");
        if ($week) {
            $text = "*FESTAS DA SEMANA*";
            foreach ($week as $key) {
                $text = $text."\n\n"; 
                $text = $text."*Cliente:* $key->client_name\n*Festa:* $key->name\n*Data:* $key->date\n*Horário de Início:* $key->hour_init";
            }
        }
        $this->whatsapp('4792627617', $text);
    }
}
