@extends('layouts.master')
@section('content')
<div class="row justify-content-between">
    <h1>Cargar usuarios por XLS</h1>
    <div class="col-4">
        <a type="button" class="btn btn-primary float-right" href="/usuarios">Atrás <i class="fas fa-arrow-left "></i></a>
    </div>
</div>
<hr>
@include('layouts.errors')
<div class="alert alert-info" role="alert">
  <ul>
      <li>El archivo debe tener los siguientes encabezados en la primera fila.</li>
      <ul>
            <b>
            <li class="list-inline-item">RUN</li>
            <li class="list-inline-item">- Nombre</li>
            <li class="list-inline-item">- UU.RR.</li>
            <li class="list-inline-item">- Rol</li>
            </b>
      </ul>
      <li>Las claves serán los 4 primeros digitos del RUN.</li>
      <li>Revisar el formato de las celdas Excel antes de cargar.</li>
  </ul>
</div>
<form id="formulario" class="form-horizontal" action="{{action('UsersController@cargarUsuarios')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group col-8 offset-2"> 
            <label class="h4" for="archivo">Seleccione archivo</label>           
            <input type="file" id="archivo" name="archivo" showpreview="false">            
        </div>
</form>
<link rel="stylesheet" type="text/css" href="/css/fileinput.min.css">
<script src="/js/plugins/piexif.min.js"></script>
<script src="/js/plugins/sortable.min.js"></script>
<script src="/js/plugins/purify.min.js"></script>
<script src="/js/fileinput.min.js"></script>
<script src="/themes/fa/theme.min.js"></script>
<script src="/js/locales/es.js"></script>
<script type="text/javascript">    
    $("#archivo").fileinput({
        theme:'fa',            
        language:'es',
        required:'true',
        maxfile:'1',});    
    $('#formulario').submit(function() {
        $('#carga').show();
    });
</script>
@endsection
