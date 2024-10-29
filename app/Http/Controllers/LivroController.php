<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('livros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'cat_id' => 'required|exists:categorias,cat_id',
            'imagem' => 'image|nullable|max:1999',
        ]);
       
        $imagemPath = null;
    
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('livros', 'public');
        }
    
        Livro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'cat_id' => $request->cat_id,
            'imagem' => $imagemPath,
        ]);
    
        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso!');
    }

    public function edit(Livro $livro)
    {
        $categorias = Categoria::all();
        return view('livros.edit', compact('livro', 'categorias'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'cat_id' => 'required|exists:categorias,cat_id',
            'imagem' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('imagem')) {
            Storage::delete('public/' . $livro->imagem);
            $imagemPath = $request->file('imagem')->store('livros', 'public');
            $livro->imagem = $imagemPath;
        }

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->cat_id = $request->cat_id;
        $livro->save();

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        Storage::delete('public/' . $livro->imagem);
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }

    public function home()
    {
        $livros = Livro::all();
        $categorias = Categoria::all();
        return view('home', compact('livros', 'categorias'));
    }
    
    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    // Método de upload de arquivos para Livro
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $file = $request->file('file');
        $destinationPath = 'uploads/livros';
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path($destinationPath), $fileName);

        return back()->with('success', 'Arquivo enviado com sucesso!')->with('file', $fileName);
    }
}
