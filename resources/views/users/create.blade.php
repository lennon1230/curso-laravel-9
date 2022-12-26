@extends('layouts.app')

<!-- Diretiva do Blade -->
@section('title', 'Criar usuário')

<!-- Diretiva do Blade -->
@section('content')
<h1>Novo Usuário</h1> 

@include('users.includes.validations-form')

<form action="{{ route('users.store') }}" method="post">
    @csrf
    @include('users._partials.form')

    <button type="submit">Cadastrar</button>
</form>
@endsection