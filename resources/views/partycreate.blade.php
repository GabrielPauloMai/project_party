@extends('templates.template')

@php
    if (!session('id_client')) {
        header('Location:'. url('client/create'));
        die();
    }
    $types_events = DB::select("select *, CONCAT('R$ ', format(price,2,'pt_BR')) as valor from types_events");
    $id_client = session('id_client');
@endphp


@section('add')
    <script src="/assets/bootstrap/js/cep.js" defer></script>
    <script src="https://cdn.tailwindcss.com/3.2.4"></script>
    <script src="/assets/bootstrap/js/form-validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" charset="UTF-8"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/index.css') }}">
    <script src="{{ url('/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/assets/bootstrap/js/form-date.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/datepicker.min.js"></script>
@endsection




@section('title')
    Formulário
@endsection

@section('top')
    <div class="py-5 text-center">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Nova Festa</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Digite as suas informações necessárias para cadastrar o evento.</p>
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
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">



                                    <div class="sm:col-span-3">
                                        <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Tipo
                                            de Festa</label>
                                        <div class="mt-2">
                                            <select name="type" id="type" required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="">Escolha...</option>
                                                @foreach ($types_events as $types)
                                                    <option value="{{ $types->id }}">{{ $types->name }} -
                                                        {{ $types->valor }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="sm:col-span-3">
                                        <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Data
                                            da Festa</label>
                                        <input
                                            class="form-control datepicker block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                            type="text" inputmode="none" id="datepicker" name="date"
                                            value="{{ date('d/m/Y') }}" min="{{ date('d/m/Y') }}" max="" required />
                                    </div>

                                    <div class="sm:col-span-3 ">
                                        <label for="date"
                                            class="block text-sm font-medium leading-6 text-gray-900">Início</label>
                                        <input
                                            class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                            type="time" id="int" name="init" required />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="date"
                                            class="block text-sm font-medium leading-6 text-gray-900">Fim</label>
                                        <input
                                            class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                            type="time" id="end" name="end"required />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="guests"
                                            class="block text-sm font-medium leading-6 text-gray-900">Quantidade de
                                            Convidados</label>
                                        <div class="mt-2">
                                            <input type="number" name="guests" id="guests" inputmode="numeric"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="about"
                                            class="block text-sm font-medium leading-6 text-gray-900">Informações da
                                            Festa</label>
                                        <div class="mt-2">
                                            <textarea id="about" name="description" rows="3" required
                                                class="block w-full rounded-md border-0 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                                        </div>
                                        <p class="mt-3 text-sm leading-6 text-gray-600">Pode usar este campo para nos contar
                                            algo sobre a sua festa.</p>
                                    </div>



                                    @if ($id_client)
                                        <input type="text" readonly value="{{ $id_client }}" style="display: none">
                                    @endif


                                </div>
                            </div>


                            <div class="col-span-full">
                                <div class="flex items-center justify-center gap-x-6">
                                    <button type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Continue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
