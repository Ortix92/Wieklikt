<?php

use Illuminate\Database\Migrations\Migration;

class CreateClicksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clicks', function($table) {
                    $table->increments("id");
                    $table->string("clicker");
                    $table->string("clickee");
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop("clicks");
    }

}