<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menu_items', function(Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->string('name', 140);
        $table->integer('menu_id')->unsigned();
        $table->text('desc')->nullable();
        $table->timestamps();
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();
        $table->softDeletes();

        $table->foreign('menu_id')
            ->references('id')
            ->on('menus');

        $table->foreign('created_by')
            ->references('id')
            ->on('users');

        $table->foreign('updated_by')
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
      Schema::drop('menu_items');
    }
}
