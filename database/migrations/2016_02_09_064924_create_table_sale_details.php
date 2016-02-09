<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSaleDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sale_details', function(Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->integer('sale_id')->unsigned();
        $table->integer('item_id')->unsigned();
        $table->string('misc')->nullable();
        $table->integer('qty');
        $table->integer('price')->unsigned();
        $table->timestamps();
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();

        $table->foreign('sale_id')
            ->references('id')
            ->on('sales')
            ->onDelete('cascade');

        $table->foreign('item_id')
            ->references('id')
            ->on('menu_items');

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
      Schema::drop('sale_details');
    }
}
