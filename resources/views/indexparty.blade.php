@extends('templates.template')

@php
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
    
    // dd($events);
    
@endphp

@section('add')
    <!--<link href="form-validation.css" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/cards.css') }}">
@endsection

@section('title')
    Início
@endsection

@section('top')
    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h2>Seja Bem Vindo</h2>
        {{-- <p class="lead">Digite as informações necessárias para cadastrar o evento.</p> --}}
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="container">
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-lg-4">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h5 class="card-title">{{ $event->type_name }}</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-primary">
                                            <span class="widget-49-date-day">{{ $event->date }}</span>
                                            <span class="widget-49-date-month">{{ $event->month }}</span>
                                        </div>
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title"> {{ $event->name }} - {{ $event->city }}
{{-- 
                                                @php
                                                    $json = file_get_contents("https://servicodados.ibge.gov.br/api/v1/localidades/municipios/$event->city");
                                                    $city = json_decode($json, true);
                                                    echo $city['nome'];
                                                @endphp --}}

                                            </span>

                                            <span class="widget-49-meeting-time">{{ $event->hour_init }} até
                                                {{ $event->hour_end }} </span>
                                        </div>
                                    </div>
                                    <ol class="widget-49-meeting-points">
                                        <li class="widget-49-meeting-item"><span>Número de Convidados: {{ $event->guests }}
                                                pessoas</span></li>
                                        <li class="widget-49-meeting-item"><span>Descrição: {{ $event->description }}</span>
                                        </li>
                                        <li class="widget-49-meeting-item"><span>Valor cobrado: {{ $event->price }}</span>
                                        </li>
                                    </ol>
                                    <div class="widget-49-meeting-action">
                                        <a href="#" class="btn btn-sm btn-flash-border-primary">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
