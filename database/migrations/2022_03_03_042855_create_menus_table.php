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
        Schema::create('menus', function (Blueprint $table) {
			$table->id();
			$table->json('name')->default('{}');
			$table->foreignId('business_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Business ID');
			$table->boolean('all_blocks');
			$table->json('blocks')->default('[]')->comment('Blocks');
			$table->json('floors')->default('[]')->comment('Floors');
			$table->boolean('all_units');
			$table->json('units')->default('[]')->comment('Units');
			$table->string('slug')->nullable()->comment('Slug');
			$table->boolean('is_active')->comment('Is active');
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
        Schema::dropIfExists('menus');
    }
};
