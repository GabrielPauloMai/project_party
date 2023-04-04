@extends('templates.template')

@section('add')
    <script src="/assets/bootstrap/js/cep.js" defer></script>
    <script src="https://cdn.tailwindcss.com/3.2.4"></script>
    <script src="/assets/bootstrap/js/form-validation.js"></script>
@endsection

@section('title')
    Formulário
@endsection

@section('top')
    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h2 class="text-base font-semibold leading-7 text-gray-900">Cadastro</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Digite as suas informações para inciar o seu cadastro.</p>
    </div>
@endsection


@section('content')
    <div class="row justify-content-center">

        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <form name="formclient" id="formclient" method="POST" action="{{ url('client') }}">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="sm:col-span-3">
                                        <label for="first-name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Nome
                                            Completo</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" autocomplete="given-name"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                required>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="phone"
                                            class="block text-sm font-medium leading-6 text-gray-900">Celular</label>
                                        <div class="mt-2">
                                            <input type="tel" name="phone" id="phone" autocomplete="phone"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                minlength="11" maxlength="15" onkeyup="handlePhone(event)" required>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="state"
                                            class="block text-sm font-medium leading-6 text-gray-900">Estado</label>
                                        <div class="mt-2">
                                            <select name="state" id="state" required autocomplete="state"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="">Escolha...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="city"
                                            class="block text-sm font-medium leading-6 text-gray-900">Cidade</label>
                                        <div class="mt-2">
                                            <select name="city" id="city" required autocomplete="city"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="">Escolha...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="district"
                                            class="block text-sm font-medium leading-6 text-gray-900">Bairro</label>
                                        <div class="mt-2">
                                            <input type="text" name="district" id="district" autocomplete="district"
                                                required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>


                                    <div class="sm:col-span-3">
                                        <label for="address"
                                            class="block text-sm font-medium leading-6 text-gray-900">Endereço</label>
                                        <div class="mt-2">
                                            <input type="text" name="address" id="address" autocomplete="address"
                                                required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

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
