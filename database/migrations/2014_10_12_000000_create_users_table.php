<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 25);
			$table->string('last_name', 30);
			$table->string('email', 50)->unique();
			$table->string('password', 60);
			$table->integer('password_temp')->nullable();
			$table->string('department', 100);
			$table->string('code', 60)->nullable();
			$table->smallinteger('active');
			$table->rememberToken()->nullable();
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
		Schema::drop('users');
	}

}
