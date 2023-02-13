<?php
namespace App\Services;
use \Illuminate\Support\Facades\Http;
use DB;

class InfoService
{
    
    
    public function getInfos()
    {
        $events = DB::select("select
        event.id as 'event_id',
        types_events.name as 'type_name', 
        clients.name as 'name',
        clients.city as 'city',
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
        ");
        
        return $events;
    }

    

}