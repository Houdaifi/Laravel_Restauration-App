<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands_products', function (Blueprint $table) {
            $table->integer('command_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->foreign('command_id')->references('id')->on('commands');
            $table->foreign('product_id')->references('id')->on('products');
            
            $table->integer('quantity');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commands_products');
    }
}
