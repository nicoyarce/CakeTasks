@extends('layouts.master')
@section('content')
@include('layouts.errors')
@if(is_null($proyecto->deleted_at))
    {{-- Para informes normales --}}
    <div class="row justify-content-between">
        <div class="col-9">
            <h1>{{$proyecto->nombre}}</h1>
        </div>
        <div class="col-2 d-flex align-items-center">
            @can('borrar_informes')
            <a type="button" class="btn btn-success mx-auto" href="{{action('InformesController@generarInformeManual', $proyecto['id'])}}" role="button">Generar informe
                <i class="fas fa-plus"></i>
            </a>
            @endcan
        </div>
        <div class="col-1 d-flex align-items-center">        
            <a type="button" class="btn btn-primary float-right" href="{{url()->previous()}}">Atrás <i class="fas fa-arrow-left "></i></a>        
        </div>     
    </div>
    <hr>
    <div class="row justify-content-between">
        <div class="col-12">
            <h2>Informes</h2>
        </div>   
    </div>
    @if(count($proyecto->informes)>0)
        <table class="table table-hover">
            <thead>
                <tr>            
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Ver</th>
                    @can('borrar_informes')
                    <th>Borrar</th>
                    @endcan
                </tr>
            </thead>
            
            <tbody>
                @foreach ($proyecto->informes as $informe)
                <tr>            
                    <td>{{$informe->fecha->format('d-M-Y')}}</td> 
                    <td>{{$informe->created_at->format('H:i:s')}}</td>         
                    <td> 
                        <a href="{{Storage::url($informe->ruta)}}" type="button" class="btn btn-primary" >
                            <i class="fas fa-eye "></i>
                        </a>
                    </td>
                    @can('borrar_informes')
                    <td>                
                        <form method="POST" action="/informes/destroy/{{$informe->id}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar el informe?')"><i class="fas fa-trash-alt"></i></button>
                        </form>             
                    </td> 
                    @endcan           
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <hr>
        <h3 class="text-center">No hay informes</h3>
    @endif
@else
    {{-- Para informes archivados --}}
    <div class="row justify-content-between">
        <div class="col-11">
            <h1>{{$proyecto->nombre}}</h1>            
            <span class="badge badge-pill badge-warning">Archivado</span>            
        </div>
        <div class="col-1 d-flex align-items-center">        
            <a type="button" class="btn btn-primary float-right" href="{{url()->previous()}}">Atrás <i class="fas fa-arrow-left "></i></a>        
        </div>               
    </div>
    <hr>
    <div class="row justify-content-between">
        <div class="col-12">
            <h2>Informes</h2>
        </div>   
    </div>
    @if(count($proyecto->informes()->withTrashed()->get())>0)
        <table class="table table-hover">
            <thead>
                <tr>            
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Ver</th>                   
                </tr>
            </thead>            
            <tbody>
                @foreach ($proyecto->informes()->withTrashed()->get() as $informe)
                <tr>            
                    <td>{{$informe->fecha->format('d-M-Y')}}</td> 
                    <td>{{$informe->created_at->format('H:i:s')}}</td>         
                    <td> 
                        <a href="{{Storage::url($informe->ruta)}}" type="button" class="btn btn-primary" >
                            <i class="fas fa-eye "></i>
                        </a>
                    </td>                             
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <hr>
        <h3 class="text-center">No hay informes</h3>
    @endif
@endif
@endsection
