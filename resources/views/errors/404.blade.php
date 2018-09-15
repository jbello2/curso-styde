@extends('layout')

@section('title', "Usurio no encontrado")

@section('content')

	<b>Usuario no encontrado</b><hr>

    <a href="{{ route('user.index') }}">Ir al listado de usuarios</a>


@endsection