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
			$table->json('name')->default('{}')->comment('Translatable name');
			$table->foreignId('business_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->comment('Business ID');
			$table->boolean('is_admin_department')->comment('Is admin department');
			$table->boolean('can_manage_units')->comment('Can manage units');
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
