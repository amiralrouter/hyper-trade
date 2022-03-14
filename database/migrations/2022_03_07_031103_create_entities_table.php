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
			$table->foreignId('business_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Business ID');
			$table->foreignId('order_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Order ID');
			$table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Product ID');
			$table->float('price')->comment('Price');
			$table->integer('quantity')->comment('Quantity');
			$table->float('total_price')->comment('Total price');
			$table->text('note')->nullable()->comment('Note');
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
