@extends('adminlte::page')
@section('plugins.Select2',true)

@section('title', 'Editar Etiqueta')

@section('content_header')
    
@stop

@section('content')
    <div class="row justify-content-center">
        
        <div class="card" style="width: 50em;">
            <h1>Editar Etiqueta</h1>
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
                <form method="POST" action="{{ route('admin.tags.update',$tag) }}">
                    {{ method_field('PUT') }}
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group">
                        <label for="name" class="col col-form-label text-md-left">Nombre<span style="color:red_display:bl">*</span></label>
                        <div class="col">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $tag->name }}" required>
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
                            <input id="slug" type="text" class="form-control @error('name') is-invalid @enderror" name="slug" value="{{ $tag->slug }}" readonly required>
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="color" class="col col-form-label text-md-left">Color<span style="color:red">*</span></label>
                        <select class="form-control" id="color" name="color">
                            <option >Seleccionar</option>
                            <option value="pink" {!! ($tag->color=='pink')?'selected':'' !!}>pink</option>
                            <option value="blue">blue</option>
                            <option value="green">green</option>
                            <option value="red">red</option>
                          </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Agregar
                            </button>
                            <a href="{{ route('admin.tags.index')}}" class="btn btn-danger">Cancelar</a>
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
            $( "select" ).select2( { minimumResultsForSearch: 2 } );
            $("#name").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
          });
    </script>
@stop