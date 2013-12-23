<?php

use Illuminate\Database\Migrations\Migration;

class UniqueClickerClickee extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("clicks", function($table) {
                    $table->unique(array("clicker", "clickee"));
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table("clicks", function($table) {
                    $table->dropUnique("clicker");
                    $table->dropUnique("clickee");
                });
    }

}