@extends('layout')

@section('title', "Usurio {$user->id}")

@section('content')

	<h1>Usuario #{{ $user->id }} </h1>

     <p>Nombre del usuario: {{ $user->name }} </p>
     <p>Correo electronico: {{ $user->email }} </p>

     <a href="{{ route('user.index') }}">Regresar</a>
	
@endsection	

@section('sidebar')
	@parent
	<h2>Barra lateral personalizada</h2>
@endsection