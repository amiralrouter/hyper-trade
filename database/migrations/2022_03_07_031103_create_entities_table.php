<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
			$table->id();
			$table->foreignId('business_id')->constrained()->comment('Business ID');
			$table->foreignId('order_id')->constrained()->comment('Order ID');
			$table->foreignId('product_id')->constrained()->comment('Product ID');
			$table->float('price')->comment('Price');
			$table->integer('quantity')->comment('Quantity');
			$table->float('total_price')->comment('Total price');
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
        Schema::dropIfExists('entities');
    }
};
