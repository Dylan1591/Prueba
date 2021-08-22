@extends('layouts.app')

@section('content')
<div class="container p-3" style="background-color: #EBEBEB">
<h2 class="text-center">Creacion de marcadores</h2>

<form action="{{ url('/marcadores') }}" method="post">
@csrf
@include('marcadores.form')

</form>

</div>
@endsection