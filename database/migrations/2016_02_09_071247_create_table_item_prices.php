<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItemPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('item_prices', function(Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->integer('menu_item_id')->unsigned();
        $table->integer('price')->unsigned();
        $table->integer('status')->unsigned();
        $table->timestamps();
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();

        $table->foreign('menu_item_id')
            ->references('id')
            ->on('menu_items');

        $table->foreign('status')
            ->references('id')
            ->on('lookups');

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
      Schema::drop('item_prices');
    }
}
