<?php
//Angel Scarpetta NRC:66988 ID:862954 fecha: 06/05/2024 
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('descripcion');
            $table->dateTime('due_date')->nullable();
            $table->enum('status',['Pendiente', 'En espera', 'En progreso', 'Completada'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
