@extends('layout')

@section('title', "Crea usuario")

@section('content')

	<h1>Crea usuario</h1>

    <form method="POST" action="{{ url('usuarios/crear') }}">
    	{!! csrf_field() !!}

        <label for = 'name'>Nombre </label>
        <input type="text" name="name" id="name" placeholder="Pedro Pérez" value="{{ old('name') }}"><br>
        @if ($errors->has('name'))
            <div class="alert alert-danger">
                <p>El campo nombre es requerido</p>
            
            
            </div>
        @endif
        <label for = 'email'>Correo </label>
        <input type="email" name="email" id="email" placeholder="pedroperez@ejemplo.com" value="{{ old('email') }}"><br>
        @if ($errors->has('email'))
            <div class="alert alert-danger">
                <p>El campo Correo es requerido</p>
            
            </div>
        @endif
        <label for = 'password'>Password</label>
        <input type="password" name="password" id="password" placeholder="Debe tener por lo menos seis caracteres"><br>
        @if ($errors->has('password'))
            <div class="alert alert-danger">
                <p>El campo Password es requerido</p>
            
            </div>
        @endif

    	<button type="submit">Crear Usuario</button>

    </form>
     

     <a href="{{ route('user.index') }}">Regresar</a>
	
@endsection	

@section('sidebar')
	@parent
	<h2>Barra lateral personalizada</h2>
@endsection