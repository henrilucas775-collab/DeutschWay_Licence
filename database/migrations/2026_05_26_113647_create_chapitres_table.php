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
        Schema::create('chapitres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcours_id')->constrained('parcours')->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->string('titre');
            $table->string('sur_titre')->nullable();
            $table->text('description')->nullable();
            $table->string('template_vue')->default('standard'); // 'alphabet', 'chiffres', 'couleurs', 'salutations', 'standard'
            $table->integer('ordre')->default(0);
            $table->string('couleur_theme')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapitres');
    }
};
