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
        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users');
            $table->foreignId('funcionario_id')
                  ->constrained('funcionarios');
            $table->foreignId('filme_id')
                  ->constrained('filmes');
            
            $table->timestamp('data_locacao')->nullable();
            $table->timestamp('data_prevista_devolucao')->nullable(); 
            $table->timestamp('data_devolucao')->nullable();
            $table->decimal('valor_locacao', 10, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locacoes');
    }
};

