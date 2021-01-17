<div>
    <div class="justify-content-center">
        <h1>Etiquetas</h1>       
        <div class="card">
            
            <div class="card-header">                
                <table style="width: 100%;border:none;">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="f_search">Buscar:</label>
                                <input wire:model="search" id="f_search" name="f_search" type="text" class="form-control" placeholder="Ingrese etiqueta"></td>
                            </div>
                        <td></td>
                        <td><a href="{{ route('admin.tags.create')}}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Nuevo</a></td>
                    </tr>
                </table>                
            </div>
            @if ($tags->count())                
            
            <div class="card-body">
                @if (session('info'))
                    <div class="alert alert-success">
                        <strong>{{(session('info'))}}</strong>
                    </div>
                @endif  
                <div class="col-md-12">
                    <table class="table table-bordered table-sm" id="table_tags">
                        <thead class="thead-dark">
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th></th>
                        </thead>
                        <tbody>                    
                            @foreach ($tags as $r)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $r->name}}</td>                                
                                    <td><table class="table-sm table-borderless">
                                        <tr>                                        
                                            <td><a class="btn-sm btn-success" href="{{ route('admin.tags.edit',$r)}}"><i class='fas fa-edit'></i></a></td>
                                            <td>
                                                <form id="myform{{$r->id}}" class="formulario_delete" action="{{ route('admin.tags.destroy',$r)}}" method="post">                                                
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
            @else
                <strong>No hay registro que mostrar...</strong>
            @endif
            <div class="card-footer">
                {{ $tags->links()}}
            </div>
        </div>
    </div>
</div>
