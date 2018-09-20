@extends('layout')

@section('title', "Editar usuario")

@section('content')

	<h1>Editar usuario</h1>

    @if ($errors->has('name'))
            <div class="alert alert-danger">
                <h6>El campo nombre es requerido</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            
            </div>
    @endif

    <form method="POST" action="{{ url('usuarios/crear') }}">
    	{!! csrf_field() !!}

        <label for = 'name'>Nombre </label>
        <input type="text" name="name" id="name" placeholder="Pedro Pérez" value="{{ old('name', $user->name) }}"><br>
        
        <label for = 'email'>Correo </label>
        <input type="email" name="email" id="email" placeholder="pedroperez@ejemplo.com" value="{{ old('email', $user->email) }}"><br>
       
        <label for = 'password'>Password</label>
        <input type="password" name="password" id="password" placeholder="Debe tener por lo menos seis caracteres"><br>
        
    	<button type="submit">Actualizar Usuario</button>

    </form>
     

     <a href="{{ route('user.index') }}">Regresar</a>
	
@endsection	

@section('sidebar')
	@parent
	<h2>Barra lateral personalizada</h2>
@endsection