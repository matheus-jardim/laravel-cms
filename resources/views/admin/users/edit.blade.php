@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1>
        Editar Usuário
    </h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <h5><i class="icon fas fa-ban"></i>Ocorreu um erro.</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="user_name" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="user_name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="user_email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_password" class="col-sm-2 col-form-label">Nova Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="user_password" class="form-control @error('password') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_pconfirm" class="col-sm-2 col-form-label">Confirmação da Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" id="user_pconfirm" class="form-control @error('password') is-invalid @enderror">
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
