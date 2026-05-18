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
    // On désactive la vérification des clés étrangères pour ce script
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('incidents');

    Schema::create('incidents', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->enum('status', ['en_attente', 'en_cours', 'resolu'])->default('en_attente');
        $table->enum('priority', ['basse', 'moyenne', 'haute'])->default('moyenne');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('technician_id')->nullable()->constrained('users')->onDelete('set null');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->foreignId('equipment_id')->nullable()->constrained('equipment'); // Ça marchera car equipment existera
        $table->timestamps();
    });

    Schema::enableForeignKeyConstraints();
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
