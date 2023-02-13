@extends('templates.admin')

@php
    $dir = 'assets/gallery';
    $files = [];
    $file = File::allfiles($dir);
    foreach ($file as $info) {
        $img = $dir . '/' . pathinfo($info)['basename'];
        array_push($files, $img);
    }
@endphp



@section('add')
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/index.css') }}">
    <script src="{{ url('/assets/bootstrap/js/balloon.js') }}" defer></script>
    <script src="{{ url('/assets/bootstrap/js/index.js') }}" defer></script>
@endsection

@section('title')
    Início
@endsection

{{-- @section('header')
    <div class="relative">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex items-center justify-between pt-4 pb-2 md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="{{url('/')}}">
                        <img class="h-10 w-auto sm:h-16" src="{{ url('/assets/bootstrap/img/logo.svg') }}"
                            alt="">
                    </a>
                </div>
                <nav class="hidden space-x-10 md:flex">
                    <a href="#cont1" class="text-base font-medium text-white hover:text-gray-900">O Espaço</a>
                    <a href="#app" class="text-base font-medium text-white hover:text-gray-900">Fotos</a>
                    <a href="#cont3" class="text-base font-medium text-white hover:text-gray-900">Contato</a>

                </nav>
            </div>
        </div>
    </div>
@endsection

@section('top')
@endsection --}}

