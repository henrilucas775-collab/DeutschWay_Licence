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
        Schema::create('lecons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapitre_id')->constrained('chapitres')->cascadeOnDelete();
            $table->string('mot_allemand');
            $table->string('traduction_francaise')->nullable();
            $table->string('exemple')->nullable();
            $table->string('chemin_audio')->nullable();
            $table->string('code_couleur')->nullable();
            $table->string('chiffre')->nullable();
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecons');
    }
};
