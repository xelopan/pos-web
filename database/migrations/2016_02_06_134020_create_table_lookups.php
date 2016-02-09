<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLookups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create("lookups", function(Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->string('name', 60);
        $table->string('desc', 45)->nullable();
        $table->integer('type')->unsigned();

        $table->foreign('type')
            ->references('id')
            ->on('lookup_types')
            ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('lookups');
    }
}