@section('content')
    
    <div class="flex justify-center py-10 flex-wrap">
        <div class="max-w-[95%] sm:max-w-[85%]"> 
            <div id="banner" class="-z-1 flex flex-wrap justify-center bg-white border-0 border-transparent border-solid drop-shadow-[0_35px_35px_rgba(0,0,0,0.65)] rounded bg-clip-border grid grid-cols-0 divide-y">
                <div class="relative">
                    <div class="mx-auto max-w-6xl px-6">
                        <div class="flex items-center justify-between pt-4 pb-2 md:space-x-10">
                            <div class="flex justify-start lg:w-0 lg:flex-1">
                                <a href="{{url('/')}}">
                                    <img class="h-16 w-auto sm:h-18 md:h-26" src="{{ url('/assets/bootstrap/img/logo.svg') }}"
                                        alt="">
                                </a>
                            </div>
                            <nav class="hidden space-x-10 md:flex">
                                <a href="#cont1" class="text-base font-medium text-black hover:text-gray-900">O Espaço</a>
                                <a href="#app" class="text-base font-medium text-black hover:text-gray-900">Fotos</a>
                                <a href="#cont3" class="text-base font-medium text-black hover:text-gray-900">Reservas</a>
                                <a href="https://wa.me/5547992412890" class="text-base font-medium text-black hover:text-gray-900">Contato</a>
            
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap sm:flex-nowrap justify-center p-6 md:px-24 pb-0 mb-0">
                    <div class="flex flex-col text-center sm:text-left justify-center sm:basis-1/4">
                    <h2 class="text-3xl md:text-7xl font-bold mb-6">Casa de Eventos da Lucia</h2>
                    <p class="text-gray-500 mb-6 pb-2 lg:pb-0">
                        Celebre seus momentos especiais conosco.
                    </p>
                    </div>
                    <img class="w-full sm:w-1/2 sm:basis-2/4 drop-shadow" src="{{ url('assets\bootstrap\img\1.svg') }}" alt="">
                    <div class="hidden sm:h-10 sm:basis-1/4"></div>
                </div>

                <div id="cont1" class="container px-6 pt-24 mx-auto">

                    <!-- Section: Design Block -->
                    <section class="mb-32 text-gray-800">
                        <!-- Jumbotron -->
                        <div class="container mx-auto xl:px-32 text-center lg:text-left">
                            <div class="grid lg:grid-cols-2 flex items-center">
                                <div class="mb-12 lg:mb-0">
                                    <div class="block rounded-lg shadow-lg px-6 py-12 md:px-12 lg:-mr-14"
                                        style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px)">
                                        <h2 class="text-3xl font-bold mb-6">Nosso Espaço</h2>
                                        <p class="text-gray-500 mb-6 pb-2 lg:pb-0">
                                            O local perfeito para comemorar seus momentos especiais!
                                        </p>

                                        <div
                                            class="flex flex-col md:flex-row md:justify-around lg:justify-between mb-6 mx-auto">
                                            <p class="flex items-center mb-4 md:mb-2 lg:mb-0 mx-auto md:mx-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-4 h-4 mr-2">
                                                    <path fill="#22c55e"
                                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                                    </path>
                                                </svg>
                                                Espaço Amplo
                                            </p>

                                            <p class="flex items-center mb-4 md:mb-2 lg:mb-0 mx-auto md:mx-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-4 h-4 mr-2">
                                                    <path fill="#22c55e"
                                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                                    </path>
                                                </svg>
                                                Bem Localizado
                                            </p>

                                            <p class="flex items-center mb-2 lg:mb-0 mx-auto md:mx-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-4 h-4 mr-2">
                                                    <path fill="#22c55e"
                                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                                    </path>
                                                </svg>
                                                Cozinha Equipada
                                            </p>
                                        </div>

                                        <p class="text-gray-500 mb-0">
                                            Se você está procurando um local incrível para realizar sua próxima festa,
                                            reunião ou evento, você veio ao lugar certo.
                                            Oferecemos um ambiente acolhedor e aconchegante, com espaços amplos e
                                            equipados para atender a todas as suas necessidades.
                                            Nossa Casa de Festas conta com uma cozinha completa, se for do seu desejo,
                                            oferecemos um serviço personalizado de bar e cozinha.
                                            Entre em contato conosco agora e reserve a data para sua próxima celebração!
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <img src="{{ url('assets\gallery\5.jpg') }}" class="w-full rounded-lg shadow-lg"
                                        alt="" />
                                </div>
                            </div>
                        </div>

                    </section>


                </div>

                <div id="app" class=" max-w-xs sm:max-w-sm md:max-w-2xl lg:max-w-4xl xl:max-w-screen-lg mx-auto px-0 md:px-4 md:px-8 py-12 transition-all duration-500 ease-linear">
                    
                                        <h2 class="text-3xl font-bold mb-6">Galeria de
                                            Fotos</h2>
                                        <p class="text-gray-500 mb-6 pb-2 lg:pb-0">
                                            Confira alguns cliques de eventos já realizados aqui!
                                        </p>
                    <div class="relative">
                        <div
                            class="slides-container h-60 sm:h-72  flex snap-x snap-mandatory overflow-hidden overflow-x-auto space-x-2 rounded scroll-smooth before:w-0 after:w-0 before:shrink-0 after:shrink-0">
                
                            @foreach ($files as $file)
                            <div class="slide aspect-square h-full flex-shrink-0 snap-center rounded overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ url($file) }}" alt="">
                            </div>
                            @endforeach
                
                
                
                
                        </div>
                
                        <div class="absolute top-0 -left-4 h-full items-center hidden md:flex">
                            <button role="button" class="prev px-2 py-2 rounded-full bg-neutral-100 text-neutral-900 group"
                                aria-label="prev"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-5 h-5 group-active:-translate-x-2 transition-all duration-200 ease-linear">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                
                            </button>
                        </div>
                        <div class="absolute top-0 -right-4 h-full items-center hidden md:flex">
                            <button role="button" class="next px-2 py-2 rounded-full bg-neutral-100 text-neutral-900 group"
                                aria-label="next"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-5 h-5 group-active:translate-x-2 transition-all duration-200 ease-linear">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                 <div id="cont3" class="flex justify-center p-6 pb-0 mb-0">
                    <div class="container my-24 px-6 mx-auto">

                        <!-- Section: Design Block -->
                        <section class="mb-32">
                          <style>
                            @media (min-width: 992px) {
                              #cta-img-nml-50 {
                                margin-left: 50px;
                              }
                            }
                          </style>
                      
                          <div class="flex flex-wrap">
                            <div class="grow-0 shrink-0 basis-auto w-full lg:w-5/12 mb-12 lg:mb-0">
                              <div class="flex lg:py-12">
                                <img src="{{ url('/assets/bootstrap/img/card.jpg') }}" class="w-full rounded-lg shadow-lg"
                                  id="cta-img-nml-50" style="z-index: 10" alt="" />
                              </div>
                            </div>
                      
                            <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
                              <div
                                class="bg-[#F5A623] h-full rounded-lg p-6 lg:pl-12 text-white flex items-center text-center lg:text-left">
                                <div class="lg:pl-12">
                                  <h2 class="text-3xl font-bold mb-6">O que você está esperando?</h2>
                                  <p class="mb-6 pb-2 lg:pb-0">
                                    Não perca mais tempo, reserve agora e garanta a data perfeita para o seu evento na nossa Casa de Eventos!
                                  </p>
                                  <a type="button" class="inline-block px-7 py-3 border-2 border-white text-white font-medium text-sm leading-snug uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" data-mdb-ripple="true" href="{{ url('/client/create') }}" data-mdb-ripple-color="light">clique aqui</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        <!-- Section: Design Block -->
                      
                      </div>
                </div> 

                <div class="text-center p-6 bg-gray-200">
                    <span>© 2023 Copyright:</span>
                    <a class="text-gray-600 font-semibold" href="https://gabrielcode.live/">Gabriel Mai</a>
                  </div>

            </div>
        </div>

        

    </div>
@endsection
