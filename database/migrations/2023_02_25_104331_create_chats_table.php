<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up(): void
	{
		Schema::create('chats', function (Blueprint $table)
		{
			$table->uuid('id')->primary();
			$table->string('name');
			$table->json('images')->nullable();
			$table->foreignUuid('faculty_id')->constrained('faculties');
			$table->foreignUuid('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('chats');
	}
};