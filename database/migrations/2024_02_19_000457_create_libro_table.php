<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->char('isbn_13', 13);
            $table->char('isbn_10', 10)->nullable($value = true);
            $table->string('autor', 100);
            $table->string('editorial', 100);
            $table->tinyInteger('edicion');
            $table->integer('ano_publicacion');
            $table->binary('portada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro');
    }
};
