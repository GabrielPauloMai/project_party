<?php

namespace App\Http\Controllers;

use App\Services\WhatsApp;
use App\Services\InfoService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $service;
    private $services;
    public function __construct(WhatsApp $service){
        $this->service = $service;
    }
    public function construct(InfoService $services){
        $this->services = $services;
    }


    public function whatsapp(Request $request){
        {
            $text = $request->text;
            $number = $request->number;
        }

        $this->service->whatsapp($number, $text);

    }
    
    public function sessionWhatsApp(){

        $this->service->sessionWhatsApp();

    }

    public function send(Request $request){
        {
            $number = $request->number;
        }

        $text = "*Mensagem automática*

Olá, eu sou o sistema que auxilia a Lucia no agendamento de eventos! Este é o nosso primeiro contato por aqui...

Clique no link abaixo e inicie o seu cadastro.

https://casadefestas.digital/client/create";

    $this->service->whatsapp($number, $text);
    }

    public function dates(){
        $types_events = DB::select("select DATE_FORMAT(date_init,'%d/%m/%Y')as dates from parties where date_init > CURDATE()");
        return $types_events;
    }



}
