<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wallets', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->string('wallet_id_string')->nullable();
			$table->string('name')->nullable();
			$table->string('crypto_type')->nullable();
			$table->decimal('balance', 10, 5)->nullable();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('wallets');
	}
}
