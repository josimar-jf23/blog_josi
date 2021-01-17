@extends('adminlte::page')
@section('title', 'Categorias')

@section('plugins.Fontawesome',true)
@section('plugins.Datatables',true)
@section('plugins.Sweetalert2',true)

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')                                                                                                             
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1>Categorias</h1>
            <a href="{{ route('admin.categories.create')}}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Nuevo</a>
        </div>
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success">
                    <strong>{{(session('info'))}}</strong>
                </div>
            @endif  
            <div class="col-md-12">
                <table class="table table-bordered table-sm" id="table_categories">
                    <thead class="thead-dark">
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th></th>
                    </thead>
                    <tbody>                    
                        @foreach ($categories as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->name}}</td>                                
                                <td><table class="table-sm table-borderless">
                                    <tr>                                        
                                        <td><a class="btn-sm btn-success" href="{{ route('admin.categories.edit',$r)}}"><i class='fas fa-edit'></i></a></td>
                                        <td>
                                            <form id="myform{{$r->id}}" class="formulario_delete" action="{{ route('admin.categories.destroy',$r)}}" method="post">                                                
                                                <button type="submit" class="btn-xs btn-success"><i class='fas fa-trash'></i></button>
                                                <!--<a href="#" class="btn-sm btn-danger" onclick="document.getElementById('myform{{$r->id}}').submit()"><i class='fas fa-trash'></i></a>-->
                                                <input type="hidden" name="_method" value="delete" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                    </tr>
                                </table>                                                           
                                </td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    <script> 
        $('#table_categories').DataTable({
            responsive : true,
            autoWidth : false,
            "language": {
                "lengthMenu": "Mostrar"+
                                        `<select class='custom-select custom-select-sm form-control form-control-sm'>
                                            <option value='1'>1</option>
                                            <option value='10'>10</option>
                                            <option value='25'>25</option>
                                            <option value='50'>50</option>
                                            <option value='100'>100</option>
                                            <option value='-1'>Total</option>
                                        </select>`                                        
                                        +" registros por pagina",
                "zeroRecords": "No se encontro nada",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search":"Buscar:",
                "paginate":{
                    "previous":"Anterior",
                    "next":"Siguiente"
                }
            }
        });
    </script>
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