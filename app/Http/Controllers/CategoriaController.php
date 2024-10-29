<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Livro; // Adiciona o modelo Livro
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'imagem' => 'image|nullable|max:1999',
        ]);
    
        // Armazena a imagem e obtém o caminho
        $imagemPath = $request->file('imagem')->store('categorias', 'public');
    
        // Cria a categoria com os dados
        Categoria::create([
            'nome' => $request->nome,
            'imagem' => $imagemPath,
        ]);
    
        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required',
            'imagem' => 'image|nullable|max:1999',
        ]);

        // Verifica se uma nova imagem foi enviada
        if ($request->hasFile('imagem')) {
            // Exclui a imagem antiga do armazenamento
            Storage::delete('public/' . $categoria->imagem);
            // Armazena a nova imagem
            $imagemPath = $request->file('imagem')->store('categorias', 'public');
            $categoria->imagem = $imagemPath;
        }

        // Atualiza o nome da categoria
        $categoria->nome = $request->nome;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        // Exclui a imagem da categoria do armazenamento
        Storage::delete('public/' . $categoria->imagem);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }

    public function showCategories()
    {
        $categorias = Categoria::all();
        return view('layouts.categories', compact('categorias'));
    }

    public function home()
    {
        $categorias = Categoria::all(); // Carrega todas as categorias
        $livros = Livro::all(); // Carrega todos os livros ou utilize um critério para os melhores

        return view('home', compact('categorias', 'livros')); // Envia as categorias e livros para a view 'home'
    }

    public function show(Categoria $categoria)
    {
        // Carrega os livros da categoria
        $livros = $categoria->livros; // Isso assume que você tem um relacionamento 'livros' no modelo Categoria
        return view('categorias.show', compact('categoria', 'livros'));
    }

    // Método de upload de arquivos
    public function upload(Request $request)
    {
        // Valida o arquivo antes do upload
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // limitações de tipo e tamanho
        ]);

        // Obtém o arquivo do input
        $file = $request->file('file');

        // Define o caminho da pasta onde o arquivo será armazenado
        $destinationPath = 'uploads'; // a pasta 'uploads' será criada automaticamente

        // Salva o arquivo com um nome único
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path($destinationPath), $fileName);

        return back()->with('success', 'Arquivo enviado com sucesso!')->with('file', $fileName);
    }
}
