<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleshistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleshistories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_name');
            $table->string('product_qty');
            $table->string('product_price');
            $table->string('subtotalpay');
            $table->string('fullhistory');
            $table->string('fullhistory_totalpay');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_addredss')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saleshistories');
    }
}
