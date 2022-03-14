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
        Schema::create('orders', function (Blueprint $table) {
			$table->id();
			$table->foreignId('business_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Business ID');
			$table->foreignId('wallet_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Wallet ID');
			$table->foreignId('guest_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Guest ID');
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
        Schema::dropIfExists('orders');
    }
};
