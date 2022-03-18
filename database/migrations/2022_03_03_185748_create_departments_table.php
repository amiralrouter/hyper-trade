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
			$table->boolean('order_all_units')->comment('Order all units');
			$table->json('order_blocks')->default('[]')->comment('Blocks IDs');
			$table->json('order_floors')->default('[]')->comment('Floors IDs');
			$table->json('order_units')->default('[]')->comment('Units IDs');
			$table->boolean('petition_all_units')->comment('Petition all units');
			$table->json('petition_blocks')->default('[]')->comment('Blocks IDs');
			$table->json('petition_floors')->default('[]')->comment('Floors IDs');
			$table->json('petition_units')->default('[]')->comment('Units IDs');
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
