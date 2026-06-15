<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lecons', function (Blueprint $table) {
            $table->string('article')->nullable()->after('mot_allemand'); // der, die, das
            $table->string('image_url')->nullable()->after('chemin_audio');
            $table->string('categorie')->nullable()->after('image_url');
        });
    }

    public function down(): void
    {
        Schema::table('lecons', function (Blueprint $table) {
            $table->dropColumn(['article', 'image_url', 'categorie']);
        });
    }
};
