<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use \Illuminate\Support\Facades\Http;
use  App\Http\Controllers\Controller;
use App\Services\PartyService;
use DB;


class PartyController extends Controller
{

    private $service;
    public function __construct(PartyService $service){
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
    //    Controller::whatsapp('554792541337', 'teste de function');
        return view('completed');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reponse = $this->service->storeParty($request);
       
        if ($reponse==true) {
            return view('completed');
        }    
       
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        $reponse = $this->service->denied($request);
    }

    public function denied(Request $request, Party $party)
    {
        $reponse = $this->service->denied($request);
        return $reponse;
    }

    public function permited(Request $request, Party $party)
    {
        $reponse = $this->service->permited($request);
        return $reponse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        //
    }

    public function getInfos(){
        $reponse= $this->service->getInfos();
        return $reponse;
    }

}
