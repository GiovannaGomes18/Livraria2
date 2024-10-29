<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'imagem'];

    // Define o nome da chave primária
    protected $primaryKey = 'cat_id';

    // Relacionamento com o modelo Livro
    public function livros()
    {
        return $this->hasMany(Livro::class, 'cat_id', 'cat_id');
    }
}
