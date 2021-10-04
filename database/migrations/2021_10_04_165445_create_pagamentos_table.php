<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('fornecedor');
            $table->string('descricao');
            $table->string('data');
            $table->float('valor', 8, 2);
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')
            ->references('id')
            ->on('users')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
}
