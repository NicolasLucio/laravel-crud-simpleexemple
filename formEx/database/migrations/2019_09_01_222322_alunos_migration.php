<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlunosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('alunos_migration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100);
            $table->date('nascimento');
            $table->tinyInteger('serie');
            $table->string('cep', 8);
            $table->string('rua', 120);
            $table->integer('numero');
            $table->string('complemento', 50);
            $table->string('bairro', 100);
            $table->string('cidade', 50);
            $table->string('estado', 50);
            $table->string('nomemae', 100);
            $table->string('cpfmae', 11);
            $table->integer('datapref');
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
        //
        Schema::drop('alunos_migration');
    }
}
