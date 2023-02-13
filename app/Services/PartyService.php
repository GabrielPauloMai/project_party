<?php

namespace App\Services;

use \Illuminate\Support\Facades\Http;
use DB;

class PartyService
{


    public function storeParty($request)
    {
        $ev = DB::select("select * from types_events where id = $request->type");
        $price = $ev[0]->price;
        $party_id = DB::table('parties')->insertGetId([
            'type' => $request->type,
            'date_init' => $request->date . ' ' . $request->init,
            'date_end' => $request->date . ' ' . $request->end,
            'guests' => $request->guests,
            'price' => $price,
            'description' => $request->description,
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return $this->storeEvent($party_id);
    }

    public function storeEvent($party_id)
    {
        $client_id = session('id_client');

        DB::table('event')->insert([
            'party_id' => $party_id,
            'client_id' => $client_id,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return $this->sendText($client_id);
    }

    public function denied($request)
    {
        $event_id = $request->id;

        DB::table('event')
            ->where('id', $event_id)
            ->update(['status' => 4]);

        $client = DB::select("select * from event 
        inner join clients 
        on clients.id = event.client_id
        where event.id = $event_id");

        $phone = $client[0]->phone;

        $text = "Olá " . $client[0]->name . ",

Infelizmente, devido a imprevistos inesperados, precisamos informar que seu evento não poderá ser realizado na data prevista. Entendemos a decepção que isso pode causar, e gostaríamos de oferecer a possibilidade de remarcar seu evento para uma data futura.

Por favor, entre em contato conosco para discutir as opções disponíveis e garantir que possamos planejar um evento incrível.";

        $whatsapp = new WhatsApp;

        $response = $whatsapp->whatsapp($phone, $text);
        
        return $response;
    }

    public function permited($request)
    {
        $event_id = $request->id;

        DB::table('event')
            ->where('id', $event_id)
            ->update(['status' => 2]);

        $client = DB::select("select * from event 
        inner join clients 
        on clients.id = event.client_id
        where event.id = $event_id");

        $phone = $client[0]->phone;

        $text = "Olá " . $client[0]->name . ",

Quero lhe informar que seu evento foi aprovado. Por favor, entre em contato conosco para discutir os próximos passos e garantir que tudo esteja em ordem para o grande dia.";

        $whatsapp = new WhatsApp;

        $response = $whatsapp->whatsapp($phone, $text);

        return $response;
    }

    public function sendText($client_id)
    {

        $data = DB::select("select * from clients where id = $client_id");

        $phone = $data[0]->phone;

        $whatsapp = new WhatsApp;

        $text = 'Prezado ' . $data[0]->name . ',

Gostaríamos de agradecer pelo envio de sua solicitação de evento. Recebemos sua solicitação e estamos revisando com atenção todos os detalhes. Em breve, entraremos em contato com mais informações sobre a aprovação ou rejeição do seu evento.
        
Agradecemos sua paciência e compreensão.';

        $whatsapp->whatsapp($phone, $text);

        return true;
    }

    public function getInfos()
    {
        $events = DB::select("select
        event.id as 'event_id',
        types_events.name as 'type_name', 
        clients.name as 'name',
        clients.city as 'city',
        clients.phone, 
        parties.date_init,
        parties.date_end,
        date_format(parties.date_init,'%d') as 'date',
        date_format(parties.date_init,'%M') as 'month',
        date_format(parties.date_init,'%H:%i') as 'hour_init',
        date_format(parties.date_end, '%H:%i') as 'hour_end',
        CONCAT('R$ ', format(types_events.price,2,'pt_BR')) as 'price',
        parties.guests as 'guests',
        parties.description as 'description',
        event.status 
        from event
        inner join parties
        on event.party_id = parties.id
        inner join types_events
        on types_events.id = parties.type
        inner join clients
        on event.client_id = clients.id
        order by date_init asc 
        ");

        $whatsapp = new WhatsApp;

        foreach ($events as $event) {
            $eve = $event->city;
            $json = file_get_contents("https://servicodados.ibge.gov.br/api/v1/localidades/municipios/$eve");
            $city = json_decode($json, true);
            $event->city = $city['nome'];
            $event->phone = $whatsapp->format($event->phone);
        }



        return $events;
    }
}
