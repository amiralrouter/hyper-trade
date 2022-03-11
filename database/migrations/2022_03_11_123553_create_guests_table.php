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
        Schema::create('guests', function (Blueprint $table) {
			$table->id();
			$table->json('namespace')->default('{}');
			$table->json('use')->default('{}');
			$table->json('class')->default('{}');
			$table->json('protected')->default('{}');
			$table->json('business_id')->default('{}');
			$table->json('type')->default('{}');
			$table->json('class')->default('{}');
			$table->json('language_id')->default('{}');
			$table->json('type')->default('{}');
			$table->json('class')->default('{}');
			$table->json('fullname')->default('{}');
			$table->json('type')->default('{}');
			$table->json('size')->default('{}');
			$table->json('nullable')->default('{}');
			$table->foreignId('business_id')->constrained()->comment('Business ID');
			$table->foreignId('language_id')->constrained()->comment('Language ID (Foreign key) default: 1 - English');
			$table->string('fullname')->nullable();
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
        Schema::dropIfExists('guests');
    }
};
