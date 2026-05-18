<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {

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
        $table->timestamps(); // Garde-le une seule fois ici à la fin
        $table->foreignId('equipment_id')->nullable()->constrained('equipment');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
