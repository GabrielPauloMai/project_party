<?php

namespace App\Http\Controllers;


use App\Http\Controllers\PartyController;
use App\Models\Client;
use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Session;

class ClientController extends Controller
{   
    private $objClient;
    public function __construct()
    {
       $this->objClient=new Client;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo ("entrou");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_client = DB::table('clients')->insertGetId([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'state'=>$request->state,
            'city'=>$request->city,
            'district'=>$request->district,
            'address'=>$request->address,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    if($id_client);

        session(['id_client' => $id_client]);
        // Session::put('id_client', $id_client);
           return view('partycreate');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
