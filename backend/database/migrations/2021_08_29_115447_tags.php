<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // Création de la table 'tags'
        Schema::create('tags', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();

            $table->unsignedBigInteger('user_id');
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
    }
}
