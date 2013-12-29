<?php

use Illuminate\Database\Migrations\Migration;

class CreateRelations extends Migration {

    /**
     * Run the migrations.
     * This migration adds all the necessary relationships in the database so far
     * @return void
     */
    public function up() {
        Schema::table('profiles', function($table) {
                    $table->foreign('user_id')->references('id')->on('users');
                });
        Schema::table('clicks', function($table) {
                    $table->foreign('clicker')->references('uid')->on('profiles');
                    $table->foreign('clickee')->references('uid')->on('profiles');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
    }

}