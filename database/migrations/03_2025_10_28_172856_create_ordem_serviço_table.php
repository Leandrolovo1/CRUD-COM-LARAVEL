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
        Schema::create('ordem_servico', function (Blueprint $table) {
            $table->id();
            $table->text('defeito_pedido')->nullable();
            $table->text('laudo');
            $table->string('foto')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');

            $table->unsignedBigInteger('tipo_maquinas_id');
            $table->foreign('tipo_maquinas_id')->references('id')->on('tipo_maquinas');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordem_servico');
    }
};
