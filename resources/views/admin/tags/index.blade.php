@extends('adminlte::page')
@section('title', 'Etiquetas')

@section('plugins.Fontawesome',true)
@section('plugins.Datatables',true)
@section('plugins.Sweetalert2',true)

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')                                                                                                                 
    @livewire('admin.tags-index')
@stop
@section('css')
    
@stop

@section('js')
    <script>
        $(".formulario_delete").submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Seguro que desea eliminarlo?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borralo!'
                }).then((result) => {
                    console.log(result.value);
                    if(result.value){
                        this.submit();
                    }                  
                })
        });
    </script>
    @if (session('toast_success'))
        <script>
            //alert("bien");
            Swal.fire({
                type: 'success',
                text: '{!! session('toast_success') !!}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            })            
        </script>
    @endif
@stop