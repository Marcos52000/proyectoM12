<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('pagaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->nullable();
            $table->foreignId('compte_id')->nullable();
            $table->foreignId('curs_id')->nullable();
            $table->enum('nivell',['ESO','BAT','CF']);
            $table->string('titol',150);
            $table->mediumText('descripcio');
            $table->float('preu',6,2);
            $table->date('data_inici',5);
            $table->date('data_fi',5);
            $table->enum('estat',['Actiu','Inactiu']);
            $table->foreignId('create_user_id');
            $table->foreignId('edit_user_id');
            
            $table->foreign('curs_id')->references('id')->on('cursos')->onDelete('set null');
            $table->foreign('categoria_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('compte_id')->references('id')->on('comptes')->onDelete('set null');
            $table->foreign('create_user_id')->references('id')->on('users');
            $table->foreign('edit_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('pagaments');
    }
}
