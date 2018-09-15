@extends('layout')

@section('title', "Crea usuario")

@section('content')

	<h1>Crea usuario</h1>

    <form method="POST" action="{{ url('usuarios/crear') }}">
    	{!! csrf_field() !!}

        <label for = 'name'>Nombre </label>
        <input type="text" name="name" id="name"><br>
        <label for = 'email'>Correo </label>
        <input type="email" name="email" id="email"><br>
        <label for = 'password'>Password</label>
        <input type="password" name="password" id="password"><br>

    	<button type="submit">Crear Usuario</button>

    </form>
     

     <a href="{{ route('user.index') }}">Regresar</a>
	
@endsection	

@section('sidebar')
	@parent
	<h2>Barra lateral personalizada</h2>
@endsection