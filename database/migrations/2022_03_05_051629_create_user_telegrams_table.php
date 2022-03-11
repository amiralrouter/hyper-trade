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
        Schema::create('user_telegrams', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->comment('User ID');
			$table->integer('chat_id')->comment('Telegram ID of the user');
			$table->string('verification_code, 8')->comment('Verification code');
			$table->boolean('verified')->comment('Is verified// [type:boolean] Is verified');
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
        Schema::dropIfExists('user_telegrams');
    }
};
