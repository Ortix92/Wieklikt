<?php

use Illuminate\Database\Migrations\Migration;

class UpdateClicks extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('clicks', function($table) {
            $table->integer('profile_id')->after("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('clicks', function($table) {
            $table->dropColumn('profile_id');
        });
    }

}
