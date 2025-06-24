@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-8">
    <h2 class="text-xl font-bold mb-4">
        {{ isset($cliente) ? 'Editar Cliente' : 'Novo Cliente' }}
    </h2>
    <form method="POST" enctype="multipart/form-data" action="{{ isset($cliente) ? route('clientes.update', $cliente) : route('clientes.store') }}">
        @csrf
        @if(isset($cliente)) @method('PUT') @endif

        <div class="mb-4">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ old('nome', $cliente->nome ?? '') }}" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Nome Fantasia</label>
            <input type="text" name="nome_fantasia" value="{{ old('nome', $cliente->nome_fantasia ?? '') }}" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label for="codigo_fiscal" class="block text-sm font-medium">CPF ou CNPJ</label>
            <input type="text" name="codigo_fiscal" id="codigo_fiscal"
                class="w-full border rounded px-3 py-2"
                value="{{ old('codigo_fiscal', $cliente->codigo_fiscal ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label for="inscricao_estadual" class="block text-sm font-medium">Inscrição Estadual</label>
            <input type="text" name="inscricao_estadual" id="inscricao_estadual"
                class="w-full border rounded px-3 py-2"
                value="{{ old('inscricao_estadual', $cliente->inscricao_estadual ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label for="data_nascimento" class="block text-sm font-medium">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento"
                class="w-full border rounded px-3 py-2"
                value="{{ old('data_nascimento', $cliente->data_nascimento ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label>Foto</label>
            <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
        </div>
        @if(isset($cliente) && $cliente->foto)
            <img src="{{ asset('storage/' . $cliente->foto) }}" alt="Foto do cliente" class="w-32 h-32 rounded mb-4">
        @endif

        <div class="mb-4">
            <label>Endereco</label>
            <input type="text" name="endereco" value="{{ old('endereco', $cliente->endereco ?? '') }}" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Número</label>
            <input type="text" name="numero" value="{{ old('numero', $cliente->numero ?? '') }}" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Bairro</label>
            <input type="text" name="bairro" value="{{ old('bairro', $cliente->bairro ?? '') }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Estado</label>
            <select id="estado" name="id_estado" class="w-full border rounded px-3 py-2" required>
                <option value="">Selecione o estado</option>
                @foreach($estados as $estado)
                    <!-- <option value="{{ $estado->id }}">{{ $estado->nome }}</option> -->
                    <option value="{{ $estado->id }}"
                        {{ old('id_estado', $cliente->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                        {{ $estado->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Cidade</label>
            <select id="id_cidade" name="id_cidade" class="w-full border rounded px-3 py-2" required>
                <option value="">Selecione uma cidade</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ isset($cliente) ? 'Atualizar' : 'Salvar' }}
        </button>
        <a href="{{ route('clientes.index') }}" class="ml-4 text-gray-600">Cancelar</a>
        @if(isset($cliente))
            <a href="{{ route('clientes.exportarJson', $cliente) }}" 
            class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 mb-4"
            target="_blank"
            >
                Exportar JSON
            </a>
        @endif
    </form>
</div>
<script>
    document.getElementById('estado').addEventListener('change', function () {
        const estadoId = this.value;
        const cidadeSelect = document.getElementById('id_cidade');
        
        cidadeSelect.innerHTML = '<option value="">Carregando...</option>';

        if (estadoId) {
            console.log(estadoId)
            fetch(`/cidades/${estadoId}`)
                .then(res => res.json())
                .then(data => {
                    let options = '<option value="">Selecione uma cidade</option>';
                    data.forEach(cidade => {
                        options += `<option value="${cidade.id}">${cidade.nome}</option>`;
                    });
                    cidadeSelect.innerHTML = options;
                })
                .catch(() => {
                    cidadeSelect.innerHTML = '<option value="">Erro ao carregar</option>';
                });
        } else {
            cidadeSelect.innerHTML = '<option value="">Selecione um estado primeiro</option>';
        }
    });

</script>
@endsection