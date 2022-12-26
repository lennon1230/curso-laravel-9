@extends('layouts.app')

<!-- Diretiva do Blade -->
@section('title', 'Editar usuário')

<!-- Diretiva do Blade -->
@section('content')
<h1>Editar Usuário - {{ $user->name }}</h1> 

@include('users.includes.validations-form')

<form action="{{ route('users.update', $user->id) }}" method="post">
    @method('PATCH')
    @include('users._partials.form')

    <button type="submit">Atualizar</button>
</form>
@endsection