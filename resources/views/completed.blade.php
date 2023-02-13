@extends('templates.template')




@section('title')
    Formulário
@endsection

@section('top')
    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h2>Solicitação Recebida com Sucesso</h2>
        {{-- <p class="lead">Digite as informações necessárias para cadastrar o evento.</p> --}}
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <h4 class="text-center">Sua solicitação foi enviada e será processada.</h4>
                        <h6 class="text-center">As atualizaçãoes serão enviadas em seu WhatsApp!</h6>
                        <img src="{{ url('assets/bootstrap/img/Celebration-bro.svg') }}" alt="">
                        <div class="text-center"><a name="" id=""
                                class="btn btn-primary" href="{{ '/' }}"
                                role="button">Voltar ao Início</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
