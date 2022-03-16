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
        Schema::create('departments', function (Blueprint $table) {
			$table->id();
			$table->json('name')->default('{}');
			$table->foreignId('business_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Business ID');
			$table->boolean('is_admin_department')->comment('Is admin department');
			$table->boolean('can_manage_units')->comment('Can manage units');
			$table->boolean('order_related_all_units')->comment('Order related all units');
			$table->json('order_related_blocks')->default('[]')->comment('Blocks related to orders');
			$table->json('order_related_floors')->default('[]')->comment('Floors related to orders');
			$table->json('order_related_units')->default('[]')->comment('Units related to orders');
			$table->boolean('demand_related_all_units')->comment('Demand related all units');
			$table->json('demand_related_blocks')->default('[]')->comment('Blocks related to demands');
			$table->json('demand_related_floors')->default('[]')->comment('Floors related to demands');
			$table->json('demand_related_units')->default('[]')->comment('Units related to demands');
			$table->string('slug')->nullable()->comment('Slug');
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
        Schema::dropIfExists('departments');
    }
};
