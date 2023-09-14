@extends('adminlte::page')

@section('title', 'Nova Página')

@section('content_header')
    <h1>
        Nova Página
    </h1>
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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pages.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="page_title" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" id="page_title"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_email" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="page_body" class="form-control bodyfield">{{ old('body') }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success float-right" value="Criar">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.bodyfield',
            height: 300,
            menubar: false,
            plugins: 'link table image autoresize lists',
            toolbar: 'undo redo | blocks | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            content_css: [
                '{{ asset('assets/css/content.css') }}'
            ],
            images_upload_url: '{{ route('imageupload') }}',
            images_upload_credentials: true,
            convert_urls: false
        });
    </script>
@endsection
