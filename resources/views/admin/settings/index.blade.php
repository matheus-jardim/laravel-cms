@extends('adminlte::page')

@section('title', 'Configurações')

@section('content_header')
    <h1>Configurações</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <h5><i class="icon fas fa-ban"></i>Ocorreu um erro.</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-success">
            {{ session('warning') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.save') }}" method="post" class="form-horizontal">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Título do Site</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ $settings['title'] }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Sub-título do Site</label>
                    <div class="col-sm-10">
                        <input type="text" name="subtitle" value="{{ $settings['subtitle'] }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email para contato</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{ $settings['email'] }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Cor do Fundo</label>
                    <div class="col-sm-1">
                        <input type="color" name="bgcolor" value="{{ $settings['bgcolor'] }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Cor do Texto</label>
                    <div class="col-sm-1">
                        <input type="color" name="textcolor" value="{{ $settings['textcolor'] }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success float-right" value="Salvar">
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
