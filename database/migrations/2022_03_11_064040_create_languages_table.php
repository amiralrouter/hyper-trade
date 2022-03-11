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
        Schema::create('languages', function (Blueprint $table) {
			$table->id();
			$table->json('namespace')->default('{}');
			$table->json('use')->default('{}');
			$table->json('class')->default('{}');
			$table->json('protected')->default('{}');
			$table->json('name')->default('{}');
			$table->json('type')->default('{}');
			$table->json('length')->default('{}');
			$table->json('native')->default('{}');
			$table->json('type')->default('{}');
			$table->json('length')->default('{}');
			$table->json('locale')->default('{}');
			$table->json('type')->default('{}');
			$table->json('length')->default('{}');
			$table->json('is_default')->default('{}');
			$table->json('type')->default('{}');
			$table->string('name', 16)->comment('Language name');
			$table->string('native', 16)->comment('Native name');
			$table->string('locale', 5)->comment('Locale');
			$table->boolean('is_default')->comment('Is default language');
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
        Schema::dropIfExists('languages');
    }
};
