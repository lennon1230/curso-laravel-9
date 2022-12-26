@extends('layouts.app')

<!-- Diretiva do Blade -->
@section('title', 'Listagem dos usuários')

<!-- Diretiva do Blade -->
@section('content')
<h1>Listagem de Usuários <a href="{{ route('users.create') }}">+</a></h1> 


<form action="{{ route('users.index') }}" method="get">
    <input type="text" name="search" id="" placeholder="Pesquisar"/>
    <button type="submit">Pesquisar</button>
</form>

<ul>
    <!-- Diretiva do Blade -->
@foreach ($users as $user)
    <li>
        {{ $user->name }} - {{ $user->email }} | 
        <a href="{{ route('users.edit', $user->id) }}">Editar</a> | 
        <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
    </li>
@endforeach
</ul>
    
@endsection