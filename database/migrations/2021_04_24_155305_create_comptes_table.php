<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string('compte',150)->unique();
            $table->string('fuc',150)->unique();
            $table->string('clau',150)->unique();
            $table->enum('estat',['Actiu','Inactiu']);
            $table->foreignId('create_user_id');
            $table->foreignId('edit_user_id');
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
        Schema::dropIfExists('comptes');
    }
}
