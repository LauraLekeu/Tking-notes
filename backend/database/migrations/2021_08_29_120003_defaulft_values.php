<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class DefaulftValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Création des données fictives dans la table 'users'
        DB::table('users')->insert([
            'firstname' => 'Laura',
            'lastname' => 'L',
            'email' => 'laura.ieps.projets@gmail.com',
            'password' => 'AZERTY',
            'created_at' => NOW()
        ]);

        // Création des données fictives dans la table 'courses'
        DB::table('courses')->insert([
            'name' => 'Scripts serveurs',
            'created_at' => NOW(),
            'user_id' => 1
        ]);

        // Création des données fictives dans la table 'notes'
        DB::table('notes')->insert([
            'title' => 'Structure MVC',
            'content' => 'Lalala lalala lala ....',
            'created_at' => NOW(),
            'course_id' => 1,
            'user_id' => 1
        ]);

        // Création des données fictives dans la table 'tags'
        DB::table('tags')->insert([
            'name' => 'php',
            'created_at' => NOW(),
            'user_id' => 1
        ]);

        // Création des données fictives dans la table 'todos'
        DB::table('todos')->insert([
            'content' => 'Finir Projet2',
            'deadline' => '2021-06-08 00:00:00',
            'created_at' => NOW(),
            'course_id' => 1,
            'user_id' => 1
        ]);

        // Création des données fictives dans la table 'notes_has_tags'
        DB::table('notes_has_tags')->insert([
            'note_id' => 1,
            'tag_id' => 1
        ]);
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
