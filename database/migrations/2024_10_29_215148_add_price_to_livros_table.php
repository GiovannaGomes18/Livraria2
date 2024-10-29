<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToLivrosTable extends Migration
{
    /**
     * Execute a migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->after('nome'); // Ajuste o 'after' conforme a posição desejada
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}
