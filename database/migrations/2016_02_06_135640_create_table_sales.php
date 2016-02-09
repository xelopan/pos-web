<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sales', function(Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->string('code', 20);
        $table->string('table_no', 3)->nullable();
        $table->integer('status')->unsigned();
        $table->timestamps();
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();

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
      Schema::drop('sales');
    }
}
