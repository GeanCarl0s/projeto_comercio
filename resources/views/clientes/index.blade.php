@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Clientes</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('clientes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">
        + Novo Cliente
    </a>

    <table class="w-full table-auto bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Nome Fantasia</th>
                <th class="px-4 py-2">CPF/CNPJ</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $cliente->nome }}</td>
                    <td class="px-4 py-2">{{ $cliente->nome_fantasia }}</td>
                    <td class="px-4 py-2">{{ $cliente->codigo_fiscal }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('clientes.edit', $cliente) }}" class="text-blue-600">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('Excluir este cliente?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection