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
        Schema::create('copia_libro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('editorial_id');
            $table->char('isbn_13', 13);
            $table->char('isbn_10', 10)->nullable($value = true);
            $table->integer('ano_publicacion');
            $table->tinyInteger('edicion');
            $table->string('portada')->nullable($value = true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('libro_id')->references('id')->on('libro')->onDelete('cascade');
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copia_libro');
    }
};
