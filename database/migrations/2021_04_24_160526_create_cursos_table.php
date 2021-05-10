<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('curs',50)->unique();
            $table->foreignId('create_user_id');
            $table->foreignId('edit_user_id');
            $table->enum('estat',['Actiu','Inactiu']);
            $table->timestamps();
            
            $table->foreign('create_user_id')->references('id')->on('users');
            $table->foreign('edit_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
