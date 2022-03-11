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
        Schema::create('wallets', function (Blueprint $table) {
			$table->id();
			$table->json('namespace')->default('{}');
			$table->json('use')->default('{}');
			$table->json('class')->default('{}');
			$table->json('protected')->default('{}');
			$table->json('business_id')->default('{}');
			$table->json('type')->default('{}');
			$table->json('class')->default('{}');
			$table->json('unit_id')->default('{}');
			$table->json('type')->default('{}');
			$table->json('class')->default('{}');
			$table->json('is_active')->default('{}');
			$table->json('type')->default('{}');
			$table->foreignId('business_id')->constrained()->comment('Business ID');
			$table->foreignId('unit_id')->constrained()->comment('Unit Type ID');
			$table->boolean('is_active')->comment('Is Active');
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
        Schema::dropIfExists('wallets');
    }
};
