<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up()
	{
		Schema::create('posts', function (Blueprint $table)
		{
			$table->uuid('id')->primary();
			$table->text('text')->nullable();
			$table->json('images')->nullable();
			$table->foreignUuid('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('posts');
	}
};