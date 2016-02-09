<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menus', function(Blueprint $table) {
        $table->increments('id')->unsgined();
        $table->string('tenant_name', 45);
        $table->string('desc')->nullable();
        $table->time('open_time');
        $table->time('close_time');
        $table->timestamps();
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();
        $table->softDeletes();

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
      Schema::drop('menus');
    }
}
