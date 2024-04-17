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
        Schema::create('sorties', function (Blueprint $table) {
            $table->id();
            $table->text('motif');
            $table->decimal('quantite', 30.2);
            $table->decimal('solde', 30.2);
            $table->string('personne')->nullable();
            $table->text('observation')->nullable();
            $table->foreignId('piece_id')->references('id')->on('pieces')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vehicule_id')->references('id')->on('vehicules')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('statut')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorties');
    }
};
