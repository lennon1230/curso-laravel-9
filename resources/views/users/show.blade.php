@extends('layouts.app')

<!-- Diretiva do Blade -->
@section('title', 'Listagem dos usuários')

<!-- Diretiva do Blade -->
@section('content')
<h1>Listagem de Usuários {{ $user->name }}</h1> 

<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
    <li>{{ $user->created_at }}</li>
</ul>

<form action="{{ route('users.delete', $user->id) }}" method="post">
@csrf
@method('DELETE')
    <button type="submit">Deletar</button>
</form>
@endsection