@extends('templates.template')

@section('add')
    <!--<link href="form-validation.css" rel="stylesheet">-->
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/bootstrap/js/form-validation.js"></script>
    <script src="/assets/bootstrap/js/cep.js" defer></script>
@endsection

@section('title')
    Formulário
@endsection

@section('top')
    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h2>Cadastro</h2>
        <p class="lead">Digite as suas informações para inciar o seu cadastro.</p>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Cliente</h4>
                    <form name="formclient" id="formclient" method="POST" action="{{ url('client') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="name" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder=""
                                    value="" required>
                                <div class="invalid-feedback">
                                    Digite um nome válido.
                                </div>
                            </div>


                            <div class="col-12">
                                <label for="email" class="form-label">Email <span
                                        class="text-muted">(opcional)</span></label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="nome@email.com">
                                <div class="invalid-feedback">
                                    Por favor digite um email válido.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="phone" class="form-label">Celular</label>
                                <input type="text" class="form-control" maxlength="15" name="phone" id="phone"
                                    onkeyup="handlePhone(event)" required />
                                {{-- <input type="text" class="form-control" placeholder="(00)00000-0000" > --}}
                                <div class="invalid-feedback">
                                    Por favor digite um número de telefone válido.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">Estado</label>
                                <select class="form-select" name="state" id="state" required>
                                    <option value="">Escolha...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um estado.
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label for="city" class="form-label">Cidade</label>
                                <select class="form-select" name="city" id="city" required>
                                    <option value="">Escolha...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione uma cidade.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="district" class="form-label">Bairro</label>
                                <input type="text" class="form-control" name="district" id="district" placeholder=""
                                    required>
                                <div class="invalid-feedback">
                                    Informe o número da casa.
                                </div>
                            </div>

                            <div class="col-9">
                                <label for="address" class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Rua"
                                    required>
                                <div class="invalid-feedback">
                                    Por favor digite um endereço válido.
                                </div>
                            </div>


                            <hr class="my-4">

                            <input class="w-100 btn btn-primary btn-lg" type="submit" value="Continue">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
