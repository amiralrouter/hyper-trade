<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
	public function up(): void
	{
		Schema::create('category_product', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('category_id')->constrained();
			$table->foreignId('product_id')->constrained();
		});
		Schema::create('menu_product', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('menu_id')->constrained();
			$table->foreignId('product_id')->constrained();
		});
		Schema::create('material_product', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('material_id')->constrained();
			$table->foreignId('product_id')->constrained();
		});

		Schema::create('menu_unit', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('menu_id')->constrained();
			$table->foreignId('unit_id')->constrained();
		});
		Schema::create('product_unit', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('product_id')->constrained();
			$table->foreignId('unit_id')->constrained();
		});

		Schema::create('department_user', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('department_id')->constrained();
			$table->foreignId('user_id')->constrained();
		});

		Schema::create('unit_order_user', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('unit_id')->constrained();
			$table->foreignId('user_id')->constrained();
		});
		Schema::create('unit_petition_user', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('unit_id')->constrained();
			$table->foreignId('user_id')->constrained();
		});

		Schema::create('order_user', function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->foreignId('order_id')->constrained();
			$table->foreignId('user_id')->constrained();
		});

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

	public function down(): void
	{
		Schema::dropIfExists('category_product');
		Schema::dropIfExists('menu_product');
		Schema::dropIfExists('material_product');

		Schema::dropIfExists('menu_unit');
		Schema::dropIfExists('product_unit');

		Schema::dropIfExists('department_user');

		Schema::dropIfExists('unit_order_user');
		Schema::dropIfExists('unit_petition_user');

		Schema::dropIfExists('order_user');
	}
};
