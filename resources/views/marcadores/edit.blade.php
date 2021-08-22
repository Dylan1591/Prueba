@extends('layouts.app')

@section('content')
<div class="container p-3" style="background-color: #EBEBEB">
<h2 class="text-center">Edicion de marcadores</h2>

<form action="{{ url('/marcadores/'.$marcador->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('marcadores.form')
</form>
</div>
@endsection
