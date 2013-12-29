<?php

use Illuminate\Database\Migrations\Migration;

class AddClicksCol extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('profiles', function($table) {
                    $table->integer("click_count")->after("uid");
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('profiles', function($table) {
                    $table->dropColumn("click_count");
                });
    }

}