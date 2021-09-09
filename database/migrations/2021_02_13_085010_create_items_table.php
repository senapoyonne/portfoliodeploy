<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->string('product_category');
            $table->string('product_builder');
            $table->integer('product_price');
            $table->text('product_description');
            $table->decimal('product_weight',5,2);
            $table->decimal('product_size',5,2);
            $table->integer('product_stock');
            $table->string('product_imgpath1')->nullable();
            $table->string('product_imgpath2')->nullable();
            $table->string('prodict_imgpath3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
