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
        Schema::create('demands', function (Blueprint $table) {
			$table->id();
			$table->json('name')->default('{}');
			$table->json('description')->default('{}');
			$table->foreignId('business_id')->constrained()->comment('Business ID');
			$table->foreignId('category_id')->constrained()->comment('Category ID');
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
        Schema::dropIfExists('demands');
    }
};
