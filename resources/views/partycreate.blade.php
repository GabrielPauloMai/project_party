@extends('templates.template')

@php
    $types_events = DB::select("select *, CONCAT('R$ ', format(price,2,'pt_BR')) as valor from types_events");
    $id_client = session('id_client');
@endphp



@section('add')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ url('assets/bootstrap/css/index.css') }}">
<script src="{{url('/assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('/assets/bootstrap/js/form-date.js')}}" defer></script>

@endsection




@section('title')
    Formulário
@endsection

@section('top')
    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h2>Nova Festa</h2>
        <p class="lead">Digite as suas informações necessárias para cadastrar o evento.</p>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Festa</h4>
                    <form name="formclient" id="formclient" method="POST" action="{{ url('party') }}">
                        @csrf
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="type" class="form-label">Tipo de Festa</label>
                                <select class="form-select" name="type" id="type" required>
                                    <option value="">Escolha...</option>
                                    @foreach ($types_events as $types)
                                        <option value="{{ $types->id }}">{{ $types->name }} - {{ $types->valor }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um estado.
                                </div>
                            </div>


                            <div class="col-6">
                                <label for="text" class="form-label">Data da Festa</label>
                                <input class="form-control datepicker" type="text" id="datepicker" name="date"
                                    value="" min="{{today()}}" max="">
                            </div>

                            <div class="col-3">
                                <label for="date" class="form-label">Início</label>
                                <input class="form-control" type="time" id="int" name="init">
                            </div>

                            <div class="col-3">
                                <label for="date" class="form-label">Fim</label>
                                <input class="form-control" type="time" id="end" name="end">
                            </div>

                        </div>




                        <div class="col-12">
                            <label for="guests" class="form-label">Quantidade de Convidados</label>
                            <input type="number" class="form-control" maxlength="3" value="" name="guests"
                                id="guests" required />
                            <div class="invalid-feedback">

                            </div>
                        </div>

                        <div class="col-12">
                            <label for="text" class="form-label">Informações da Festa</label>
                            <textarea class="form-control" id="description" name="description"
                                placeholder="Pode usar este campo para nos contar algo sobre a sua festa" rows="3"></textarea>

                            <div class="invalid-feedback">
                                Selecione um estado.
                            </div>
                        </div>

                        @if ($id_client)
                            <input type="text" readonly value="{{ $id_client }}" style="display: none">
                        @endif










                        <hr class="my-4">

                        <input class="w-100 btn btn-primary btn-lg" type="submit" value="Continue">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
