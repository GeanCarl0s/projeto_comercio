<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Estado;
use App\Rules\CpfOuCnpj;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $estados = Estado::orderBy('nome')->get();
        return view('clientes.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'nome_fantasia' => 'required|string|max:255',
            'codigo_fiscal' => 'required|digits_between:11,14|unique:clientes,codigo_fiscal',
            'inscricao_estadual' => 'required|digits_between:9,14|unique:clientes,inscricao_estadual',
            'endereco' => 'required|string',
            'numero' => 'required|digits_between:1,4',
            'bairro' => 'required|string',
            'data_nascimento' => 'required|date|before:today',
            'foto' => 'nullable|image|max:2048',
            'id_cidade' => 'required',
            'id_estado' => 'required',
        ], [
            'codigo_fiscal.unique' => 'Já existe um cliente com este CPF ou CNPJ.',
            'inscricao_estadual.unique' => 'Já existe um cliente com esta inscrição estadual.',
        ]);
        
        $dados = $request->except(['_token', 'foto']);
        
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $nomeArquivo = uniqid() . '.' . $request->foto->extension();
            $caminho = $request->foto->storeAs('clientes', $nomeArquivo, 'public');
            $dados['foto'] = $caminho;
        }

        Cliente::create($dados);
        
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Cliente $cliente)
    {
        $estados = Estado::orderBy('nome')->get();
        return view('clientes.edit', compact('cliente', 'estados'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'nome_fantasia' => 'required|string|max:255',
            'codigo_fiscal' => 'required|digits_between:11,14|unique:clientes,codigo_fiscal' . $cliente->id,
            'inscricao_estadual' => 'required|digits_between:9,14|unique:clientes,inscricao_estadual' . $cliente->id,
            'endereco' => 'required|string',
            'numero' => 'required|digits_between:1,4',
            'bairro' => 'required|string',
            'data_nascimento' => 'required|date|before:today',
            'foto' => 'nullable|image|max:2048',
            'id_cidade' => 'required',
            'id_estado' => 'required',
        ]);

        $dados = $request->except(['_token', 'foto']);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $nomeArquivo = uniqid() . '.' . $request->foto->extension();
            $caminho = $request->foto->storeAs('clientes', $nomeArquivo, 'public');
            $dados['foto'] = $caminho;
        }

        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }

    public function exportarJson(Cliente $cliente)
    {
        $json = $cliente->toJson(JSON_PRETTY_PRINT);

        return response($json, 200, [
            'Content-Type' => 'application/json',
            'Content-Disposition' => 'attachment; filename="cliente_'.$cliente->id.'.json"',
        ]);
    }
}
