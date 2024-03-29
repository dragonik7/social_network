<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up()
	{
		Schema::create('messages', function (Blueprint $table)
		{
			$table->uuid('id')->primary();
			$table->text('text');
			$table->json('files')->nullable();
			$table->foreignUuid('chat_id')->constrained('chats')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignUuid('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('messages');
	}
};