@extends('adminlte::page')

@section('title', 'Nueva Categoria')

@section('content_header')
    
@stop

@section('content')
    <div class="row justify-content-center">
       
        <div class="card" style="width: 50em;">
            <card-header><h1>Nueva Categoria</h1></card-header>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group">
                        <label for="name" class="col col-form-label text-md-left">Nombre<span style="color:red_display:bl">*</span></label>
                        <div class="col">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col col-form-label text-md-left">Slug<span style="color:red">*</span></label>
                        <div class="col">
                            <input id="slug" type="text" class="form-control @error('name') is-invalid @enderror" name="slug" value="{{ old('slug') }}" readonly required>
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Agregar
                            </button>
                            <a href="{{ route('admin.categories.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="{{ asset('vendor/jquery-stringtoslug/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(function() {
            $("#name").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
          });
    </script>
@stop