<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id(); // A coluna 'livro_id' padrão
            $table->string('titulo');
            $table->string('autor');
            $table->foreignId('cat_id')->constrained('categorias')->onDelete('cascade'); // Chave estrangeira
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
