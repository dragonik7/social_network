<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up(): void
	{
		Schema::create('chat_users', function (Blueprint $table)
		{
			$table->uuid('id')->primary();
			$table->foreignUuid('chat_id')->constrained('chats')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignUuid('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('chat_users');
	}
};