@extends('layouts.app')

@section('content')
@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible container" role="alert">
<button type="button" class="close" data-dismiss="alert"
 aria-label="Close"><span aria-hidden="true">&times;</spam>
</button>
{{ Session::get('mensaje')}}
</div>
@endif
<div class="container p-3" style="background-color: #EBEBEB">




<h2 class="float-left">Lista de marcadores</h2>
<a href="{{ url('marcadores/create')}}" class="btn btn-primary float-right">Crear marcador</a>

<table class="table table-light">
  <thead class="thead-dark">
    <tr>
    <th scope="col">id</th>
      <th scope="col">Titulo</th>
      <th scope="col">Tema</th>
      <th scope="col">Url</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $marcadores as $marcador)
    <tr>
      <th scope="row">{{ $marcador->id }}</th>
      <td>{{ $marcador->Titulo }}</td>
      <td>{{ $marcador->Tema }}</td>
      <td type="url"><a class="" href="{{ $marcador->URL }}">{{ $marcador->URL }}</a></td>
      <td>
<div class="btn-group" role="group">
    <a class="btn btn-primary ml-1 " href="{{ url('/marcadores/'.$marcador->id.'/edit') }}">
        editar 
    </a>

      <form action="{{ url('/marcadores/'.$marcador->id) }}" method="post">
      @csrf
      {{ method_field('DELETE') }}
      <input type="submit" class="btn btn-danger " value="Eliminar" onclick="return confirm('Estas seguiro que quieres eliminar este marcador?')">
    </form>
    </td>
</div>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $marcadores->links()!!}

</div>

@endsection