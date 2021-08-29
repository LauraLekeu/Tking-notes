<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TodosFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('todos', function(Blueprint $table) {
            // Création de la clé étrangère 'course_id' dans la table 'todos'
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses');
            // Création de la clé étrangère 'user_id' dans la table 'todos'
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
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
