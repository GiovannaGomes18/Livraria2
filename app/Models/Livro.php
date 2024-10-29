<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $primaryKey = 'livro_id'; // Adicione esta linha
    protected $fillable = ['titulo', 'autor', 'cat_id', 'imagem'];

    public function categoria()
{
    return $this->belongsTo(Categoria::class, 'cat_id', 'cat_id');
}
}
